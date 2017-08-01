<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_API_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function store_user_details($data)
	{
		return $this->db->insert('type_facebook', $data);
	}
	
	function get_all_fb_users()
	{
		$query = $this->db->get('type_facebook');
		
		return $query->result();
	}
		
	function get_fb_id($fb_id)
	{
		$this->db->where('fb_id', $fb_id);
		$query = $this->db->get('type_facebook');
		return $query->result();
	}
	
	
	function get_all_wc_users()
	{
		$query = $this->db->get('type_wechat');
		
		return $query->result();
	}
	
	function get_ig_server_details()
	{
		$query = $this->db->get('ig_details');
		return $query->result();
	}
	
	function insert_tw_user($data)
	{
		
		return $this->db->insert('type_twitter', $data);
		
	}
	
	
	function insert_ig_user($data)
	{
		return $this->db->insert('type_instagram', $data);
	}

	function get_all_ig_users()
	{
		$query = $this->db->get('type_instagram');
		
		return $query->result();
	}


	function twitter_ig_user($data)
	{
		return $this->db->insert('type_twitter', $data);
	}

	function get_all_twitter_users()
	{
		$query = $this->db->get('type_twitter');
		
		return $query->result();
	}

	function get_fb_setting()
	{
		$this->db->where('api_type', "Facebook");
		$query = $this->db->get('api_setting');
		return $query->result();
		
	}

	function get_ig_setting()
	{
		$this->db->where('api_type', "Instagram");
		$query = $this->db->get('api_setting');
		return $query->result();
		
	}

	function get_tw_setting()
	{
		$this->db->where('api_type', "Twitter");
		$query = $this->db->get('api_setting');
		return $query->result();
		
	}
	
	
	function update_fb_setting($data)
	{
		$this->db->where('api_type', "Facebook");
		$this->db->update('api_setting', $data);
	}

	function update_ig_setting($data)
	{
		$this->db->where('api_type', "Instagram");
		$this->db->update('api_setting', $data);
	}

	function update_tw_setting($data)
	{
		$this->db->where('api_type', "Twitter");
		$this->db->update('api_setting', $data);
	}

	/**
	function get_fb_femaleUser()
	{
		$query = $this->db->query("SELECT mac FROM type_facebook where fb_gender = 'female'");
		return $query->result();
	}

	function get_fb_maleUser()
	{
		$query = $this->db->query("SELECT mac FROM type_facebook where fb_gender = 'male'");
		return $query->result();
	}
	*/
	
	function get_guest_history($mac)
	{
		$query = $this->db->query("SELECT * FROM type_facebook left join asso_history on asso_history.mac = type_facebook.mac where type_facebook.mac = '".$mac."' AND asso_history.login_type NOT IN ('Login Completed', 'Waiting Auth', 'Associcating', 'Revisit' ) group by asso_history.login_type");
		return $query->result();
	}


}?>