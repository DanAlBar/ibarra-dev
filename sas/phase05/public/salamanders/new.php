<?php 
require_once('../../private/initialize.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$salamander = [];
$salamander['name'] = '';
$salamander['habitat'] = '';
$salamander['description'] = '';

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
  //display the blank form
}

// include the shared path to the header
include(SHARED_PATH . '/salamander-header.php');

?>

<head>
  <meta charset="UTF-8">
  <title>New Salamander</title>
  <link rel="stylesheet" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>">
</head>

<h1>Create a Salamander</h1>

<?php echo display_errors($errors); ?>

<form action="<?php echo urlFor('/salamanders/new.php'); ?>" method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo h($salamander['name']); ?>"><br><br>
  <label for="habitat">Habitat:</label>
  <input type="text" name="habitat" id="habitat" value="<?php echo h($salamander['habitat']); ?>"><br><br>
  <label for="description">Description:</label>
  <input type="text" name="description" id="description" value="<?php echo h($salamander['description']); ?>"><br><br>


  <input type="submit" value="Create Salamander">
</form>
