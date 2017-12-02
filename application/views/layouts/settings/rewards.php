<?php echo form_open_multipart('upload/do_upload', array('id'=>'rewards_settings', 'name'=>'rewards_settings')); ?>

<div class="row"><!-- // START Row -->

	<div class="panel">

		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Rewards Settings</h3>
		</div>

		<?php for ($i=1; $i < 6; $i++) : ?>
		<div class="medium-6 column">			

				<p>Reward <?php echo $i; ?></p>

				<?php 
					$reward_num		= $i;
					$reward 			= 'reward_'.$i;									
					$title 				= 'reward_title_'.$i;					
					$reward_image = 'reward_image_'.$i;	
					$active 			= 'reward_active_'.$i;			
				
					$this->template->widget('inputs/text', 
					array(
						'label'	=>	'Title', 
						'type'	=>	'text', 
						'name'	=>	$title,
						'class' => 	null,
						'value'	=>	$settings[$title]
						)
					); 
				?>
				
				<div class="row no-padding">
					<div class="medium-6 column">
						<?php 
							$this->template->widget('inputs/text', 
							array(
								'label'	=>	'Emails Required', 
								'type'	=>	'text', 
								'name'	=>	$reward,
								'class' => 	null,
								'value'	=>	$settings[$reward]
								)
							); 
						?>				
					</div>
					<div class="medium-6 column">
						<?php 
							$this->template->widget('inputs/select', 
							array(
								'label'	=>	'Reward Active', 
								'name'	=>	$active,
								'class' => 	'reward_count',
								'options'	=>	array(
									'true'	=>	'On', 
									'false' =>	'Off'
								),
								'value'	=>	$settings[$active]
								)
							); 
						?>		
					</div>
				</div>	

				<div class="row no-padding">
					<div class="medium-12 column">
						<?php 
							$this->template->widget('inputs/upload_image_reward', 
							array(
								'label'				=>	'Reward Image', 
								'name'				=>	$reward_image,				
								'default'			=>	'reward',
								'reward_num'	=>	$reward_num,
								'disclaimer'	=>	'Recommend Max Width: 160 pixels',
								'value'				=>	$settings[$reward_image]
								)
							); 
						?>				
					</div>
				</div>		

				<div class="medium-12 column"><hr class="less-margin narrow" /></div>	
				
		</div>
		<?php endfor; ?>

		<?php 
			// Hidden Value
			echo form_hidden('rewards_count', $settings['rewards_count']);

			$this->template->widget('inputs/tab_selected');
		?>

		<div class="medium-12 column spacing-top">
			<?php echo form_submit('rewards_settings', 'Update Rewards', array('class' => 'btn btn-save btn-right')) ?>

			<input type="reset" onclick="alert('Form has been reset')" class="btn btn-reset btn-right" value="Reset" />
		</div>
		
	</div>					

</div><!-- // END Row -->	

<?php echo form_close(); ?>