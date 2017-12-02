<?php 
  $page['show_nav'] = true;
  $page['body_class'] = 'admin settings';
  $page['page_title'] = 'Settings';  
  $page['header_js'] = array('facebook');  
  $this->load->view('header', $page);   
?>

<div class="row">
	<div class="medium-centered medium-12 column">

		<h2>Settings</h2>
		<p>Edit your Prelauncher from the social media sharing, design to email settings.</p>

		<?php alert('settings'); ?>
		<?php alert('settings_upload_error'); ?>

		<ul class="tabs no-indent" data-tab data-options="deep_linking:true; scroll_to_content: false">
		  
		  <li class="tab-title active"><a href="#social">Sharing</a></li>		  
		  <li class="tab-title"><a href="#reward">Rewards</a></li>	
		  <li class="tab-title"><a href="#design">Design</a></li>		    	  
		  <li class="tab-title"><a href="#copy">Copy</a></li>		    	  
		  <li class="tab-title"><a href="#setup">Setup</a></li>		  
		  <li class="tab-title"><a href="#email">Email</a></li>		  		  
		  <li class="tab-title"><a href="#info">Info</a></li>		  		  

		</ul>

		<div class="tabs-content">			

		  <div class="content active" id="social">
		    <?php $this->template->layout('settings/social'); ?>		    
		  </div>		 		 

			<div class="content" id="reward">
		    <?php $this->template->layout('settings/rewards'); ?>		    
		  </div>

		  <div class="content" id="design">
		    <?php $this->template->layout('settings/design'); ?>		    
		  </div>		 

		  <div class="content" id="copy">
		    <?php $this->template->layout('settings/copy'); ?>		    
		  </div>		 

			<div class="content" id="setup">
		    <?php $this->template->layout('settings/setup'); ?>		    
		  </div>			

		  <div class="content" id="email">
		    <?php $this->template->layout('settings/email'); ?>		    
		  </div>

		  <div class="content" id="info">
		    <?php $this->template->layout('settings/info'); ?>		    
		  </div>		  

		</div>		

	</div>
</div>

<?php 
	$footer['required_js'] = array('lib/vendor/jqColorPicker.min','settings');
	$this->load->view('footer', $footer); 
?>