<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settingsmodel extends CI_Model {

  var $table = 'settings';
  
  function __construct() {
    parent::__construct();
  }


  // Get Specific Record

  function get($array) {
    
    $query = $this->db->get_where($this->table, $array);
    $result = $query->result_array();

    if ( empty($result) ) { 

      return false; 
    
    } else { 
    
      return $result[0]; 
    
    }

  }


  // Select All

  function getAll() {

    $query = $this->db->get($this->table);
    $result = $query->result_array();

    if ( empty($result) ) { 

      return false; 
    
    } else { 

      $resultArray = array();
      foreach ($query->result() as $row) {
        $resultArray[$row->label] = $row->value;
      }
    
      return $resultArray; 
    
    }

  }


  // Update Record

  function update($data) {
    
    if (isset($data)) {

      foreach ($data as $label => $value) {
        // Build Update Array
        $update['value'] = $value;
        
        // Active Record Update
        $this->db->where('label', $label);
        $this->db->update($this->table, $update);
      }       

      return true;

    } else {
      
      return false;

    }
    
  }

}