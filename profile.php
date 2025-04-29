<?php
    include "connection/koneksi.php";

    session_start();
    $pageTitle = "User Profile";
    if (!isset($_SESSION['userid'])) {
        header("Location: http://localhost/pweb/login.php");
        exit();
    }

    $userid = $_SESSION['userid'];

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE userid = $userid");
    $data = mysqli_fetch_array($sql);
?>

<?php 
    include 'cdn.php';
    include 'layouts/header.php';
    include 'layouts/sidebar.php';
?>

<div class="p-4 sm:ml-64 flex items-center justify-center h-screen">
    <div class="relative w-full max-w-md max-h-full">
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="edit-profile.php""
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="img/<?= $data['fotoprofil'] ?>" />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?php echo $row['nrp']; ?></h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $row['name']; ?></span>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $row['email']; ?></span>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $row['place']; ?><?php echo $row['birth']; ?></span>
            </div>
        </div>
    </div>
    <?php include 'layouts/footer.php'; ?>
</div>