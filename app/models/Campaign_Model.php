<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign_Model extends CI_Model
{
	function get_all_campaigns_add()
	{
		$this->db->select('*');
        $query = $this->db->get('campaigns');
		return $query->result();
	}

	function insert_campaign($data)
    {
		return $this->db->insert('campaigns', $data);

	}

	function insert_target($target_data)
    {
		return $this->db->insert('campaign_target_audience', $target_data);
	}

	function get_latest_campaign_id()
	{
		$query = $this->db->query('SELECT max(campaign_id) as id FROM `campaigns`');
		return $query->result();
	}

	function delete_campaign($campaign_id)
	{
		$this->db->where('campaign_id', $campaign_id);
		$this->db->delete('campaigns');
		$this->db->where('campaign_id', $campaign_id);
		$this->db->delete('campaign_target_audience');
	}

	function get_campaign_detail($campaign_id)
	{
		$this->db->where('campaign_id', $campaign_id);
		$query = $this->db->get('campaigns');
		return $query->result();
	}

	function get_target_detail($campaign_id)
	{
		$query = $this->db->query("SELECT attribute, value FROM `campaign_target_audience` where campaign_id = '".$campaign_id."'");
		return $query->result();
	}

	function update_campaigns($campaign_data, $campaign_id)
	{
		$this->db->where('campaign_id', $campaign_id);
		return $this->db->update('campaigns', $campaign_data);
	}

	function overwrite_target($campaign_id,$target_data )
	{
		$this->db->where('campaign_id', $campaign_id);
		$this->db->delete('campaign_target_audience'); 
	}

	function get_campaign($campaign_id)
	{
		$query = $this->db->query('SELECT * FROM `campaigns` where campaign_id = "'.$campaign_id.'"');
		return $query->result();
	}

	function insert_campaign_media($campaign_image,$result_image)
	{
		$this->db->where('video_name', $result_image);
		$this->db->update('campaigns_media', $campaign_image);
	}

	function get_rand_campaign()
	{
		$query = $this->db->query("SELECT * FROM campaigns ORDER BY RAND() LIMIT 1");
		return $query->result();
	}
	
	function get_target_campaign($page_id, $gender, $age, $type)
	{
		$query = $this->db->query("SELECT campaigns.campaign_id, campaigns.campaign_name FROM `pages` 
									left join pages_campaign on pages.page_id = pages_campaign.page_id 
									left join campaigns on campaigns.campaign_id = pages_campaign.campaign_id 
									left join campaign_target_audience on campaign_target_audience.campaign_id = campaigns.campaign_id 
									where pages.page_id = '".$page_id."' AND 
									(campaign_target_audience.value = '".$gender."' OR campaign_target_audience.value =  '".$age."' OR campaign_target_audience.value =  '".$type."') group by campaigns.campaign_id"
								);
								
		return $query->result();
	}

}?>