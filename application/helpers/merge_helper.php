<?php
/////////////////////////////////////////////
// Get String Between Function
/////////////////////////////////////////////

function get_string_between($string, $start, $end){
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return '';
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return substr($string, $ini, $len);
}


/////////////////////////////////////////////
// Site Variables
/////////////////////////////////////////////

function merge_site_vars($merge) {

  // List of Values
  switch ($merge) {
    case 'site_name':
      $result = setting('site_name');
      break;

    case 'start_date':
      $result = setting('start_date');
      break;

    case 'end_date':
      $result = setting('end_date');
      break;

    case 'end_link':
      $result = setting('end_link');
      break;

    case 'time_left':
      $result = (timeleft() > 1) ? timeleft().' days' : timeleft().' day';
      break;

    case 'site_logo':
      $result = base_url(setting('site_logo'));
      break;

    case 'site_color':
      $result = setting('site_color');
      break;
    
    default:
      $result = '[Error: Not supported]';
      break;
  }  

  return $result;
}


/////////////////////////////////////////////
// YouTube Embed Options
/////////////////////////////////////////////

function youtube_url($id, $autoplay = true) {

  // Check for empty ID
  if (empty($id)) {
    return "Missing ID";
  }

	// YouTube Parameters
	$options = array( 				
			'modestbranding' 	=>	0, 					
			'autoplay'				=> 	($autoplay == true) ? 1 : 0,
			'controls'				=> 	1, 					
			'showinfo'				=>	0,
			'rel'							=>	0
		);

	$count = count($options);
	$int = 1;

	// Build URIs
	foreach ($options as $option => $val) { 				
		$uri .=	$option .'=' . $val;
		if ($int !== $count) { $uri .= '&'; }
		$int++;
	}

	return '//www.youtube.com/embed/'.$id."?".$uri."?origin=".site_url();
}


/////////////////////////////////////////////
// Build Resposive Video
/////////////////////////////////////////////

function embed_media($type, $value) {
  switch ($type) {
 		case 'youtube':
			$result = '<div class="responsive-iframe">';
      $result .= '<iframe src="'. youtube_url($value, false) .'" frameborder="0" allowfullscreen></iframe>';
      $result .= "</div>";
      break;

    case 'youtube_autoplay':
			$result = '<div class="responsive-iframe">';
      $result .= '<iframe src="'. youtube_url($value, true) .'" frameborder="0" allowfullscreen></iframe>';
      $result .= "</div>";
      break;

    case 'iframe':
			$result = '<div class="responsive-iframe">';
      $result .= '<iframe src="'. $value .'" frameborder="0" allowfullscreen></iframe>';
      $result .= "</div>";
      break;
    
    default:
      $result = '[Error: Type not supported]';
      break;
  }

  return $result;

}


/////////////////////////////////////////////
// Replace Text w/ Merge Value
/////////////////////////////////////////////

function merge_text($string) {
  
  $merge = get_string_between($string, "{{", "}}");
  $deliminator = "::";
    
  // Check for Video
  if (strpos($merge, $deliminator) === false) {        

  	// Merge Values
    $replace = merge_site_vars($merge);     
    echo str_replace('{{'.$merge.'}}', $replace, $string);  

  } else {    

  	// Embed Media
    $embed = explode($deliminator, $merge);
    $replace = embed_media($embed[0], $embed[1]);
    echo str_replace('{{'.$merge.'}}', $replace, $string);  

  }
}