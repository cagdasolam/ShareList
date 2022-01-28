<?php
session_start();

if (!isset($_SESSION['userlogin'])) {
    header("Location: login/login_index.php");
}

$username = $_SESSION['userlogin']['username'];
include "../../../logEvents.php";
$img_src = "../" . $_SESSION['profile_photo'];
$logPath = $_SESSION['logpath'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>add list</title>
    <meta charset="UTF-8">
</head>
<hr>

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

<body>
    <div id="listForm">
        <form method="POST">
            list name : <input type="list_name" name="list_name" required><br><br>
            <input type="submit">
        </form>
    </div>
</body>

<?php
if ($_POST) {
    $list_name = str_replace(" ", "_", $_POST['list_name']) . "_" . $username;

    $con = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($con, "project");

    if (!$db) {
        logEvent('could not use project: ' . mysqli_error($con), $logPath);
    }

    $insert_query = "INSERT INTO playlists (list_name, owner) VALUES ('$list_name', '$username')";

    $create_table_query = "CREATE TABLE $list_name (
        song    VARCHAR(100),
        artist VARCHAR(100)
    )";

    $create_table_result = mysqli_query($con, $create_table_query);

    if ($create_table_result) {

        //  if table created then insert it into playlists table
        $insert_list_result = mysqli_query($con, $insert_query);

        $log_msg = $username . " created '" . $list_name . "'";
        logEvent($log_msg, $logPath);
        header("Location: add_song.php");
    } else {
        $mes = $username . "could not add list" . 'invalid quary: ' . mysqli_error($con);
        logEvent($mes, $logPath);
    }
}
?>


</html>