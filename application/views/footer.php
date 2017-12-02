    <?php if (!isset($hide_wrap)): ?>
      </section>
    <?php endif ?>    

    <footer id="footer">
      <div class="row">
        <div class="small-12">
          <p>
            Copyright &copy; <?php echo date("Y")." ".setting('site_name'); ?>. All rights reserved. | 
            <a href="<?php echo site_url('admin'); ?>">Admin</a>
          </p>
        </div>        
      </div>
    </footer>

    <script src="<?php echo base_url('assets/js/lib/foundation.min.js'); ?>"></script>    

    <?php 
      // Javascript Asset -- Must send as array
      if (isset($required_js)) { required_js($required_js); }
    ?>
    
    <!-- Custom Script -->
    <script src="<?php echo base_url('assets/js/scripts.js') ?>"></script> 

    <?php   
      // Google Analytics
      if ( null !== setting('tracking_type') && setting('tracking_type') === 'tracking_ga' ) { 
        $this->template->widget('tracking/ga', array('code' => setting('tracking_ga'))); 
      } 
    ?>

  </body>
</html>