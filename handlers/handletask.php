<?php
require '../connection.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST" ){
    $title= trim(htmlspecialchars(htmlentities($_POST['title'])));
    $sql = "INSERT INTO tasks (title,user_id) VALUES (?,?)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$title,1]);
    $_SESSION ['sucess']="data inserted sucessfully";
    header("location:../main.php");
    
   

}