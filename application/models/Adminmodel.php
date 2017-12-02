<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminmodel extends CI_Model {

  var $table = 'admins';
  
  function __construct() {
    parent::__construct();
  }


  function get($array) {
    
    $query = $this->db->get_where($this->table, $array);
    $result = $query->result_array();

    if ( empty($result) ) { 

      return false; 
    
    } else { 
    
      return $result[0]; 
    
    }

  }

  function getAll($array = array()) {
    
    $query = $this->db->get_where($this->table, $array);
    $result = $query->result_array();

    if ( empty($result) ) { 

      return false; 
    
    } else { 
    
      return $result; 
    
    }

  }


  function login($username, $password) {
    $this->db->select('id, username, password');
    $this->db->from($this->table);
    $this->db->where('username', $username);
    $this->db->where('password', MD5($password));
    $this->db->limit(1);

    $query = $this->db->get();
    $result = $query->result();

    if ($query->num_rows() == 1) {
     
      return $result;
    
    } else {
    
      return false;

    }
  }


  function update($id, $data) {
    
    if (isset($id)) {

      $this->db->where('id', $id);
      $this->db->update($this->table, $data);
      return true;

    } else {
      
      return false;

    }
    
  }


  function add($data) {

    // Check that username does not already exists, if it does, redirect
    $check = $this->get(array('username' => $data['username']));
    
    if (!empty($data['username']) && !empty($data['email']) && !empty($data['email']) && !empty($check)) {
     
      return false;
    
    } else {

      // Insert user
      $this->db->insert($this->table, $data);

      return true; 

    }
    
  }


  function delete($data) {

    // Check that username does not already exists, if it does, redirect
    $check = $this->get($data);    
    
    if (!isset($data['id']) || empty($check)) {
     
      return false;
    
    } else {

      // Delete user
      $this->db->where('id', $data['id']);
      $this->db->delete($this->table);

      return true; 

    }
    
  }

}