<?php

session_start();

require("dbconnect.php");

// Check if the user session variable exists
if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
  window.location.replace('../loginform.php');</script>";
    exit(0);
}

$user = $_SESSION["user"];
$store = $_GET["store"];
$rating = $_GET['rating'];

$sql = "SELECT * FROM rating WHERE users_id = $user AND stores_id = $store";
$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
    $query = "UPDATE rating SET rating = $rating WHERE users_id = '$user' AND stores_id = '$store'";
    $result = mysqli_query($connect, $query);
    header("location: buyer_store_detail.php?storeId=$store");
} else {
    // Insert the rating into the database
    $query = "INSERT INTO rating (rating, users_id, stores_id) VALUES ($rating, $user, $store)";
    $result = mysqli_query($connect, $query);
    header("location: buyer_store_detail.php?storeId=$store");
}
?>