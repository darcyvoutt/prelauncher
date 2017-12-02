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

      <?php alert('alert'); ?>  
       
      <h2 class="login-form-title">Forgot Password</h2>

      <p>Enter email to retrieve.</p>

      <?php echo form_open('password/reset'); ?>  

        <label id="email">email</label>        
        <input type="email" id="email" name="email" placeholder="Email Address" />

        <div class="row">
          <div class="small-12 column">
            <input type="submit" id="submit" class="btn is-right" value="Submit" />
          </div>
        </div>        

      <?php echo form_close(); ?>      
        
    </div>    

  </div>

<?php $this->load->view('footer'); ?>