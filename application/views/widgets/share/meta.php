<!-- Facebook - Open Graph data -->
<meta property="og:type" content="website" />
<meta property="og:site_name" content="<?php echo setting('site_name'); ?>" />
<meta property="og:title" content="<?php echo setting('facebook_title', true); ?>" />
<meta property="og:description" content="<?php echo setting('facebook_desc', true); ?>" /> 
<meta property="og:url" content="<?php echo $page_url; ?>" />
<meta property="og:image" content="<?php echo get_image('facebook'); ?>" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="<?php echo FB_IMAGE_WIDTH; ?>" />
<meta property="og:image:height" content="<?php echo FB_IMAGE_HEIGHT; ?>" />

<!-- Twitter - Card Data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo setting('twitter_handle', true); ?>">
<meta name="twitter:title" content="<?php echo setting('site_name'); ?>">
<meta name="twitter:description" content="<?php echo setting('site_desc', true); ?>">
<meta name="twitter:creator" content="<?php echo setting('twitter_handle', true); ?>">
<meta name="twitter:image" content="<?php echo get_image('twitter'); ?>">