
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{        
		parent::__construct();
		$this->load->library(array('form_validation','table','session','user_agent'));
		$this->load->helper('security','file','directory','url');
		$this->load->model(array('Admin_Model', 'End_Devices_Model', 'Social_API_Model'));
	}

	public function login_view()
	{
		$this->load->view('admin/admin_login');
	}

	function getOS($agent) 
	{
	$user_agent = $agent;
	$os_platform = "Unknow";
	$os_array = array(
        '/iPhone OS 10_3_2/i' => 'iPhone 10.3.2',
		'/iPad/i' => 'iPad',
        '/MacOS/i' => '(Mac_PowerPC)|(Macintosh)',
		'/Android 7.1.1/i' => 'Android 7.1.1',
		'/Windows NT 10.0/i' => 'Win 10',
        '/Windows NT 6.3/i' => 'Win 8.1',
        '/Windows NT 6.2/i' => 'Win 8',
		'/Windows NT 6.1/i' => 'Win 7'
		);
	
	foreach ($os_array as $regex => $value) 
	{
		if (preg_match($regex, $user_agent)) {
			$os_platform = $value;
		}
	}
		return $os_platform;
	}
	
	public function index()
	{
		$dashboard['current_user'] = $this->Admin_Model->get_current_user();
		$dashboard['today_newJoin'] = $this->Admin_Model->get_today_new_join();
		$dashboard['today_revisit'] = $this->Admin_Model->get_today_revisit();
		$dashboard['gender'] = $this->Admin_Model->get_monthly_gender();
		$dashboard['login'] = $this->Admin_Model->get_login_propor();
		$dashboard['average_input'] = $this->Admin_Model->get_usage_input();
		$dashboard['average_output'] = $this->Admin_Model->get_usage_output();
		$dashboard['os_summary'] = $this->Admin_Model->get_os_summary();
		$dashboard['monthly_duration'] = $this->Admin_Model->get_monthly_duration();

        ///////////////////////////////////////////////////////////////////////////
		$result = $this->Admin_Model->get_all_guest("SELECT *, 
																(SELECT SUM(radacct.acctoutputoctets) from radacct where radacct.username = mac) as total_output, 
																(SELECT SUM(radacct.acctinputoctets) from radacct where radacct.username = mac) as total_input, (SELECT max(UNIX_TIMESTAMP(radacct.acctstoptime) - UNIX_TIMESTAMP(radacct.acctstarttime)) from radacct where radacct.username = mac) as duration, max(last_updated) as last_logged
																FROM `guests` group by mac");

		$arr1 = array();
		function cmp($a, $b)
		{
			return strcmp($a->last_logged, $b->last_logged);
		}
		function duration_cmp($a, $b)
			{
			    if ($a->duration == $b->duration) {
			        return 0;
			    }
			    return ($a->duration < $b->duration) ? -1 : 1;
			}
		
		usort($result, "cmp");

		foreach ($result as $key) {
			if($key->duration != '')
			{
				$arr1[] = $key;
			}
		}
		usort($arr1, "duration_cmp");
		$arr = array_reverse($result, true);
		$arr1 = array_reverse($arr1, true);
		$dashboard['output'] = array_slice($arr, 0, 5); 
		$dashboard['usage_user'] = array_slice($arr1,0, 5);
		$header['title'] = "Dashboard";
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/dashboard', $dashboard);
		$this->load->view('admin/templates/footer');

	}

	//===========================================================================================================
	//	-- Begin Association History
	//===========================================================================================================
	function admin_assoc_history()
	{		
		if ($this->input->post('day_before') != null)
		{
			$day_before = $this->input->post('day_before');
		}
		else{
			$day_before = now();
		}
		$data['subject'] = "Association Tracker";
		
		$data['theader'] = array("id","TimeStamp","MAC Address","Access Point","ESSID","OS","Type" );
		$data['tdata'] = "";
		
		$result = $this->Admin_Model->get_assoc_hist($day_before);
		
		foreach($result as $row)
			{   
			$data['tdata'] .= "<tr>";
			$data['tdata'] .= "<td>".$row->id."</td>";
			$data['tdata'] .= "<td>".date('Y-m-d-H-i-s', $row->reg_time)."</td>";
			$data['tdata'] .= "<td>".$row->mac."</td>";
			$data['tdata'] .= "<td>".$row->ap_mac."</td>";
			$data['tdata'] .= "<td>".$row->ssid."</td>";
			$data['tdata'] .= '<td><i class="fa fa-'.strtolower($row->os).'"></i> '.$row->os." </td>";
			$data['tdata'] .= "<td>".$row->login_type."</td>";
			$data['tdata'] .= "</tr>";
			};
			
		$this->load->view('admin/templates/header');
		$this->load->view('admin/datatable',$data);
		$this->load->view('admin/templates/footer');
	}
	//	-- End of Association History
	
	/**
	function test_table()
	{
		$this->load->view('admin/templates/header');
		$this->load->view('admin/datatable_test');
		$this->load->view('admin/templates/footer');
	}
	function json_flush_assoc_history()
	{
		$query = $this->Admin_Model->get_assoc_hist();
		
		$data = array();
		$no = 0;
		
		foreach($query as $row)
		{
			$no++;
			
			$result[] = array();
			$result[] =	unix_to_human($row->reg_time);
			$result[] =	$row->protocol;
			$result[] =	$row->vlan;
			$result[] =	$row->ap_mac;
			$result[] =	$row->ssid;
			$result[] =	$row->os;
			$result[] =	$row->login_type;
			
			$data[] = $result;

		}
		
		$output = array(
                        "recordsTotal" => $no,
                        "recordsFiltered" => $no,
                        "data" => $data
                );
        //output to json format
        echo json_encode($output);
	}
	*/
	
	/** 
		Social Network API setting
		Developer: *** Peach Wong ***
		Date: 31/3/2017
		Issue: Still return error; by Peach Wong
	**/
	
	function guest_list()
	{
		/*
		$result[1] = $this->Admin_Model->get_all_guest("SELECT mac, CONCAT_WS(' ', fb_first_name, fb_last_name) as name, fb_email as email, fb_image as image, reg_time as last_logged, 'Facebook' as type, (SELECT SUM(radacct.acctoutputoctets) from radacct where radacct.username = mac) as total_output, (SELECT SUM(radacct.acctinputoctets) from radacct where radacct.username = mac) as total_input from type_facebook group by mac");
		$result[2] = $this->Admin_Model->get_all_guest("SELECT mac, `full_name` as name, `username` as email, `profile_picture` as image, `reg_time` as last_logged, 'Instagram' as type, (SELECT SUM(radacct.acctoutputoctets) from radacct where radacct.username = mac) as total_output, (SELECT SUM(radacct.acctinputoctets) from radacct where radacct.username = mac) as total_input  FROM `type_instagram` group by mac");
		$result[3] = $this->Admin_Model->get_all_guest("SELECT mac, `name` as name, `screen_name` as email, `profile_image_url` as image, `reg_time` as last_logged, 'Twitter' as type, (SELECT SUM(radacct.acctoutputoctets) from radacct where radacct.username = mac) as total_output, (SELECT SUM(radacct.acctinputoctets) from radacct where radacct.username = mac) as total_input  FROM `type_twitter` group by mac");
		$result[4] = $this->Admin_Model->get_all_guest("SELECT mac, `wc_nickname` as name, `wc_nickname` as email, `wc_image` as image, `reg_time` as last_logged, 'WeChat'as type, (SELECT SUM(radacct.acctoutputoctets) from radacct where radacct.username = mac) as total_output, (SELECT SUM(radacct.acctinputoctets) from radacct where radacct.username = mac) as total_input  FROM `type_wechat` group by mac");
		*/
		
		$result = $this->Admin_Model->get_all_guest("SELECT *, 
														(SELECT SUM(radacct.acctoutputoctets) from radacct where radacct.username = mac) as total_output, 
														(SELECT SUM(radacct.acctinputoctets) from radacct where radacct.username = mac) as total_input  
														FROM `guests` group by mac");
		
		
		$data['subject'] = "Guest Summary";
		
		$data['theader'] = array("Update","","First Name","Last Name","Email","Used Device","Up / Down","");
		$data['tdata'] = "";
		
		foreach($result as $row)
			{   
				$data['tdata'] .= "<tr>";
				$data['tdata'] .= "<td>".date( 'Y-m-d H:i', $row->last_updated)."</td>";
				$data['tdata'] .= '<td><img class="user-pic rounded" style="height:40px"src="'.$row->photoURL.'"> '.$row->displayName.'</td>';
				$data['tdata'] .= "<td>".$row->firstName."</td>";
				$data['tdata'] .= "<td>".$row->lastName."</td>";
				$data['tdata'] .= "<td>".$row->email."</td>";
				$data['tdata'] .= "<td>".$row->mac."</td>";
				$data['tdata'] .= "<td>".round($row->total_input*0.000008, 1).' / '.round($row->total_output*0.000008, 1)." Mbps</td>";

				$data['tdata'] .= "<td>".$row->provider."</td>";
				$data['tdata'] .= "</tr>";
			};
		
		$this->load->view('admin/templates/header');
		$this->load->view('admin/datatable',$data);
		$this->load->view('admin/templates/footer');
	}

	
	function connected_devices()
		{
		if ($this->input->post('day_before') != null)
		{
			$day_before = $this->input->post('day_before');
		}
		else{
			$day_before = now();
		}
		$data['subject'] = "Devices Summary";
		
		$data['theader'] = array("Mac","Vendor","OS","Ver.","First Seen","Last Seen","Auth. Count");
		$data['tdata'] = "";
		
		$result = $this->End_Devices_Model->get_connected_devices();
		
		foreach($result as $row)
		{   
			if (strtolower($row->os) == "ios" || strtolower($row->os) == "mac os x")
			{$fa_icon = "apple";
			}else{ $fa_icon = strtolower($row->os);}
			
			$data['tdata'] .= "<tr>";
			$data['tdata'] .= "<td>".$row->mac."</td>";
			$data['tdata'] .= "<td>".$row->vendor."</td>";
			$data['tdata'] .= '<td><i class="fa fa-'.$fa_icon.'"></i></td>';
			$data['tdata'] .= '<td>'.$this->getOS($row->agent).'</td>';
			$data['tdata'] .= "<td>".date( 'Y-m-d', $row->first_seen)."</td>";
			$data['tdata'] .= "<td>".date( 'Y-m-d', $row->last_seen)."</td>";
			$data['tdata'] .= "<td>".$row->count."</td>";
			$data['tdata'] .= "</tr>";
		};
			
		$this->load->view('admin/templates/header');
		$this->load->view('admin/datatable',$data);
		$this->load->view('admin/templates/footer');
		}


	public function social_api_setting()
		{
			
			$fb_data = $this->Social_API_Model->get_fb_setting();
			$data['fb_app_id'] = $fb_data[0]->app_id;
			$data['fb_secret'] = $fb_data[0]->app_secret;

			$ig_data = $this->Social_API_Model->get_ig_setting();
			$data['ig_app_id'] = $ig_data[0]->app_id;
			$data['ig_secret'] = $ig_data[0]->app_secret;

			$tw_data = $this->Social_API_Model->get_tw_setting();
			$data['tw_app_id'] = $tw_data[0]->app_id;
			$data['tw_secret'] = $tw_data[0]->app_secret;
			
			$header['title'] = "Social APIs";
			
			$this->load->view('admin/templates/header', $header);
			$this->load->view('admin/social_api_setting', $data);
			$this->load->view('admin/templates/footer');
		}

	
	public function fb_setting()
	{
		$data = array(
		
			'app_id' => $this->input->post('app_id'),
			'app_secret' => $this->input->post('app_secret')

		);
		
		$this->Social_API_Model->update_fb_setting($data);
		
			redirect('Admin/social_api_setting');	
	}
	
	public function ig_setting()
	{
		$data = array(
		
			'app_id' => $this->input->post('app_id'),
			'app_secret' => $this->input->post('app_secret')
		);
		
		$this->Social_API_Model->update_ig_setting($data);
		
			redirect('Admin/social_api_setting');
	}

	public function tw_setting()
	{
		$data = array(
		
			'app_id' => $this->input->post('app_id'),
			'app_secret' => $this->input->post('app_secret')
		);
		
		$this->Social_API_Model->update_tw_setting($data);
		
			redirect('Admin/social_api_setting');
	}
	
	/********************************
		Admin Login/Logout Function
	********************************/
	public function login()
	{
		if($this->session->userdata('login') != TRUE)
		{
		
		// get form input
		$username = $this->input->post("username");
        $password = $this->input->post("password");
	
	
		// form validation
		$this->form_validation->set_rules("username", "username", "trim|required|xss_clean");
		$this->form_validation->set_rules("password", "password", "trim|required|xss_clean");
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('admin/admin_login');
		}
		else
		{
			// check for user credentials
			$uresult = $this->Admin_Model->get_user($username, $password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array(	'login' => TRUE, 
									'uname' => $uresult[0]->fname,
									'lname' => $uresult[0]->lname,									
									'uid' => $uresult[0]->userid,
									'permission' => $uresult[0]->permission);
				$this->session->set_userdata($sess_data);
				
				// validation success
				redirect('admin/index');
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
				redirect('admin/login');
			}
		}
		}
		else {

			redirect('home/index');
			
		}
		//$data['users'] = $this->user_model->get_all_user();
		//$this->load->view('login', $data);
		
	}

	
/////
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('admin/login');
	}


}?>

		
