<?php 
	echo form_open_multipart('upload/do_upload', array('id'=>'social', 'name'=>'social')); 
  // Run Facebook Scrape Script
	if ( !empty($this->session->flashdata('facebook_scrape')) ) {
		echo '<script>facebook_scrape();</script>';
	}			
?>					

<div class="row"><!-- // START Row -->

	<div class="panel">

		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Social Sharing Settings</h3>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Twitter Handle', 
					'type'	=>	'text', 
					'name'	=>	'twitter_handle',
					'class' => 	null,
					'value'	=>	$settings['twitter_handle'])
				); 
			
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Tweet Hashtags (Comma Seperated)', 
					'type'	=>	'text', 
					'name'	=>	'twitter_hashtags',
					'class' => 	null,
					'value'	=>	$settings['twitter_hashtags'])
				); 
			
				$this->template->widget('inputs/textarea', 
				array(
					'label'	=>	'Tweet Message', 
					'name'	=>	'twitter_message',
					'class' => 	null,
					'value'	=>	$settings['twitter_message'])
				); 
			
				$this->template->widget('inputs/upload_image', 
				array(
					'label'		=>	'Twitter Share Image', 
					'name'		=>	'twitter_image',				
					'default'	=>	'twitter',
					'show'		=>	true,
					'disclaimer'	=>	'Minimum: 440 x 220 pixels.',
					'value'		=>	$settings['twitter_image'])
				); 
			?>
			
			<br>
			<h4>Twitter Preview.</h4>		
			<?php 
				$this->template->widget('share/twitter', 
				array('url' => site_url())); 
			?>
				
		</div>

		<div class="medium-6 column">
			<?php 				
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Facebook Share Title', 
					'type'	=>	'text', 
					'name'	=>	'facebook_title',
					'class' => 	null,
					'value'	=>	$settings['facebook_title'])
				); 

				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Company Name (Appears as the "By")', 
					'type'	=>	'text', 
					'name'	=>	'site_author',
					'class' => 	null,
					'value'	=>	$settings['site_author'])
				); 
			
				$this->template->widget('inputs/textarea', 
				array(
					'label'	=>	'Facebook Share Description', 
					'name'	=>	'facebook_desc',
					'class' => 	null,
					'value'	=>	$settings['facebook_desc'])
				); 				

				$this->template->widget('inputs/upload_image', 
				array(
					'label'		=>	'Facebook Share Image', 
					'name'		=>	'facebook_image',				
					'default'	=>	'facebook',
					'show'		=>	true,
					'disclaimer'	=>	'Recommended: 600 x 600 pixels.',
					'value'		=>	$settings['facebook_image'])
				); 

				// Hidden Value
				echo form_hidden('facebook_scrape', true);
			?>
			
			<br>
			<h4>Facebook Preview.</h4>					
			<?php $this->template->widget( 'share/facebook', array('url' => site_url()) ); ?>				
			<a href="javascript:facebook_scrape(true);">(Refresh)</a>

		</div>

		<?php $this->template->widget('inputs/tab_selected') ?>

		<div class="medium-12 column spacing-top">			
			<?php echo form_submit('social', 'Update Sharing', array('class' => 'btn btn-save btn-right')) ?>

			<input type="reset" onclick="alert('Form has been reset')" class="btn btn-reset btn-right" value="Reset" />
		</div>				
		
	</div>	

</div><!-- // END Row -->	

<?php echo form_close(); ?>