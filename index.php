
<!DOCTYPE html>
<html lang="en">
<head>

  <?php
  require_once "./includes/head.php";
  include "db.php";
  ?>

  <?php
  $sql = "SELECT * FROM books WHERE status != 0";
  $result = mysqli_query($connection, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  ?>

</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3">📚 Book List</h1>
      <div class="action-btn">
        <a href="create.php" class="btn btn-primary">+ Add New Book</a>
        <a href="trash.php" class="btn btn-danger">Trash Book List</a>
        <a href="index.php" class="btn btn-primary">All Books</a>
      </div>

    </div>
    <table class="table table-hover table-bordered bg-white shadow-sm">
      <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>

      <?php
        if (count($data) > 0) {
          foreach ($data as $row) {
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['book_name']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['categories']; ?></td>
            <td>
              <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">View</a>
              <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        <?php
          }
        } else {
        ?>
          <tr>
            <td colspan="6" class="text-center">No books found.</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
