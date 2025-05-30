<?php

include "db.php";

$name = $_POST['name'] ;
 if($is_connect) {
      $sql = "INSERT INTO categories (`name`) VALUES ('$name')";

      if($connection->query($sql)=== true){
        echo "New Categories added successfully";
        header("Location: index.php");
      }else{
        print_r($connection->error);
        die();
      }
  }