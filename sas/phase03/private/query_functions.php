<?php

  function find_all_salamanders() {
    global $db;

    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $salamander = mysqli_query($db, $sql);
    confirm_salamander_set($salamander);
    return $salamander;
  }

?>
