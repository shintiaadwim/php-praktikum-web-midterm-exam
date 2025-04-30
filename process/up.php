<?php
include '../connection/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nrp = $_POST['nrp'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    $birth = $_POST['birth'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $profile = $_POST['profile'];

    $md5_pass = md5($pass);

    $sql = "INSERT INTO users (nrp, name, email, place, birth, address, username, pass, profile)
            VALUES ('$nrp', '$name', '$email', '$place', '$birth', '$address', '$username', '$md5_pass', '$profile')";

    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/pweb/login.php");
    } 
}
?>
