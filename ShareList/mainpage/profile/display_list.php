<?php
session_start();

if (!isset($_SESSION['userlogin'])) {
    header("Location: login/login_index.php");
}

$username = $_SESSION['userlogin']['username'];

$con = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db($con, "project");

if (!$db) {
    die('cant use project: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>display</title>
</head>

<body>
    <?php
    $query = "SELECT list_name from playlists where owner= '$username'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table border="2">';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';

                echo '<td> <input type="submit" name="btnSubmit" value="' . $row['list_name'] . '">  </td>';

                echo '</tr>';
            }
            echo '</table>';
        }
    } else {
        $mes = 'invalid quary: ' . mysqli_error($con) . '<br>';
        die($mes);
    }
    ?>
</body>

</html>