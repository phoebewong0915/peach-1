<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media_Model extends CI_Model
{
	function get_all_video()
	{
		$this->db->select('*');
		$this->db->like('video_type', 'video');
        $query = $this->db->get('campaigns_media');
		return $query->result();
	}
	
	function get_all_image()
	{
		$this->db->select('*');
		$this->db->like('video_type', 'image');
        $query = $this->db->get('campaigns_media');
		return $query->result();
	}
	
	function create_video($data)
    {
		return $this->db->insert('campaigns_media', $data);
	}
	
	function delete_video($videoid)
	{
		$this->db->where('videoid', $videoid);
		$this->db->delete('campaigns_media'); 
	}
	
	function update_video($video_data, $videoid)
	{
		$this->db->where('videoid', $videoid);
		return $this->db->update('campaigns_media', $video_data);
	}
}?>