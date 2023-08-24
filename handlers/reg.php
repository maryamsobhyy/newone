<?php
require '../connection.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST" ){
    $name= trim(htmlspecialchars(htmlentities($_POST['name'])));
    $email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $mobile=($_POST['mobile']);
    // insert into database
    $sql = "INSERT INTO users (name,email,password,mobile) VALUES (?,?,?,?)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$name,$email,$password,$mobile]);
    $_SESSION ['sucess']="data inserted sucessfully";
    header("location:../register.php");
    
   

}



?>