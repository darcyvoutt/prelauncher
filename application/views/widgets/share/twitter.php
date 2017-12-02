<!-- Twitter Share Button -->
<a class="twitter-share-button" data-url="<?php echo $url; ?>" data-count="none"
   data-text="<?php echo setting('twitter_message', true); ?>" data-via="<?php echo setting('twitter_handle', true); ?>"
   <?php echo (!empty(setting('twitter_hashtags', true))) ? 'data-hashtags="'.setting('twitter_hashtags', true).'"' : ''; ?>>
    Tweet
</a> 

<!-- Twitter Script -->
<script>
  window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>