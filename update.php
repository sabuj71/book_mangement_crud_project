<?php
include "db.php";

$id             = $_POST['id'];
$book_name      = $_POST['book_name'];
$author         = $_POST['author'];
$isbn           = $_POST['isbn'];
$publisher      = $_POST['publisher'];
$published_date = $_POST['published_date'];
$categories     = $_POST['categories'];
$language       = $_POST['language'];
$pages          = $_POST['pages'];
$description    = $_POST['description'];
$old_image_url  = $_POST['old_image_url'] ?? '';

$image_url = $old_image_url;

if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['image_url']['tmp_name'];
    $fileName = basename($_FILES['image_url']['name']);
    $uploadDir = "uploads/";
    $newFileName = time() . "_" . $fileName;
    $destPath = $uploadDir . $newFileName;

    if (!move_uploaded_file($fileTmpPath, $destPath)) {
        die("Error uploading file. Please check your folder permissions and path.");
    } else {
        $image_url = $destPath;
    }
}

if ($is_connect) {
    $sql = "UPDATE books SET
            book_name = '$book_name',
            author = '$author',
            isbn = '$isbn',
            publisher = '$publisher',
            published_date = '$published_date',
            categories = '$categories',
            language = '$language',
            pages = '$pages',
            description = '$description',
            image_url = '$image_url'
            WHERE id = $id";

    if ($connection->query($sql) === true) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $connection->error;
    }
}
?>
