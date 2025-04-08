<?php require_once('../../private/initialize.php');?>

<head>
  <meta charset="UTF-8">
  <title>New Salamander</title>
  <link rel="stylesheet" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>">
</head>

<h1>Create a Salamander</h1>

<form action="<?php echo urlFor('/salamanders/create.php'); ?>" method="post">
  <label for="salamander_name">Name:</label>
  <input type="text" name="salamander_name" id="salamander_name"><br><br>

  <input type="submit" value="Create Salamander">
</form>
