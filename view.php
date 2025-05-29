
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require_once "./includes/head.php";
  include "db.php";
  ?>

  <?php
  // Fetch book details from the database

  $id = $_GET['id'];
  $sql = "SELECT * FROM books WHERE id = $id";;
  $result = mysqli_query($connection, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $book = $data[0];
  ?>
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card p-4 shadow-sm">
      <div class="row">
        <div class="col-md-4">
          <img style="max-width: 100%;" src="<?php echo $book['image_url']?>" alt="cover image">
        </div>
        <div class="col-md-8">
          <h3><?php echo $book['book_name']; ?></h3>
          <p><strong>Author:</strong><?php echo $book['author']; ?></p>
          <p><strong>ISBN:</strong> <?php echo $book['isbn']; ?></p>
          <p><strong>Publisher:</strong> <?php echo $book['publisher']; ?></p>
          <p><strong>Published Date:</strong> <?php echo $book['published_date']; ?></p>
          <p><strong>Category:</strong> <?php echo $book['categories']; ?></p>
          <p><strong>Language:</strong> <?php echo $book['language']; ?></p>
          <p><strong>Pages:</strong> <?php echo $book['pages']; ?></p>
          <p><strong>Description:</strong> <?php echo $book['description']; ?></p>
          <a href="index.php" class="btn btn-secondary mt-3">← Back to List</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
