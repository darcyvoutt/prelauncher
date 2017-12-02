<?php   
  $page['page_title'] = 'Login';
  $page['body_class'] = 'login';  
  $this->load->view('header', $page); 

  $column = 'small-11 medium-8 large-4 small-centered medium-centered large-centered column';
?>

  <div class="row">
    <div class="<?php echo $column; ?> login-logo">
      <a href="<?php echo site_url('admin'); ?>">
        <img src="<?php echo base_url('assets/img/logo.svg'); ?>" alt="<?php echo setting('site_name') . ' | Prelauncher'; ?>" />
      </a>        
    </div>    
  </div>

  <div class="row">

    <div class="<?php echo $column; ?> login-form">

      <h2 class="login-form-title">Login</h2>

      <?php alert(); ?>

      <?php echo form_open('login/verify'); ?>  

        <label id="username">Username</label>        
        <input type="text" id="username" name="username" placeholder="Username" />

        <label id="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" />      

        <div class="row no-padding">

          <div class="small-6 column">
            <a href="<?php echo site_url('password/forgot') ?>" class="forgot-password">Reset Password</a>
          </div>

          <div class="small-6 column">
            <input type="submit" id="submit" class="btn is-right" value="Submit" />
          </div>

        </div>        

      <?php echo form_close(); ?>
      
    </div>    

  </div>

<?php $this->load->view('footer'); ?>