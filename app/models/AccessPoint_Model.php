<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccessPoint_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_reg_ed_ap()
    {
		$this->db->select('ap_mac');
		$this->db->from('asso_history');
		$this->db->group_by('ap_mac');

		$query = $this->db->get();
		return $query->result();
	}
	
	function mac_search($mac)
    {
		$this->db->where('mac', $mac);
		
		$query = $this->db->get('access_point');
		return $query->result();
	}
	
	function create_ap($data)
    {
		return $this->db->insert('access_point', $data);

	}
	
	function update_ap($mac, $data)
    {
		$this->db->where('mac', $mac);
		return$this->db->update('access_point', $data);
	}
}
