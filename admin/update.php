<?php
include '../connection.php';
require '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader);

if(!isset($_POST['submit_form'])){
    $id = $_GET['id'];
    $q = "Select * FROM `book` WHERE id=$id";
    $result = mysqli_query($con,$q);
    if($result->num_rows != 1){
        die('id is not in db');
    }
    $book = $result->fetch_assoc();

    $allBooks = "select * from book WHERE id != $id";
    $query = mysqli_query($con,$allBooks);
    while ($row = mysqli_fetch_assoc($query)) {
        $results[] = $row ?? [];
    }

    $relatedBookList = "select association_id from `book_association` where book_id=$id";
    $relatedBooksQuery = mysqli_query($con,$relatedBookList);
    while ($row1 = mysqli_fetch_assoc($relatedBooksQuery)) {
        $relatedBooks[] = $row1;
    }

    echo $twig->render('form.html',array(
        'title' => 'Update Book Information',
        'book'  => $book,
        'books' => $results ?? [],
        'relatedBooks' => $relatedBooks ?? []
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

    $id = $_POST['id'];
    $q = "update book set id=$id, title='$title', slug='$slug', description='$description', year_of_publish='$year', publisher='$publisher', author='$author', price='$price' where id=$id";
    $query = mysqli_query($con,$q);

    //Create association between the books
    if ($query) {
        $selectBookList = "DELETE FROM `book_association` WHERE book_id=$id";
        mysqli_query($con,$selectBookList);
        foreach ($_POST['book_association'] as $book){
            $newRelatedBooks = "INSERT INTO `book_association` (`book_id`,`association_id`)
                    VALUES ($id,$book)";
            $query = mysqli_query($con,$newRelatedBooks);
        }
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    //Update feature image if new image is uploaded
    $filename = $_FILES["uploadfile"]["name"];
    if($filename != null){
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "../image/".$filename;

        $imageReplace = "update book set featured_image='$filename' where id=$id";
        $query = mysqli_query($con,$imageReplace);

        move_uploaded_file($tempname, $folder);
    }
    
    header('location:display.php');
}
