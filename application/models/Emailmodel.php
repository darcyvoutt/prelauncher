<?php 
class Emailmodel extends CI_Model {
  
  function __construct() {
    parent::__construct();
  }

  public function send($array) {   

    /*
    *
    * Required variables
    * $to -> the email sending too
    * $subject -> subject line
    * $message -> message being sent
    *
    */ 

    if ( isset($array['to']) && isset($array['subject']) && isset($array['message']) ) {

      // Setup
      $config['protocol']       = setting('email_protocol');  
      $config['smtp_host']      = setting('email_host');
      $config['smtp_port']      = setting('email_port');      
      $config['smtp_user']      = setting('email_user');
      $config['smtp_pass']      = setting('email_pass');
      $config['smtp_timeout']   = '30';
      $config['charset']        = 'utf-8';
      $config['wordwrap']       = FALSE;
      $config['mailtype']       = 'html';
      $config['crlf']           = "\r\n";
      $config['newline']        = "\r\n"; 

      $this->email->initialize($config);

      // Basic Recipients Fields
      $from = isset($array['from']) ? $array['from'] : setting('email_from');
      $name = isset($array['name']) ? $array['name'] : setting('site_name');      
      
      if (isset($array['reply_to'])) { $this->email->reply_to( $array['reply_to'], $array['name'] ); }

      $this->email->from( $from, $name );
      $this->email->to( $array['to'] ); // Required

      // Optional Recipients
      if ( isset($array['cc']) ) { $this->email->cc( $array['cc'] ); }    
      if ( isset($array['bcc']) ) { $this->email->bcc( $array['bcc'] ); }    

      // Subject
      $this->email->subject( $array['subject'] ); // Required

      // Message
      $body['subject'] = $array['subject']; // Required
      $body['message'] = $array['message']; // Required

      // View File
      if ( isset($array['template']) ) { $template = $array['template']; } 
      else { $template = 'status'; }

      // Final Build of email
      $copy =  $this->load->view('layouts/email/'.$template, $body, TRUE);  

      $this->email->message( $copy );
      
      // Send Email      
      $this->email->send();

      if ( isset($array['debugger']) && $array['debugger'] == TRUE) { echo $this->email->print_debugger(); }

      return true;

    } else {

      return false;

    }
  }


}
?>