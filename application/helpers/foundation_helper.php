<?php
function foundation($files) {

  // Loads all modules minified
  if ( in_array('all', $files) ) :

    $load = '<!-- Foundation -->'."\n";    
    $load .= '<script src="'.base_url("assets/js/lib/foundation.min.js").'"></script>'."\n";
    return $load;

  // Load individual modules
  else :  

    
    $load = '<!-- Foundation -->'."\n";     
    $load .= '<script src="'.base_url("assets/js/lib/foundation/foundation.js").'"></script>'."\n";    

    foreach ($files as $file) {
      $url = base_url('assets/js/lib/foundation/foundation.'.$file);
      $load .= '<script src="'.$url.'"></script>';
    }

    return $load;

  endif; 
}