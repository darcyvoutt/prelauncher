<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debug extends CI_Controller {

  function form(){
    $form = $this->input->post();
    echo "<pre>";
    print_r($form);
    echo "</pre>";
  }
}