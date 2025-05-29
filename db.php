<?php

    //Database Connection

    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="book_management";
    $is_connect= false;

    //Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    // Check Connection
    if ($connection){
        $is_connect = true;
    } else {
        echo "Connection failed ";
    }
?>