<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template {  

  /**
    * Templating System:
    *
    * @author Darcy Voutt
    * @version 1.0
    *
    * Purpose of the system is load template views and widget views as needed.
    * The library is lightweight and ignorant of page / widget structures.
    * It's simply used for easy loading, used $this->template->{function_name}.
    * 
    * The widgets are to be coded as such they require an array of data and
    * converts that data into the structure needed for the UI element. 
    * For instance, converts array to proper structure and json encodes for 
    * a jQuery graphing plugin or builds an HTML table.
    *
  */

  public function layout($name, $data = null) {   
    $CI =& get_instance();
    $CI->load->view('layouts/'.$name, $data);
  }

  public function widget($name, $data = null) {  
    $CI =& get_instance();
    $CI->load->view('widgets/'.$name, $data);
  }
}