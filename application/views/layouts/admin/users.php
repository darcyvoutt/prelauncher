<?php 
  $page['show_nav'] = true;
  $page['body_class'] = 'admin';
  $page['page_title'] = 'Admins';
  $this->load->view('header', $page); 
?>

  <div class="row">      

    <div class="small-12 column">
      <h2>Admins</h2>    
      <p>Add, remove or reset passwords for your fellow admins.</p> 
    </div> 
  
    <div class="small-12 column">

      <?php alert('admins'); ?>    

      <table>

        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Delete</th>
        </tr>        

        <?php foreach ($admins as $admin) : ?>

          <tr>
            <td><?php echo $admin['id'] ?></td>
            <td><?php echo $admin['username'] ?></td>
            <td><?php echo $admin['email'] ?></td>
            <td>
              <a href="<?php echo site_url('admin/reset_password/'.$admin['id']); ?>"
                 onclick="return confirm('Sure you want to reset this password?');">
                Reset Email
              </a>
            </td>
            <td>
              <a href="<?php echo site_url('admin/delete_user/'.$admin['id']); ?>"
                 onclick="return confirm('Sure you want to delete this user?');">
                Delete
              </a>           
            </td>
          </tr>

        <?php endforeach; ?>

      </table>
      
    </div>     

    <div class="spacer medium-12 column"></div>

    <!-- Add Users -->

    <div class="small-12 column">
      <h2>Add Admin</h2>    
      <p>New admins will receive their password via email.</p>
    </div> 
    
    <div class="small-12 column">
      <?php echo form_open('admin/add_user'); ?>

        <div class="row no-padding">
          <div class="medium-5 column">
            <?php 
              $this->template->widget('inputs/text', 
              array(
                'label' =>  'Username', 
                'type'  =>  'text', 
                'name'  =>  'username',
                'class' =>  null,
                'value' =>  null
                )
              ); 
            ?>
          </div>
          <div class="medium-5 column">
            <?php 
              $this->template->widget('inputs/text', 
              array(
                'label' =>  'Email', 
                'type'  =>  'email', 
                'name'  =>  'email',
                'class' =>  null,
                'value' =>  null
                )
              ); 
            ?> 
          </div>
          <div class="medium-2 column">
            <?php echo form_submit(null, 'Add User', array('class' => 'btn btn-right label-space')) ?>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>

  </div>

<?php $this->load->view('footer'); ?>