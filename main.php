<?Php
require './connection.php';
 session_start();
$sql = "SELECT * FROM  tasks ";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<link href="style.css" rel="stylesheet">
<!DOCTYPE html>
<html>
<head>
  <title>Add Task</title>
</head>
<body>
<form action="./handlers/handletask.php" method="POST">
    <label for="task">Task:</label><br>
    <?php if (isset( $_SESSION['sucess'])):?>
        <div class=" alert alert-sucess text-center">
            <?php echo $_SESSION['sucess'];

            unset ($_SESSION['sucess']); 
            ?>
        </div>
        <?php endif;?>
    <input type="text" id="task" name="title"><br>

    <input type="submit" value="Add Task">
    <?php if (isset( $_SESSION['error'])):?>
        <div class=" alert alert-danger text-center">
            <?php echo $_SESSION['error'];

            unset ($_SESSION['error']); 
            ?>
        </div>
        <?php endif;?>
  </form>

</body>
</html>
<link  href="../users.css" rel="stylesheet">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>CONTENT</th>
            <th>ACTIONS</th>
            <th>ACTIONS</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $value) :  ?>  
        <tr>

            <td> <?php foreach($value as $one){
                 echo $one;
                }
            ?></td>

            
            <td>
                <a href="./handlers/deletetask.php?id=<? echo $data['id'];?>">Delete</a>
            </td>
            <td>
                <a href="./update.php?id=<?php echo $data['id'];?>?>">Update</a>
            </td>
           
        </tr>
        <?php endforeach; die;?>
       
    </tbody>
</table>