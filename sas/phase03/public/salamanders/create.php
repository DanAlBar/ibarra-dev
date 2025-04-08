<?php

require_once('../../private/initialize.php');

// handle POST
if (is_post_request()) {
  $salamander_name = $_POST['salamander_name'] ?? '';
  redirect_to(urlFor('/salamanders/index.php'));
} else {
  redirect_to(urlFor('/salamanders/new.php'));
}
