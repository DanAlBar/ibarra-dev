<?php
require_once('../../private/initialize.php');

// Check for an ID in the URL, fallback to '1'
$id = $_GET['id'] ?? '1';


if (is_post_request()) {

  // Handle form values sent by new.php.
  // This runs when the user submits the form.
  $salamander_object = [];
  $salamander_object['id'] = $id;
  $salamander_object['name'] = $_POST['name'] ?? '';
  $salamander_object['habitat'] = $_POST['habitat'] ?? '';
  $salamander_object['description'] = $_POST['description'] ?? '';

  $updated_salamander = update_salamander($salamander_object);
  redirect_to(urlFor('/salamanders/show.php?id=' . $id));

} else {

  $salamander_object = find_salamander_by_id($id);
  // ^This part runs for both GET and POST (if needed)
  ?>

  <head>
    <meta charset="UTF-8">
    <title>Edit Salamander</title>
    <link rel="stylesheet" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>">
  </head>

  <h1>Edit Salamander</h1>
  <p>Editing salamander with ID: <?php echo h($id); ?></p>

  <form action="<?php echo urlFor('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo h($salamander_object['name']); ?>"><br><br>

    <label for="habitat">Habitat:</label>
    <input type="text" name="habitat" id="habitat" value="<?php echo h($salamander_object['habitat']); ?>"><br><br>

    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="<?php echo h($salamander_object['description']); ?>"><br><br>

    <input type="submit" value="Update Salamander">
  </form>

<?php
}
?>
