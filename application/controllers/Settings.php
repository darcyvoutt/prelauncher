<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

  public function __construct() {      
    parent::__construct();
    $this->load->model(array('adminmodel'));
    $this->load->library('user_agent');

    // Login Check
    if (empty($this->session->userdata('admin'))) {      
      redirect(site_url('login'));
    }
  }

  public function index() {    
    $data['settings'] = $this->settingsmodel->getAll();
    $this->template->layout('settings/edit', $data);  
  }


  public function save() {

    // Get Flash Data
    $flashdata = $this->session->flashdata('form_data');        

    // Set Input Data
    $input = (isset($flashdata['input'])) ? $flashdata['input'] : $this->input->post();

    // Update Database
    $updated = $this->settingsmodel->update( $input );    

    // Tab
    if (isset($input['tab'])) { $url = 'settings' . $input['tab']; } 
    else { $url = 'settings'; }

    if ($updated == true && !isset($flashdata['error'])) { // Successfully saved      

      // Check for Facebook Scrape is Required
      if ( isset($input['facebook_scrape']) ) {
        $this->session->set_flashdata("facebook_scrape", true);      
      }
    
      $this->session->set_flashdata("settings","Settings updated. ");
      redirect(site_url( $url ));

    } else { // Error with Saving

      $this->session->set_flashdata("settings","Error Updating. " . $flashdata['error'][0] );
      redirect(site_url( $url ));

    }
  }
}