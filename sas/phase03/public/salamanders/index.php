<?php require_once('../../private/initialize.php');?>

<?php

// TEMP TEST - You can remove this after we confirm the connection
if($db) {
  echo "<p style='color: green;'>✅ Connected to the database!</p>";
} else {
  echo "<p style='color: red;'>❌ Not connected to the database!</p>";
}


/* $sql = "SELECT * FROM salamander ";
$sql .= "ORDER BY position ASC";*/
$salamander_set = find_all_salamanders();


//Add the pageTitle for salamanders
//Include a shared path to the salamander header
$pageTitle = 'Salamanders';
include(SHARED_PATH . '/salamander-header.php');
?>

<h1>Salamanders</h1>

<a href="<?php echo urlFor('/salamanders/new.php'); ?>">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Desc</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php while($salamander = mysqli_fetch_assoc($salamander_set)) { ?>
    <tr>
      <!-- <td>Display the salamander id</td> -->
      <td><?php echo h($salamander['id']); ?></td>
      <!-- <td>Display the salamander name</td> -->
      <td><?php echo h($salamander['name']); ?></td>
      <!-- <td>Display the salamander habitat</td> -->
      <td><?php echo h($salamander['habitat']); ?></td>
      <!-- <td>Display the salamander description</td> -->
      <td><?php echo h($salamander['description']); ?></td>
      <!-- Use url_for with show.php AND h(u) with the salamander['id'] -->
      <td><a href="<?php echo urlFor('/salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
      <td><a href="#">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
  <?php } ?>
</table>

<?php 
  mysqli_free_result($salamander_set);
?>

<!-- add the shared path to the salamander footer -->
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
