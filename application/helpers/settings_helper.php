<?php
// Alert Function
function alert($type = 'alert') {
  $CI =& get_instance();
  if ($CI->session->flashdata($type)) : ?>    
      <div data-alert class="alert-box info">
        <?php echo $CI->session->flashdata($type); ?>
        <a href="#" class="close">&times;</a>
      </div>
  
  <?php endif;
}


// Get Settings from DB
function setting($label, $replace_merge = null) {
  $CI =& get_instance();
  $data = $CI->settingsmodel->get( array('label' => $label) );
  
  if ($data !== false && isset($replace_merge)) { return merge_text( $data['value'] ); }  
  else if ($data !== false) { return $data['value']; }  
  else { return 'Label does not exist'; }
}


// Resend Verification
function resend_verify($subscriber_id, $html = null) {
  $resend_url = site_url('verify/resend/'.$subscriber_id);
  if ( $html == null ) { return $resend_url; } 
  else { return '<a href="'.$resend_url.'">'.$html.'</a>'; } 
}


// Verify URL
function verify_url($subscriber_id) {
  $verify_url = site_url('verify/subscriber/'.$subscriber_id);
  return $verify_url;
}

// Global Site Brand Color
function brand_color($color) {
  if (!empty($color['brand_color']) && !empty($color['text_color'])) :
  // START HTML ?>
  <style>
    /* Base Text Colors */ 
    .rewards-hero-statement, 
    .rewards-hero p, 
    .rewards a, 
    .home p,
    .home a {
      color: <?php echo $color['text_color']; ?>;
    }
    /* Emphasized Text Colors */ 
    .rewards-hero-cta,  
    .rewards p strong,
    .rewards a,
    .home strong,
    .home a {
      color: <?php echo $color['brand_color']; ?>;
    }
    /* Background Colors (eg. Buttons) */ 
    #rewards-progress .meter, .btn {
      background-color: <?php echo $color['brand_color']; ?>;
    }
    /* Button Hover */
    .btn:hover {
      background-color: <?php echo colorDarken($color['brand_color'], 22); ?>;
    }
  </style>
  <?php // END HTML
  endif;
}