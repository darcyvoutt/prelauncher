<?php 
  $page['show_nav'] = true;
  $page['body_class'] = 'admin';
  $page['page_title'] = 'Your Profile';
  $this->load->view('header', $page); 
?>

  <div class="row">      

    <div class="small-12 column">
      <h2>Your Profile</h2>    
      <p>Edit your profile settings of email, username and password.</p> 
    </div> 
  
    <div class="medium-6 column">

      <div class="panel">

        <h3 class="panel-title">User Information</h3>  

        <?php alert('username'); ?>

        <?php echo form_open('admin/change_username'); ?>

          <div class="row">
            
            <div class="large-centered large-11 column">

              <label class="show" for="username">Username:</label>
              <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required />

              <label class="show" for="email">Email Address:</label>
              <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required />

              <input type="submit" class="btn is-right" value="Update" />

            </div>

          </div>                

        <?php echo form_close(); ?>

      </div>
      
    </div> 
  
    <div class="medium-6 column">

      <div class="panel">

        <h3 class="panel-title">Password</h3>

        <?php alert('password'); ?>

        <?php echo form_open('admin/change_password'); ?>

          <div class="row">
            
            <div class="large-4 column">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" placeholder="Password" required />
            </div>

            <div class="large-4 column">
              <label for="repeat_password">Repeat Password:</label>
              <input type="password" id="repeat_password" placeholder="Repeat" required />  
            </div>
            
            <div class="large-3 column">
              <input type="submit" class="btn is-right" value="Update" />
            </div>

          </div>         

        <?php echo form_close(); ?>

      </div>
      
    </div>

  </div>

<?php $this->load->view('footer'); ?>