<?php

  function find_all_salamanders() {
    global $db;

    $sql = "SELECT * FROM salamander ORDER BY name ASC";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
  }

  function find_salamander_by_id($id) {
    global $db;

    $sql = "SELECT * FROM salamander WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;
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
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "INSERT INTO salamander (name, habitat, description) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $salamander['name'], $salamander['habitat'], $salamander['description']);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
  }


  function update_salamander($salamander) {
    global $db;

    $errors = validate_salamander($salamander);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE salamander SET name = ?, habitat = ?, description = ? WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $salamander['name'], $salamander['habitat'], $salamander['description'], $salamander['id']);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
  }


  function delete_salamander($id) {
    global $db;

    $sql = "DELETE FROM salamander WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
  }


?>
