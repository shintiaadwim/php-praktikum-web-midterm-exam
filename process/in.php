<?php
    session_start();
    include '../connection/koneksi.php';

    if (isset($_POST['userid']) && isset($_POST['pass'])) {
        $userid = $_POST['userid'];
        $pass = $_POST['pass'];

        $sql = "SELECT userid FROM users WHERE userid = '$userid' AND pass ='$pass'";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) == 1) {

        $_SESSION['user_login'] = true;
            header("Location: http://localhost/pweb/home.php");
            exit();
        } 
    }
?>