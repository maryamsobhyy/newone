<?php 
session_start();
if (isset($_GET['id'])){
    $conn=mysqli_connect("localhost","root","","crud");
    if (!$conn){
        echo "connect error";
    }
    $id=$_GET['id'];
    $sql= "SELECT *  FROM `tasks` WHERE `id`= '$id'";
    $Result=mysqli_query($conn,$sql);
    $Row = mysqli_fetch_row($Result);
    if (!$Row){
        $_SESSION['error'] ="data not exsits";
        header("location:../main.php");
    }

    $sql= "DELETE FROM `tasks` WHERE `id`= '$id'";
    mysqli_query($conn,$sql);
    if ( mysqli_affected_rows($conn)==0){
       $_SESSION['error']= "data not exsits";
       header("location:../main.php");
       die;
    }
    else {
        $_SESSION['sucess']="data deleted sucessfully ";
    }
    // redirection
    header("location:../main.php");
}











?>