
<?php
$id=$_GET['id'];
$new=$_GET['title'];
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
    else{
    $sql= "UPDATE `tasks`
    SET `title`= '$new' WHERE `id` = '$id' ";
    $Result=mysqli_query($conn,$sql);
    header("location:./main.php");}
    
    if ( strlen($new)==0){
        $_SESSION['error']= "Please enter a valid task ";
        header("location:./main.php");
        die;
     }
     else {
         $_SESSION['sucess']="data updated sucessfully ";
     }
}


?>