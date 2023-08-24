<?php
session_start();
require '../connection.php';
if ($_SERVER['REQUEST_METHOD']=="POST" ){
    $email=($_POST['email']);
    $password=$_POST['password'];
    // insert into database
    $sql = "SELECT * FROM users WHERE email =?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$email]);
    $data=$stmt->fetchObject();
    if ($data){
        if (password_verify($password,$data->password)){
            $user=['id'=>$data->id,'name'=>$data->name,'password'=>$data->password,'email'=>$data->email,'mobile'=>$data->mobile];
            $_SESSION['auth']=$user;
            header("location:../main.php");
            die;
        }
        else{
            $_SESSION['error']="Email or password not coreect";
            header("location:../login.php");
            die;

        }

    }
    else{
        $_SESSION['error']="data not correct";
        header("location:../login.php");
    }

    // $_SESSION ['sucess']="data inserted sucessfully";
    // header("location:../register.php");
    
   

}
?>