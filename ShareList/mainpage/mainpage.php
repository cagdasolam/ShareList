<?php
session_start();
include "../logEvents.php";


if (!isset($_SESSION['userlogin'])) {
    header("Location: ../login/login_index.php");
}

if (!isset($_SESSION['logpath'])) {
    $path = realpath("../logEvents.txt");
    $_SESSION['logpath'] = $path;
}

$con = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db($con, "project");

$username = $_SESSION['userlogin']['username'];
$path = $_SESSION['logpath'];

if (isset($_GET['logout'])) {
    // unset($_COOKIE['logpath']);
    logEvent($username . " logged out", $path);
    unset($_SESSION);
    session_destroy();
    header("Location: ../index.html");
}


$query = "SELECT profil_photo FROM users WHERE username = '$username'";
$result = mysqli_query($con, $query);

if (!$result) {
    $mes = 'invalid quary: ' . mysqli_error($con) . '<br>';
    die($mes);
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['profil_photo'] == null) {
            $img_src = 'uploads/default.jpg';
        } else {
            $img_src = $row['profil_photo'];
        }
    }
}

$_SESSION['profile_photo'] = $img_src;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>mainpage</title>
</head>

<body>
    <hr>

    <div>
        <a href="mainpage.php">
            <img src="imgs/banner.png" alt="" style="width: 100px; height: 50px" align='left'>
        </a>
        <div align="center">
            <img src="imgs/bannername.png" alt="" style="width: 300px; height: 50px">
            <?php
            echo '<a href="profile/profile.php">' . '<img src=profile/' . $img_src . ' alt="profile" style="width: 50px;
        height: 50px; border-radius: 50% " align="right"></a>';
            ?>
        </div>
        <hr>
    </div>

    <div align='center'>
        <br>
        <?php
        $list_query = "SELECT list_name, owner from playlists";
        $list_result = mysqli_query($con, $list_query);


        if ($list_result) {
            if (mysqli_num_rows($list_result) > 0) {

                while ($row = mysqli_fetch_assoc($list_result)) {
                    $list_name = $row['list_name'];
                    $list_owner = $row['owner'];
                    $song_query = "SELECT song, artist FROM $list_name";
                    $song_result = mysqli_query($con, $song_query);

                    if ($song_result) {
                        if (mysqli_num_rows($song_result) >= 0) {

                            $_list_name = substr($row['list_name'], 0, strrpos($row['list_name'], "_"));
                            $_list_name = str_replace("_", " ", $_list_name);
                            echo $_list_name;
                            echo "<br>shared by " . $list_owner;
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
                        $mes = 'invalid quary şarkı: ' . mysqli_error($con) . '<br>';
                        die($mes);
                    }
                }
            }
        } else {
            $mes = 'invalid quary liste : ' . mysqli_error($con) . '<br>';
            die($mes);
        }
        mysqli_close($con);

        ?>
        <br>
    </div>

    <div>

        <a href="mainpage.php?logout=true">logout</a>
    </div>

</body>

</html>