<?php 
  $page['hide_wrap'] = true;
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
          <?php echo setting('reward_hero_title_ended', true); ?>
        </span>       

        <h2 class="rewards-hero-cta">
          <?php echo setting('reward_hero_cta_ended', true); ?>
        </h2>

        <p>
          <?php echo setting('reward_hero_subline_ended', true); ?>
        </p>

        <ul class="no-bullet social-links">
          <li class="twitter">
            <?php $this->template->widget('share/twitter', array('url' => setting('end_link'))); ?>          
          </li>
          <li class="facebook">
            <?php $this->template->widget('share/facebook', array('url' => setting('end_link'))); ?>
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