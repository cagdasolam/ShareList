<?php
session_start();

if (!isset($_SESSION['userlogin'])) {
    header("Location: login/login_index.php");
}

include "../../logEvents.php";

$logPath = $_SESSION['logpath'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>

<?php

$con = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db($con, "project");

if (!$db) {
    logEvent('could not use project: ' . mysqli_error($con), $logPath);
}

// i prefered uploaded images name is start with user name to prevent confusion
// in db usernames are unique so even uploaded images' names are same there will be no overwrite 
$username = $_SESSION['userlogin']['username'];
$target_dir = 'uploads/' . $username;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    logEvent($username . " photo was not uploaded.", $logPath);
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $query = "UPDATE users SET profil_photo='$target_file' 
        WHERE username = '$username'";
        $result = mysqli_query($con, $query);


        if ($result) {
            logEvent($username . " photo " . $target_dir . " has been uploaded", $logPath);

            header("Location: ../mainpage.php");
            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        }
    } else {
        logEvent($username . "could not uploaded photo.", $logPath);
    }
}

mysqli_close($con);

?>

</html>