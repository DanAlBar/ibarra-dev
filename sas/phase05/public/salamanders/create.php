<?php

require_once('../../private/initialize.php');

// handle POST
if (is_post_request()) {

  // Handle form values sent by new.php

  $salamander = [];
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  // Calling insert_salamander function and sending values
  $new_salamander = insert_salamander($salamander);
  if($new_salamander === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(urlFor('/salamanders/show.php?id=' . $new_id));
  } else {
    $errors = $new_salamander;
  }

} else {
  redirect_to(urlFor('/salamanders/new.php'));
}
