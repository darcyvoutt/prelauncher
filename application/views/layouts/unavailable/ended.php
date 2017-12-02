<?php 
  $page['body_class'] = 'home';
  $page['show_background'] = true;
  $this->load->view('header', $page); 

  $column = 'small-10 medium-6 large-4 small-centered medium-centered large-centered column'
?>

  <div class="row">

    <div class="<?php echo $column; ?>">
      <a href="<?php echo site_url(); ?>">
        
        <img src="<?php echo setting('site_logo') ?>" 
             alt="<?php echo setting('site_name'); ?>" 
             class="logo-icon" />
             
      </a>
    </div>  

  </div>

  <div class="row">
    
    <div class="<?php echo $column; ?>">
      
      <h2 class="home-title">
        <?php echo setting('home_title_ended', true); ?>        
      </h2>      

      <p class="home-statement">
        <?php echo setting('home_message_ended', true); ?>
      </p>

      <a href="<?php echo setting('end_link'); ?>" class="btn is-centered">
        Learn More
      </a>

    </div>

  </div>

<?php $this->load->view('footer'); ?>