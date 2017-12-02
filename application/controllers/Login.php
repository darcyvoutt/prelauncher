<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {      
    parent::__construct();
    $this->load->model(array('adminmodel'));
  }

  public function index() {
    $this->template->layout('admin/login');
  }

  public function verify() {
    $form = $this->input->post();
    $user = $this->adminmodel->login($form['username'], $form['password']);    

    if ($user == false) {

      $this->session->set_flashdata("alert","Username or password incorrect.");
      redirect(site_url('login'));

    } else {

      $session['admin'] = true;
      $session['id'] = $user[0]->id;
      $session['username'] = $user[0]->username;      
      $this->session->set_userdata('admin', $session);

      redirect(site_url('admin'));      

    }
  }

}