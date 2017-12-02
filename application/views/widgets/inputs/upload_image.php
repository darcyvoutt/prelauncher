<div class="image-upload <?php echo !empty($container_class) ? $container_class : ''; ?>">
	<div class="row">
		<div class="medium-6 column">
			
			<?php 
				// Display Image
				if (!empty($show)) {
					$image = get_image_default($value, get_image($default));
					echo '<img src="'.$image.'" alt="'.clean_label($label).'" class="image-thumbnail" />';
				}
			?>

		</div>
		
		<div class="medium-6 column">

			<?php 
				// Label
				echo form_label( clean_label($label), convert_label($label), array('class'=>'show') );

				// Upload
				$config = array('class'	=> 	'ajax-upload');
				echo form_upload($name, $value, $config);

				// Disclaimer
				if ( !empty($disclaimer) ) { 
					echo '<span class="upload-disclaimer">'.$disclaimer.'</span>'; 
				}
			?>
			
		</div>
	</div>
</div>