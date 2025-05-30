<?php include "db.php"?>

  <?php
  $sql = "SELECT * FROM categories ";
  $result = mysqli_query($connection, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Add New Book</h2>
    <form action ="add.php" method="post" class="bg-white p-4 rounded shadow-sm" enctype="multipart/form-data" >
      <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Book Name</label>
            <input type="text" name="book_name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Author</label>
            <input type="text" name ="author" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">ISBN</label>
            <input type="number" name="isbn" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Publisher</label>
            <input type="text" name="publisher" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Published Date</label>
            <input type="date" name="published_date" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Category</label>
            <select class="form-select" name="category" id="">
                <?php foreach(  $data as $row ) : ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Language</label>
            <input type="text" name="language" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Pages</label>
            <input type="number" name="pages" class="form-control">
        </div>
        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="col-12">
            <label class="form-label">Cover Image URL</label>
            <input type="file" name ="image_url" class="form-control">
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Book</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
