<!DOCTYPE html>
<html>

<head>
    <!--
        Author: Çağdaş Olam 260201002
        Date: 04.01.22
    -->
    <title>Sign up</title>
    <meta charset="UTF-8">
</head>


<body>
    <div>
        <img src="../mainpage/imgs/banner.png" alt="" style="width: 100px; height: 50px" align='left'>
        <div align="center">
            <img src="../mainpage/imgs/bannername.png" alt="" style="width: 300px; height: 50px">    
        </div>
        <hr>
    </div>
    <div id="registerForm" align="center">
        <form method="POST">
            username : <input type="username" name="username" required><br><br>
            password : <input type="password" name="password" required><br><br>
            e-mail : <input type="email" name="email" required><br><br>
            <input type="submit">
        </form>
    </div>
</body>

<?php
if ($_POST) {

    session_start();
    include "../logEvents.php";


    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $email = $_POST["email"];

    $con = mysqli_connect("localhost", "root", "");

    $db = mysqli_select_db($con, "project");

    if (!$db) {
        die('cant use project: ' . mysqli_error($con));
    }

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);


    if (mysqli_num_rows($result) > 0) {
        echo "<script type='text/javascript'>alert('username has already taken');</script>";
    } else {
        $quar = mysqli_query($con, "INSERT INTO users (username, email, password)
            VALUES('$username', '$email', '$password')");

        if (!$quar) {
            $mes = 'invalid quary: ' . mysqli_error($con) . '<br>';
            die($mes);
        } else {
            echo "<script type='text/javascript'>alert('Successfully registered');</script>";
            logEvent($username . " registered in to site.", "../logEvents.txt");
            $_SESSION['userlogin'] = array('username' => $username);
            header("Location: ../mainpage/mainpage.php");
        }
    }

    mysqli_close($con);
}
?>

</html>