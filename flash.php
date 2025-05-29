<?php
  require_once "./includes/head.php";
  include "db.php";
  ?>

  <?php
  // Fetch book details from the database
  $id = $_GET['id'];

  if( $is_connect ) {
    $sql = "UPDATE books
    SET status = '0'  WHERE id = $id";
    if( $connection->query($sql) === true ) {
        echo "Book Soft Deleted Successfully";
        header("Location: index.php");
    }else {
        print_r( $connection->error );
        die();
    }
  }
  ?>