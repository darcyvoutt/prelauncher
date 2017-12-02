<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rewards extends CI_Controller {

  public function __construct() {      
    parent::__construct();
  }

  public function subscriber($unique_id) {   
    $subscriber = $this->subscribermodel->get(array('unique_id' => $unique_id));

    if (empty($subscriber)) {
      // If the subscriber ID is empty, send them to the home page
      redirect(site_url());
    }

    $data['levels'] = array(
      setting('reward_1'),
      setting('reward_2'),
      setting('reward_3'),
      setting('reward_4'),
      setting('reward_5'),
    );
    
    $data['site_color'] = true;
    $data['verified'] = $subscriber['status'];
    $data['referrer'] = $subscriber['referrer'];
    $data['subscriber_id'] = $subscriber['unique_id'];    
    $data['subscriber_url'] = referral_url($subscriber['unique_id']);    
    $data['subscriber_count'] = $subscriber['count'];
    $data['reward_count'] = setting('rewards_count'); 

    if (get_date('end') >= time()) {
      $this->template->layout('rewards/default', $data);  
    } else {
      $this->template->layout('rewards/ended', $data);
    }  
  }
}