<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nas_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function create_nas($data)
    {
		return $this->db->insert('nas', $data);
	}
	
	function create_user($mac)
    {
		$data = array(
				   'username' => $mac,
				   'attribute' => 'Cleartext-Password',
				   'op' => ':=',
				   'value' => $mac
				);

		return $this->db->insert('radcheck', $data);
	}
	
	function check_radius_user($mac)
    {
		$this->db->where('username', $mac);
		$query = $this->db->get('radcheck');
		return $query->result();
	}
	
	function get_nas()
    {
		$this->db->select('*');
		$this->db->from('nas');
		$this->db->join('nas_vendor', 'nas_vendor.vendorid = nas.vendorid');

		$query = $this->db->get();
		return $query->result();
	}
	
	function update_nas($id)
	{
		$query = $this->db->get('nas');
		return $query->result();
		
	}
	
	function delete_nas($id)
	{
		
	}
}