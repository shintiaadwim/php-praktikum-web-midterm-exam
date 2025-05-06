<?php
include '../connection/koneksi.php';

    $uploadDir = '../file/';
    if (isset($_POST['upload'])) {
        $fileName = $_FILES['userfile']['name'];
        $tmpName = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];
        $filePath = $uploadDir . $fileName;
        $uploadResult = move_uploaded_file($tmpName, $filePath);

        if (!$uploadResult) {
        echo "Error uploading file";
        exit;
        }

        if (!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
        $filePath = addslashes($filePath);
        }

        $uploadQuery = "INSERT INTO upload (name, size, type, path ) VALUES ('$fileName', '$fileSize', '$fileType', '$filePath')";
        mysqli_query($conn, $uploadQuery) or die('Error, query failed : ' .mysqli_error());
}
?>