<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    
    <title>You've got friends | <?php echo setting('site_name'); ?></title>

  </head>
  <body bgcolor="#F5F5F5" style="-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; color: #414141; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; line-height: 24px; font-weight: 300; font-size: 16px; margin: 0; padding: 0;">

<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="width: 100%; padding: 2%;"><tr><td></td>
    <td class="container" style="max-width: 600px !important; display: block !important; clear: both !important; margin: 0 auto;">

      <!-- content -->
      <div class="content" style="max-width: 600px; display: block; margin: 0 auto;">
       
        <table style="width: 100%;"><tr><td bgcolor="#FFFFFF" style="padding: 60px 5% 30px; border: 1px solid #f0f0f0;">

              <img src="<?php echo get_image_default(setting('email_logo'), get_image('email_logo')); ?>" 
                   style="max-width: 100%; display: block; margin: auto;" 
                   alt="<?php echo setting('site_name'); ?>" />

              <h1 style="font-weight: 200; color: #414141; font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.2; color: #000000; font-size: 28px; text-align: center !important; margin: 20px 0 40px;" align="center !important">
                One of your friends <br /> has signed up!
              </h1>
              
              <p style="margin-bottom: 10px; color: #414141; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; line-height: 24px; font-weight: 300; font-size: 16px; text-align: center !important;" align="center !important">
                Congrats, you are one step closer to your next reward. <br />
                You have a total of <?php echo $message['reward_count']; ?> referrals.
              </p>
              
              <h2 style="color: #414141; font-family: HelveticaNeue-CondensedBold, 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-weight: 700; line-height: 1.2; color: #000000; font-size: 28px; text-align: center !important; margin: 40px 0 0;" align="center !important">
                <?php echo $message['reward_points']; ?> referrals
              </h2>
              
              <p style="margin-bottom: 10px; color: #414141; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; line-height: 24px; font-weight: 300; font-size: 16px; text-align: center !important;" align="center !important">
                <em><span style="font-size: 14px;">
                  till you recieve
                </span></em>
              </p>              

              <img src="<?php echo base_url('assets/img/rewards/'.$message['reward_image']); ?>" alt="<?php echo $message['reward_title']; ?>" style="max-width: 100%; display: block; margin: auto; padding: 10px 0;" />
              <p style="margin-bottom: 10px; color: #414141; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; line-height: 24px; font-weight: 300; font-size: 16px; text-align: center !important;" align="center !important">
                <?php echo $message['reward_title']; ?>
              </p>
                  
            </td>
          </tr><tr><td bgcolor="#414141" style="color: #F5F5F5; padding: 40px;">

              <p style="margin-bottom: 10px; color: #FFFFFF; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; line-height: 24px; font-weight: 300; font-size: 16px; text-align: center !important;" align="center !important">
                Share your custom link to earn more!
              </p>

              <p style="margin-bottom: 10px; color: #414141; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; line-height: 24px; font-weight: 300; font-size: 16px; text-align: center !important;" align="center !important">
                <a href="<?php echo $message['share_url']; ?>" style="display: block; color: #2BD4A7; text-decoration: none; font-weight: 400; text-align: center !important; margin: auto;">
                  <?php echo $message['share_url']; ?>
                </a>
              </p>

            </td>
          </tr></table></div>
      <!-- /content -->
      
    </td>
    <td></td>
  </tr></table><!-- /body --></body>
</html>
