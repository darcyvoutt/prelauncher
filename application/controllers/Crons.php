<?php 
if ( PHP_SAPI !== 'cli' ) exit('Web access not allowed');

class Crons extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function send_emails() {

    if ( timeleft_int() == 0 ) {

      $subscribers = $this->subscribermodel->getAll(array());      

      foreach ($subscribers as $subscriber) {

        $email['template'] = 'notice';
        $email['to'] = $subscriber['email'];
        $email['subject'] = 'Only one day left!';
        $email['message']['reward_count'] = $subscriber['count'];
        $next_reward_level = nextLevel( $subscriber['count'] );
        $email['message']['reward_points'] = setting('reward_'.$next_reward_level) - $subscriber['count'];
        $email['message']['reward_title'] = setting('reward_title_'.$next_reward_level);
        $email['message']['reward_image'] = 'step_'.$next_reward_level.'.png';
        $email['message']['share_url'] = referral_url($subscriber['unique_id']);                

        $this->emailmodel->send($email);

      }      
    }
  }
}
