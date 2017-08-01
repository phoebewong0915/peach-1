
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct() 
	{        
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation', 'user_agent', 'hybridauth'));
		$this->load->model(array('Page_Model', 'Campaign_Model'));
	}

/*******************************
	Content Management System
*******************************/

	function index()
	{
		$pages = $this->Page_Model->get_pages_list();
		
		$lang_all = $this->Page_Model->get_all_lang_code();
		
		foreach($pages as $page)
		{
			$lang[$page->page_id] = $this->Page_Model->get_page_lang($page->page_id);
		}
		
		foreach($pages as $page)
		{
			$lang_ava = array();
			
			foreach($lang[$page->page_id] as $str)
			{
				array_push($lang_ava, $str->lang_code);
			}
			
			$lang_new[$page->page_id] = $this->Page_Model->get_page_available_lang($lang_ava);

		}
		
		$data['pages'] = $pages;
		$data['lang'] = $lang;
		$data['lang_available'] = $lang_new;
		//print_r($data['lang']);
		//print_r($lang_ava);
		//echo "</br>";
		//print_r($data['lang_available']);

		$this->load->view('admin/templates/header');
		$this->load->view('admin/pages_manage', $data);
		$this->load->view('admin/templates/footer');
	}

	//load page edit
	private function _validate()
    {
		$this->form_validation->set_rules('page_name', 'Page_Name', 'required');
		$this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");
 
        if ($this->form_validation->run() == FALSE)
        {
            echo "Error! Password cannot be NULL";
        }
        else
        {
			echo "Done";
        }
	}	
	
    function edit($page_id = null, $lang = null)
	{
		if($page_id != null && $lang != null)
		{
			$data['result'] = $this->Page_Model->get_page_detail($page_id, $lang);
			$data['campaigns'] = $this->Campaign_Model->get_all_campaigns_add();
			
			$this->load->view('admin/templates/header');
			$this->load->view('admin/pages', $data);
			$this->load->view('admin/templates/footer');
		}
		else
		{
			$data['campaigns'] = $this->Campaign_Model->get_all_campaigns_add();
			$this->load->view('admin/templates/header');
			$this->load->view('admin/pages_add', $data);
			$this->load->view('admin/templates/footer');
		}
	}

	//Creating new Login page, get all input and insert in db
	function pages_add()
	{
		$this->_validate();
		
		$this->load->model('Page_Model');
		//$campaigns = $this->Campaign_Model->get_all_campaigns_add();
	
		$page_data = array(
			'page_name' => $this->input->post('page_name'),
			'theme' => $this->input->post('theme'),
			'iagree_status' => $this->input->post('iagree_status'),
			'email_button_status' => $this->input->post('email_button_status'),
			'fb_button_status' => $this->input->post('fb_button_status'),
			'tw_button_status' => $this->input->post('tw_button_status'),
			'ig_button_status' => $this->input->post('ig_button_status'),
			'campaign_mode' => $this->input->post('campaign_mode')
		);


		if($this->Page_Model->insert_pages($page_data) == true)
		{
			$maxID = $this->Page_Model->gen_page_id();
			$newID = $maxID[0]->page_id;

			$content = array(
					'page_id' => $newID,
					'lang_code' => "en",
					'title' => $this->input->post('title'),
					'first_page' => $this->input->post('first_page'),
					'login_page' => $this->input->post('login_page'),
					'disclaimer' => $this->input->post('disclaimer_page'));

			if($this->Page_Model->insert_pages_content($content) == true)
				{
					$result_campaign_id = $_POST['campaign_id'];
					if($result_campaign_id)
						{
							foreach ($result_campaign_id as $key ) 
								{
									$selected_camapign = array('page_id' => $newID,
														 'campaign_id' => $key);
									$this->Page_Model->insert_selected_campaign($selected_camapign);
								}
						}
					redirect("pages");
				}
		}
		else{ log_message('error', 'DB Error');}
		
	}

	//page edition function
	function pages_update()
	{
		$this->load->model('Page_Model');
		
		$page_id = $this->input->post('page_id');
		$content_id = $this->input->post('page_content_id');
		$lang = $this->input->post('lang');
		
		$page_data = array(
			'page_name' => $this->input->post('page_name'),
			'theme' => $this->input->post('theme'),
			'iagree_status' => $this->input->post('iagree_status'),
			'email_button_status' => $this->input->post('email_button_status'),
			'fb_button_status' => $this->input->post('fb_button_status'),
			'tw_button_status' => $this->input->post('tw_button_status'),
			'ig_button_status' => $this->input->post('ig_button_status'),
			'campaign_mode' => $this->input->post('campaign_mode')
		);
		
		$content = array(
			'lang_code' => $lang,
			'title' => $this->input->post('title'),
			'first_page' => $this->input->post('first_page'),
			'login_page' => $this->input->post('login_page'),
			'disclaimer' => $this->input->post('disclaimer_page')
		);

		$this->Page_Model->clear_selected_campaign($page_id);
		
		$result_campaign_id = $_POST['campaign_id'];
			if($result_campaign_id)
				{
					foreach ($result_campaign_id as $key ) 
						{
							$selected_camapign = array('page_id' => $page_id,
												 'campaign_id' => $key);
							$this->Page_Model->insert_selected_campaign($selected_camapign);
						}
				}

		if($this->Page_Model->update_pages($page_data, $page_id) == true)
		{
			if($this->Page_Model->update_pages_content($content, $content_id) == true)
			{
				redirect("pages");
			}
		}
		else{ log_message('error', 'DB Error');}
		
	}

	function delete($page_id)
	{
		$this->Page_Model->delete_page($page_id);
		redirect("pages");
	}

	
	function lang_add($page_id, $lang_code)
	{
		$this->load->model('Page_Model');
		
		$data = array(
			'page_id' => $page_id,
			'lang_code' => $lang_code
		);
		
		if($this->Page_Model->create_new_page_lang($data) == true)
		{
			redirect("pages");
		}
		else
		{ 
			log_message('error', 'DB Error');
		}
	}
	
	function _check_user_perfer_lang()
	{
		$lang = $this->agent->languages();
		if($this->session->userdata('lang') == null)
		{
			$this->session->set_userdata('lang', $lang[0] );
		}

	}
	
	function _check_lang($page_name)
	{
		$lang = $this->session->userdata('lang');
		//$this->Admin_Model->insert_session_lang($lang);
		//echo $lang;
			
		if(count($this->Page_Model->get_page_by_lang($page_name, $lang)) == 0)
			{
				$default_lang = $this->Page_Model->get_default_lang();
				
				return $default_lang[0]->lang_code;
			}
			else
			{
				return $lang;
			}
		
	}
	
	function load($page_name = NULL)
	{
		if(isset($page_name))
		{
			$this->_check_user_perfer_lang();
			
			$lang = $this->_check_lang($page_name);
			
			// Build a list of enabled providers.
			$providers = array();
			
			foreach ($this->hybridauth->HA->getProviders() as $provider_id => $params)
			{
			  $providers[] = anchor("oauth/window/{$provider_id}", '<i class="fa fa-'.$provider_id.'"></i> &nbsp; Login with  '.$provider_id, array('class' => $provider_id));
			}
			
			$data['providers'] = $providers;
			
			$this->lang->load('pages', $lang=='' ? 'en' : $lang);
			$data['agree'] = $this->lang->line('agree');
			$data['disagree'] = $this->lang->line('disagree');
			$data['enter_email'] = $this->lang->line('enter_email');
			$data['sign_in'] = $this->lang->line('sign_in');
			$data['or'] = $this->lang->line('or');
			$data['sign_in_using'] = $this->lang->line('sign_in_using');
			
			$data['content'] = $this->Page_Model->get_page_by_lang($page_name,$lang);

			$data['page_lang'] = $this->Page_Model->get_page_lang($data['content'][0]->page_id);
			
			$this->load->view('templates/hkt/login', $data);
		}
		else
		{
			redirect("guest");
		}
	}
	

}?>