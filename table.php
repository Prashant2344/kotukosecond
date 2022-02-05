<?php
include 'connection.php';

// sql to create table
$book = "CREATE TABLE book (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NULL,
slug VARCHAR(30) NULL,
featured_image VARCHAR(255) NULL,
description TEXT NULL,
year_of_publish YEAR NULL,
publisher VARCHAR(30) NULL,
author VARCHAR(30) NULL,
price DOUBLE NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$bookAssociation = "CREATE TABLE book_association (
  book_id INT(6),
  association_id INT(6)
)";

if ($con->query($book) === TRUE) {
  if ($con->query($bookAssociation) === TRUE) {
    echo "Table Book and Book Association created successfully";
  }else{
    echo "Error creating table Book Association: " . $con->error;
  }
} else {
  echo "Error creating table Book: " . $con->error;
}

$con->close();
?>