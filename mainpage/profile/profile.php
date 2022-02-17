<?php
include "../../logEvents.php";

session_start();
$username = $_SESSION['userlogin']['username'];

$img_src = $_SESSION['profile_photo'];

if (!isset($_SESSION['userlogin'])) {
    header("Location: login/login_index.php");
}
if (isset($_GET['logout'])) {
    logEvent($username . " logged out", $_SESSION['logpath']);
    unset($_SESSION);
    session_destroy();
    header("Location: ../../index.html");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<hr>


<body align='center'>

    <div>
        <a href="../mainpage.php">
            <img src="../imgs/banner.png" alt="" style="width: 100px; height: 50px" align='left'>
        </a>
        <div align="center">
            <img src="../imgs/bannername.png" alt="" style="width: 300px; height: 50px">
            <?php
            echo '<a href="profile.php">' . '<img src=' . $img_src . ' alt="profile" style="width: 50px;
        height: 50px; border-radius: 50% " align="right"></a>';
            ?>
        </div>
        <hr>
    </div>
    <div>
        <?php
        echo '<img src=' . $img_src . ' alt="profile" style="width: 200px;
        height: 200px; border-radius: 50% "></a>';
        echo '<br>';
        echo $_SESSION['userlogin']['username'];
        ?>
    </div>
    <hr>
    <p><br>
        This is your profile you can change profile photo in here
    </p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload: <br><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <hr> <br>
    </div>

    <div>
        <a href="liste/add_list.php">create new list</a> <br><br>
        <a href="liste/add_song.php">add song to a list</a><br><br>
    </div>

    <div align='center'>
        and here your playlists: <br><br>
        <?php

        $con = mysqli_connect("localhost", "root", "");

        $db = mysqli_select_db($con, "project");

        if (!$db) {
            die('cant use project: ' . mysqli_error($con));
        }

        // find users lists
        $list_query = "SELECT list_name, id from playlists where owner= '$username'";
        $list_result = mysqli_query($con, $list_query);


        if ($list_result) {
            if (mysqli_num_rows($list_result) > 0) {

                while ($row = mysqli_fetch_assoc($list_result)) {
                    $list_name = $row['list_name'];
                    $song_query = "SELECT song, artist FROM $list_name";
                    $song_result = mysqli_query($con, $song_query);

                    if ($song_result) {
                        if (mysqli_num_rows($song_result) >= 0) {
                            $_list_name = substr($row['list_name'], 0, strrpos($row['list_name'], "_"));
                            $_list_name = str_replace("_", " ", $_list_name);
                            echo $_list_name;
                            echo '<table border="2">';
                            echo '<tr>';
                            echo '<td> music name </td>';
                            echo '<td> artist </td>';
                            echo '</tr>';
                            while ($row1 = mysqli_fetch_assoc($song_result)) {
                                echo '<tr>';
                                echo '<td> ' . $row1['song'] . ' </td>';
                                echo '<td> ' . $row1['artist'] . ' </td>';
                                echo '</tr>';
                            }
                            echo '</table> <br>';
                        }
                    } else {
                        $mes = 'invalid quary: ' . mysqli_error($con) . '<br>';
                        die($mes);
                    }
                }
            }
        } else {
            $mes = 'invalid quary: ' . mysqli_error($con) . '<br>';
            die($mes);
        }
        ?>
        <!-- <a href="mainpage.php?logout=true">logout</a> -->
        <a href="profile.php?logout=true">logout</a>
    </div>

</body>

</html>