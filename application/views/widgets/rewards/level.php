
<?php if (setting('reward_active_'.$reward_num) === 'true') : ?>

	<li class="reward-item <?php echo currentStep($reward_num, $subscriber_count) ?>" <?php rewardWidth($reward_count); ?>>
	  
	  <div class="reward-item-number">
	    <?php echo setting('reward_'.$reward_num); ?>
	  </div>                        
	  
	  <img src="<?php echo get_reward_image($reward_num); ?>" 
	  		 alt="<?php echo setting('reward_title_'.$reward_num, true); ?>" />

	  <h4 class="title"><?php echo setting('reward_title_'.$reward_num, true); ?></h4>

	</li>

<?php endif; ?>