<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

  function index(){
    $this->template->layout('error');
  }
}