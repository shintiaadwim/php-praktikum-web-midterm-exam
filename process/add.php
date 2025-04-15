<?php
include '../connection/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nrp = $_POST['nrp'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $check = "SELECT * FROM siswa WHERE nrp='$nrp'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "Data sudah ada!";
    } else {
        $sql = "INSERT INTO siswa (nrp, name, age, gender, address)
                VALUES ('$nrp', '$name', '$age', '$gender', '$address')";
        if (mysqli_query($conn, $sql)) {
            header("Location: http://localhost/pweb/index.php");
            exit();
        }
    }

    mysqli_close($conn);
}
?>
