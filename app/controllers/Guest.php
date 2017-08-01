<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','user_agent'));
		$this->load->helper(array('security','url'));
		$this->load->model(array('Page_Model', 'Guest_Model', 'End_Devices_Model', 'Nas_Model', 'Campaign_Model'));
	}
	
	function index()
	{
		show_error('Oops! Page! Your login Page did not bind to any Controllers or Access Point', '', $heading = 'An Error Was Encountered');
	}
	
	//
	//1. Get post data and write post data to session
	//
	function _convert_wlan_post_data($post_data)
	{
		if(isset($post_data['sip']))
		{
			$client_mac = $post_data['client_mac'];
			$ap = $post_data['mac'];
			$ssid = $post_data['ssid'];
			$redirect = $post_data['url'];
			$switchip = 'http://'.$post_data['sip'].':9997/login';
			$vendor = 'RuckusZoneDirector';
		}
		elseif(isset($post_data['cmd'])) 
		{
			$client_mac = $post_data['mac'];
			$ap = $post_data['apname'];
			$ssid = $post_data['essid'];
			$redirect = $post_data['url'];
			$switchip = 'http://securelogin.arubanetworks.com/cgi-bin/login';
			$vendor = 'ArubaController';
		}
		elseif(isset($post_data['switch_url']))
		{
			$client_mac = $post_data['client_mac'];
			$ap = $post_data['ap_mac'];
			$ssid = $post_data['wlan'];
			$redirect = $post_data['switch_url'];
			$switchip = 'http://1.1.1.1/login.html';
			$vendor = 'CiscoWirelessLANController';
		}
		else
		{
			show_error('<h1>Please left this page NOW</h1>', '', $heading = 'Warning!!');
		}

		$post_kept = array(
					'client_mac' => preg_replace("/[^[:alnum:][:space:]]/u", '',$client_mac),
					"ap"		 => preg_replace("/[^[:alnum:][:space:]]/u", '',$ap),
					"ssid"		 => $ssid,
					"redirect" 		 => $redirect,
					"switchip"	 => $switchip,
					"vendor"	 => $vendor
				);

		return $post_kept;
	}
	
	function _update_asso_history($login_type)
	{		
		$data = array(
			'mac' 		=> $this->session->userdata['mac'],
			'ap_mac' 	=> $this->session->userdata['ap_mac'],
			'ssid'		=> $this->session->userdata['ssid'],
			'reg_time'	=> NOW(),
			'os' 		=> $this->agent->platform(),
			'login_type'=> $login_type,
			
		);
			
		return $this->Guest_Model->store_asso_history($data);
	}
	
	function _create_user_sess($post_kept, $lang = null)
	{
		$default_lang = $this->Page_Model->get_default_lang();
		$data = array(
				'mac' 		=> $post_kept['client_mac'],
				'ap_mac' 	=> $post_kept['ap'],
				'ssid'		=> $post_kept['ssid'],
				"redirect" 	=> $post_kept['redirect'],
				"switchip"	=> $post_kept['switchip'],
				"vendor"	=> $post_kept['vendor'],
				'reg_time'	=> NOW(),
				'os' 		=> $this->agent->platform(),
				'revisit'	=> false,
				'lang'		=> $lang,
				'default_lang' => $default_lang[0]->lang_code
				);
				
		//Seesion create "client_mac" and "url"
		$this->session->set_userdata($data);
	}
	
	function _update_end_devices($mac)
	{
		$device = $this->End_Devices_Model->find_device_data($mac);
		
		if(count($device) == 0)
		{			
			$url = "http://api.macvendors.com/" . urlencode($mac);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
				if($response) 
				{
					$vendor = $response;
				} else {
					$vendor = "Unknow";
				}
				
			$device_data = array(
					'vendor' => $vendor,
					'mac' => $mac,
					'count' => 1,
					'first_seen' => NOW(),
					'last_seen' => NOW(),
					'os' => $this->agent->platform(),
					'browser' => $this->agent->browser(),
					'version' => $this->agent->version(),
					'mobile' => $this->agent->mobile(),
					'agent' => $this->agent->agent_string()
				);	
				
			return $this->End_Devices_Model->store_device_data($device_data);
		}
		else
		{
			$device_data = array(
				'count' => $device[0]->count +1,
				'last_seen' => NOW(),
			);
				
			return $this->End_Devices_Model->update_device_data($mac, $device_data);
		}
	}

	function login($page_name = NULL)
	{	
		if($page_name == NULL)
		{
			show_error('Page Name with null value');
			log_message('error', 'var $page_name did not contain in HTTP_Request.');
		}
		else
		{
			$post_kept = $this->_convert_wlan_post_data($this->input->get(NULL, TRUE));
			log_message('info', '$post_kept DATA::'.$post_kept);
			
			if($post_kept == null)
			{
				show_error('past_kept with null value');
				log_message('error', 'var $past_kept with null value.');
			}
			else{
			
			$page_id = $this->Page_Model->get_page_id_fr_name($page_name);
			
			$this->session->set_userdata(array('pageid'	=>	$page_id[0]->page_id));
			
				if($post_kept['ssid']!="" && $post_kept['ap']!="" && $post_kept['client_mac']!="")
				{
					
					$this->_create_user_sess($post_kept);
					
					//First confirm that the assoc_history and device porfiling were created success
					if($this->_update_asso_history('Associcating') && $this->_update_end_devices($post_kept['client_mac']))
					{
						$this->_check_user_revisit($page_name);
					}
					else 
					{
						show_error('Oops! System Error... error may occur assoc_insert:end_devices_update::session_set <br>'.var_dump($this->session->userdata()), '', $heading = 'An Error Was Encountered');
					}			
				
				}
				else
				{
					show_error('Oops2! Your login Page did not bind to any Controllers or Access Point', '', $heading = 'An Error Was Encountered');
				}
			}
		}
	}
	
	function _check_user_revisit($page_name)
	{
		if(count($this->Nas_Model->check_radius_user($this->session->userdata('mac'))) == 0)
		{
			
			$this->_update_asso_history('Waiting Auth');
			log_message('info', 'Updating Guest Status');
			
			redirect('pages/load/'.$page_name);
		}
		else
		{
			redirect('guest/do_wifi_login/Revisit');
			log_message('info', 'Do Wi-Fi Login with Revisit para.');
		}
	}
	
	function count_adv($campaign_name)
	{
		$result = $this->Page_Model->select_adv_count($campaign_name);
		
		if(count($result) == 0)
		{
			$data = array(
					'adv_name' => $campaign_name,
					'count'		=> 1,
					'updated'	=> NOW()
					);
			$this->Page_Model->create_adv_count($data);
		}
		else 
		{
			$campaign_count = (int)$result[0]->count;
			$count = array('count'=>$campaign_count + 1, 'updated'=>NOW());
			
			$this->Page_Model->update_adv_count($campaign_name, $count);
		}
	}


	function campaign($campaign_id=null)
	{
		if(isset($campaign_id))
		{
			$data['content'] = $this->Campaign_Model->get_campaign($campaign_id);
			$data['pauseti'] = "5000";
			$data['redirect'] = "http://www.yahoo.com.hk";
		}
		else
		{
			$data['content'] = $this->Campaign_Model->get_campaign(68);
			$data['pauseti'] = "5000";
			$data['redirect'] = "http://www.yahoo.com.hk";
		}
		
		print_r($this->session->userdata());
		
		$this->load->view('templates/azmind/ads', $data);
	}

	private function rand_campaign()
	{
		$rand_campaign = $this->Campaign_Model->get_rand_campaign();
		
		$this->count_adv($rand_campaign[0]->campaign_name);
		return $rand_campaign[0]->campaign_id;
	}


	private function load_campaign($mac, $pageid)
	{		
		$guest = $this->Guest_Model->get_guest_history($mac);
		
		$campaign_id = '';
		//$conjunction = 'AND';
		
		if($guest != null)
		{
			$target = $this->Campaign_Model->get_target_campaign($pageid, $guest[0]->fb_gender, $guest[0]->fb_birthday, $guest[0]->login_type);
			
			$this->count_adv($target[0]->campaign_name);
			
			$campaign_id = $target[0]->campaign_id;
		}
		else
		{
			$campaign_id = $this->rand_campaign();
		}
		
		return $campaign_id;
	}


	function change_lang($lang, $page_name)
	{
		$this->session->set_userdata('lang', $lang);
		redirect('pages/load/'.$page_name);
	}

	function do_wifi_login($login_type)
	{
		$vendor = $this->session->userdata('vendor');
		$mac = $this->session->userdata('mac');
		$switchip = $this->session->userdata('switchip');
		$redirect = $this->session->userdata('redirect');
		$pageid = $this->session->userdata('pageid');
		
		if($pageid != null)
		{
			$campaign_id = '';
			
			
			
			$this->_update_asso_history($login_type);
			
			$mode = $this->Page_Model->get_page_mode($pageid);
			
			if($mode[0]->campaign_mode == 'random')
			{
				$campaign_id = $this->rand_campaign();
			}
			else
			{
				$campaign_id = $this->load_campaign($mac, $pageid);
			}
			
			if ($login_type != 'Revisit')
			{
				$this->Nas_Model->create_user($mac);
			}
		
			if(!$this->_update_asso_history('Login Completed'))
			{
				show_error('Oops! Error Code: 899 - System DB Error. Please contact Support', '', $heading = 'An DB Error Was Encountered');
				log_message('error', 'Oops! Error Code: 899 - System DB Error. Please contact Support');
			}
		
		
			session_destroy();
		
				switch ($vendor) {
					case "ArubaController": //pre-defined ID 1 is Aruba Controller
						
						header('location: '.$switchip.'?user='.$mac.'&password='.$mac.'&cmd=authenticate&url='.base_url('campaign/load').'/'.$campaign_id);
						break;
					case "CiscoWirelessLANController": //pre-defined ID 2 is Cisco WLC
						
						header('location: '.$switchip.'?buttonClicked=4&err_flag=0&err_msg=&info_flag=0&info_msg=&username='.$mac.'&password='.$mac.'&redirect_url='.base_url('campaign/load').'/'.$campaign_id);
						break;
					case "RuckusZoneDirector": //pre-defined ID 3 is Ruckus ZoneDirector
						
						header('location: '.$switchip.'?username='.$mac.'&password='.$mac.'&url='.base_url('campaign/load').'/'.$campaign_id);
						break;
					case "HuaweiAC": //pre-defined Huawei Access Controller
						
						header('location: '.$switchip.'?username='.$mac.'&password='.$mac.'&url='.base_url('campaign/load').'/'.$campaign_id);
						break;
						
					default:
						echo "Cannot find specific vendor code ".$vendor." Or specific cleint MAC Address is invalid MAC ".$mac."/n".print_r($this->session->userdata());
				}
		
		
		}
		else
		{
			show_error('This page cannot be access directly', '', 'Warning Message');
		}
	}
	
}