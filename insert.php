<?php
include 'connection.php';
if(isset($_POST['submit_form'])){
    $title = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $description = $_POST['description'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "image/".$filename;

    // Get all the submitted data from the form
    $q = "INSERT INTO `book`( `title`, `slug`, `featured_image`, `description`, `year_of_publish`, `publisher`, `author`, `price`) 
                VALUES ('$title','$slug','$filename','$description','$publisher','$year','$author','$price')";

    $query = mysqli_query($con,$q);

    // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            header('location:display.php');
        }else{
            header('location:insert.php');
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kotuto Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="col-lg-6 m-auto">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header bg-dark">
                <h1 class="text-white text-center">
                    Insert Book
                </h1>
            </div>
            <br>
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control"><br>

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>

            <label for="year">Year of publication</label>
            <input type="year" name="year" placeholder="Year of publication" class="form-control"><br>

            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" placeholder="Publisher" class="form-control"><br>

            <label for="author">Author</label>
            <input type="text" name="author" placeholder="Author" class="form-control"><br>

            <label for="price">Price</label>
            <input type="number" name="price" placeholder="Price" class="form-control"><br>

            <label for="price">Featured Image</label>
            <input type="file" name="uploadfile" value="" />
            <br>

            <button type="submit" class="btn btn-success" name="submit_form">Submit</button>

        </div>
    </form>
</div>

</body>
</html>
