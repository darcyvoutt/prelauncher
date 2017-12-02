<?php
// Rewards
function currentStep($number, $count) {
  if ( setting('reward_'.$number) <= $count ) {
    echo 'is-current';
  }  
}

function nextLevel($count) {

  $nextLevel = 1; 

  for ($i = 1; $i <= setting('rewards_count'); $i++) { 
    if ( setting('reward_'.$i) <= $count ) {
        $nextLevel = $i + 1;
    }
  }
  
  return $nextLevel;
}

function rewardWidth($count) {
  $calc = 100 / ($count + 1);
  $string = 'style="width:' . $calc . '%;"';
  echo $string;
}

function progress_meter($count, $rewards, $levels) {
  
  # Find level in array
  $level = 1;
  foreach ($levels as $key => $value) {
    if ($count >= $value) {
      $level = $key + 2; // 2 = 1 for info step, 1 for first array key is 0
    }
  }

  $column = (100 / ($rewards + 1));  // +1 for the start position
  $position = $column * $level;  
  $percent = $position . '%';
  echo $percent; 
}


// Time
function get_date($option) {
  if ($option == 'start') { $date = strtotime(setting('start_date')); } 
  if ($option == 'end') { $date = strtotime(setting('end_date')) + (60 * 60 * 24); } 
  return $date;
}

function timeleft() {
  $convert = 60 * 60 * 24; // seconds in a day
  $time_remain = ( strtotime(setting('end_date')) - time() ) / $convert;
  $days_left = abs(ceil($time_remain));
  return $days_left;
}

function timeleft_int() {
  $convert = 60 * 60 * 24; // seconds in a day
  $time_remain = ( strtotime(setting('end_date')) - time() ) / $convert;
  $days_left = ceil($time_remain);
  return $days_left;
}

function start_date() {
  return date('l, M j, Y', strtotime( setting('start_date') ));
}


// Reward Image
function get_reward_image($number) {
  if ( !empty(setting('reward_image_'.$number)) ) {
    $image = setting('reward_image_'.$number);
  } else {
    $image = base_url('assets/img/rewards/step_'.$number.'.png');
  }
  return $image;
}
