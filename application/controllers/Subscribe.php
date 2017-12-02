<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe extends CI_Controller {

  public function index() {

    // Get post data array
    $data = $this->input->post();
    $data['ip_address'] = $this->input->ip_address();

    // Checke for Bad Bot
    if ( !empty($data['badbot']) ) { 
      redirect('http://www.google.com'); 
    } else { // Remove badbot if it passes 
      unset($data['badbot']); 
    }
  
    // Check that email does not already exists, if it does, redirect
    $email_check = $this->subscribermodel->get(array('email' => $data['email']));

    if (!empty($email_check)) {

      $updateSession[SUB_ID] = $email_check['unique_id'];
      $this->session->set_userdata('user', $updateSession);
      redirect(site_url('rewards/subscriber/'.$email_check['unique_id']));

    }    

    ////////////////////////////
    // Change Key Names
    ////////////////////////////

    // Create Unique ID    
    $data['unique_id'] = createID($data['email']);

    // Check for referrer, if not empty than change its name
    if (!empty($data['ref'])) {
      $referrer = $this->subscribermodel->get(array('unique_id' => $data['ref']));    
      $data['referrer'] = ($referrer['id']) ? $referrer['id'] : ''; // Get the Referrer ID
      unset($data['ref']); 
    }    
    
    ////////////////////////////
    // Valid email address
    ////////////////////////////

    if ($this->subscribermodel->add($data) == FALSE ) {
      $this->session->set_flashdata("alert","Please provide a valid email address.");
      redirect(site_url('home'));
    } 

    ////////////////////////////
    // Save Email
    ////////////////////////////

    $subscriber = $this->subscribermodel->get(array( 'email' => $data['email'] ));

    // Send verification email
    $send_email['to'] = $data['email'];
    $send_email['subject'] = 'Please Verify Your Email — '. setting('site_name');
    $send_email['template'] = 'verify';
    $send_email['message']['verify_url'] = verify_url($subscriber['unique_id']);
    $this->emailmodel->send($send_email);

    // Update Session
    $updateSession[SUB_ID] = $subscriber['unique_id'];
    $this->session->set_userdata('user', $updateSession);
    redirect(site_url('rewards/subscriber/'.$subscriber['unique_id']));
  }
}
