<?php
$conn=mysqli_connect("localhost","root","");
$Sql = "CREATE DATABASE IF NOT EXISTS  crud";
mysqli_close($conn);
$conn=mysqli_connect("localhost","root","","crud");
$sql= "CREATE TABLE  IF NOT EXISTS tasks (
    `id` PRIMARY KEY AUTO_INCREMENT ,
    `title` varchar(200) NOT NULL
)";
$Result=mysqli_query($conn,$sql);
mysqli_close($conn);
var_dump($conn);

?>