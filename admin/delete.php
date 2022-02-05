<?php
include '../connection.php';
    require '../vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('../views');
    $twig = new Twig_Environment($loader);

    $id = $_GET['id'];
    $q = "DELETE FROM `book` WHERE id=$id";
    mysqli_query($con,$q);

    //delete relation data from book association
    $query = "DELETE FROM `book_association` WHERE book_id=$id OR association_id=$id";
    mysqli_query($con,$query);

    header('location:display.php');
?>