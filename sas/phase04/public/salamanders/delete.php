<?php
require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/salamanders/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  
  // $result will always be true in order to pass if statement
  // so tracking with "$result =" is optional. 
  // Can just call "delete_salamander($id);"
  $result = delete_salamander($id);
  redirect_to(urlFor('salamanders/index.php'));
  
} else {
  // Only finds salamander if it's not a POST request.
  $salamander = find_salamander_by_id($id);
}
?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="salamander delete">
    <h1>Delete Salamander</h1>
    <p>Are you sure you want to delete this salamander?</p>
    <p class="item"><?php echo h($salamander['name']); ?></p>

    <form action="<?php echo urlFor('/salamanders/delete.php?id=' . h(u($salamander['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Salamander" />
      </div>
    </form>
  </div>

</div>
