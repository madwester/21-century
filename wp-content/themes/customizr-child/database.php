<?php
$user = "lyf9375";
$password = "";
$host ="localhost";
$db = "c9";
$connection = mysqli_connect($host,$user,$password,$db);
mysqli_set_charset($connection,"utf8");
if(!$connection){
    echo "error";
}
?>