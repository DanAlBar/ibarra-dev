<?php

  require_once('db_credentials.php');

  function db_connect() {
    mysqli_report(MYSQLI_REPORT_OFF); // <-- Turn off exceptions
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect($connection);
    return $connection;
  }

  function db_disconnect($connection) {
    if(isset($connection)){
      mysqli_close($connection);
    }
  }

  function confirm_db_connect($connection) {
    if(mysqli_connect_errno ()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= "(" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirm_salamander_set($salamander_set) {
    if (!$salamander_set) {
      exit("Database query failed.");
    }
  }

?>
