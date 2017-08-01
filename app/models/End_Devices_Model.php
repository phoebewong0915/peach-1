<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class End_Devices_Model extends CI_Model
{
	function find_device_data($mac)
	{
		$this->db->where('mac', $mac);
		$query = $this->db->get('devices');
		return $query->result();
	}
	
	function store_device_data($data)
	{
		return $this->db->insert('devices', $data);
	}
	
	function update_device_data($mac, $data)
	{
		$this->db->where('mac',$mac);
		return $this->db->update('devices', $data);	
	}
	
	function get_connected_devices()
	{
		$query = $this->db->get('devices');
		
		return $query->result();
	}
}