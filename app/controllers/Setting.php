<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Hauth Controller Class
 */
class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Email_Model');
	}
	
	function index()
	{
		
	}
	
	function email()
	{
		$data['data'] = $this->Email_Model->get_email_config();
			
		$this->load->view('admin/templates/header');
		$this->load->view('admin/settings/email', $data);
		$this->load->view('admin/templates/footer');
	}
	
	function email_update()
	{
		$data = array(
				'smtp_host' => $this->input->post('smtp_host'),
				'smtp_port' => $this->input->post('smtp_port'),
				'smtp_user' => $this->input->post('smtp_user'),
				'smtp_pass' => $this->input->post('smtp_pass'),
				'sender' => $this->input->post('sender'),
				'subject'	=> $this->input->post('subject'),
				'email_title'=>$this->input->post('email_title'),
				'email_message'=>$this->input->post('email_message'),
				'email_button'=>$this->input->post('email_button'),
				);
			
		if($this->Email_Model->update_email_setup($data))
		{
			$this->session->set_tempdata('msg','E-mail update successful', '10');
			
			redirect('setting/email');
		}
		else
		{
			$this->session->set_tempdata('msg','E-mail update failure', '10');
			
			redirect('setting/email');
		}
	}
	
	function social()
	{
		$this->load->view('admin/templates/header');
		$this->load->view('admin/settings/social');
		$this->load->view('admin/templates/footer');
	}
	
	function system_setting()
	{
		$state_httpd = exec("systemctl status httpd | grep Active:", $httpd_result);
		$data['httpd_status'] = $httpd_result[0];
		$state_mariadb = exec("systemctl status mariadb | grep Active:", $mariadb_result);
		$data['mariadb_status'] = $mariadb_result[0];
		$state_radiusd = exec("systemctl status radiusd | grep Active:", $radiusd_result);
		$data['radiusd_status'] = $radiusd_result[0];
		$state_backup = exec("sudo ls -l /root | grep database_ | tail -1 | awk {'print $6,$7,$8'}", $backup_result);
		if ($backup_result != null)
		{
			$data['backup_status'] = $backup_result[0];
		}
		else
		{
			$data['backup_status'] = "No backup found";
		}
		$this->load->view('admin/templates/header');
		$this->load->view('admin/settings/system', $data);
		$this->load->view('admin/templates/footer');
	}
	
	function backup_database()
	{
		$state_httpd = exec("sudo mysqldump -u root -pExlogin@24 --all-databases | gzip > /root/database_`date +\%m-\%d-\%y-\%H:\%M`.sql.gz", $httpd_result);
		redirect('setting/system_setting');
	}
	function restart_radiusd()
	{
		if(shell_exec("sudo /root/restart_radiusd.py > /dev/null &"))
		{
			echo json_encode('restart success!');
			sleep(5);
			redirect('Admin/index');
		}
		else
		{
			echo json_encode('restart failure!');
			sleep(5);
			redirect('Admin/index');
		}
	

	}
	
		function restart_httpd()
	{
		$state = shell_exec("sudo /root/restart_httpd.py > /dev/null &");
		echo "please wait for a while";
		sleep(10);
		redirect('Admin/index');
	}
	
		function restart_mariadb()
	{
		$state = shell_exec("sudo /root/restart_mariadb.py > /dev/null &");
		echo "please wait for a while";
		sleep(10);
		redirect('Admin/index');
	}
}
