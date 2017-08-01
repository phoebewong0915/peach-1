
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	public function __construct() 
	{        
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('html', 'file', 'form'));
		$this->load->model(array('Campaign_Model', 'Media_Model'));
	}
	
	//appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
    }
 
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }
	
	//Campaign manage page
	function index()
	{
		$campaigns = $this->Campaign_Model->get_all_campaigns_add();

		$target = array();

		foreach ($campaigns as $key) {
			$target[$key->campaign_id] = $this->Campaign_Model->get_target_detail($key->campaign_id);
		}

		
		$data['campaign_data'] = $campaigns;
		$data['target_data'] = $target;
		

		$header['title'] = "Campaign Manage";
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/campaign_manage', $data);
		$this->load->view('admin/templates/footer');
	}
	
	function load($campaign_id=null)
	{
		if(isset($campaign_id))
		{
			$data['content'] = $this->Campaign_Model->get_campaign($campaign_id);
			$data['pauseti'] = "5000";
			$data['redirect'] = "https://www.hkt.com";
		}
		else
		{
			$data['content'] = $this->Campaign_Model->get_campaign(68);
			$data['pauseti'] = "5000";
			$data['redirect'] = "https://www.hkt.com";
		}
		
		$this->load->view('templates/hkt/ads', $data);
	}

	function campaign_add()	
	{
		$header['title'] = "Add Campaign";
		$data['double_AD'] = '';
		$data['image'] = $this->Media_Model->get_all_image();
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/campaign_add',$data);
		$this->load->view('admin/templates/footer');
	}


	function campaign_adding()
	{
		if ($_POST['campaign_image'] != '' and $_POST['campaign_youtube'] == true )
		{
			$data['double_AD'] = 'Please select either image or video for your campaign';
			$header['title'] = "Add Campaign";
			$data['image'] = $this->Media_Model->get_all_image();
			$this->load->view('admin/templates/header', $header);
			$this->load->view('admin/campaign_add',$data);
			$this->load->view('admin/templates/footer');
		}
		else
		{
		//input campaign_content value
		if ($_POST['campaign_image'] != '' )
		{
			$result_content = $_POST['campaign_image'];
		}
		else
		{
			$result_content ='<iframe id="video" src="'.$_POST['campaign_youtube'].'?autoplay='.$_POST['youtube_autoplay'].'&loop='.$_POST['youtube_loop'].'&controls='.$_POST['youtube_control'].'" frameborder="0" allowfullscreen></iframe>';
		}

		//input campaign_template value
		if ($_POST['campaign_image'] != '')
		{
			$campaign_template = 'Single_img';
		}
		else
		{
			$campaign_template = 'Single_video';
		}

		$campaign_data = array(
					'campaign_name' => $this->input->post('campaign_name'),
					'campaign_template' => $campaign_template,
					'campaign_location' => $this->input->post('campaign_location'),
					'ads_waiting_time' => $this->input->post('ads_waiting_time'),
					'campaign_content' => $result_content,
					'from_campaign_period' => $this->input->post('from_campaign_period'),
					'to_campaign_period' => $this->input->post('to_campaign_period'),
					'campaign_youtube' => $this->input->post('campaign_youtube'));


		$this->load->model('Campaign_Model');

			if($this->Campaign_Model->insert_campaign($campaign_data) == true)
			{
			  $id_result = $this->Campaign_Model->get_latest_campaign_id();
			  $campaign_id = (int)$id_result[0]->id; 
			}
			else
			{
				log_message('error', 'DB Error');
			}

			$result_age = $_POST['target_age'];
			$result_login = $_POST['target_login'];
			$result_os = $_POST['target_os'];
			$result_gender = $_POST['target_gender'];
			//if age is selected
			if($result_age)
			{
				foreach ($result_age as $key ) {
					$target_data = array('attribute' => 'target_age',
										 'value' => $key,
										 'campaign_id' => $campaign_id);
					$this->Campaign_Model->insert_target($target_data);
				}
			}
			if($result_login)
			{
				foreach ($result_login as $key ) {
					$target_data = array('attribute' => 'target_login',
										 'value' => $key,
										 'campaign_id' => $campaign_id);
					$this->Campaign_Model->insert_target($target_data);
				}
			}
			if($result_os)
			{
				foreach ($result_os as $key ) {
					$target_data = array('attribute' => 'target_os',
										 'value' => $key,
										 'campaign_id' => $campaign_id);
					$this->Campaign_Model->insert_target($target_data);
				}
			}
			if($result_gender)
			{
				$target_data = array('attribute' => 'target_gender',
									 'value' => $this->input->post('target_gender'),
									 'campaign_id' => $campaign_id);
				$this->Campaign_Model->insert_target($target_data);
			}

			print_r($campaign_data);

			redirect("campaign");
		}
		
	}

	function campaign_edit($campaign_id)
	{
		$this->load->model('Media_Model');
		
		$data['campaign_id'] = $campaign_id;
		$data['double_AD'] = '';
		$data['setting_result'] = $this->Campaign_Model->get_campaign_detail($campaign_id);
		$target_result = $this->Campaign_Model->get_target_detail($campaign_id);
		$data['target_result'] = $target_result;
		$data['image'] = $this->Media_Model->get_all_image();
		$all_age = array('under18', '18to30', '31to45', '46to60', 'above61');
		$all_login = array('Email', 'Facebook', 'Instagram', 'Wechat', 'Twitter');
		$all_os = array('IOS', 'Android', 'Windows_10' , 'Windows_7', 'Mac_OS_X');

		$arr = array();

 		foreach ($target_result as $key) {
 			$arr[] = $key->value;
 		}

 		$data['temp_age'] = array();

 		foreach ($all_age as $k) 
 		{
	 		if(in_array($k, $arr))
	 		{
	 			$data['temp_age'][] = "<option value='$k' selected='selected'>$k</option>";
	 		}
	 		else
	 		{
	 			$data['temp_age'][] = "<option value='$k' >$k</option>";
	 		}
	 	}

	 	$data['temp_login'] = array();

 		foreach ($all_login as $k) 
 		{
	 		if(in_array($k, $arr))
	 		{
	 			$data['temp_login'][] = "<option value='$k' selected='selected'>$k</option>";
	 		}
	 		else
	 		{
	 			$data['temp_login'][] = "<option value='$k' >$k</option>";
	 		}
	 	}

	 	$data['temp_os'] = array();

 		foreach ($all_os as $k) 
 		{
	 		if(in_array($k, $arr))
	 		{
	 			$data['temp_os'][] = "<option value='$k' selected='selected'>$k</option>";
	 		}
	 		else
	 		{
	 			$data['temp_os'][] = "<option value='$k' >$k</option>";
	 		}
	 	}

		$header['title'] = "Campaign Edit";
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/campaign_edit', $data);
		$this->load->view('admin/templates/footer');

	}

	//Campaign Delete function
	function campaign_delete($campaign_id)
	{
		$this->Campaign_Model->delete_campaign($campaign_id);
		redirect("campaign");
	}


	//Campaign edition function
	function campaign_edit_update()
	{
		///////////////////user both select image and vide0/////////////
		if ($_POST['campaign_image'] != '' and $_POST['campaign_youtube'] == true )
		{
			$campaign_id = $this->input->post('campaign_id');
			$this->load->model('Media_Model');
					
					$data['campaign_id'] = $campaign_id;
					$data['double_AD'] = 'Please select either image or video for your campaign';
					$data['setting_result'] = $this->Campaign_Model->get_campaign_detail($campaign_id);
					$target_result = $this->Campaign_Model->get_target_detail($campaign_id);
					$data['target_result'] = $target_result;
					$data['image'] = $this->Media_Model->get_all_image();
					$all_age = array('under18', '18to30', '31to45', '46to60', 'above61');
					$all_login = array('Email', 'Facebook', 'Instagram', 'Wechat', 'Twitter');
					$all_os = array('IOS', 'Android', 'Windows_10' , 'Windows_7', 'Mac_OS_X');

					$arr = array();

			 		foreach ($target_result as $key) {
			 			$arr[] = $key->value;
			 		}

			 		$data['temp_age'] = array();

			 		foreach ($all_age as $k) 
			 		{
				 		if(in_array($k, $arr))
				 		{
				 			$data['temp_age'][] = "<option value='$k' selected='selected'>$k</option>";
				 		}
				 		else
				 		{
				 			$data['temp_age'][] = "<option value='$k' >$k</option>";
				 		}
				 	}

				 	$data['temp_login'] = array();

			 		foreach ($all_login as $k) 
			 		{
				 		if(in_array($k, $arr))
				 		{
				 			$data['temp_login'][] = "<option value='$k' selected='selected'>$k</option>";
				 		}
				 		else
				 		{
				 			$data['temp_login'][] = "<option value='$k' >$k</option>";
				 		}
				 	}

				 	$data['temp_os'] = array();

			 		foreach ($all_os as $k) 
			 		{
				 		if(in_array($k, $arr))
				 		{
				 			$data['temp_os'][] = "<option value='$k' selected='selected'>$k</option>";
				 		}
				 		else
				 		{
				 			$data['temp_os'][] = "<option value='$k' >$k</option>";
				 		}
				 	}

					$header['title'] = "Campaign Edit";
					$this->load->view('admin/templates/header', $header);
					$this->load->view('admin/campaign_edit', $data);
					$this->load->view('admin/templates/footer');


		}
		else
		///////if user selecte either image or video/////////////////	
		{
		//input campaign_content value
		if ($_POST['campaign_image'] != '' )
		{
			$result_content = $_POST['campaign_image'];
		}
		else
		{
			$result_content ='<iframe id="video" src="'.$_POST['campaign_youtube'].'?autoplay='.$_POST['youtube_autoplay'].'&loop='.$_POST['youtube_loop'].'&controls='.$_POST['youtube_control'].'" frameborder="0" allowfullscreen></iframe>';
			$result_youtube = $_POST['campaign_youtube'];
		}

		//input campaign_template value
		if ($_POST['campaign_image'] != '')
		{
			$campaign_template = 'Single_img';
		}
		else
		{
			$campaign_template = 'Single_video';
		}
				
		$campaign_id = $this->input->post('campaign_id');
		$campaign_data = array(
				'campaign_name' => $this->input->post('campaign_name'),
				'campaign_template' => $campaign_template,
				'campaign_location' => $this->input->post('campaign_location'),
				'ads_waiting_time' => $this->input->post('ads_waiting_time'),
				'campaign_content' => $result_content,
				'from_campaign_period' => $this->input->post('from_campaign_period'),
				'to_campaign_period' => $this->input->post('to_campaign_period'),
				'campaign_youtube' =>$result_youtube);

		if($this->Campaign_Model->update_campaigns($campaign_data, $campaign_id) == true)
		{
			//delete all the attribute in db
			$this->Campaign_Model->overwrite_target($campaign_id);

			//rewrite all the attribute
			$result_age = $_POST['target_age'];
			$result_login = $_POST['target_login'];
			$result_os = $_POST['target_os'];
			$result_gender = $_POST['target_gender'];

			if($result_age)
			{
				foreach ($result_age as $key ) {
					$target_data = array('attribute' => 'target_age',
										 'value' => $key,
										 'campaign_id' => $campaign_id);
					$this->Campaign_Model->insert_target($target_data);
				}
			}
			if($result_login)
			{
				foreach ($result_login as $key ) {
					$target_data = array('attribute' => 'target_login',
										 'value' => $key,
										 'campaign_id' => $campaign_id);
					$this->Campaign_Model->insert_target($target_data);
				}
			}
			if($result_os)
			{
				foreach ($result_os as $key ) {
					$target_data = array('attribute' => 'target_os',
										 'value' => $key,
										 'campaign_id' => $campaign_id);
					$this->Campaign_Model->insert_target($target_data);
				}
			}
			if($result_gender)
			{
				$target_data = array('attribute' => 'target_gender',
									 'value' => $this->input->post('target_gender'),
									 'campaign_id' => $campaign_id);
				$this->Campaign_Model->insert_target($target_data);
			}

		redirect("campaign");

		}
		else
		{
			log_message('error', 'DB Error');
		}
		
	}
	}
	//Campaign edition function
	
}?>