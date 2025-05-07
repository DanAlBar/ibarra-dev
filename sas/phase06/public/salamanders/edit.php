<?php
require_once('../../private/initialize.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check for an ID in the URL, fallback to '1'
$id = $_GET['id'] ?? '1';


if (is_post_request()) {

  // Handle form values sent by new.php.
  // This runs when the user submits the form.
  $salamander = [];
  $salamander['id'] = $id;
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  // Attempt to update
  $updated_salamander = update_salamander($salamander);
  
  if($updated_salamander === true) {
    redirect_to(urlFor('/salamanders/show.php?id=' . $id));
  }else {
    $errors = $updated_salamander;
    //var_dump($errors);

    // ✅ Refill form with user-submitted values
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';
  }

}
if (!isset($salamander)) {
  $salamander = find_salamander_by_id($id);
  // ^This part runs for both GET and POST (if needed)
}
  ?>

  <head>
    <meta charset="UTF-8">
    <title>Edit Salamander</title>
    <link rel="stylesheet" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>">
  </head>

  <h1>Edit Salamander</h1>
  <p>Editing salamander with ID: <?php echo h($id); ?></p>
  <?php echo display_errors($errors); ?>

  <form action="<?php echo urlFor('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo h($salamander['name']); ?>"><br><br>

    <label for="habitat">Habitat:</label>
    <input type="text" name="habitat" id="habitat" value="<?php echo h($salamander['habitat']); ?>"><br><br>

    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="<?php echo h($salamander['description']); ?>"><br><br>

    <input type="submit" value="Update Salamander">
  </form>
