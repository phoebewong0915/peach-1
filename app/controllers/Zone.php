<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zone extends CI_Controller{

    public function __construct() 
	{
        parent::__construct();
        //error_reporting(E_ALL);
		$this->load->library(array('form_validation','table'));
		$this->load->helper(array('form'));
		$this->load->model(array('Zone_Model'));
    }
	
	function index()
	{
		$data['subject'] = "Zone ";
		
		$data['theader'] = array("Location","Description","");
		$data['tdata'] = "";
		
		$total = 0;
		
		$result = $this->Zone_Model->select_zone();
		foreach($result as $row)
		{
			$data['tdata'] .= "<tr>";
			$data['tdata'] .= "<td class='hidden'>".$row->zoneid."</td>";
			$data['tdata'] .= "<td>".$row->zone."</td>";
			$data['tdata'] .= "<td>".$row->description."</td>";
			$data['tdata'] .= '<td style="text-align: center; width:150px;"><a href="'.base_url().'nas/update_nas/'.$row->zoneid.'" class="btn btn-outline btn-circle btn-sm green">edit</a> <a href="'.base_url().'nas/delete_nas/'.$row->zoneid.'" class="btn btn-outline btn-circle btn-sm red">delete</a></td>';
			$data['tdata'] .= "</tr>";
			
			$total++;
		};
		
		$data['total'] = "Total: ".$total." zones found.";
		
		$this->load->view('admin/templates/header');
		$this->load->view('admin/Zone/listing',$data);
		$this->load->view('admin/templates/footer');
	}
	
	function update_nas($id)
	{
		echo $id;
	}
	
	function delete_nas($id)
	{
		echo $id;
	}
	
	function create_nas()
	{
		$form_data = array(
					"vendorid" => $this->input->post('brand'),
					"shortname" => $this->input->post('nas_name'),
					'nasname' => $this->input->post('nas_ip'),
					'nasmac' => $this->input->post('nas_mac')
					);
					
		$this->Nas_Model->create_nas($form_data);
		
		$this->session->set_flashdata('msg', 'Devices '.$mac.' has been updated.');
		
		redirect('Nas');
	}
}