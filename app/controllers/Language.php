<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

	public function __construct() 
	{        
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model(array('Page_Model'));
	}	
	
	/*******************************
     Language Management
	*******************************/

	function lang_list()
	{
		$data['lang_data'] = $this->Page_Model->get_all_lang();
		$data['lang'] = $this->Page_Model->get_all_lang();
		$header['title'] = "Languages List";
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/lang_list', $data);
		$this->load->view('admin/templates/footer');

	}

	function lang_adding()
	{
		$header['title'] = "Language Add";
		$data['exist'] = "";
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/lang_adding', $data);
		$this->load->view('admin/templates/footer');

	}

	function lang_add()
	{
		$data = array(
			'lang' => $this->input->post('lang'),
			'lang_code' => $this->input->post('lang_code'),
			'lang_text' => $this->input->post('lang_text'),
			'is_default' => '0');
		$this->load->model('Page_Model');
		if($this->Page_Model->check_lang_exist($data['lang']) || $this->Page_Model->check_lang_code_exist($data['lang_code']))
			{
				$header['title'] = "Language Add";
				$data['exist'] = "This Language Name or Code already have, Please try another";
				$this->load->view('admin/templates/header', $header);
				$this->load->view('admin/lang_adding', $data);
				$this->load->view('admin/templates/footer');

			}
		else
			{
				$this->Page_Model->add_lang($data);
				redirect('language/lang_list');
			}
	}

	function lang_delete($id)
	{
		$data = $this->Page_Model->get_lang($id);
		if($data[0]->is_default != 1)
		{
			$this->Page_Model->delete_lang($id);
			redirect("Language/lang_list");
		}
		else
		{
			redirect("Language/lang_list");
		}
	}

	function lang_edit($id)
	{
		$data['lang'] = $this->Page_Model->get_lang($id);
		$header['title'] = "Language Edit";
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/lang_edit', $data);
		$this->load->view('admin/templates/footer');
	}

	function lang_edit_update()
	{
		$data = array(
			'lang' => $this->input->post('lang'),
			'lang_code' => $this->input->post('lang_code'),
			'lang_text' => $this->input->post('lang_text'),
			'is_default' => '0');
		$this->Page_Model->update_lang($data, $this->input->post('id'));
		redirect('language/lang_list');
	}

	function lang_change()
	{
		$data['lang'] = $this->Page_Model->get_all_lang();
		$header['title'] = "Default Language Select";
		$this->load->view('admin/templates/header', $header);
		$this->load->view('admin/default_lang_change', $data);
		$this->load->view('admin/templates/footer');
	}
	function lang_change_update()
	{
		if($this->input->post('id') != "")
		{
			$data = array(
				'is_default' => '1');
			$data_clear = array(
				'is_default' => '0');
			$this->Page_Model->clear_default_lang($data_clear);
			$this->Page_Model->change_default_lang($data, $this->input->post('id'));
			redirect('language/lang_list');
		}
		else
		{
			redirect('language/lang_list');	
		}
	}
}?>