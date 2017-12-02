<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller {

  public function __construct() {      
    parent::__construct();
    $this->load->model(array('subscribermodel'));
  }

  public function subscriber($unique_id) {
    
    // Check if already verified 
    $subscriber = $this->subscribermodel->get(array( 'unique_id' => $unique_id ));
    
    if ( $this->subscribermodel->is_verified($subscriber['id'])) {
      $this->session->set_flashdata("alert","You have already verified");
      redirect(site_url('rewards/subscriber/' . $unique_id));
    }
    

    // Verify User    
    $verified = $this->subscribermodel->verify($unique_id);    
    $this->subscribermodel->update_count($subscriber['referrer']); // Update Subscriber Count

    
    // Email Notifications
    if ($verified == FALSE) {
      
      $this->session->set_flashdata("alert","Unable to find your email. Please register first.");
      redirect(site_url('rewards/subscriber/' . $unique_id));

    } else {        

      $send_email['to'] = $subscriber['email'];
      $send_email['subject'] = 'Your first step to getting rewards!';
      $send_email['template'] = 'subscribed';
      $send_email['message']['reward_points'] = setting('reward_1');
      $send_email['message']['reward_title'] = setting('reward_title_1');
      $send_email['message']['reward_image'] = (!empty(setting('reward_image_1'))) ? setting('reward_image_1') : '/assets/img/rewards/step_1.png';
      $send_email['message']['share_url'] = referral_url($subscriber['unique_id']);
      
      $this->emailmodel->send($send_email);
      
      // Check for Referrer
      if ( isset($subscriber['referrer']) ) {
        
        // Get Referrer Info
        $referrer = $this->subscribermodel->get(array('id' => $subscriber['referrer']));

        // Send Referrer Notification Email            
        $referrer_email['template'] = 'status';
        $referrer_email['to'] = $referrer['email'];
        $referrer_email['subject'] = 'One of your friends have signed up!';
        if ( !empty(EMAIL_REPLYTO) ) { $send_email['reply_to'] = EMAIL_REPLYTO; }

        $referrer_email['message']['reward_count'] = $referrer['count'];
        $next_reward_level = nextLevel($referrer['count']);
        $referrer_email['message']['reward_points'] = setting('reward_'.$next_reward_level) - $referrer['count'];

        $referrer_email['message']['reward_title'] = setting('reward_title_'.$next_reward_level);
        $referrer_email['message']['reward_image'] = 'step_'.$next_reward_level.'.png';
        $referrer_email['message']['share_url'] = referral_url($referrer['unique_id']);
      
        $this->emailmodel->send($referrer_email);
        
      }

      // Redirect to Subscriber Page      
      $this->session->set_flashdata("alert","Your email was verified successfully.");
      redirect(site_url('rewards/subscriber/' . $unique_id));

    }
  }


  public function resend($unique_id) {
    $subscriber = $this->subscribermodel->get(array( 'unique_id' => $unique_id )); 
    $send_email['to'] = $subscriber['email'];
    $send_email['subject'] = 'Please Verify Your Email | '. setting('site_name');
    $send_email['template'] = 'verify';
    $send_email['message']['verify_url'] = verify_url($subscriber['unique_id']);
    $this->emailmodel->send($send_email);

    $this->session->set_flashdata("alert","Verification email was resent. ".resend_verify($unique_id, "Resend").".");
    redirect(site_url('rewards/subscriber/' . $unique_id));
  }

}