<?php
    include '../connection.php';

    require '../vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('../views');
    $twig = new Twig_Environment($loader);

    $q = "select * from book";
    $query = mysqli_query($con,$q);

    while ($row = mysqli_fetch_assoc($query)) {
        $results[] = $row;
    }
    
    echo $twig->render('list.html',array(
        'title' => 'Book List',
        'books' => $results ?? []
    ));
?>
