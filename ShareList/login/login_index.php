<?php
session_start();

if (isset($_SESSION['userlogin'])) {
    header("Location: ../mainpage/mainpage.php");
}
?>

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
        <div id="loginForm" align="center">
            <form action="login.php" method="POST">
                username : <input type="username" name="username" required><br><br>
                password : <input type="password" name="password" required><br><br>
                <input type="submit">
            </form>
        </div>
    </div>
</body>

</html>