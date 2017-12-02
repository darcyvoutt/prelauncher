<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct() {      
    parent::__construct();
    $this->load->helper('string');
    $this->load->model(array('adminmodel','subscribermodel'));

    // Login Check
    if (empty($this->session->userdata('admin'))) {      
      redirect(site_url('login'));
    }
  }

  public function index() {
    // Session Data
    $data['sessionAdmin'] = $this->session->userdata('admin');    

    // Subscriber Data
    $data['count'] = $this->subscribermodel->data('count');
    $data['count_verified'] = $this->subscribermodel->data('count_verified');
    $data['top_performers'] = $this->subscribermodel->data('top_performers');
    $data['over_time'] = $this->subscribermodel->data('over_time');

    // Percentage Verified
    if ( $data['count_verified'] > 0 && $data['count'] > 0 ) {
      $data['percent_verified'] = ($data['count_verified'] / $data['count']) * 100;
    } else {
      $data['percent_verified'] = 0;
    }
    
    $this->template->layout('admin/dashboard', $data);  
  }


  public function profile() {
    $data['session'] = $this->session->userdata('admin');
    $data['user'] = $this->adminmodel->get(array('id' => $data['session']['id']));
    $this->template->layout('admin/profile',$data);
  }


  public function change_username() {    
    $session = $this->session->userdata('admin');
    $user['id'] = $session['id'];
    
    $input = $this->input->post();
    $update['email'] = $input['email'];
    $update['username'] = $input['username'];

    $updated = $this->adminmodel->update($user['id'], $update);        

    if ($updated == true) {
      
      $session['username'] = $user['username'];
      $this->session->set_userdata('admin', $session);
      $this->session->set_flashdata("username","Username updated successfully.");
      redirect(site_url('admin/profile'));

    } else {
      
      $this->session->set_flashdata("username","Error updating username.");
      redirect(site_url('admin/profile'));

    }
  }


  public function change_password() {
    $session = $this->session->userdata('admin');
    $user['id'] = $session['id'];
    $user['password'] = md5($this->input->post('password'));        

    $updated = $this->adminmodel->update($user['id'], array('password' => $user['password']));  

    if ($updated == true) {
      
      $this->session->set_flashdata("password","Password updated successfully.");
      redirect(site_url('admin/profile'));

    } else {
      
      $this->session->set_flashdata("password","Error updating password.");
      redirect(site_url('admin/profile'));

    }      
  }


  public function subscribers() {
    $data['subscribers'] = $this->subscribermodel->subscribers(50);
    $data['count'] = $this->subscribermodel->data('count');
    $this->template->layout('admin/subscribers', $data);
  }


  public function export() {
    $this->load->helper(array('file','csv'));    
    $data = $this->subscribermodel->subscribers(null, true);     
    query_to_csv($data, TRUE, 'subscribers.csv');
  }


  // List Users
  public function users() {
    $admins = $this->adminmodel->getAll();

    // Pass through specific items
    // Removing passwords from view

    foreach ($admins as $key => $admin) {
      $data['admins'][$key]['id'] = $admin['id'];
      $data['admins'][$key]['email'] = $admin['email'];
      $data['admins'][$key]['username'] = $admin['username'];      
    }

    $this->template->layout('admin/users', $data);
  }

  // Delete User
  public function delete_user($id) {
    $deleted = $this->adminmodel->delete(array('id' => $id));

    if ($deleted == true) {
      $this->session->set_flashdata("admins",'User was deleted successfully');
      redirect('admin/users');
    } else {
      $this->session->set_flashdata("admins",'There was an issue deleting user');
      redirect('admin/users');
    }
  }

  // Reset Password
  public function reset_password($id) {
    if (isset($id)) {

      // Create Password
      $password = random_string('alnum',8);
      $password_encoded = md5($password);

      // Update User with New Password      
      $this->adminmodel->update($id, array('password' => $password_encoded));

      // Get Email Address
      $admin = $this->adminmodel->get(array('id' => $id));

      // Email Paassword
      $email['to'] = $admin['email'];      
      $email['subject'] = 'Reset Password | '.setting('site_name');
      $email['message']['password'] = $password;      
      $email['template'] = 'password_reset';
      $this->emailmodel->send($email);

      // Load View
      $this->session->set_flashdata("admins",'Reset password for "'.$admin['username'].'"');
      redirect('admin/users');
    }
  }

  // Add Admin
  public function add_user() {
    $input = $this->input->post();

    // Create Password
    $password = random_string('alnum',8);
    $input['password'] = md5($password);
    
    // Add User
    $added = $this->adminmodel->add($input);

    // Successful
    if ($added == true) {
      
      // Email Paassword
      $email['to'] = $input['email'];      
      $email['subject'] = 'New Admin | '.setting('site_name');
      $email['message']['username'] = $input['username'];      
      $email['message']['password'] = $password;      
      $email['template'] = 'new_admin';
      $this->emailmodel->send($email);

      // Redirect
      $this->session->set_flashdata("admins",'Successfully created user: "'.$input['username'].'"');
      redirect('admin/users');

    // Unsuccessful
    } else {

      // Redirect
      $this->session->set_flashdata("admins",'Issue creating user');
      redirect('admin/users');

    } 
  }
}