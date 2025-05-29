<?php

  //Database Connection

    include "db.php";

  // Get all date from the form submission

  $book_name = $_POST['book_name'];
  $author = $_POST['author'];
  $isbn = $_POST['isbn'];
  $publisher = $_POST['publisher'];
  $published_date = $_POST['published_date'];
  $categories = $_POST['categories'];
  $language = $_POST['language'];
  $pages = $_POST['pages'];
  $description = $_POST['description'];
  $image_url = $_FILES['image_url'];

  if (!empty($image_url['name'])) {
    $target_dir = "uploads/";
    $fileName = time() . '_' . basename($image_url['name']);
    $target_file = $target_dir . $fileName;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($image_url['tmp_name']);
    if ($check === false) {
        die("File is not an image.");
    }

    if ($image_url['size'] > 5 * 1024 * 1024) {
        die("Sorry, your file is too large.");
    }

    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($image_file_type, $allowed_formats)) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($image_url['tmp_name'], $target_file)) {
        $image_url = $target_file;
    } else {
        echo "File upload error code: " . $image_url['error']; // debugging line
        die("Sorry, there was an error uploading your file.");
    }
}


  // if(!empty($image_url)){
  //   // Target directory for the uploaded image
  //   $target_dir ="uploads/";
  //   // Get the file name and extension
  //   $fileName= basename($_FILES['image_url']['name']);
  //   $target_file = $target_dir . $fileName;
  //   $image_file_type =strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  //   // Check if the file is an actual image
  //   $check =getimagesize($_FILES['image_url']['tmp_name']);
  //   if($check === false){
  //     die("File is not an image.");
  //   }

  //   //check file size

  //   if($_FILES['image_url']['size'] > 5*1024*1024){ // 5MB
  //     die("Sorry, your file is too large.");
  //   }

  //   // Allow certain file formats
  //   $allowed_formats = array("jpg", "jpeg", "png", "gif");
  //   if(!in_array($image_url, $allowed_formats)){
  //     die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
  //   }

  //   // move the uploaded file to the target directory

  //   if(move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)){
  //     $image_url = $target_file; // Set the image URL to the target file path
  //   } else {
  //     die("Sorry, there was an error uploading your file.");
  //   }
  // }

  // die();

  // Insert data into the database
  if($is_connect) {
      $sql = "INSERT INTO books (book_name, author, isbn, publisher, published_date, categories, language, pages, description, image_url)
                VALUES ('$book_name', '$author', '$isbn', '$publisher', '$published_date', '$categories', '$language', '$pages', '$description', '$image_url')";

      if($connection->query($sql)=== true){
        echo "New Book added successfully";
        header("Location: index.php");
      }else{
        print_r($connection->error);
        die();
      }
  }

?>