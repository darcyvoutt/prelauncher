<?php 
  $page['hide_wrap'] = true;
  $page['custom_colors'] = true;
  $page['body_class'] = 'rewards';  
  $page['page_title'] = 'Get Rewards';  
  $page['page_url'] = $subscriber_url;  
  $this->load->view('header', $page); 
?>

  <!-- Rewards Hero -->
  <div class="rewards-hero <?php echo setting('reward_hero_class'); ?>" <?php background_image('reward'); ?>>
  
    <div class="row" data-equalizer data-equalize-by-row="true" data-equalize-on="medium">    

      <div class="rewards-hero-image hide-for-small-only medium-7 large-7 column" data-equalizer-watch>
        
        <div class="rewards-hero-image-spacer"></div>
        <img src="<?php echo get_image_default(setting('reward_hero_image'), get_image('reward_hero')); ?>" 
             alt="<?php echo setting('site_name'); ?>" />        

      </div>
    
      <div class="rewards-hero-copy small-10 small-centered medium-uncentered medium-5 large-5 column" data-equalizer-watch>              

        <span class="rewards-hero-statement">
          <?php echo setting('reward_hero_title', true); ?>
        </span>       

        <h2 class="rewards-hero-cta">
          <?php echo setting('reward_hero_cta', true); ?>          
        </h2>

        <p>
          <?php echo setting('reward_hero_subline', true); ?>
        </p>
        
        <p><strong>Only <?php echo timeleft(); ?> days left</strong> to earn more.</p>         

        <!-- // START - Verification Check -->
        <?php if ( $this->session->flashdata("alert") ) : ?>

          <div data-alert class="alert-box is-error">
            <?php echo $this->session->flashdata("alert"); ?>            
          </div>             

        <?php elseif ( $verified == "pending" ) : ?>

          <div data-alert class="alert-box is-error">
            Please verify your email to qualify for rewards. 
            <?php echo resend_verify($subscriber_id ,'Resend'); ?>.
          </div>          
        
        <?php endif; ?>
        <!-- // END - Verification Check -->

        <?php if ( $verified === "verified" ) : ?>
          <input type="text" onClick="this.setSelectionRange(0, this.value.length)" 
               value="<?php echo $subscriber_url; ?>" readonly />
        <?php endif; ?>


        <ul class="no-bullet social-links">
          <li class="twitter">
            <?php $this->template->widget('share/twitter', array('url' => $subscriber_url)); ?>          
          </li>
          <li class="facebook">
            <?php $this->template->widget('share/facebook', array('url' => $subscriber_url)); ?>
          </li>
        </ul>  
        
      </div>

    </div>

  </div>

  <!-- Rewards Level -->
  <div class="rewards-level">

    <div id="rewards" class="row">

      <div class="small-12 column">
    
        <?php 
          $rewards['reward_count'] = $reward_count;
          $rewards['subscriber_count'] = $subscriber_count;
          $this->template->widget('rewards/list', $rewards); 
        ?>    
        
      </div>  

      <div class="small-12 column show-for-medium-up">
        <div id="rewards-progress" class="progress small-12">
          <span class="meter" style="width:<?php progress_meter($subscriber_count,$reward_count,$levels); ?>"></span>
        </div>
      </div>   

    </div> 
    
  </div>

<?php 
  $footer['hide_wrap'] = true;
  $this->load->view('footer', $footer); 
?>