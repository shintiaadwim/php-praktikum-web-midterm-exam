<?php
    session_start();
    
    if (!isset($_SESSION['user_login'])  || $_SESSION['user_login'] !== true) {
        header("Location: http://localhost/pweb/login.php");
        exit();
    }
    
    include 'connection/koneksi.php';

    $sql = "SELECT * FROM siswa ORDER BY nrp";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
?>

<?php 
    $pageTitle = "Home";
    include 'cdn.php';
    include 'layouts/header.php';
    include 'layouts/sidebar.php';
?>

<div class="sm:ml-64 mt-14">
    <div class="p-4">
        <div class="pb-4 text-2xl font-bold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Daftar Mahasisawa 1 Teknik Informatika B
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row["name"]; ?></h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        Let me introduce myself. My name is <?php echo $row["name"]; ?>,
                        my student NRP is <?php echo $row["nrp"]; ?>.
                        I am <?php echo $row["age"]; ?> years old,
                        my gender is <?php echo $row["gender"]; ?>,
                        and I live at <?php echo $row["address"]; ?>.</p>
                </div>
            <?php
                }
            } else {
                echo "<tr><td colspan='5' class='px-4 py-2 border text-center'>No data found</td></tr>";
            }
            ?>
        </div>
    </div>
    <?php include 'layouts/footer.php'; ?>
</div>