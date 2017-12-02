<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {

  public function __construct() {      
    parent::__construct();
    $this->load->helper('string');
    $this->load->model(array('adminmodel'));
  }

  public function forgot() {
    $this->template->layout('admin/password_reset');
  }

  public function reset() {
    $post = $this->input->post();
    $user = $this->adminmodel->get(array('email' => $post['email']));

    if (isset($user['id'])) {

      // Create Password
      $password = random_string('alnum',8);      
      $password_encoded = md5($password);

      // Update User with New Password
      $this->adminmodel->update($user['id'], array('password' => $password_encoded));

      // Email Paassword
      $email['to'] = $user['email'];      
      $email['subject'] = 'Reset Password | ' . setting('site_name');
      $email['message']['password'] = $password;      
      $email['template'] = 'password_reset';
      $this->emailmodel->send($email);

      // Load View
      $this->template->layout('admin/password_success');

    } else {

      $this->session->set_flashdata("alert","Email doesn't exist.");
      redirect(site_url('password/forgot'));

    }  
  }

}