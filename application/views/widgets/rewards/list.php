<p id="rewards-count"><strong><?php echo $subscriber_count; ?> friends</strong> have joined so far.</p>

<ul id="rewards-list">
  
  <!-- Friend Level -->
  <li id="rewards-info" <?php rewardWidth($reward_count); ?>>
    
    <h3><?php echo setting('reward_friends_title', true); ?></h3>
    <p><?php echo setting('reward_friends_subline', true); ?></p>

  </li>
  
  <!-- Reward 1 -->
  <?php 
    $this->template->widget('rewards/level', 
    array(
      'reward_num'        =>  1,
      'reward_count'      =>  $reward_count,
      'subscriber_count'  =>  $subscriber_count,
    )); 
  ?>

  <!-- Reward 2 -->
  <?php 
    $this->template->widget('rewards/level', 
    array(
      'reward_num'        =>  2,
      'reward_count'      =>  $reward_count,
      'subscriber_count'  =>  $subscriber_count,
    )); 
  ?>

  <!-- Reward 3 -->
  <?php 
    $this->template->widget('rewards/level', 
    array(
      'reward_num'        =>  3,
      'reward_count'      =>  $reward_count,
      'subscriber_count'  =>  $subscriber_count,
    )); 
  ?>

  <!-- Reward 4 -->
  <?php 
    $this->template->widget('rewards/level', 
    array(
      'reward_num'        =>  4,
      'reward_count'      =>  $reward_count,
      'subscriber_count'  =>  $subscriber_count,
    )); 
  ?>

  <!-- Reward 5 -->
  <?php 
    $this->template->widget('rewards/level', 
    array(
      'reward_num'        =>  5,
      'reward_count'      =>  $reward_count,
      'subscriber_count'  =>  $subscriber_count,
    )); 
  ?>

</ul>