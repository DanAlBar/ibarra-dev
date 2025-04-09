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

  function validate_salamander($salamander) {

    $errors = [];

    // name
    if(is_blank($salamander['name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($salamander['name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // habitat
    if(is_blank($salamander['habitat'])) {
      $errors[] = "Habitat cannot be blank.";
    } elseif(!has_length($salamander['habitat'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Habitat must be between 2 and 255 characters.";
    }

    // description
    if(is_blank($salamander['description'])) {
      $errors[] = "Description cannot be blank.";
    } elseif(!has_length($salamander['description'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Description must be between 2 and 255 characters.";
    }

/*  // Example for an integer value 
    // Using  (#)
    // Make sure we are working with an integer

    $salamander_int = (int) $salamander['#'];
    if($salamander_int <= 0) {
      $errors[] = "# must be greater than zero";
    }
    if($salamander_int > 999) {
      $errors[] = "# must be less than 999.";
    }


    // Example for boolean value
    // Using (y_n)
    // Make sure we are working with a string

    $y_n_str = (string) $salamander['y_n'];
    if(!has_inclusion_of($y_n_str, ["0","1"])) {
      $errors[] = "y_n must be true or false.";
    } 
*/

    return $errors;
  }

  function insert_salamander($salamander) {
    global $db;

    $errors = validate_salamander($salamander);
    if(!empty($errors)) {
      return $errors;
    }

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

  function update_salamander($salamander) {
    global $db;

    $errors = validate_salamander($salamander);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE salamander SET ";
    $sql .= "name='" . $salamander['name'] . "', ";
    $sql .= "habitat='" . $salamander['habitat'] . "', ";
    $sql .= "description='" . $salamander['description'] . "' ";
    $sql .= "WHERE id='" . $salamander['id'] . "' ";
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
