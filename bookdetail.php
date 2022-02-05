<?php
    include 'connection.php';
    $slug = $_GET['slug'];
    $q = "Select * FROM `book` WHERE slug='$slug'";
    $result = mysqli_query($con,$q);
    if($result->num_rows != 1){
        die('Book is not in db');
    }
    $book = $result->fetch_assoc();

    $book_id = $book['id'];

    $rel = "SELECT DISTINCT association_id FROM book_association ORDER BY field(book_id, $book_id) DESC LIMIT 4";
    $query1 = mysqli_query($con,$rel);
    $results1 = "";
    while ($row1 = mysqli_fetch_assoc($query1)) {
        print_r($row1);
        $results1 = $results1 != "" ? $results1 . ',' . $row1['association_id'] : $row1['association_id'];
    }
    
    $relatedBooks = "SELECT * from `book` WHERE id in ($results1)";

    $query = mysqli_query($con,$relatedBooks);
    if($query){
        while ($row = mysqli_fetch_assoc($query)) {
            $results[] = $row;
        }
    }

    $con->close();

    require 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);

    echo $twig->render('bookdetail.html',array(
        'book' => $book,
        'books'=> $results ?? [],
    ));
?>