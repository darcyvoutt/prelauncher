<!doctype html>
<!--[if IE 8]><html lang="en" class="ie ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie ie9 no-js"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo setting('site_desc', true) ?>" />  
    <meta name="author" content="<?php echo setting('site_author', true) ?>" />
    <meta name="robots" content="<?php echo siteFollow( setting('site_follow') ); ?>">
    <?php 
      $meta['page_url'] = isset($page_url) ? $page_url : site_url();
      $this->template->widget('share/meta', $meta); 
    ?>

    <title>
      <?php echo isset($page_title) ? $page_title . ' | ' . setting('site_name') : setting('site_name'); ?>
    </title>

    <link rel="icon" type="image/png" href="<?php echo base_url(setting('site_favicon')); ?>">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">  
    <?php 
      if (isset($custom_colors)) {         
        $colors['brand_color'] = setting('site_color');
        $colors['text_color'] = setting('site_text_color');
        brand_color($colors); 
      } 
    ?>

    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- jQuery Libraries -->
    <script src="<?php echo base_url('assets/js/lib/vendor/jquery.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/lib/vendor/jquery-ui.min.js') ?>"></script> 
    <script src="<?php echo base_url('assets/js/lib/vendor/modernizr.js');?>"></script>        
    <?php if (isset($header_js)) { required_js($header_js); } ?>

  </head>
  
  <body <?php 
          isset($body_class) ? bodyClasses($body_class) : '';
          if (isset($show_background)) { background_image(); }
        ?>
        > 

    <?php 
      if ( null !== setting('tracking_type') && setting('tracking_type') === 'tracking_gtm' ) { 
        $this->template->widget('tracking/gtm', array('code' => setting('tracking_gtm'))); 
      } 
    ?>

    <?php if (isset($show_nav)) : ?>    

      <div id="header">

        <?php $this->template->widget('nav'); ?>

      </div>

    <?php endif; ?>    
    
    <?php if (!isset($hide_wrap)): ?>
      <section id="content">
    <?php endif ?>    