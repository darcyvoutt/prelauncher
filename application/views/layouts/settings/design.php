<?php echo form_open_multipart('upload/do_upload', array('id'=>'design','name'=>'design')); ?>

<div class="row"><!-- // START Row -->

	<div class="panel">

	<!-- GENERAL SETTINGS -->

		<!-- Title -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">General Settings</h3>
		</div>

		<div class="medium-4 column">

			<div class="row">
				<div class="medium-8 column">
					<?php						
						$this->template->widget('inputs/text', 
						array(
							'label'	=>	'Primary Color (eg. Brand Color)', 
							'type'	=>	'text', 
							'name'	=>	'site_color',
							'class' => 	'colorpicker',
							'value'	=>	$settings['site_color'])
						);
					?>
				</div>
				<div class="medium-4 column">
					
					<!-- Reset Color -->
					<a class="reset-color btn-plain" 
						 data-update="#site_color"
						 data-color="#2BD4A7">
						 Reset
					</a>

				</div>
			</div>			

		</div>
		<div class="medium-4 column">
			
			<div class="row">
				<div class="medium-8 column">
					<?php						
						$this->template->widget('inputs/text', 
						array(
							'label'	=>	'Text Color', 
							'type'	=>	'text', 
							'name'	=>	'site_text_color',
							'class' => 	'colorpicker',
							'value'	=>	$settings['site_text_color'])
						);
					?>
				</div>
				<div class="medium-4 column">
					
					<!-- Reset Color -->
					<a class="reset-color btn-plain" 
						 data-update="#site_text_color"
						 data-color="#444444">
						 Reset
					</a>

				</div>
			</div>	

		</div>

		<div class="medium-4 column"></div>

		<div class="medium-12 column"><br><hr class="less-margin" /></div>
			

	<!-- HOME PAGE -->

		<!-- Title -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Home Page</h3>
		</div>

		<div class="medium-4 column">
			<div class="row">
				<div class="medium-8 column">
					<?php
						// Background Color
						$this->template->widget('inputs/text', 
						array(
							'label'	=>	'Color', 
							'type'	=>	'text', 
							'name'	=>	'site_background_color',
							'class' => 	'colorpicker',
							'value'	=>	$settings['site_background_color'])
						);
					?>
				</div>
				<div class="medium-4 column">
					
					<!-- Reset Color -->
					<a class="reset-color btn-plain" 
						 data-update="#site_background_color"
						 data-color="#000000">						 
						 Reset
					</a>

				</div>
			</div>		

			<?php 			
				// Background Image
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Image (Overlays Color)', 
					'name'	=>	'site_background',
					'class' => 	'reveal-image-home',
					'options' => array(						
						'assets/img/backgrounds/background-1.jpg'	=>	'Standard: iPad',
						'assets/img/backgrounds/background-2.jpg'	=>	'Standard: City',
						'custom'																	=>	'Upload Custom',
						''																				=>	'No Image'
					),
					'value'	=>	$settings['site_background'])
				); 

				// Custom Image
				$this->template->widget('inputs/upload', 
				array(
					'label'						=>	'Custom Image', 
					'container_class' => 	'hide',
					'name'						=>	'site_background_custom',					
					'disclaimer'			=>	'Min Width: 1200 pixels',
					'value'						=>	$settings['site_background_custom']
					)
				);

				// Positioning
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Position', 
					'name'	=>	'site_background_position',
					'class' => 	null,
					'options' => array(
						'left top'  			=>	'Left Top',			
						'left center'  		=>	'Left Center',			
						'left bottom'  		=>	'Left Bottom',			
						'right top'  			=>	'Right Top',				
						'right center'  	=>	'Right Center',				
						'right bottom'  	=>	'Right Bottom',				
						'center top'  		=>	'Center Top',				
						'center center'  	=>	'Center Center',				
						'center bottom'  	=>	'Center Bottom'
					),
					'value'	=>	$settings['site_background_position'])
				); 

				// Size
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Size', 
					'name'	=>	'site_background_size',
					'class' => 	null,
					'options' => array(
						'auto'  		=>	'Auto',			
						'cover' 		=>	'Cover',			
						'contain' 	=>	'Contain',			
					),
					'value'	=>	$settings['site_background_size'])
				); 
			?>
										
		</div>

		<div class="medium-8 column">
			
			<?php 
				$back_image['image'] = $settings['site_background'];
				$back_image['custom'] = $settings['site_background_custom'];
				$back_image['class'] = 'reveal-image-home';
				$this->template->widget('display_image', $back_image);
			?>

		</div>

		<div class="medium-12 column"><br><hr class="less-margin" /></div>


	<!-- REWARDS PAGE -->
	
		<!-- Title -->
		<div class="medium-12 column">
			<h3 class="panel-title margin-bottom">Rewards Page</h3>
		</div>

		<div class="medium-4 column">
			<?php 
				$this->template->widget('inputs/upload', 
				array(
					'label'							=>	'Reward Image', 
					'container_class' 	=> 	null,
					'default'						=>	'reward_hero',
					'name'							=>	'reward_hero_image',					
					'disclaimer'					=>	'Recommend Max Width: 440 pixels',
					'value'							=>	$settings['reward_hero_image']
					)
				);
			?>
			
			<br>

			<?php
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Image Positioning', 
					'name'	=>	'reward_hero_class',
					'class' => 	null,
					'options' => array(
						'image-fixed-bottom'  =>	'Fixed to Bottom',			
						'' 										=>	'Normal'
					),
					'value'	=>	$settings['reward_hero_class'])
				);  
			?>
		</div>

		<div class="medium-8 column">
			<img src="<?php echo get_image_default($settings['reward_hero_image'], $settings['reward_hero_image']); ?>"
					 alt="Reward Hero Image" />
		</div>

		<div class="medium-12 column"><br><hr style="max-width: 40%; display: block; margin: 20px auto 40px auto;" /></div>

		<!-- REWARDS - Background Image -->

		<div class="medium-4 column">
			<div class="row">
				<div class="medium-8 column">
					<?php
						// Background Color
						$this->template->widget('inputs/text', 
						array(
							'label'	=>	'Color', 
							'type'	=>	'text', 
							'name'	=>	'reward_background_color',
							'class' => 	'colorpicker',
							'value'	=>	$settings['reward_background_color'])
						);
					?>
				</div>
				<div class="medium-4 column">
					
					<!-- Reset Color -->
					<a class="reset-color btn-plain" 
						 data-update="#reward_background_color"
						 data-color="#000000">						 
						 Reset
					</a>

				</div>
			</div>		

			<?php 			
				// Background Image
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Image (Overlays Color)', 
					'name'	=>	'reward_background',
					'class' => 	'reveal-image-rewards',
					'options' => array(						
						'assets/img/backgrounds/background-1.jpg'	=>	'Standard: iPad',
						'assets/img/backgrounds/background-2.jpg'	=>	'Standard: City',
						'custom'									=>	'Upload Custom',
						''											=>	'No Image'
					),
					'value'	=>	$settings['reward_background'])
				); 

				// Custom Image
				$this->template->widget('inputs/upload', 
				array(
					'label'				=>	'Custom Image', 
					'container_class'	=> 	'hide',
					'name'				=>	'reward_background_custom',					
					'disclaimer'		=>	'Min Width: 1200 pixels',
					'value'				=>	$settings['reward_background_custom']
					)
				);

				// Positioning
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Position', 
					'name'	=>	'reward_background_position',
					'class' => 	null,
					'options' => array(
						'left top'  		=>	'Left Top',			
						'left center'  		=>	'Left Center',			
						'left bottom'  		=>	'Left Bottom',			
						'right top'  		=>	'Right Top',				
						'right center'  	=>	'Right Center',				
						'right bottom'  	=>	'Right Bottom',				
						'center top'  		=>	'Center Top',				
						'center center'  	=>	'Center Center',				
						'center bottom'  	=>	'Center Bottom'
					),
					'value'	=>	$settings['reward_background_position'])
				); 

				// Size
				$this->template->widget('inputs/select', 
				array(
					'label'	=>	'Size', 
					'name'	=>	'reward_background_size',
					'class' => 	null,
					'options' => array(
						'auto'  		=>	'Auto',			
						'cover' 		=>	'Cover',			
						'contain' 	=>	'Contain',			
					),
					'value'	=>	$settings['reward_background_size'])
				); 
			?>
										
		</div>

		<div class="medium-8 column">
			
			<?php 
				$back_image['image'] = $settings['reward_background'];
				$back_image['custom'] = $settings['reward_background_custom'];
				$back_image['class'] = 'reveal-image-rewards';
				$this->template->widget('display_image', $back_image);
			?>

		</div>

		
		<!-- Submit Button -->
		<?php $this->template->widget('inputs/tab_selected') ?>
		
		<div class="medium-12 column spacing-top">
			<?php echo form_submit('design', 'Update Design', array('class' => 'btn btn-save btn-right')) ?>

			<input type="reset" onclick="alert('Form has been reset')" class="btn btn-reset btn-right" value="Reset" />
		</div>
		
	</div>					

</div><!-- // END Row -->	

<?php echo form_close(); ?>