<nav id="nav" class="top-bar" data-topbar role="navigation">
  
    <ul class="title-area">
      <li class="name">
        <h1><a href="<?php echo site_url('admin'); ?>"><?php echo setting('site_name'); ?></a></h1>
      </li>
       
       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>


    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li <?php active_page('admin') ?>>
          <a href="<?php echo site_url('admin'); ?>">Dashboard</a>
        </li>        

        <li <?php active_page('admin/subscribers') ?>>
          <a href="<?php echo site_url('admin/subscribers'); ?>">Subscribers</a>
        </li>      

        <li <?php active_page('settings') ?>>
          <a href="<?php echo site_url('settings'); ?>">Settings</a>
        </li>    

        <li <?php active_page('admin/users') ?>>
          <a href="<?php echo site_url('admin/users'); ?>">Users</a>
        </li>          
            
        <li <?php active_page('admin/profile') ?>>
          <a href="<?php echo site_url('admin/profile'); ?>">Profile</a>
        </li>            
        
        <li>
          <a href="<?php echo site_url('logout'); ?>">Logout</a>
        </li>      
      </ul>

    </section>

</nav>