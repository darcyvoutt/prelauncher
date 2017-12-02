////////////////////////////////////////////////////////
// On Selection of tabs, update with hash
////////////////////////////////////////////////////////

$('.tab-title').on('click', function() {
  $('.tab-selected').val(window.location.hash);
});


////////////////////////////////////////////////////////
// Color Picker
////////////////////////////////////////////////////////

$(".colorpicker").colorPicker({ 
  opacity: true,
  preventFocus: false
});


////////////////////////////////////////////////////////
// Reset to Original Color
////////////////////////////////////////////////////////

$('.reset-color').on('click', function() {  
  var color = $(this).data('color');
  var div = $(this).data('update'); 
  $( div ).val( color ).focus();
});


////////////////////////////////////////////////////////
// Datepicker
////////////////////////////////////////////////////////

$(function() {
  $(".datepicker").datepicker({dateFormat: "MM d, yy"});
});


////////////////////////////////////////////////////////
// Reveal Selects
////////////////////////////////////////////////////////

var revealSelected = function (select, elements) {
	// Hide class
	var hide_class = 'hidden_for-' + select.replace('#','');	

	// Update Function
  var update = function () {
  	// Hide All Before Reveal
  	$('.'+hide_class).addClass('hide');

  	// Find & Reveal
  	var selected = $('#tracking_type').find(':selected').val();
  	var id = '#' + selected + '_container';  	
  	$(id).removeClass('hide');		
  };  

  // Run on Load
  $(function () {     
  	// Hide Divs
		$.each(elements, function(index, value) { $(value).addClass(hide_class); }); 	

  	// Update on Change
    $(select).on('change', function () { update(); }).trigger('change');
  });  
};

revealSelected('#tracking_type', ['#tracking_gtm_container', '#tracking_ga_container']);


////////////////////////////////////////////////////////
// Calculate Rewards Count
////////////////////////////////////////////////////////

var rewardCount = function (select, input) {
  
  // Update Function
  var update = function () {
    
    var count = 0;
    var selects = $('.reward_count');
    selects.each(function(){

      var selected = $(this).find(':selected').val();
      if (selected === "true") {
        count += 1;
      }

    });

    $(input).val( count );

  };  

  // Run on Load
  $(function () {     
    
    // Update on Change
    $(select).on('change', function () { 
      update(); 
    }).trigger('change');

  });  
};

rewardCount('.reward_count', 'input[name=rewards_count]');


////////////////////////////////////////////////////////
// Show Images
////////////////////////////////////////////////////////

function showImage(custom, position, size, revealClass) {

  // Variables
  var select = $('select' + revealClass);  
  var revealImage = $('img' + revealClass);
  var site = "//" + document.domain + "/";

  // Containers
  var backCustom = $(custom);
  var backPos = $(position);
  var backSize = $(size);       

  // Remove Hide Class if Custom is Selected
  if ( select.find(':selected').val() == 'custom' ) {
    backCustom.removeClass('hide');
  }

  select.on('change', function() {

    // This Image
    var image = $(this).find(':selected').val(); 
    
    // Logic
    if (image && image !== "custom") {    
      
      // Reveal
      revealImage.attr('src', site+image);
      backSize.removeClass('hide');
      backPos.removeClass('hide'); 
      
      // Hide
      backCustom.addClass('hide');   

    } else if (image == "custom") {
      
      // Reveal
      revealImage.attr('src', revealImage.data('custom'));
      backCustom.removeClass('hide');
      backSize.removeClass('hide');
      backPos.removeClass('hide'); 

    } else {

      // Hide
      revealImage.attr('src', revealImage.data('none'));
      backCustom.addClass('hide');   
      backSize.addClass('hide');
      backPos.addClass('hide');              

    }
  });
} 

showImage('#site_background_custom_container', '#site_background_position_container', '#site_background_size_container', '.reveal-image-home');
showImage('#reward_background_custom_container', '#reward_background_position_container', '#reward_background_size_container', '.reveal-image-rewards');