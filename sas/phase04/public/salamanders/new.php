<?php require_once('../../private/initialize.php');?>

<head>
  <meta charset="UTF-8">
  <title>New Salamander</title>
  <link rel="stylesheet" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>">
</head>

<h1>Create a Salamander</h1>

<form action="<?php echo urlFor('/salamanders/create.php'); ?>" method="post">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name"><br><br>
  <label for="habitat">Habitat:</label>
  <input type="text" name="habitat" id="habitat"><br><br>
  <label for="description">Description:</label>
  <input type="text" name="description" id="description"><br><br>


  <input type="submit" value="Create Salamander">
</form>
