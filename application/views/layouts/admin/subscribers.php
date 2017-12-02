<?php 
  $page['show_nav'] = true;
  $page['body_class'] = 'admin';
  $page['page_title'] = 'Subscribers';
  $this->load->view('header', $page); 
?>

  <div class="row">      

    <?php alert(); ?>

    <div class="small-12 column">
    
      <h2>Your Subscribers</h2>
      <a href="<?php echo site_url('admin/export'); ?>" class="btn is-topright hide-for-small-only">Export</a>

    </div>

    <div class="small-12 column">      

      <p>The following is a sample of the recent subscribers (max of 50).</p>

      <table>

        <tr>
          <th class="is-center hide-for-small-only">ID</th>
          <th>Email</th>
          <th>Friends Referred</th>
          <th class="hide-for-small-only">Referred By</th>
          <th class="hide-for-small-only">Signed Up</th>
        </tr>        

        <?php foreach ($subscribers as $subscriber) : ?>

          <tr>
            <td class="is-center hide-for-small-only"><?php echo $subscriber->id; ?></td>
            <td><?php echo $subscriber->email; ?></td>
            <td><strong><?php echo $subscriber->count; ?> friends</strong></td>
            <td class="hide-for-small-only"><?php echo $subscriber->referrer; ?></td>
            <td class="hide-for-small-only"><?php echo date('M j, Y', strtotime($subscriber->created_date)); ?></td>
          </tr>

        <?php endforeach; ?>

      </table>
      
    </div>

  </div>

<?php $this->load->view('footer'); ?>