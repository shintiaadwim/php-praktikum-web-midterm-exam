<?php
include '../connection/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 
    $nrp = $_POST['nrp'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $sql = "UPDATE siswa SET nrp='$nrp', name='$name', age='$age', gender='$gender', address='$address' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/pweb/index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
