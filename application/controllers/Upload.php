<?php
class Upload extends CI_Controller {

	function __construct() {

		parent::__construct();

	}

	function do_upload() {		

		// Get Post Data
		$data['input'] = $this->input->post();
		
		// Constant Config Variables		
		$config['allowed_types'] = 'gif|jpg|png|svg';
		$config['upload_path'] = './uploads/';		
		$config['file_ext_tolower'] = true;
		$config['max_height']  = '0';	
		$config['max_width']  = '0';		
		$config['max_size']	= '5000';			
		$config['overwrite']	= true;		

		$this->load->library('upload', $config);								

		//fieldname is the form field name
		foreach ($_FILES as $fieldName => $fileObject) {			
		  
		  if (!empty($fileObject['name'])) {		  			  	

		  	// Setting File Name by Field Name	  		
		  	$this->load->initialize($config);
	        
        if ( ! $this->upload->do_upload($fieldName) ) {

          $data['error'][] = $this->upload->display_errors();

        } else {

          $results = $this->upload->data();
					$path = explode("uploads", $results['full_path']);
					$data['input'][$fieldName] = "/uploads" . $path[1];

        }

	    }	
	        
		}

		// Set Flash Data after loop to ensure it gets field edits only
		$this->session->set_flashdata('form_data', $data);

		// Redirect back to save with flash data
		redirect('settings/save');
	}
}