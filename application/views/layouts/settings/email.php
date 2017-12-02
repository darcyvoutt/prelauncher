<?php echo form_open_multipart('upload/do_upload', array('id'=>'email','name'=>'email')); ?>

<div class="row"><!-- // START Row -->

	<div class="panel">

		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Email Settings</h3>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'From Email', 
					'type'	=>	'text',
					'name'	=>	'email_from',
					'class' => 	null,
					'value'	=>	$settings['email_from'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Email Protocol',
					'name'	=>	'email_protocol',
					'class' => 	null,
					'options' => array(
						'smtp'	=>	'SMTP (Recommended)',
						'mail'	=>	'Mail',
						'sendmail'	=>	'Sendmail'
					),
					'value'	=>	$settings['email_protocol'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Email Host (smtp.yourdomain.com)', 
					'type'	=>	'text',
					'name'	=>	'email_host',
					'class' => 	null,
					'value'	=>	$settings['email_host'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Email Port (Default: 465)', 
					'type'	=>	'text',
					'name'	=>	'email_port',
					'class' => 	null,
					'value'	=>	$settings['email_port'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Email Username', 
					'type'	=>	'text',
					'name'	=>	'email_user',
					'class' => 	null,
					'value'	=>	$settings['email_user'])
				); 
			?>
		</div>

		<div class="medium-6 column">
			<?php 
				$this->template->widget('inputs/text', 
				array(
					'label'	=>	'Email Password', 
					'type'	=>	'text',
					'name'	=>	'email_pass',
					'class' => 	null,
					'value'	=>	$settings['email_pass'])
				); 
			?>
		</div>

		<div class="medium-6 column">

			<p>Email Logo</p>

			<?php 
				$this->template->widget('inputs/upload_image', 
				array(
					'show'							=>	true,
					'label'							=>	'Email Logo', 
					'name'							=>	'email_logo',				
					'default'						=>	'email_logo',					
					'container_class' 	=> 	'short-80',
					'disclaimer'				=>	'Recommended: 50 x 50 pixels',
					'value'							=>	$settings['email_logo']
					)
				); 
			?>
		</div>	

		<?php $this->template->widget('inputs/tab_selected') ?>

		<div class="medium-12 column spacing-top">
			<?php echo form_submit('email', 'Update Email', array('class' => 'btn btn-save btn-right')) ?>		

			<input type="reset" onclick="alert('Form has been reset')" class="btn btn-reset btn-right" value="Reset" />	
		</div>				
		
	</div>	

</div><!-- // END Row -->	

<?php echo form_close(); ?>