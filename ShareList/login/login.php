<!DOCTYPE html>
<html>

<head>
    <!--
        Author: Çağdaş Olam 260201002
        Date: 16.12.21
    -->
    <title>Sign up</title>
    <meta charset="UTF-8">
</head>


<body>
    <?php
    if ($_POST) {

        session_start();
        if (!isset($_SESSION['logpath'])) {
            $path = realpath("../logEvents.txt");
            $_SESSION['logpath'] = $path;
        }

        include "../logEvents.php";


        $username = $_POST["username"];
        $password = sha1($_POST["password"]);

        $con = mysqli_connect("localhost", "root", "");

        $db = mysqli_select_db($con, "project");

        if (!$db) {
            die('could not use project: ' . mysqli_error($con));
        }

        $query = "SELECT username, password FROM users";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($username == $row['username'] && $password == $row['password']) {
                    // giriş yaptı

                    logEvent($username . " logged in to site.", "../logEvents.txt");
                    $_SESSION['userlogin'] = $row;
                    header("Location: ../mainpage/mainpage.php");

                    break;
                } else {
                    // giriş yapamadı
                    // header("Location: login_index.php");
                    echo "<script type='text/javascript'>alert('username or password is incorrect');</script>";
                }
            }
        } else {
        }

        mysqli_close($con);
    }
    ?>

</body>

</html>