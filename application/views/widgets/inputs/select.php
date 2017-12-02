<div id="<?php echo $name . "_container"; ?>"
		 class="<?php echo (!empty($class)) ? $class."_container" : ''; ?>">	
<?php 
	echo form_label( clean_label($label), convert_label($label), array('class'=>'show') );

	$config = array(
    'id'      => convert_label($label),
    'class'		=> (!empty($class)) ? $class : '',
	);

	echo form_dropdown($name, $options, $value, $config); 
?>
</div>