<?php

require_once('../../private/initialize.php');

// Check for an ID in the URL, fallback to '1'
$id = $_GET['id'] ?? '1';

if (is_post_request()) {
  $salamander_name = $_POST['salamander_name'] ?? '';
  // TODO: Here we update the database
  redirect_to(urlFor('/salamanders/index.php'));
}
else {
  ?>

  <head>
    <meta charset="UTF-8">
    <title>Edit Salamander</title>
    <link rel="stylesheet" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>">
  </head>

  <h1>Edit Salamander</h1>

  <p>Editing salamander with ID: <?php echo h($id); ?></p>

  <form action="<?php echo urlFor('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
    <label for="salamander_name">Name:</label>
    <input type="text" name="salamander_name" id="salamander_name" value=""><br><br>

    <input type="submit" value="Update Salamander">
  </form>

<?php
}
?>
