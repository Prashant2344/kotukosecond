<?php

include '../connection.php';
require '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader);

if(!isset($_POST['submit_form'])){
    $q = "select * from book";
    $query = mysqli_query($con,$q);

    while ($row = mysqli_fetch_assoc($query)) {
        $results[] = $row;
    }

    echo $twig->render('form.html',array(
        'title' => 'Insert Book Information',
        'books' => $results ?? []
    ));
}

if(isset($_POST['submit_form'])){       
    // Get all the submitted data from the form
    $title = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $description = $_POST['description'];
    $year = $_POST['year_of_publish'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "../image/".$filename;

    $q = "INSERT INTO `book`( `title`, `slug`, `featured_image`, `description`, `year_of_publish`, `publisher`, `author`, `price`) 
                VALUES ('$title','$slug','$filename','$description','$year','$publisher','$author','$price')";
                
    move_uploaded_file($tempname, $folder);

    //Create association between the books
    if (mysqli_query($con,$q)) {
        $last_id = mysqli_insert_id($con);
        foreach ($_POST['book_association'] as $book){
            $q1 = "INSERT INTO `book_association` (`book_id`,`association_id`)
                    VALUES ($last_id,$book)";
            $query = mysqli_query($con,$q1);
        }
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header('location:display.php');
}

?>