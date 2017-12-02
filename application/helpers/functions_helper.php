<?php
// Debugger
function debug($data) {
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}


// Robots
function siteFollow ($follow) {
	if ($follow == TRUE) {
		$robots = 'INDEX, FOLLOW';
	} else {
		$robots = 'NOINDEX, NOFOLLOW';
	}
	return $robots;
}


// Environment Check
function environment($enviroment) {
	if ($enviroment == 'production') {
		return true;
	} else {
		return false;
	}
}


// Active Page (Nav)
function active_page($string) {
	if (uri_string() == $string) {
		echo 'class="active"';
	}
}


// Body Class
function bodyClasses($page) {
	echo isset($page) ? 'class="'.$page.'"' : '';
}


// Cleanup
function clean_label($string) {
	return ucwords(str_replace("_", " ", $string));
}

function convert_label($string) {
	$cleaned = rtrim(preg_replace("/[^A-Za-z0-9 ]/", '_', str_replace(" ", "_", $string)), "_");
	return strtolower($cleaned);
}


// Is Selected
function selected_option($option, $value) {
	echo ($option === $value) ? 'selected' : '';
}


// Required Scripts - Used in Footer
function required_js($required_js) {
	if (is_array($required_js)) {
		foreach ($required_js as $file) {
			$url = base_url('assets/js/'. $file .'.js');
			echo '<!-- Required Scripts -->';
			echo '<script src="'. $url .'"></script>';
		}
	} else {
		echo '<script>console.log("Error: Send $required_js variable as array to load in footer.");</script>';
	}
}


// Social Images
function get_image($channel, $num = 1) {

	$asset = base_url('assets/img');

  // Search by Channel
	switch ($channel) {
		case 'facebook':
		if (!empty(setting('facebook_image'))) {
			return base_url(setting('facebook_image'));
		} else {
			return $asset . '/share/share-facebook-600x600.jpg';
		}      
		break;

		case 'twitter':
		if (!empty(setting('twitter_image'))) {
			return base_url(setting('twitter_image'));
		} else {
			return $asset . '/share/share-twitter-480x250.jpg';
		}            
		break;

		case 'reward':
		return $asset . '/rewards/step_'.$num.'.png';
		break;

		case 'email_logo':
		return $asset . '/email-logo.png';
		break;

		case 'reward_hero':
		return $asset . '/hero.png';
		break;

		case 'logo':
		return $asset . '/logo.png';
		break;

		case 'favicon':
		return $asset . '/favicon.png';
		break;

		default:
		return $asset . '/broken.jpg';
		break;
	}  
}


// Image Check & Default
function get_image_default($setting, $default) {
	if ( !empty($setting) ) { return base_url($setting); } 
	else { return $default; }
}


// Get Image Size
function get_image_dimensions($type) {

  // Determine Size
	switch ($type) {
		case 'facebook':
		$image['max_width']   = '600';
		$image['max_height']  = '600'; 
		break;

		default:
		$image['max_width']   = '480';
		$image['max_height']  = '250'; 
		break;
	} 

  // Return
	return $image;
}


// Get Image
function background_color($color) {  
	return "background-color: ".$color.";";
}

// Get Image
function background_image_url($image, $custom) {  
	if (!empty($image) && $image !== 'custom') {
		$url = base_url($image);
		return "background-image: url('". $url ."'); ";
	} else if ($image == 'custom') {
		$url = base_url($custom);
		return "background-image: url('". $url ."'); ";
	} else {
		return 'background-image: none;';
	} 
}


// Background Position
function background_position($position = null) {
	if (isset($position)) {
		$output = 'background-position: '.$position.'; ';
	} else {
		$output ='';
	}
	return $output;
}


// Background Size
function background_size($size = null) {
	if (isset($size) && $size == 'cover') {
		$output = 'background-size: '.$size.'; background-attachment: fixed; ';
	} else if (isset($size)) {
		$output = 'background-size: '.$size.'; ';
	} else {
		$output ='';
	}
	return $output;
}


// Background Image
function background_image($prefix = 'site') {
	$background_image  = 'style="';
	$background_image .= background_color(setting($prefix . '_background_color')); 
	$background_image .= background_image_url(setting($prefix . '_background'), setting($prefix . '_background_custom')); 
	$background_image .= background_position(setting($prefix . '_background_position'));
	$background_image .= background_size(setting($prefix . '_background_size'));
	$background_image .= '"';          
	echo $background_image;
}


// Darken Color
function colorDarken($color, $dif=20) {
	$color = str_replace('#','', $color);
	$rgb = '';

	if (strlen($color) != 6) {
  	// reduce the default amount a little
		$dif = ($dif==20)?$dif/10:$dif;

		for ($x = 0; $x < 3; $x++) {
			$c = hexdec(substr($color,(1*$x),1)) - $dif;
			$c = ($c < 0) ? 0 : dechex($c);
			$rgb .= $c;
		}

	} else {

		for ($x = 0; $x < 3; $x++) {
			$c = hexdec(substr($color, (2*$x),2)) - $dif;
			$c = ($c < 0) ? 0 : dechex($c);
			$rgb .= (strlen($c) < 2) ? '0'.$c : $c;
		}
	}
	return '#'.$rgb;
}