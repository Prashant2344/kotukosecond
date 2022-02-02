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
    $relatedBooks = "SELECT book.*
                    FROM `book`
                    INNER JOIN book_association ON book.id = book_association.book_id
                    ORDER BY field(id, $book_id) DESC
                    LIMIT 4";
    $query = mysqli_query($con,$relatedBooks);

    while ($row = mysqli_fetch_assoc($query)) {
        $results[] = $row;
    }

    require 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader);

    echo $twig->render('bookdetail.html',array(
        'name' => 'Prashant',
        'book' => $book,
        'books'=> $results
    ));
?>