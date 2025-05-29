<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <?php
  require_once "./includes/head.php";
  include "db.php";
  ?>
  <?php
  //Fetch book details from the database

  $id = $_GET['id']; // 11 number line
  $sql = "SELECT * FROM books WHERE id = $id";
  $result = mysqli_query($connection, $sql); // 13 number line
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $book = $data[0];
  ?>
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Edit Book</h2>
    <form action ="update.php" method="POST" class="bg-white p-4 rounded shadow-sm"enctype="multipart/form-data">
      <div class="row g-3">
        <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
        <div class="col-md-6">
            <label class="form-label">Book Name</label>
            <input type="text" name="book_name" class="form-control" value="<?php echo $book ['book_name'] ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Author</label>
            <input type="text"name="author" class="form-control" value="<?php echo $book ['author'] ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" value="<?php echo $book ['isbn'] ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Publisher</label>
            <input type="text" name="publisher" class="form-control" value="<?php echo $book ['publisher'] ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Published Date</label>
            <input type="date" name="published_date" class="form-control" value="<?php echo $book ['published_date'] ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Category</label>
            <input type="text" name="categories" class="form-control" value="<?php echo $book ['categories'] ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Language</label>
            <input type="text" name="language" class="form-control" value="<?php echo $book ['language'] ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Pages</label>
            <input type="number" name="pages" class="form-control" value="<?php echo $book ['pages'] ?>">
        </div>
        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?php echo $book ['description'] ?></textarea>
        </div>
        <div class="col-12">
            <label class="form-label">Cover Image URL</label>
            <input type="file" name="image_url" class="form-control" value="<?php echo $book ['image_url']?> ">
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html> -->

<?php
require_once "./includes/head.php";
include "db.php";

$error = "";
$success = "";

// Get Book ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch book data
$stmt = $connection->prepare("SELECT * FROM books WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if (!$book) {
    die("Book not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Edit Book</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form action="update.php" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        <input type="hidden" name="id" value="<?= $book['id'] ?>">
        <input type="hidden" name="old_image" value="<?= $book['image_url'] ?>">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Book Name</label>
                <input type="text" name="book_name" class="form-control" value="<?= htmlspecialchars($book['book_name']) ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($book['author']) ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="<?= htmlspecialchars($book['isbn']) ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Publisher</label>
                <input type="text" name="publisher" class="form-control" value="<?= htmlspecialchars($book['publisher']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Published Date</label>
                <input type="date" name="published_date" class="form-control" value="<?= date('Y-m-d', strtotime($book['published_date'])) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <input type="text" name="categories" class="form-control" value="<?= htmlspecialchars($book['categories']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Language</label>
                <input type="text" name="language" class="form-control" value="<?= htmlspecialchars($book['language']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Pages</label>
                <input type="number" name="pages" min="1" class="form-control" value="<?= htmlspecialchars($book['pages']) ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($book['description']) ?></textarea>
            </div>

            <div class="col-md-12">
                <label class="form-label">Cover Image</label>
                <input type="file" name="image_url" class="form-control">
                <?php if (!empty($book['image_url'])): ?>
                    <small class="text-muted d-block mt-2">Current Image: <a href="<?= $book['image_url'] ?>" target="_blank">View</a></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Update Book</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
