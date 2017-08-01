<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_Model extends CI_Model
{
	function __construct()
	{
	    parent::__construct();
	}
	
	function insert_page($data)
    {
		return $this->db->insert('pages', $data);
	}
	
	function get_page_vendor_id($page_name)
	{
		$this->db->select('vendorid');
		$this->db->where('page_name', $page_name);
		$this->db->limit(1);
		$query = $this->db->get('pages_manage');
		return $query->result();
	}
	
	function get_pages_list()
	{
		$query = $this->db->get('pages');
		return $query->result();
	}

	function get_all_loginPages_add()
	{
		$this->db->select('*');
		$this->db->where('page_type', 'Login');
        $query = $this->db->get('pages_manage');
		return $query->result();
	}


	function get_all_advPages_add()
	{
		$this->db->select('*');
		$this->db->where('page_type', 'Advertising');
        $query = $this->db->get('pages_manage');
		return $query->result();
	}


	function update_order($page_id, $data)
    {
    	$this->db->where('page_id', $page_id);
		return $this->db->update('pages_manage', $data);
	}

	function get_page_detail($page_id, $lang)
	{
		//$query = $this->db->query('SELECT * FROM `pages` left join `pages_content` ON pages.page_id = pages_content.page_id left join lang_list on lang_list.lang_code = pages_content.lang_code where pages.page_id = "'.$page_id.'" AND pages_content.lang_code = "'.$lang.'"');
		$query = $this->db->query('SELECT * FROM `pages` left join `pages_content` ON pages.page_id = pages_content.page_id left join lang_list on lang_list.lang_code = pages_content.lang_code left join `pages_campaign` ON pages.page_id = pages_campaign.page_id where pages.page_id = "'.$page_id.'" AND pages_content.lang_code = "'.$lang.'"');
		return $query->result();
	}
	
	function get_name_add($page_name)
	{
		$this->db->where('page_name', $page_name);
        $query = $this->db->get('pages_manage');
		return $query->result();
	}

	function get_extension($page_id)
	{
		$this->db->where('page_extension.page_id', $page_id);
		$this->db->select('*');
		$this->db->from('page_extension');
		$this->db->join('pages_manage', 'pages_manage.page_id=page_extension.page_id');
		
		$query = $this->db->get();
       // $query = $this->db->get('page_extension');
		return $query->result();
	}

	function check_id_duplicate()
	{
		$query = $this->db->query("SELECT id FROM `pages_manage` ");
		return $query->result();
	}

	function get_buttons()
	{
		$this->db->where('enable',1);
		$query = $this->db->get('api_setting');
		return $query->result();
	}

	function load_page_email()
	{
		//$this->db->where('enable',1);
		$query = $this->db->get('email_config');
		return $query->result();
	}

	function delete_page($page_id)
	{
		$this->db->where('page_id', $page_id);
		$this->db->delete('pages'); 
		
		$this->db->where('page_id', $page_id);
		$this->db->delete('pages_content'); 

		$this->db->where('page_id', $page_id);
		$this->db->delete('pages_campaign'); 
	}

	function update_email_setup($data)
	{
		$this->db->where('id', '1');
		$this->db->update('email_config', $data);
		
	}

	function get_all_lang_code()
	{
		$lang_ava = array();
		
		$query = $this->db->get('lang_list');
		
		$lang_ava = $query->result();
		
		foreach($lang_ava as $ava_code)
		{
			array_push($lang_ava, '"'.$ava_code->lang_code.'"');
		}
		
		return $lang_ava;
	}
	
	function get_all_lang()
	{
		$query = $this->db->get('lang_list');
		
		return $query->result();
	}
	
	function gen_page_id()
	{
		$this->db->select_max('page_id');
		$query = $this->db->get('pages'); 

		return $query->result();
	}
	
	function get_page_lang($page_id)
	{
		$query = $this->db->query('SELECT lang_list.lang, lang_list.lang_code as lang_code, lang_list.lang_text as lang_text 
									FROM lang_list join pages_content
									ON pages_content.lang_code = lang_list.lang_code WHERE pages_content.page_id = '.$page_id.'');
		return $query->result();
	}

	function create_new_page_lang($data)
	{
		return $this->db->insert('pages_content', $data);
	}
	
	function get_page_available_lang($page_lang)
	{
		$this->db->where_not_in('lang_code', $page_lang);
		$query = $this->db->get('lang_list'); 
		
		return $query->result();
	}

	function add_lang($data)
	{
		return $this->db->insert('lang_list', $data);
	}

	function delete_lang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('lang_list');

	}

	function get_lang($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('lang_list');
		return $query->result();

	}

	function get_lang_by_code($code)
	{
		$this->db->where('lang_code',$code);
		$query = $this->db->get('lang_list');
		return $query->result();

	}

	function update_lang($data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('lang_list', $data);
	}

	function clear_default_lang($data)
	{
		$this->db->update('lang_list', $data);
	}

	function change_default_lang($data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('lang_list', $data);
	}

	function get_default_lang()
	{
		$this->db->where('is_default','1');
		$query = $this->db->get('lang_list');
		return $query->result();
	}

	function get_nondefault_lang()
	{
		$this->db->where('is_default','0');
		$query = $this->db->get('lang_list');
		return $query->result();
	}

	function get_exist_lang()
	{
		$query = $this->db->query('SELECT lang FROM `lang_list`');
		return $query->result();

	}

	function get_page_by_lang($page_name, $lang)
	{
		$query = $this->db->query('SELECT * FROM `pages` left join `pages_content` ON pages.page_id = pages_content.page_id where pages.page_name = "'.$page_name.'" AND pages_content.lang_code = "'.$lang.'"');
		return $query->result();
	}

	function get_page_button_status($page_name)
	{
		$this->db->where('page_name', $page_name);
		$query = $this->db->get('pages');
		return $query->result();
	}

	function insert_page_button_status($data)
	{
		return $this->db->insert('pages_soc_enable', $data);
	}

	function insert_pages($data)
	{
		return $this->db->insert('pages', $data);
	}

	function insert_pages_content($data)
	{
		return $this->db->insert('pages_content', $data);
	}

	function update_pages($data, $page_id)
	{
		$this->db->where('page_id', $page_id);
		return $this->db->update('pages', $data);
	}
	
	function update_pages_content($data, $page_content_id)
    {
		$this->db->where('page_content_id', $page_content_id);
		return $this->db->update('pages_content', $data);
	}

	function getName($page_name)
	{   
	  $whereCondition = $array = array('page_name' => $page_name);
	  $this->db->where($whereCondition); 
	  $query = $this->db->get('pages_manage');   
	  return $query->result();  
	}

	function check_page_name_exist($page_name)
	{
		$this->db->where('page_name', $page_name);
		$query = $this->db->get('pages_manage');
		if($query->num_rows() >0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function check_lang_exist($lang)
	{
		$this->db->where('lang', $lang);
		$query = $this->db->get('lang_list');
		if($query->num_rows() >0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function check_lang_code_exist($lang_code)
	{
		$this->db->where('lang_code', $lang_code);
		$query = $this->db->get('lang_list');
		if($query->num_rows() >0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function added_lang($page_name)
	{
		$this->db->select('lang');
		$this->db->where('page_name', $page_name);
		$query = $this->db->get('pages_manage');
		return $query->result();
	}

	function all_lang()
	{
		$query = $this->db->query('SELECT lang_code as lang FROM `lang_list`');
		return $query->result();
	}

	function get_page_id_fr_name($page_name)
	{
		$this->db->select('page_id');
		$this->db->where('page_name' , $page_name);
		$query = $this->db->get('pages');
		return $query->result();
	}

	function insert_selected_campaign($data)
	{
		return $this->db->insert('pages_campaign', $data);
	}

	function clear_selected_campaign($page_id)
	{
		$this->db->where('page_id', $page_id);
		$this->db->delete('pages_campaign');
	}

	function get_page_mode($page_id)
	{
		$this->db->select('campaign_mode');
		$this->db->where('page_id', $page_id);
		$query = $this->db->get('pages');
		return $query->result();
	}

	function select_adv_count($data)
    {
		$this->db->where('adv_name', $data);
		$query = $this->db->get('adv_count');
		return $query->result();
	}

	function update_adv_count($adv_name, $data)
    {
		$this->db->where('adv_name', $adv_name);
		return $this->db->update('adv_count', $data);
	}

	function create_adv_count($data)
    {
		return $this->db->insert('adv_count', $data);
	}


}?>