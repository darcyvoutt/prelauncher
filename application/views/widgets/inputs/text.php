<div id="<?php echo $name . "_container"; ?>"
		 class="<?php echo (!empty($class)) ? $class."_container" : ''; ?>">	
	<?php 
		echo form_label( clean_label($label), convert_label($label), array('class'=>'show') );

		$config = array(
			'name'        => $name,
	    'id'          => convert_label($name),
	    'value'       => $value,
	    'placeholder' => clean_label($label),
	    'class'				=> (!empty($class)) ? $class : '',
	    'type'				=> (isset($type)) ? $type : 'text'
		);

		echo form_input($config); 
	?>
</div>			