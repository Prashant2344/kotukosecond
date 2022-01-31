<?php
    include 'connection.php';
    $slug = $_GET['slug'];
    $q = "Select * FROM `book` WHERE slug='$slug'";
    $result = mysqli_query($con,$q);
    if($result->num_rows != 1){
        die('Book is not in db');
    }
    $book = $result->fetch_assoc();
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kotuko Test</a>
                </li>
            </ul>
            <span class="navbar-text">
                Navbar text with an inline element
            </span>
        </div>
    </nav>

    <div class="container" style="margin-top: 50px;">
        <div class="row mb-5">
            <div class="col-md-3">
                <div style="height: 200px;">
                    <img src="./image/<?= $book['featured_image']?>" alt="" style="height:250px;width:100%;object-fit:cover;">
                </div>
            </div>

            <div class="col-md-9">
                <h2><?= $book['title']?></h2>
                <h4>Book Author :: <?= $book['author']?></h4>
                <div class="row">
                    <p style="margin-right: 200px; margin-left: 20px;"><?= $book['publisher']?> <?= $book['year_of_publish']?></p>
                    <p style="margin-left: 200px;">$ <?= $book['price']?></p>
                </div>
                <hr>
                <p>
                    <?= $book['description']?>
                </p>
            </div>
        </div>

        <div class="row">
            <h2>Related Books</h2>
        </div>
        <div class="row mt-2">
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>

            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="https://purnapaath.com/uploads/%E0%A4%95%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%AE%E0%A5%87%E0%A4%B0%E0%A4%BE.png" alt="" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href=""> Book Title </a></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>