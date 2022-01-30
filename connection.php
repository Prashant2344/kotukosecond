<?php 
$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'kotukosecond');


if($con){
    echo "Connection successful!";
}else{
    echo "Connection Failed!";
}

?>