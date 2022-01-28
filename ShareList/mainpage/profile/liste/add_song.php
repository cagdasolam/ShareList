<?php
session_start();

if (!isset($_SESSION['userlogin'])) {
    header("Location: login/login_index.php");
}

$username = $_SESSION['userlogin']['username'];
include "../../../logEvents.php";
$logPath = $_SESSION['logpath'];


$img_src = "../" . $_SESSION['profile_photo'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>add song</title>
    <meta charset="UTF-8">
</head>
<hr>


<body>

    <div>
        <a href="../../../mainpage/mainpage.php">
            <img src="../../imgs/banner.png" alt="" style="width: 100px; height: 50px" align='left'>
        </a>
        <div align="center">
            <img src="../../imgs/bannername.png" alt="" style="width: 300px; height: 50px">
            <?php
            echo '<a href="../profile.php">' . '<img src=' . $img_src . ' alt="profile" style="width: 50px;
        height: 50px; border-radius: 50% " align="right"></a>';
            ?>
        </div>
        <hr>
    </div>

    <div id="songForm">

        <form method="POST">

            <p>
                select playlist:
                <select name="list" id="list">
                    <?php
                    $con = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($con, "project");

                    if (!$db) {
                        logEvent('cant use project: ' . mysqli_error($con), $logPath);
                    }

                    $control_query = "SELECT list_name FROM playlists WHERE owner = '$username'";
                    $control_result = mysqli_query($con, $control_query);

                    if ($control_query) {
                        if (mysqli_num_rows($control_result) > 0) {
                            // echo mysqli_num_rows($control_result);
                            while ($row = mysqli_fetch_assoc($control_result)) {
                                $_list_name = substr($row['list_name'], 0, strrpos($row['list_name'], "_"));
                                $_list_name = str_replace("_", " ", $_list_name);
                                echo '<option value="' . $_list_name . '">' . $_list_name . "</option>";
                            }
                        }
                    } else {
                        $mes = "playlists did not display at add song";
                        logEvent($mes, $logPath);
                    }


                    ?>
                </select>
                <br><br>
            <p>
                song name : <input type="song_name" name="song_name" required><br><br>
            </p>
            <p>
                artist : <input type="artist_name" name="artist_name" required><br><br>
            </p>
            <input type="submit">
            </p>

        </form>
    </div>
</body>

<?php
if ($_POST) {
    $song_name = $_POST['song_name'];
    $artist = $_POST['artist_name'];
    $list_name = str_replace(" ", "_", $_list_name) . "_" . $username;

    $insert_query = "INSERT INTO $list_name VALUES ('$song_name', '$artist')";
    $insert_list_result = mysqli_query($con, $insert_query);

    if ($insert_list_result) {
        header("Location: add_song.php");
        $mes = $username . " add '" . $song_name . "' to '" . $list_name . "'";
        logEvent($mes, $logPath);
    } else {
        $mes = $username . 'can not add song to ' . $list_name;
        logEvent($mes, $logPath);
    }
}
?>


</html>