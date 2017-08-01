<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_user_email($email, $mac)
	{
       $this->db->where('email', $email);
	   $this->db->where('mac', $mac);
       $query = $this->db->get('guests');
       return $query->result();
	}
	
	function get_all_email_users()
	{
		$this->db->select('*');
        $query = $this->db->get('guests');
		return $query->result();
	}
		
	function insert_user($data)
    {
		return $this->db->insert('guests', $data);
	}
	
	function update_user($data, $id)
	{
		$this->db->where('gid', $id);
		return $this->db->update('guests', $data);
	}
	
	function get_email_config()
	{
		$query = $this->db->get('config_email');
		return $query->result();
	}
	
	function update_email_setup($data)
	{
		$this->db->where('id', 1);
		return $this->db->update('config_email', $data);
	}
		
	function verifyEmailID($key)
    {
        $this->db->where('identifier', $key);
        $query = $this->db->get('guests');
		return $query->result();
    }
	
	function verifiedEmail($data, $key)
    {
        $this->db->where('identifier', $key);
		
		return $this->db->update('guests', $data);
    }

}?>