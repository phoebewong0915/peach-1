<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {

	public function __construct() 
	{        
		parent::__construct();
		$this->load->library(array('form_validation','table','session','user_agent'));
		$this->load->helper('security','file','directory','url');
		$this->load->model('Reporting_Model');
	}

	public function index()
	{
		redirect('welcome');
	}


	/*************************
		Show Dashbpard Chart
	**************************/

	/*************************************************************************************************
	  * @ GENERATING DASHBOARD CHARY DATA
	  * @ GENDER CHART
	  * @ LOGIN METHOD
	  * @ LOGIN PROPORTATION
	  * @ AP RANKING
	  * @ VISIT REVISIT
	  * @ USAGE INPUT OUTPUT
	/*************************************************************************************************/
	function chart_gender($day)
	{
		$j = 0;
		$Female = array();
		$Male[$j] = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$total[$i]=$this->Reporting_Model->get_gender_ratio($total_day);
				foreach ($total[$i] as $items) {
					$Female[$j] = $items->Female;
					$Male[$j] = $items->Male;
					$j++;
					}
			$i++;
			}

		if (array_sum($Female) == 0 and array_sum($Male) == 0)
		{
			$data4 = array();
			return $data4;
		}
		else
		{
			$data = array("Gender" => "Female",
					  "Precentage" => array_sum($Female));
			$data2 = array("Gender" => "Male",
						   "Precentage" => array_sum($Male));

			$data3= array ($data, $data2);

			return $data3;
		}
		
	}


	function chart_login($day)
	{
		$j = 0;
		$notSuccess = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$notSuccess_total[$i]=$this->Reporting_Model->get_not_sussess_daily_login($total_day);
				foreach ($notSuccess_total[$i] as $items) {
					$notSuccess[$j] = $items->not_success;
					$j++;
					}
			$i++;
			}

		$j = 0;
		$success = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$success_total[$i]=$this->Reporting_Model->get_success_daily_login($total_day);
				foreach ($success_total[$i] as $items) {
					$success[$j] = $items->success;
					$j++;
					}
			$i++;
			}
		if(array_sum($notSuccess) == 0 and array_sum($success) == 0)
		{
			$data4 = array();
			return $data4;

		}
		else
		{
			$data = array("Login_Status" =>"No Login",
						  "Precentage" => array_sum($notSuccess));
			$data2 = array("Login_Status" =>"Login Completed",
						   "Precentage" => array_sum($success));
			$data3= array ($data, $data2);

			return $data3;

		}

	}


	function chart_loginMethod($day)
	{
		if($day == 0)
		{
			$loginMethod=$this->Reporting_Model->get_loginMethod_daily($day);

		}
		else
		{
			$loginMethod=$this->Reporting_Model->get_loginMethod_period($day);
			$data[1] = array();
			$data[2] = array();
			$data[3] = array();
			$data[4] = array();
			$data[5] = array();
			foreach ($loginMethod as $key) {
				if($key->login_type == 'Facebook')
				{
					
					$data[1] = array("login_type" =>$key->login_type,
						  "loginType_count" => $key->loginType_count,
						  "color"=> "#3b5998",
						  "bullet"=> "https://facebookbrand.com/wp-content/themes/fb-branding/prj-fb-branding/assets/images/fb-art.png");
				}
				elseif($key->login_type == 'Instagram')
				{
					$data[2] = array("login_type" =>$key->login_type,
						  "loginType_count" => $key->loginType_count,
						  "color"=> "#bc2a8d",
						  "bullet"=> "http://pngimg.com/uploads/instagram/instagram_PNG10.png");
				}
				elseif($key->login_type == 'Twitter')
				{
					$data[3] = array("login_type" =>$key->login_type,
						  "loginType_count" => $key->loginType_count,
						  "color"=> "#00aced",
						  "bullet"=> "http://danbubanygolf.com/wp-content/uploads/2015/09/Twitter-icon.png");
				}
				elseif($key->login_type == 'Wechat')
				{
					$data[4] = array("login_type" =>$key->login_type,
						  "loginType_count" => $key->loginType_count,
						  "color"=> "#7bb32e",
						  "bullet"=> "http://temcam.com/wp-content/uploads/2013/11/WeChat-for-iPad-BlackBerry-Android-Nokia-Download-150x150.png");
				}
				elseif($key->login_type == 'Email')
				{
					$data[5] = array("login_type" =>$key->login_type,
						  "loginType_count" => $key->loginType_count,
						  "color"=> "#32c5d2",
						  "bullet"=> "http://www.princeton.edu/~jieh/image/email-icon.jpg");
				}
			}
			$arr= array();

			for($i=1; $i<=5 ; $i++)
			{
				if($data[$i] == true)
					{
						array_push($arr,$data[$i] );
					}
			}

		}

		if(count($loginMethod) == 0)
		{
			$data4 = array();
			return $data4;	
		}
		else
		{
			return $arr;
	
		}
	}


	function chart_topAP_Ranking($day)
	{
		if($day == 0)
		{
			$topAP = $this->Reporting_Model->get_topten_AP_daily($day);
		}
		else
		{
			$topAP=$this->Reporting_Model->get_topten_AP_period($day);
		}

		if(count($topAP) == 0)
		{
			$data4 = array();
			return $data4;	
		}
		else
		{
			return $topAP;	
		}
	}


	function chart_visit($day)
	{
		$j = 0;
		$total = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$weekly_total[$i]=$this->Reporting_Model->get_daily_total_visit($total_day);
				foreach ($weekly_total[$i] as $items) {
					$total[$j] = $items->total;
					$j++;
					}
			$i++;
			}

		$j = 0;
		$newJoin = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$weekly_new[$i]=$this->Reporting_Model->get_daily_new_join($total_day);
				foreach ($weekly_new[$i] as $items) {
					$newJoin[$j] = $items->new_join;
					$j++;
					}
			$i++;
			}

		$j = 0;
		$revisit = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$weekly_revisit[$i]=$this->Reporting_Model->get_weekly_revisit($total_day);
				foreach ($weekly_revisit[$i] as $items) {
					$revisit[$j] = $items->revisit;
					$j++;
					}
			$i++;
			}

		$i=0;
		$date = array();
		for($i=$day; $i>=0; $i--){
		$prevmonth = date('Y-m-d', strtotime("-$i days"));
		$date[] = $prevmonth;
		}

		$data = array();
		for($i = 0; $i < $day+1; $i++)
		{
			$data[$i] = array(
				'Date' => $date[$i],
				'Total' => $total[$i],
				'newJoin' => $newJoin[$i],
				'revisit' => $revisit[$i]
				);
		}

		return $data;
	}


	function chart_Usage_inout($day)
	{
		$k=0.000001;
		$j = 0;
		$input = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$InOut[$i]=$this->Reporting_Model->get_daily_usage_inout($total_day);
				foreach ($InOut[$i] as $items) {
					$input[$j] = round($items->input*$k*-1);
					$j++;
					}
			$i++;
			}

		$j = 0;
		$k=0.000001;
		$output = array();
		for($i = 0 , $total_day = $day; $total_day >= 0; $total_day--){
			$InOut[$i]=$this->Reporting_Model->get_daily_usage_inout($total_day);
				foreach ($InOut[$i] as $items) {
					$output[$j] = round($items->output*$k);
					$j++;
					}
			$i++;
			}

		$i=0;
		$date = array();
		for($i=$day; $i>=0; $i--){
		$prevmonth = date('Y-m-d', strtotime("-$i days"));
		$date[] = $prevmonth;
		}

		for($i = 0; $i < $day+1; $i++)
		{
			$data[$i] = array(
				'Date' => $date[$i],
				'input' => $input[$i],
				'output' => $output[$i]
				);
		}

		return $data;
	}

	/*************************************************************************************************
	  * @ DAILY DASHBOARD CHARY DATA
	  * @ DAILY GENDER CHART
	  * @ DAILY LOGIN METHOD
	  * @ DAILY LOGIN PROPORTATION
	  * @ DAILY AP RANKING
	  * @ DAILY VISIT REVISIT
	  * @ DAILY USAGE INPUT OUTPUT
	/*************************************************************************************************/
	function json_flush_daily_gender()
	{
		$day = 0;
		$result = $this->chart_gender($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_daily_login()
	{
		$day = 0;
		$result = $this->chart_login($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_daily_loginMethod()
	{
		$day = 0;
		$result = $this->chart_loginMethod($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_topAP_Ranking_daily()
	{
		$day = 0;
		$result = $this->chart_topAP_Ranking($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_Daily_visit()
	{
		$day = 0;
		$result = $this->chart_visit($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_Usage_inout_daily()
	{
		$day=0;
		$result = $this->chart_Usage_inout($day);
		echo json_encode($result);
		flush();
	}


	/*************************************************************************************************
	  * @ WEEK DASHBOARD CHARY DATA
	  * @ WEEKLY GENDER CHART
	  * @ WEEKLY LOGIN METHOD
	  * @ WEEKLY LOGIN PROPORTATION
	  * @ WEEKLY AP RANKING
	  * @ WEEKLY VISIT REVISIT
	  * @ WEEKLY USAGE INPUT OUTPUT
	/*************************************************************************************************/

	function json_flush_weekly_gender()
	{
		$day = 7;
		$result = $this->chart_gender($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_weekly_login()
	{
		$day = 7;
		$result = $this->chart_login($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_weekly_loginMethod()
	{
		$day = 7;
		$result = $this->chart_loginMethod($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_topAP_Ranking_weekly()
	{
		$day = 7;
		$result = $this->chart_topAP_Ranking($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_week_visit()
	{
		$day = 7;
		$result = $this->chart_visit($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_Usage_inout_weekly()
	{
		$day=7;
		$result = $this->chart_Usage_inout($day);
		echo json_encode($result);
		flush();
	}


	/*************************************************************************************************
	  * @ MONTH DASHBOARD CHARY DATA
	  * @ MONTHLY GENDER CHART
	  * @ MONTHLY LOGIN METHOD
	  * @ MONTHLY LOGIN PROPORTATION
	  * @ MONTHLY AP RANKING
	  * @ MONTHLY VISIT REVISIT
	  * @ MONTHLY USAGE INPUT OUTPUT
	/*************************************************************************************************/

	function json_flush_monthly_gender()
	{
		$day = 30;
		$result = $this->chart_gender($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_monthly_login()
	{
		$day = 30;
		$result = $this->chart_login($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_monthly_loginMethod()
	{
		$day = 30;
		$result = $this->chart_loginMethod($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_topAP_Ranking_monthly()
	{
		$day = 30;
		$result = $this->chart_topAP_Ranking($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_monthly_visit()
	{
		$day = 30;
		$result = $this->chart_visit($day);
		echo json_encode($result);
		flush();
	}

	function json_flush_Usage_inout_monthly()
	{
		$day=30;
		$result = $this->chart_Usage_inout($day);
		echo json_encode($result);
		flush();
	}

	

	/*************************************************************************************************
	  * @ ORIGINAL DASHBOARD CHARY DATA
	  * @ TOTAL GENDER CHART
	  * @ TOTAL LOGIN METHOD
	  * @ TOTAL LOGIN PROPORTATION
	  * @ TOTAL AP RANKING
	  * @ MONTHLY VISIT REVISIT
	  * @ MONTHLY USAGE INPUT OUTPUT
	/*************************************************************************************************/

	function json_flush_gender_proportion()
	{
		$gender=$this->Reporting_Model->get_gender_proportion();
		$arr1 = array
			(
				(int)$gender[0]->Female, 
				(int)$gender[0]->Male
			);

		$data = array("Gender" => "Female",
					  "Precentage" => $gender[0]->Female);
		$data2 = array("Gender" => "Male",
					   "Precentage" => $gender[0]->Male);

		$data3= array ($data, $data2);
		echo json_encode($data3);
		flush();
	}

	function json_flush_login_propotion()
	{
		$not_success = $this->Reporting_Model->get_not_sussess_login_proportion();
		$success = $this->Reporting_Model->get_success_login_proportion();

		$data = array("Login_Status" =>"No Login",
					  "Precentage" => $not_success[0]->not_success);
		$data2 = array("Login_Status" =>"Login Completed",
					   "Precentage" => $success[0]->success);
		$data3= array ($data, $data2);
		echo json_encode($data3);
		flush();

	}

	function json_flush_loginMethod_proportion()
	{
		$loginMethod=$this->Reporting_Model->get_loginMethod_proportion();

		
		echo json_encode($loginMethod);
		flush();
	}

	function json_flush_topAP_Ranking()
	{
		$topAP=$this->Reporting_Model->get_topten_AP();

		echo json_encode($topAP);
		flush();
	}

	function json_flush_weekly_visit()
	{
		$j = 0;
		$total = array();
		for($i = 0 , $day = 30; $day >= 0; $day--){
			$weekly_total[$i]=$this->Reporting_Model->get_daily_total_visit($day);
				foreach ($weekly_total[$i] as $items) {
					$total[$j] = $items->total;
					$j++;
					}
			$i++;
			}

		$j = 0;
		$newJoin = array();
		for($i = 0 , $day = 30; $day >=0; $day--){
			$weekly_new[$i]=$this->Reporting_Model->get_daily_new_join($day);
				foreach ($weekly_new[$i] as $items) {
					$newJoin[$j] = $items->new_join;
					$j++;
					}
			$i++;
			}

		$j = 0;
		$revisit = array();
		for($i = 0 , $day = 30; $day >=0; $day--){
			$weekly_revisit[$i]=$this->Reporting_Model->get_weekly_revisit($day);
				foreach ($weekly_revisit[$i] as $items) {
					$revisit[$j] = $items->revisit;
					$j++;
					}
			$i++;
			}

		$i=0;
		$date = array();
		for($i=30; $i>=0; $i--){
		$prevmonth = date('Y-m-d', strtotime("-$i days"));
		$date[] = $prevmonth;
		}

		for($i = 0; $i < 31; $i++)
		{
			$data[$i] = array(
				'Date' => $date[$i],
				'Total' => $total[$i],
				'newJoin' => $newJoin[$i],
				'revisit' => $revisit[$i]
				);
		}

		echo json_encode($data);
		flush();
	}

	function json_flush_average_duration()
	{
		$duration=$this->Reporting_Model->get_duration();
		$i = 0;
		$arr1= array();

		foreach ($duration as $key) {
			$arr1[$i]= $key->end_time - $key->start_time;
			$i++;
		}

		$average = array_sum($arr1) / count($arr1);
		$average = gmdate("H:i:s", $average);
		list($hour, $min, $sec) = explode(':', $average);
		echo "{$hour}hr {$min}mins {$sec}s"; // 30mins 13s

		echo json_encode($average);
		flush();
	}

	function json_flush_Usage_inout()
	{
		$k=0.000001;
		$j = 0;
		$input = array();
		for($i = 0 , $day = 30; $day >= 0; $day--){
			$InOut[$i]=$this->Reporting_Model->get_daily_usage_inout($day);
				foreach ($InOut[$i] as $items) {
					$input[$j] = $items->input*$k;
					$j++;
					}
			$i++;
			}

		$j = 0;
		$k=0.000001;
		$output = array();
		for($i = 0 , $day = 30; $day >= 0; $day--){
			$InOut[$i]=$this->Reporting_Model->get_daily_usage_inout($day);
				foreach ($InOut[$i] as $items) {
					$output[$j] = $items->output*$k;
					$j++;
					}
			$i++;
			}

		$i=0;
		$date = array();
		for($i=30; $i>=0; $i--){
		$prevmonth = date('Y-m-d', strtotime("-$i days"));
		$date[] = $prevmonth;
		}

		for($i = 0; $i < 31; $i++)
		{
			$data[$i] = array(
				'Date' => $date[$i],
				'input' => $input[$i],
				'output' => $output[$i]
				);
		}

		echo json_encode($data);
		flush();
	}

	function json_flush_adv_count()
	{
		$adv_count = $this->Reporting_Model->get_adv_count();

		echo json_encode($adv_count);
		flush();
	}

}