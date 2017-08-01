<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporting_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function get_gender_proportion()
	{
		$query = $this->db->query("SELECT 
		((select count(*) from type_facebook where fb_gender = 'female')
		+
		(select count(*) from type_wechat where wc_gender = 'Female') ) AS Female
		,

		((select count(*) from type_facebook where fb_gender = 'male')
		+
		(select count(*) from type_wechat where wc_gender = 'Male')) AS Male");

		return $query->result();

	}

	function get_loginMethod_proportion()
	{
		$query = $this->db->query("SELECT login_type, count(*) AS 'loginType_count' FROM `asso_history` where login_type ='Facebook' or login_type ='Instagram' or login_type = 'Twitter' or login_type ='Wechat' or login_type ='Email' GROUP BY login_type");

		return $query->result();
	}

	function get_not_sussess_login_proportion()
	{
		$query = $this->db->query("SELECT count(*) AS 'not_success' from `asso_history` where login_type = 'Associcating' or login_type ='Waiting Auth'");
		return $query->result();
	}

	function get_success_login_proportion()
	{
		$query = $this->db->query("SELECT count(*) AS 'success' from `asso_history` where login_type != 'Associcating' and login_type !='Waiting Auth'");
		return $query->result();
	}

	function get_topten_AP()
	{
		$query = $this->db->query("SELECT ap_mac, count(*) AS ap_mac_count FROM `asso_history` GROUP BY ap_mac order by count(*) DESC limit 10");
		
		return $query->result();
	}


	function get_daily_total_visit($day){
		$query = $this->db->query("SELECT count(*) as total from (SELECT count(mac) as count from asso_history WHERE reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY) group by mac) as total");

		return $query->result();
	}


	function get_daily_new_join($day){
		$query = $this->db->query("SELECT count(mac) as new_join from `devices` where first_seen >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND first_seen < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY)");
		return $query->result();
	}

	function get_weekly_revisit($day)
	{
		$query = $this->db->query("SELECT ((SELECT count(*) as total from (SELECT count(mac) as count from asso_history WHERE reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY) group by mac) as total) - (SELECT count(mac) as new_join from `devices` where first_seen >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND first_seen < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY))) AS revisit");
		return $query->result();
	}

	function get_duration()
	{
		$query = $this->db->query("SELECT UNIX_TIMESTAMP(acctstarttime) as start_time, UNIX_TIMESTAMP(acctstoptime) as end_time FROM `radacct` where acctstoptime is not null ");
		return $query->result();
	}

	function get_daily_usage_inout($day)
	{
		$query = $this->db->query("SELECT sum(acctinputoctets) as input, sum(acctoutputoctets) as output FROM radacct WHERE DATE(acctstoptime) >= DATE(now() - INTERVAL ".$day." DAY) AND DATE(acctstoptime) < DATE(now() - INTERVAL ".($day-1)." DAY)");
		return $query->result();
	}

	///////////////////////////new dashboard sql query///////////////////////////////////////
	function get_monthly_gender()
	{
		$query = $this->db->query("SELECT( SELECT count(*) FROM radacct LEFT JOIN type_facebook ON radacct.username=type_facebook.mac where acctstoptime is not null and DATE(acctstarttime) >= DATE(now() - INTERVAL 30 DAY) AND DATE(acctstarttime) < DATE(now() - INTERVAL -1 DAY) and fb_gender = 'male') As Male, (SELECT count(*) FROM radacct LEFT JOIN type_facebook ON radacct.username=type_facebook.mac where acctstoptime is not null and DATE(acctstarttime) >= DATE(now() - INTERVAL 30 DAY) AND DATE(acctstarttime) < DATE(now() - INTERVAL -1 DAY) and fb_gender = 'female') As Female");
		return $query->result();
	}

	function get_most_usage_user()
	{
		$query = $this->db->query("SELECT (UNIX_TIMESTAMP(acctstoptime) - UNIX_TIMESTAMP(acctstarttime)) as 'duration', username FROM `radacct` group by username ORDER BY duration desc LIMIT 5 ");
		return $query->result();
	}




 //////////////////////QUERY FOR 1DAY / 7 DAY / 30 DAY  ///////////////////////////////
 	function get_gender_ratio($day)
 	{
 		$query = $this->db->query("	SELECT( SELECT count(*) FROM radacct LEFT JOIN type_facebook ON radacct.username=type_facebook.mac where acctstoptime is not null and DATE(acctstarttime) >= DATE(now() - INTERVAL ".$day." DAY) AND DATE(acctstarttime) < DATE(now() - INTERVAL ".($day-1)." DAY) and fb_gender = 'male') As Male, (SELECT count(*) FROM radacct LEFT JOIN type_facebook ON radacct.username=type_facebook.mac where acctstoptime is not null and DATE(acctstarttime) >= DATE(now() - INTERVAL ".$day." DAY) AND DATE(acctstarttime) < DATE(now() - INTERVAL ".($day-1)." DAY) and fb_gender = 'female') As Female");
 		return $query->result();
 	}

 	function get_not_sussess_daily_login($day)
	{
		$query = $this->db->query("SELECT count(*) AS 'not_success' from `asso_history` where reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY) and (login_type = 'Associcating' or login_type ='Waiting Auth')");
		return $query->result();
	}

	function get_success_daily_login($day)
	{
		$query = $this->db->query("SELECT count(*) AS 'success' from `asso_history` where reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY) and (login_type != 'Associcating' and login_type !='Waiting Auth')");
		return $query->result();
	}

	function get_loginMethod_daily($day)
	{
		$query = $this->db->query("SELECT login_type, count(*) AS 'loginType_count' FROM `asso_history` where reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY) AND (login_type ='Facebook' or login_type ='Instagram' or login_type = 'Twitter' or login_type ='Wechat' or login_type ='Email') GROUP BY login_type");
		return $query->result();
	}

	function get_loginMethod_period($day)
	{
		$query = $this->db->query("SELECT login_type, count(*) AS 'loginType_count' FROM `asso_history` where reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-($day+1))." DAY) AND (login_type ='Facebook' or login_type ='Instagram' or login_type = 'Twitter' or login_type ='Wechat' or login_type ='Email') GROUP BY login_type");
		return $query->result();
	}

 	function get_topten_AP_daily($day)
	{
		$query = $this->db->query("SELECT ap_mac, count(*) AS ap_mac_count FROM `asso_history` where reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-1)." DAY) GROUP BY ap_mac order by count(*) DESC limit 10");
		return $query->result();
	}

	function get_topten_AP_period($day)
	{
		$query = $this->db->query("SELECT ap_mac, count(*) AS ap_mac_count FROM `asso_history` where reg_time >= UNIX_TIMESTAMP(CURDATE() - INTERVAL ".$day." DAY) AND reg_time < UNIX_TIMESTAMP(CURDATE() - INTERVAL ".($day-($day+1))." DAY) GROUP BY ap_mac order by count(*) DESC limit 10");
		return $query->result();
	}


}