<?php
  $page['body_class'] = 'home';
  $page['custom_colors'] = true;
  $page['show_background'] = true;
  $this->load->view('header', $page);

  $column = 'small-10 medium-6 large-5 small-centered medium-centered large-centered column'
?>

  <div class="row">

    <div class="<?php echo $column; ?>">
      <a href="<?php echo site_url(); ?>">
        
        <img src="<?php echo get_image_default(setting('site_logo'), get_image('logo')); ?>" 
             alt="<?php echo setting('site_name'); ?>" 
             class="logo-icon" />

      </a>
    </div>

  </div>

  <div class="row">

    <div class="<?php echo $column; ?>">

      <div class="home-statement">
        <?php echo setting('home_message', true); ?>
      </div>

      <p class="home-timeleft">
        <?php
          if (timeleft() > 0) {
            if (timeleft() > 1) {
              echo "Only <strong>" . timeleft() . ' days left</strong>';
            } else {
              echo "Only <strong>" . timeleft() . ' day left</strong>';
            }
          } else {
            echo "<strong>Last Day, Signup Now!</strong>";
          }
        ?>
      </p>

      <?php alert(); ?>

      <?php echo form_open('subscribe', array('id' => 'subscription')); ?>

        <input type="hidden" name="badbot" />

        <?php if (!empty($session[URI_PARAM])) : ?>

          <input type="hidden" name="<?php echo URI_PARAM; ?>" value="<?php echo $session[URI_PARAM]; ?>" />
          
        <?php endif; ?>

        <div class="formRow">

          <div class="formRow-input">
            <label for="email">Enter email</label>
            <input type="email" name="email" id="email" placeholder="Enter email" />
          </div>

          <div class="formRow-submit">
            <input type="submit" class="btn" value="Step Inside" />
          </div>

        </div>

      <?php echo form_close(); ?>

      <p class="home-disclaimer"><?php echo setting('home_disclaimer', true); ?></p>

    </div>

  </div>

<?php $this->load->view('footer'); ?>