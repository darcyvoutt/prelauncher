<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribermodel extends CI_Model {

  var $table = 'subscribers';
  
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

  function getAll($array) {
    
    $query = $this->db->get_where($this->table, $array);
    $result = $query->result_array();

    if ( empty($result) ) { 

      return false; 
    
    } else { 
    
      return $result; 
    
    }

  }


  function add($data) {    

    // Check email validity
    if ( isset($data['email']) && valid_email($data['email']) ) {       

      # Set Status to Pending
      $data['status'] = 'pending';

      # Create Subscriber Record
      $this->db->insert($this->table, $data);
      
      return true;  
    
    } else { // Email not set or invalid      

      return false;

    }  
  }


  function data($get) {

    switch ($get) {

      // Total Count of Subscribers
      case 'count':
        //@spencer cound only verified users
        $query = $this->db->count_all($this->table);
        return $query;
        break;

      // Total Count of Verified Subscribers
      case 'count_verified':
        //@spencer cound only verified users
        $this->db->where(array('status' => 'verified'));
        $query = $this->db->count_all_results($this->table);
        return $query;
        break;

      // Top 10 Performers
      case 'top_performers':
        $this->db->order_by('count','desc'); 
        $query = $this->db->get($this->table, 10);

        return $query->result();
        break;
      
      // Subscribers over time
      case 'over_time':
        $this->db->select('created_date, count');        
        $this->db->order_by('created_date','asc'); 
        $query = $this->db->get($this->table);

        return $query->result();
        break;

      // Error
      default:
        return 'Nothing to report';
        break;
    }
  }


  function subscribers($limit = null, $object = false) {
    $this->db->order_by('id','desc'); 
    $query = $this->db->get($this->table, $limit);

    if ($object == true) {
      return $query;
    } else {
      return $query->result();
    }    
  }


  function verify($id) {
    
    if (isset($id)) {
      $subscriber = $this->get(array('unique_id' => $id));
    
      if ($subscriber['status'] != "verified") {
        $subscriber['status'] = "verified";
        $this->db->update($this->table, $subscriber, array('unique_id' => $id));
      }

      return TRUE;

    } else {

      return FALSE;

    }

  }


  function is_verified($user_id) {  
    
    $subscriber = $this->get(array('id' => $user_id));
    
    if ($subscriber['status'] === 'verified') {

      return TRUE;

    } else {

      return FALSE;

    }


  }


  function update_count($referrer_id) {
    
    if (isset($referrer_id)) {

      $referrer = $this->get(array('id' => $referrer_id));
      $data['count'] = $referrer['count'] + 1;

      $this->db->update($this->table, $data, array('id' => $referrer_id));

      return TRUE;

    } else {
      
      return FALSE;

    }
    
  }

}