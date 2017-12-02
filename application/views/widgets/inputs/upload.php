<div id="<?php echo (!empty($name)) ? $name."_container" : ''; ?>" 
		 class="<?php echo !empty($container_class) ? $container_class : ''; ?>">
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