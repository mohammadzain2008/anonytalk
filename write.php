<?php
    $submit = false;
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $msg = $_POST['msg'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "anonytalk";
    $connection = mysqli_connect($server, $username, $password, $database);

    $query = "INSERT INTO `messages` (`S.No`, `Date`, `Title`, `Post`) VALUES (NULL, current_timestamp(), '$title', '$msg');";

    if ($connection->query($query) == true) {
        $submit = true;
    } else {
        echo "<h3> Failed to post message! </h3> <br> ERROR: " . $query . "<br>" . $connection->error;
        $submit = false;
    }
    $connection->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Post a Message</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/write.css">
</head>

<body>
<div class="nav">
        <a href="./" class="link">Home</a>
        <a href="posts" class="link">Read Posts</a>
        <a href="write" class="link">Post a message</a>
        <a href="#" class="link">About</a>
    </div>
    <div class="faram"> 
        <h2>Post a Message</h2>
            <form action="write.php" method="post">
            <?php 
            if($submit == false){
                echo "<h6 style='color: red;'>Avoid characters like ), (, ', ". '"' . ", $, %, \\</h6>";
            } else{
                echo "<h5 style='color: green;'>Posted Successfully!</h5>";
                echo "<a href='http://localhost/anoytalk'>Go to Home</a>";
            }?>
            <input type="text" name="title" id="title" placeholder="Your Title">
            <br>
            <br>
            <textarea name="msg" id="msg" cols="30" rows="10" draggable="false" placeholder="Your Post"></textarea>
            <br>
            <button type="submit" id="btn">Post</button>
        </form>
    </div>
    <script src="placeholder_write.js"></script>
    
</body>

</html>