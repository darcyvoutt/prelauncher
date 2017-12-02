// with jQuery
function facebook_scrape(pop_up) {

  // Optional Parameter
  pop_up = pop_up || null;

  // Submit URL to Faceook
	$.post(
    '//graph.facebook.com',
    {
      id: $('meta[property="og:url"]').attr('content'),
      scrape: true
    },
    function(response) {            
    	console.log(response);      
    }
	);

  // Alert Message if pop_up set
  if ( pop_up !== null ) {
    alert('Submitted to Facebook to update sharing.');
  }
}