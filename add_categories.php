<?php include "db.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Categories</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Add New Categories</h2>
    <form action ="store_categories.php" method="post" class="bg-white p-4 rounded shadow-sm" enctype="multipart/form-data" >
      <div class="row g-3">
        <div class="col-md-12">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Categories</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
