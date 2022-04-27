<?php
if (isset($_GET['sno'])) {
    $pid = $_GET['sno'];
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "anonytalk";
    $connection = mysqli_connect($server, $username, $password, $database);
    $query = "SELECT * FROM `messages` WHERE `messages`.`S.No` = $pid";
    $q = mysqli_query($connection, $query);
    $qs = mysqli_fetch_assoc($q);
    echo "Title: " . $qs['Title'] . "<br> Date: " . $qs['Date'] . "<br> Post: <br>" . $qs['Post'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
</head>
<body>
    <form action="view.php" method="get" hidden>
        Post ID: <input type="text" name="sno">
    </form>
</body>
</html> 
