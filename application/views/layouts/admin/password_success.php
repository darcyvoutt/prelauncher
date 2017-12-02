<?php     
  $page['body_class'] = 'login';  
  $page['page_title'] = 'Forgot Password';
  $this->load->view('header', $page); 
?>

  <div class="row">
    <div class="medium-4 medium-centered column login-logo">
      <a href="<?php echo site_url('admin'); ?>">
        <img src="<?php echo base_url('assets/img/logo.svg'); ?>" alt="Prelauncher" />
      </a>
    </div>    
  </div>

  <div class="row">

    <div class="medium-4 medium-centered column login-form">
       
      <h2>Check Your Email</h2>

      <p>Your new password was just emailed to you.</p>

      <div class="row">

        <div class="small-12 column">
          <a href="<?php echo site_url('login') ?>" class="btn is-right">Login Now</a>
        </div>

      </div>  
        
    </div>    

  </div>

<?php $this->load->view('footer'); ?>