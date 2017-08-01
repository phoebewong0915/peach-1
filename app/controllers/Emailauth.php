<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailauth extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('email'));
        $this->load->helper(array('security', 'form', 'string'));
        $this->load->model('Email_Model');
    }
    
    function index()
    {
        redirect('welcome');
    }
    
    function email_signup()
    {
        $mac = preg_replace("/[^[:alnum:][:space:]]/u", '', $this->session->userdata('mac'));
		
		$config = $this->Email_Model->get_email_config();
		
        $result = $this->Email_Model->get_user_email($this->input->post('email'), $mac);

		$passcode = md5(NOW());
		
		/*
		1. Create New guest account if email address not found
		2. Create New guest account if email address found but MAC address not found
		3. Update User's last seen if above records are correct
		*/

		if (count($result) == 0) 
		{
            $data = array(
                'email' => $this->input->post('email'),
                'identifier' => $passcode,
                'mac' => $mac,
				'provider' => 'Email',
                'last_updated' => NOW()
            );
            
            if ($this->Email_Model->insert_user($data)) 
			{                
                //send verfication passcode email
                if ($this->_sendemail($this->input->post('email'), $passcode)) 
				{
                    redirect('guest/do_wifi_login/Email');
                } 
				else 
				{
					log_message('error', 'Please check the SMTP configuration and connection!');
                }
            } 
			else 
			{
				log_message('error', 'DB Got Error: Create User by E-mail fail. Please check the DB connection!');
            }
        }
        
        else
		{
            if ($result[0]->emailVerified == null)
			{
				$data = array(
					'identifier' => $passcode,
					'last_updated' => NOW()
				);
				
				if($this->Email_Model->update_user($data, $result[0]->gid))
				{
					if($this->_sendemail($this->input->post('email'), $passcode))
					{
						redirect('guest/do_wifi_login/Email');
					}
					else
					{
						log_message('error', 'SMTP Error: Verification email cannot be sent');
					}
				}
				else
				{
					log_message('error', 'DB Got Error: User creation if Email found but MAC Address not found');
				}
			}
			
			else
			{
				$data = array(
					'last_updated' => NOW()
				);
			
				if($this->Email_Model->update_user($data, $result[0]->gid))
				{
					redirect('guest/do_wifi_login/Email');
				}
				else
				{
					log_message('error', 'DB Got Error: User Update if Email and MAC Address found');
				}
			}

        }
    }
    
	function email_test()
	{
		if($this->input->post('email') != '')
		{
			if($this->_sendemail($this->input->post('email')))
			{
				echo json_encode('E-mail sent success!');
			}
			else
			{
				echo json_encode('E-mail sent failure!');
			}
		}
		else{
			$this->load->view('setting/testemail');
		}
	}
	
    function _sendemail($to_email = '', $passcode = '')
    {
        if($to_email != null && $passcode != null)
		{		
		$getconfig = $this->Email_Model->get_email_config();
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => $getconfig[0]->smtp_host,
            'smtp_port' => (int) $getconfig[0]->smtp_port,
            'smtp_user' => $getconfig[0]->smtp_user,
            'smtp_pass' => $getconfig[0]->smtp_pass,
            'wordwrap' => true,
            'mailtype' => 'html', // 'text' or 'html'
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        
        //var_dump($getconfig);
        
        $this->email->initialize($config);
        
        $data['to_passcode'] = $passcode;
        $data['config']      = $getconfig;
        $message             = $this->load->view('templates/hkt/email', $data, true);
        
        $this->email->from($getconfig[0]->smtp_user, $getconfig[0]->sender);
        $this->email->to($to_email);
        $this->email->subject($getconfig[0]->subject);
        $this->email->message($message);
        
        $this->email->print_debugger();
        
        $result = $this->email->send();
        
        return $result;
		}
		
    }
    
    
    function email_verify($key)
    {
        $result = $this->Email_Model->verifyEmailID($key);
		
		if($result != null)
		{
			$data = array('emailVerified' => $result[0]->email);
			
			if($this->Email_Model->verifiedEmail($data, $key))
			{
				echo 'Email Verification Completed';
			}
		}
		else
		{
			echo 'Invalid Email Verification Request';
		}
		
    }
    
    
    
}
?>