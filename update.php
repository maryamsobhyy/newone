<link href="./style.css" rel="stylesheet">
<form action="./updatebackend.php" method="GET">
<label for="task">Enter a new task :</label><br>
<input  type=hidden id="task" name="id" value="<?php echo $_GET['id'];?>"><br></input>
<input type="text" id="task" name="title" value=""><br>
<input class="large" type="submit" value="Update ">
