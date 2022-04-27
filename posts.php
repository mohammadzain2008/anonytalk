        <?php
        if (isset($_POST['anx'])) {
            $serial = $_POST['anx'];
            setcookie($serial, "disabled");
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "anonytalk";
            $connection = mysqli_connect($server, $username, $password, $database);
            $query = "SELECT * FROM `messages` WHERE `S.No` = $serial;";
            $sent = mysqli_query($connection, $query);
            $fetch = mysqli_fetch_assoc($sent);
            $likes = $fetch['Likes'];
            $int = (int)$likes;
            $int = $int + 1;
            $q = "UPDATE `messages` SET `Likes` = '$int' WHERE `messages`.`S.No` = $serial;";
            $dx = mysqli_query($connection, $q);
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Anony-i-talk</title>
            <link rel="stylesheet" href="css/navbar.css">
            <link rel="stylesheet" href="css/posts.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>
        <div class="nav">
        <a href="./" class="link">Home</a>
        <a href="posts" class="link">Read Posts</a>
        <a href="write" class="link">Post a message</a>
        <a href="#" class="link">About</a>
    </div>
                <br>
                <h1 style="font-family: Arial, Helvetica, sans-serif;">Latest Messages</h1>
                <div class="container">
                    <div class='msg'>
                        <h3 class='tle'><a class='lnk' href='#'> Welcome to Anonytalk</a></h3>
                        <h5 class='date'>2022-04-21 21:02:18</h5>
                        <p class='post'>Welcome to Anonytalk. I am WOLF2606, the creator of this platform. I did not make this platform with the intention to bully someone, harm or commit cyber crime. This platform is purely meant for anonymous talking and conversation only. <br> If you still have any sort of issue with this regard, contact WOLF2606</p>
                    </div>
                    <?php
                    if (1 == 1) {
                        $server = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "anonytalk";
                        $connection = mysqli_connect($server, $username, $password, $database);
                        $query = "SELECT * FROM `messages`";
                        $q = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($q)) {
                            $items[] = $row;
                        }
                        if (sizeof($items) == 0) {
                            die("<h3>NO RESULTS!</h3>");
                        }
                        $items = array_reverse($items, true);

                        foreach ($items as $item) {
                            $mash = "";
                            $excerpt = substr($item['Post'], 0, 150);
                            if (isset($_COOKIE[$item['S.No']])) {
                                $mash = $_COOKIE[$item['S.No']];
                            }
                            echo "<div class='msg'>
                    <h3 class='tle'><a class='lnk' href='view.php?sno=" . $item['S.No'] . "'>" . $item['Title'] . "</a></h3> <h5 class='date'>" . $item['Date'] . "</h5><p class='post'>" . $excerpt . "...</p><form action='posts.php' method='post'><input type='text' value='" . $item['S.No'] . "' name='anx' hidden><button type='submit' id='likee' class='like_btn' $mash><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-hand-thumbs-up-fill' viewBox='0 0 16 16'>
                        <path d='M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z'/>
                      </svg></button><span>" . $item['Likes'] . " Likes</span></form></div>";
                        }
                    }
                    ?>

                </div>
        </body>

        </html>