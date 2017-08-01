<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccessPoint extends CI_Controller{

    public function __construct() 
	{
		parent::__construct();
        //error_reporting(E_ALL);
		$this->load->model(array('AccessPoint_Model'));
	}
	
	function index()
	{
		$data['subject'] = "Access Points Mapping ";
		
		$data['theader'] = array("MAC Address","Short Name","");
		$data['tdata'] = "";
		
		$result = $this->AccessPoint_Model->get_reg_ed_ap();
		
		$total = 0;
		
		foreach($result as $row)
		{
			
			$data['tdata'] .= "<tr>";

			$data['tdata'] .= "<td>".$row->ap_mac."</td>";
			
				$tmp = $this->AccessPoint_Model->mac_search($row->ap_mac);
				
				if($tmp != null)
				{
					$data['tdata'] .= '<td><form action="'.base_url().'AccessPoint/update/'.$row->ap_mac.'"><input class="form-control input-circle" type="text" name="shortname" value="'.$tmp[0]->shortname.'"></td><td> <input type="submit" class="btn btn-circle btn-sm blue" value="Update"></form></td>';
				}
				else
				{
					$data['tdata'] .= '<td><form action="'.base_url().'AccessPoint/create/'.$row->ap_mac.'"><input class="form-control input-circle" type="text" name="shortname" value="'.$row->ap_mac.'"></td><td> <input type="submit" class="btn btn-circle btn-sm blue" value="Update"></form></td>';
				}
			
			$data['tdata'] .= "</tr>";
			
			$total++;
		};
		$data['total'] = "Total: ".$total." APs found.";
		
		$this->load->view('admin/templates/header');
		$this->load->view('admin/AccessPoint/listing',$data);
		$this->load->view('admin/templates/footer');
	}
	
	function update($mac)
	{
		$data = array(
					'shortname' => $this->input->post_get('shortname')
					);
		
		$msg = $this->AccessPoint_Model->update_ap($mac, $data);
			
		$this->session->set_flashdata('msg', 'Devices '.$mac.' has been updated.');
		
		redirect('AccessPoint');
	}
	
	function create($mac)
	{
		$data = array(
					'mac' => $mac,
					'shortname' => $this->input->post_get('shortname')
					);
		
		$this->AccessPoint_Model->create_ap($data);
			
		$this->session->set_flashdata('msg', 'Devices '.$mac.' has been created.');

		redirect('/AccessPoint');
	}
}