<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nas extends CI_Controller{

    public function __construct() 
	{
        parent::__construct();
        //error_reporting(E_ALL);
		$this->load->library(array('form_validation','table'));
		$this->load->helper(array('url','form'));
		$this->load->model(array('Nas_Model'));
    }
	
	function index()
	{
		$data['subject'] = "Network Devices ";
		
		$data['theader'] = array("Vendor","NAS","IP","MAC","Action");
		$data['tdata'] = "";
		
		$total = 0;
		
		$result = $this->Nas_Model->get_nas();
		foreach($result as $row)
		{
			$data['tdata'] .= "<tr>";
			$data['tdata'] .= "<td class='hidden'>".$row->id."</td>";
			$data['tdata'] .= "<td>".$row->vendor.' '.$row->model."</td>";
			$data['tdata'] .= "<td>".$row->shortname."</td>";
			$data['tdata'] .= '<td><a href="https://'.$row->nasname.'">'.$row->nasname.'</a> </td>';
			$data['tdata'] .= "<td>".$row->nasmac."</td>";
			$data['tdata'] .= '<td style="text-align: center; width:150px;"><a href="'.base_url().'nas/update_nas/'.$row->id.'" class="btn btn-outline btn-circle btn-sm green">edit</a> <a href="'.base_url().'nas/delete_nas/'.$row->id.'" class="btn btn-outline btn-circle btn-sm red">delete</a></td>';
			$data['tdata'] .= "</tr>";
			
			$total++;
		};
		
		$data['total'] = "Total: ".$total." NAS found.";
		
		$this->load->view('admin/templates/header');
		$this->load->view('admin/Nas/listing',$data);
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