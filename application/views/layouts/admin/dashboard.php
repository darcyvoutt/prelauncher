<?php 
  $page['show_nav'] = true;
  $page['body_class'] = 'admin';
  $page['page_title'] = 'Dashboard';  
  $this->load->view('header', $page);   
?>

  <div class="row">

    <div class="small-12 column">
      
      <h2>Top 10 Subscribers</h2>
      <p>This is a list of the subscribers who have referred the most friends.</p>      

    </div>      
    
    <div class="medium-8 column">      

      <table>
        <tr>
          <th class="is-center hide-for-small-only">#</th>
          <th>Email</th>
          <th>Referred</th>
          <th class="hide-for-small-only">Signed Up</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($top_performers as $value) : ?>
          <tr>
            <td class="is-center hide-for-small-only"><?php echo $i; ?></td>
            <td><?php echo $value->email; ?></td>
            <td><strong><?php echo number_format($value->count); ?> friends</strong></td>
            <td class="hide-for-small-only"><?php echo date('M j, Y', strtotime($value->created_date)); ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </table>      
    </div>

    <div class="medium-4 column">      

      <div class="panel less-padding">
        <h3 class="panel-title">Subscribers</h3>
        <p class="panel-data"></p>
        <div class="row">
          <div class="small-4 column">
            <ul class="no-bullet">
              <li class="campaign-label">Total</li>
              <li class="campaign-label">Verified</li>
            </ul>
          </div>
          <div class="small-8 column">
            <ul class="no-bullet">
              <li class="campaign-date"><?php echo number_format($count); ?></li>
              <li class="campaign-date">
                <?php echo number_format($count_verified); ?> 
                <em>(<?php echo number_format($percent_verified); ?>%)</em>
              </li>
            </ul>
          </div>
        </div>
      </div>      

      <div class="panel less-padding">
        <h3 class="panel-title">Campaign</h3>
        <div class="row">
          <div class="small-4 column">
            <ul class="no-bullet">
              <li class="campaign-label"><strong>Start</strong></li>
              <li class="campaign-label"><strong>End</strong></li>
            </ul>            
          </div>
          <div class="small-8 column">
            <ul class="no-bullet">
              <li class="campaign-date"><?php echo date('M j, Y', get_date('start')); ?></li>
              <li class="campaign-date"><?php echo date('M j, Y', get_date('end')); ?></li>
            </ul>            
          </div>
        </div>
      </div>

    </div>
    
  </div>

<?php $this->load->view('footer'); ?>