<?php
    session_start();
    include '../connection/koneksi.php';

    if (isset($_POST['userid']) && isset($_POST['pass'])) {
        $userid = $_POST['userid'];
        $pass = $_POST['pass'];

        $md5_pass = md5($pass);

        $sql = "SELECT * FROM users WHERE username = '$userid' AND pass ='$md5_pass'";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['user_login'] = true;
            $_SESSION['userid'] = $userid;
            header("Location: http://localhost/pweb/home.php");
        } 
    }
?>