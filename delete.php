<?php
include 'connection.php';
    $id = $_GET['id'];
    $q = "DELETE FROM `book` WHERE id=$id";
    mysqli_query($con,$q);

    header('location:display.php');
?>