<?php
include 'connection.php';
    $q = "select * from book";
    $query = mysqli_query($con,$q);
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

        <div class="row">
            <h2>Kotuko Books</h2>
        </div>
        <div class="row mt-2">
            <?php
                while($res = mysqli_fetch_array($query)){
            ?>
            <div class="col-md-3 mb-2 mt-2">
                <div class="card">
                    <img src="./image/<?php echo $res['featured_image'] ?>" alt="<?php echo $res['title'] ?>" style="height:250px;width:100%;object-fit:cover;">
                    <p style="text-align: center;"><a href="bookdetail.php?slug=<?php echo $res['slug']; ?>"> <?php echo $res['title'] ?> </a></p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

</body>

</html>