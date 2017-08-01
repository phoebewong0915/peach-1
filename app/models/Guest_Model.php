<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_guest_history($mac)
	{
		$query = $this->db->query("SELECT * FROM type_facebook left join asso_history on asso_history.mac = type_facebook.mac where type_facebook.mac = '".$mac."' AND asso_history.login_type NOT IN ('Login Completed', 'Waiting Auth', 'Associcating', 'Revisit' ) group by asso_history.login_type");
		return $query->result();
	}
	
	function store_asso_history($data)
	{
		return $this->db->insert('asso_history', $data);
	}
	
	function store_asso_history_type($data, $reg_time, $mac)
	{
		$this->db->where('reg_time', $reg_time);
		$this->db->where('mac',$mac);
		return $this->db->update('asso_history', $data);
	}
	
	function create_guests($data)
    {
		return $this->db->insert('guests', $data);
	}
	
	function check_guest_unique($identifier)
    {
		$this->db->where('identifier',$identifier);
		return $this->db->get('guests');
	}
	
	function update_guests($data, $identifier)
    {
		$this->db->where('identifier',$identifier);
		return $this->db->update('guests', $data);
	}
	
	function get_email_config()
	{
		$query = $this->db->get('email_config');
		return $query->result();
		
	}
}?>