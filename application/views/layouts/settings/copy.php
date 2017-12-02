<?php echo form_open('settings/save'); ?>					

<div class="row"><!-- // START Row -->

	<div class="panel">

		<!-- Home Page -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Home Page</h3>
		</div>

		<div class="medium-4 column">
			<h4>During Prelauncher</h4>
		</div>

		<div class="medium-8 column">
			<?php 
				$this->template->widget('inputs/textarea', 
				array(
					'class' => 	null,
					'label'	=>	'Home Message', 
					'name'	=>	'home_message',					
					'value'	=>	$settings['home_message'])
				); 

				$this->template->widget('inputs/text', 
				array(
					'class' => 	null,
					'type'	=>	'text', 
					'label'	=>	'Form Disclaimer', 					
					'name'	=>	'home_disclaimer',					
					'value'	=>	$settings['home_disclaimer'])
				);  
			?>
		</div>

		<div class="medium-12 column"><hr class="less-margin" /></div>

		<div class="medium-4 column">
			<h4>Early Home Page</h4>
		</div>

		<div class="medium-8 column">
			<?php 
				$this->template->widget('inputs/textarea', 
				array(
					'class' => 	null,
					'label'	=>	'Early Message', 
					'name'	=>	'home_message_early',					
					'value'	=>	$settings['home_message_early'])
				);  
			?>
		</div>

		<div class="medium-12 column"><hr class="less-margin" /></div>

		<div class="medium-4 column">
			<h4>Ended Home Page</h4>
		</div>

		<div class="medium-8 column">
			<?php 
				$this->template->widget('inputs/textarea', 
				array(
					'class' => 	null,
					'label'	=>	'Ended Page Title', 
					'name'	=>	'home_title_ended',					
					'value'	=>	$settings['home_title_ended'])
				);  

				$this->template->widget('inputs/textarea', 
				array(
					'class' => 	null,
					'label'	=>	'Ended Page Message', 
					'name'	=>	'home_message_ended',					
					'value'	=>	$settings['home_message_ended'])
				);  
			?>
		</div>		

		<!-- Rewards Page -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Rewards Page</h3>
		</div>
		
		<div class="medium-4 column">
			<h4>During Prelauncher</h4>
		</div>

		<div class="medium-8 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'class' => 	null,
					'type'	=>	'text', 
					'label'	=>	'Hero Lead Line', 					
					'name'	=>	'reward_hero_title',					
					'value'	=>	$settings['reward_hero_title'])
				); 

				$this->template->widget('inputs/text', 
				array(
					'class' => 	null,
					'type'	=>	'text', 
					'label'	=>	'Hero Call to Action', 					
					'name'	=>	'reward_hero_cta',					
					'value'	=>	$settings['reward_hero_cta'])
				); 

				$this->template->widget('inputs/textarea', 
				array(
					'class' => 	null,
					'label'	=>	'Hero Subline', 
					'name'	=>	'reward_hero_subline',					
					'value'	=>	$settings['reward_hero_subline'])
				);  
			?>
		</div>

		<div class="medium-4 column">
			<h4>Friend Level</h4>
		</div>

		<div class="medium-8 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'class' => 	null,
					'type'	=>	'text', 
					'label'	=>	'Title', 					
					'name'	=>	'reward_friends_title',					
					'value'	=>	$settings['reward_friends_title'])
				); 

				$this->template->widget('inputs/text', 
				array(
					'class' => 	null,
					'type'	=>	'text', 
					'label'	=>	'Subtext', 					
					'name'	=>	'reward_friends_subline',					
					'value'	=>	$settings['reward_friends_subline'])
				); 
			?>
		</div>

		<div class="medium-12 column"><hr class="less-margin" /></div>

		<div class="medium-4 column">
			<h4>Ended Rewards Page</h4>
		</div>

		<div class="medium-8 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'class' => 	null,
					'type'	=>	'text', 
					'label'	=>	'Hero Lead Line', 					
					'name'	=>	'reward_hero_title_ended',					
					'value'	=>	$settings['reward_hero_title_ended'])
				); 

				$this->template->widget('inputs/text', 
				array(
					'class' => 	null,
					'type'	=>	'text', 
					'label'	=>	'Hero Call to Action', 					
					'name'	=>	'reward_hero_cta_ended',					
					'value'	=>	$settings['reward_hero_cta_ended'])
				); 

				$this->template->widget('inputs/textarea', 
				array(
					'class' => 	null,
					'label'	=>	'Hero Subline', 
					'name'	=>	'reward_hero_subline_ended',					
					'value'	=>	$settings['reward_hero_subline_ended'])
				);  
			?>
		</div>

		<?php $this->template->widget('inputs/tab_selected') ?>

		<div class="medium-12 column spacing-top">
			<?php echo form_submit('copy', 'Update Copy', array('class' => 'btn btn-save btn-right')) ?>		

			<input type="reset" onclick="alert('Form has been reset')" class="btn btn-reset btn-right" value="Reset" />	
		</div>				
		
	</div>	

</div><!-- // END Row -->	

<?php echo form_close(); ?>