<?php echo form_open_multipart('upload/do_upload', array('id'=>'setup', 'name'=>'setup')); ?>					

<div class="row"><!-- // START Row -->

	<div class="panel">

		<!-- Title -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Site Branding</h3>
		</div>
		
		<div class="medium-6 column">

			<p>Site Logo</p>

			<?php 
				$this->template->widget('inputs/upload_image', 
				array(
					'label'							=>	'Site Logo', 
					'name'							=>	'site_logo',				
					'default'						=>	'logo',
					'show'							=>	true,
					'container_class' 	=> 'short-80',
					'disclaimer'				=>	'Will scale down to 336 pixels',
					'value'							=>	$settings['site_logo'])
				); 
			?>
		</div>	

		<div class="medium-6 column">

			<p>Site Favicon</p>

			<?php 
				$this->template->widget('inputs/upload_image', 
				array(
					'label'							=>	'Site Favicon', 
					'name'							=>	'site_favicon',				
					'default'						=>	'favicon',
					'show'							=>	true,
					'container_class'		=>	'short-80',
					'disclaimer'				=>	'Recommended: 128 x 128 pixels',
					'value'							=>	$settings['site_favicon'])
				); 
			?>
		</div>	

		<div class="spacer medium-12 column"></div>

		<!-- Title -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Site Settings</h3>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Site Title', 
					'type'	=>	'text', 
					'name'	=>	'site_name',
					'class' => 	null,
					'value'	=>	$settings['site_name'])
				); 

				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Visible to Search Engines', 
					'name'	=>	'site_follow',
					'class' => 	null,
					'options'	=>	array(
						true	=>	'Yes', 
						false	=>	'No' 
					),
					'value'	=>	$settings['site_follow'])
				); 
			?>
		</div>		

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/textarea', 
				array(
					'class' => 	null,
					'label'	=>	'Site Description', 					
					'name'	=>	'site_desc',					
					'value'	=>	$settings['site_desc'])
				); 
			?>
		</div>		

		<div class="spacer medium-12 column"></div>		

		<!-- Title -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Start & End Dates</h3>

			<p>Your server's timezone is set as: <strong><?php echo date_default_timezone_get(); ?></strong>.</p>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Start Date', 
					'type'	=>	'text', 
					'name'	=>	'start_date',
					'class'	=>	'datepicker',
					'value'	=>	$settings['start_date'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'End Date', 
					'type'	=>	'text', 
					'name'	=>	'end_date',
					'class'	=>	'datepicker',
					'value'	=>	$settings['end_date'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'End Hyperlink', 
					'type'	=>	'url', 
					'name'	=>	'end_link',
					'class'	=>	null,
					'value'	=>	$settings['end_link'])
				); 
			?>
		</div>

		<div class="spacer medium-12 column"></div>

		<!-- Title -->
		<div class="medium-12 column">		
			<h3 class="panel-title margin-bottom">Site Tracking</h3>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Tracking Type', 
					'name'	=>	'tracking_type',
					'class' => 	null,
					'options'	=>	array(
						'tracking_no'		=>	'None', 
						'tracking_ga'		=>	'Google Analytics', 
						'tracking_gtm'	=>	'Google Tag Manager' 
					),
					'value'	=>	$settings['tracking_type'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Google Analytics', 
					'type'	=>	'text', 
					'name'	=>	'tracking_ga',				
					'class' => 	null,
					'value'	=>	$settings['tracking_ga'])
				); 
			?>
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Google Tag Manager', 
					'type'	=>	'text', 
					'name'	=>	'tracking_gtm',
					'class' => 	null,
					'value'	=>	$settings['tracking_gtm']
					));
			?>
		</div>

		<?php $this->template->widget('inputs/tab_selected') ?>

		<div class="medium-12 column spacing-top">
			<?php echo form_submit('setup', 'Update Site', array('class' => 'btn btn-save btn-right')) ?>

			<input type="reset" onclick="alert('Form has been reset')" class="btn btn-reset btn-right" value="Reset" />
		</div>				

	</div>

</div><!-- // END Row -->	

<?php echo form_close(); ?>