<?php 
	// Image Output
	if ( !empty($image) && $image !== 'custom' ) {		
		$output = base_url($image);
	} else if ( !empty($custom) && $image == 'custom' ) {	
		$output = base_url($custom);
	} else if ( empty($custom) && $image == 'custom' ) {
		$output = base_url("assets/img/image-custom-none.png");
	} else {
		$output = base_url("assets/img/image-none.png");
	}

	// Custom Image Output
	if (!empty($custom)) {
		$custom_output = base_url($custom);
	} else {
		$custom_output = base_url("assets/img/image-custom-none.png");
	}
?>

<img src="<?php echo $output ?>" 
		 data-none="<?php echo base_url("assets/img/image-none.png") ?>" 
		 data-custom="<?php echo $custom_output; ?>" 
		 data-current="<?php echo $output; ?>" 
		 class="img-center <?php echo $class; ?>" 
		 alt="Background Image" 
		 />