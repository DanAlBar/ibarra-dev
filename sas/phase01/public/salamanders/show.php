<?php require_once('../../private/initialize.php');

// Use the null coalescing operator to assign the value of $_GET['id'] to $id
// if it is not empty, otherwise assign 1 to $id
$id = $_GET['id'] ?? 1;

// if the id is not empty assign it the value from $_GET['id']
// else $id = 1
// or use the non-coalesing operator

$pageTitle = 'Salamander Details';

// include the shared path to the header
include(SHARED_PATH . '/salamander-header.php');
?>

<h2>Salamander Details</h2>
<!-- <p> Page ID: Use the h() function and pass in the id/p> -->
<p>Page ID: <?php echo h($id); ?></p>
<p><a href="<?= urlFor('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<!-- Use the shared path to the salamander footer. -->
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
