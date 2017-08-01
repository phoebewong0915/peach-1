<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SMS_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_user_phone($phone)
	{
       $this->db->where('phone', $phone);
       $query = $this->db->get('type_sms');
       return $query->result();

	}
	
	function get_all_email_users()
	{
		$this->db->select('*');
        $query = $this->db->get('type_sms');
		return $query->result();
	}
		
	function insert_user($data)
    {
		return $this->db->insert('type_sms', $data);
	}
	function get_sms_config()
	{
		$query = $this->db->get('sms_config');
		return $query->result();
		
	}
	

	function update_sms_setup($data)
	{
		$this->db->where('id', '1');
		$this->db->update('sms_config', $data);

	}
	//send verification passcode email to user's email id
    function sendsms($to_phone, $to_passcode, $smtp_host, $smtp_port, $smtp_user, $smtp_pass, $subject, $message)
    {
    	//$message = 'Dear User,<br /><br />This is your passcode:' .$to_passcode.'Please click on the below activation link to verify your email address.<br /><br /> http://localhost/email/index.php/login/verify/' .md5($to_email). '<br /><br /><br />Thanks<br />Mydomain Team';
    	$config = array
		  (
			'protocol'         => 'smtp',                   // 'mail', 'sendmail', or 'smtp'
			'smtp_host'        => $smtp_host,
			'smtp_port'        => $smtp_port,  //localhost
			'smtp_user'        => $smtp_user,	
			'smtp_pass'        => $smtp_pass,
			'wordwrap'         => true,
			'mailtype'         => 'html',                   // 'text' or 'html'
			'charset'          => 'iso-8859-1' 
		  );
		  
		$this->load->library('email', $config);
		$this->email->from('peachwong0915@gmail.com', 'Peach Wong');
		$this->email->to($to_email);
		$this->email->subject($subject);
	  	$this->email->message($message);
	  	$this->email->set_newline("\n");
	  	$result = $this->email->send();
	  	//$this->email->print_debugger();
		
	  	return $this->email->print_debugger(); //$result;
    }
	
	function verifyEmailID($key)
    {
        $data = array('verifystatus' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('type_email', $data);
    }

}?>