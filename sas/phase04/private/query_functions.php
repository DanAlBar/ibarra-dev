<?php

  function find_all_salamanders() {
    global $db;

    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $salamander = mysqli_query($db, $sql);
    confirm_salamander_set($salamander);
    return $salamander;
  }

  function find_salamander_by_id($id) {
    global $db;

    $sql = "SELECT * FROM salamander ";
    $sql .= "WHERE id='" . $id . "'";
    $salamander = mysqli_query($db, $sql);
    confirm_salamander_set($salamander);
    $salamander_object = mysqli_fetch_assoc($salamander);
    mysqli_free_result($salamander);
    return $salamander_object; // returns an assoc. array
  }

  function insert_salamander($salamander) {
    global $db;

    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" . $salamander['name'] . "',";
    $sql .= "'" . $salamander['habitat'] . "',";
    $sql .= "'" . $salamander['description'] . "'";
    $sql .=")";
    $new_salamander = mysqli_query($db, $sql);
    // For INSERT statements, $new_salamander is true/false
    if($new_salamander) {
      return true;
    } else{
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_salamander($salamander_object) {
    global $db;

    $sql = "UPDATE salamander SET ";
    $sql .= "name='" . $salamander_object['name'] . "', ";
    $sql .= "habitat='" . $salamander_object['habitat'] . "', ";
    $sql .= "description='" . $salamander_object['description'] . "' ";
    $sql .= "WHERE id='" . $salamander_object['id'] . "' ";
    $sql .= "LIMIT 1";
  
    $updated_salamander = mysqli_query($db, $sql);
  
    // For UPDATE statements, $updated_salamander is true/false
    if($updated_salamander) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }  
  }

  function delete_salamander($id) {
    global $db;

    $sql = "DELETE FROM salamander ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
  
    // For DELETE statements, $result is true/false
    if ($result) {
      return true;
    }else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  
  }

?>
