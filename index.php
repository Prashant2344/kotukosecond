<?php


include 'connection.php';

require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

$q = "select * from book ORDER BY id DESC";
$query = mysqli_query($con,$q);
// $res = mysqli_fetch_assoc($query);

while ($row = mysqli_fetch_assoc($query)) {
    $results[] = $row;
}

echo $twig->render('index.html',array(
    'name' => 'Prashant',
    'books' => $results ?? []
));

?>