<?php
    session_start();
    include '../connection/koneksi.php';

    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'img/profile/';
        $ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
        $imageName = uniqid('IMG_') . '.' . $ext;
        $filename = $_FILES['profile']['name'];
        $targetPath = $uploadDir . $imageName;

        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        move_uploaded_file($_FILES['profile']['tmp_name'], $targetPath);
    }

    $sql = "UPDATE users
            SET nrp = '$nrp', name = '$name', email = '$email', place = '$place', birth = '$birth', address = '$address', username = '$username', pass = '$pass', profile = '$profile'
            WHERE userid = '$userid'";

    if(mysqli_query($conn, $sql)) {
        header("Location: http://localhost/pweb/profile.php");
    }
?>