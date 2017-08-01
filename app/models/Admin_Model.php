<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_all_guest($pass_query)
	{
		$query= $this->db->query($pass_query);
		
		return $query->result();
	}
	
	function get_assoc_hist()
	{
		$this->db->order_by('reg_time', 'DESC');
		$this->db->limit(1024);
		$query = $this->db->get('asso_history');
		
		return $query->result();
	}
	/* not being used in Admin Controller*/
	
	function get_all_devices()
	{
		$this->db->group_by('mac');
		$query = $this->db->get('asso_history');
		
		return $query->result();
	}
	
	/*Not being used in Admin controller */
	
	function get_os_summary()
	{
		$query = $this->db->query("SELECT `os`, count(*) AS `total` FROM `devices` group by `os` order by count(*) DESC limit 10");
		
		return $query->result();
	}

	function get_login_propor()
	{
		$query = $this->db->query("SELECT (SELECT count(*) from `asso_history` where login_type = 'Associcating' or login_type ='Waiting Auth') AS not_success , (SELECT count(*) from `asso_history` where login_type != 'Associcating' and login_type !='Waiting Auth') AS success");
		return $query->result();

	}

	function get_today_new_join()
	{
		$query = $this->db->query("SELECT count(mac) as new_join from `devices` where first_seen >= UNIX_TIMESTAMP(CURDATE() - INTERVAL 0 DAY) AND first_seen < UNIX_TIMESTAMP(CURDATE() - INTERVAL -1 DAY)");
		return $query->result();
	}

	function get_today_revisit()
	{
		$query = $this->db->query("SELECT ((SELECT count(*) as total from (SELECT count(mac) as count from asso_history WHERE reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL 0 DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL -1 DAY) group by mac) as total) - (SELECT count(mac) as new_join from `devices` where first_seen >= UNIX_TIMESTAMP(CURDATE() - INTERVAL 0 DAY) AND first_seen < UNIX_TIMESTAMP(CURDATE() - INTERVAL -1 DAY))) AS revisit");
		return $query->result();
	}


	function get_user($username, $password)
	{
		$this->db->where('email', $username);
		$this->db->where('password', md5($password));                    
        $query = $this->db->get('admin_users');
		return $query->result();
		
	}

	function get_monthly_duration()
	{
		$query = $this->db->query("SELECT UNIX_TIMESTAMP(acctstarttime) as start_time, UNIX_TIMESTAMP(acctstoptime) as end_time FROM `radacct` where acctstoptime is not null and DATE(acctstarttime) >= DATE(now() - INTERVAL 30 DAY) AND DATE(acctstarttime) < DATE(now() - INTERVAL -1 DAY)");
		return $query->result();
	}

	function get_usage_input()
	{
		$query = $this->db->query("SELECT acctinputoctets as input FROM `radacct`");
		return $query->result();
	}

	function get_usage_output()
	{
		$query = $this->db->query("SELECT acctoutputoctets as output FROM `radacct`");
		return $query->result();
	}

	function get_current_user()
	{
		$query = $this->db->query("SELECT * FROM radacct LEFT JOIN asso_history ON radacct.username=asso_history.mac where login_type = 'Login Completed' and acctstoptime is null GROUP by radacct.username");
		return $query->result();
	}


	///////////////////////////new dashboard sql query///////////////////////////////////////
	function get_monthly_gender()
	{
		$query = $this->db->query("SELECT( SELECT count(*) FROM radacct LEFT JOIN type_facebook ON radacct.username=type_facebook.mac where acctstoptime is not null and DATE(acctstarttime) >= DATE(now() - INTERVAL 30 DAY) AND DATE(acctstarttime) < DATE(now() - INTERVAL -1 DAY) and fb_gender = 'male') As Male, (SELECT count(*) FROM radacct LEFT JOIN type_facebook ON radacct.username=type_facebook.mac where acctstoptime is not null and DATE(acctstarttime) >= DATE(now() - INTERVAL 30 DAY) AND DATE(acctstarttime) < DATE(now() - INTERVAL -1 DAY) and fb_gender = 'female') As Female");
		return $query->result();
	}

	

	
		
}?>