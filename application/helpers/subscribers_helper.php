<?php
// Unique ID for Subscribers
function createID($email) {
  $email = explode("@", $email);
  $hash = md5($email[0] . "_" . time());
  return substr($hash, rand(1,9), 10);
}


// Referral URL
function referral_url($id) {
  $url = site_url().'?'.URI_PARAM.'='.$id;
  return $url;
}