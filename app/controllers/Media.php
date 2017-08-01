<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of VideoUpload
 *
 * @author http://www.roytuts.com
 */
class Media extends CI_Controller {

	//variable for storing error message
    private $error;
    //variable for storing success message
    private $success;
 
    function __construct() {
        parent::__construct();
        //load this to validate the inputs in upload form
        $this->load->library('form_validation');
		$this->load->helper(array('html', 'url', 'file', 'form'));
		$this->load->model('Media_Model');
    }
	
	function index()
	{
		$data['video'] = $this->Media_Model->get_all_video();
		
		$data['image'] = $this->Media_Model->get_all_image();
		
		$data['error_msg'] = '';

		$this->load->view('admin/media/listing',$data);
	}
	
    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
    }
 
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }
 
    function video() {
        if ($this->input->post('video_upload')) {
            //set preferences
            //file upload destination
            $upload_path = './uploads/videos';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'wmv|mp4|avi|mov';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = FALSE;
            //store video info once uploaded
            $video_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select a video file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'video_name' is the name of the input
				$this->upload->initialize($config);
				
                if (!$this->upload->do_upload('video_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the video file info
                    $video_data = $this->upload->data();
                }
            }
            // There were errors, we have to delete the uploaded video
            if ($is_file_error) {
                if ($video_data) {
                    $file = $upload_path . $video_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            } else {
                $data['video_name'] = $video_data['file_name'];
                $data['video_path'] = $upload_path;
                $data['video_type'] = $video_data['file_type'];
				
				if ($this->Media_Model->create_video($data))
					{
						$this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>');
						
						$data['path'] = '<video width="320" height="240" controls><source src="../' . $data['video_path'] . '/' . $data['video_name'] . '" type="' . $data['video_type'] . '">Your browser does not support the video tag.</video>';
					}
            }
        }
        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        //load the view along with data
        $this->load->view('admin/upload', $data);
    }
	
	function image() 
	{
        if ($this->input->post('video_upload')) {
            //set preferences
            //file upload destination
            $upload_path = './uploads/images';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'jpg|png|jpeg';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = FALSE;
            //store video info once uploaded
            $video_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select a video file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'video_name' is the name of the input
				$this->upload->initialize($config);
				
                if (!$this->upload->do_upload('video_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the video file info
                    $video_data = $this->upload->data();
                }
            }
            // There were errors, we have to delete the uploaded video
            if ($is_file_error) {
                if ($video_data) {
                    $file = $upload_path . $video_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            } else {
                
				$data['video_name'] = $video_data['file_name'];
                $data['video_path'] = $upload_path;
                $data['video_type'] = $video_data['file_type'];
				
				if ($this->Media_Model->create_video($data))
					{
						$this->handle_success('Video was successfully uploaded to direcoty <strong>' . $upload_path . '</strong>.');
						
						$data['path'] = '<img width="320" src="../' . $upload_path . '/' . $video_data['file_name'] . '"></img>';
					}
            }
        }
        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
		
        //load the view along with data
        $this->load->view('admin/upload', $data);

    }
 
}