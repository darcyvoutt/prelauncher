<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {      
    parent::__construct();
  }

	public function index() {

    // Before the start date
    if (!empty(setting('start_date')) && get_date('start') > time()) {      
      $this->template->layout('unavailable/early');
      return false;
    } 

    // After the end date
    if (!empty(setting('end_date')) && get_date('end') <= time()) {      
      $this->template->layout('unavailable/ended');  
      return false;
    }     

    // Redirect if their session cookie has a subscriber ID
    $sessionArray = $this->session->userdata('user');  
    
    if (isset($sessionArray[SUB_ID]) ) {

      $sub_id = $sessionArray[SUB_ID];

      $sub_check = $this->subscribermodel->get(array('unique_id' => $sub_id));

      // If subscriber check is not empty then send them to their page
      if (!empty($sub_check)) { 
        redirect(site_url('rewards/subscriber/'.$sub_id));
      }      
    }

    // If the url contains a parameter, then update the cookie
    if (!empty($this->input->get(URI_PARAM))) {
      $session[URI_PARAM] = $this->input->get(URI_PARAM);
      $this->session->set_userdata('user', $session);
    }    

    // Send session data to the view
    $data['session'] = $this->session->userdata('user');

    $this->template->layout('home/default', $data);

	}
}