<?php
include '../connection/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nrp     = $_POST['nrp'];
    $name    = $_POST['name'];
    $age     = $_POST['age'];
    $gender  = $_POST['gender'];
    $address = $_POST['address'];

    $check = "SELECT * FROM siswa WHERE nrp='$nrp'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        header("Location: http://localhost/pweb/index.php?error=nrp_sudah_ada");
        exit;
    }

    $sql = "INSERT INTO siswa (nrp, name, age, gender, address)
            VALUES ('$nrp', '$name', '$age', '$gender', '$address')";
    if (!mysqli_query($conn, $sql)) {
        die('Gagal insert siswa: ' . mysqli_error($conn));
    }

    $siswaid = mysqli_insert_id($conn);

    $uploadDir   = 'file/';
    $dirTujuan   = '../file/';

    $ekstensi = strtolower(pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION));
    $fileName = $siswaid . '_' . time() . '.' . $ekstensi;
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
    $filePath = $uploadDir . $fileName;

    if (!move_uploaded_file($tmpName, $dirTujuan . $fileName)) {
        die('Gagal mengunggah file.');
    }

    $fileName = mysqli_real_escape_string($conn, $fileName);
    $filePath = mysqli_real_escape_string($conn, $filePath);
    $uploadQuery = "INSERT INTO upload (name, size, type, path, siswaid, content)
                    VALUES ('$fileName', '$fileSize', '$fileType', '$filePath', '$siswaid', '$ekstensi')";
    if (!mysqli_query($conn, $uploadQuery)) {
        die('Gagal simpan data upload: ' . mysqli_error($conn));
    }

    header("Location: http://localhost/pweb/index.php?success=1");
    exit;
}
?>
