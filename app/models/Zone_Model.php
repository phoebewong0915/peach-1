<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zone_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function create_zone($data)
    {
		return $this->db->insert('zone', $data);
	}
	
	function select_zone()
    {
		$this->db->select('*');
		$this->db->from('zone');
		//$this->db->join('nas_vendor', 'nas_vendor.vendorid = nas.vendorid');

		$query = $this->db->get();
		return $query->result();
	}
}