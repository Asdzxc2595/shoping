<?php
session_start();
require("dbconnect.php");

if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
  window.location.replace('../loginform.php');</script>";
    exit(0);
}   
    $orders_id = $_GET['orders_id'];
    $stores_id = $_GET['stores_id'];
    

    $sqls = "SELECT * FROM books where stores_id = $stores_id";
    $rss = $connect->query($sqls);
    $acb = mysqli_num_rows($rss);


    while($r = $rss->fetch_object()){
            $detail_slip= "../seller/img/" .basename($_FILES["detail_slip"]["name"]); 
            $sql = "update orders_detail set detail_slip = '$detail_slip' where orders_id = $orders_id and book_id = $r->book_id";
            move_uploaded_file($_FILES["detail_slip"]["tmp_name"],$detail_slip);
            $rs = $connect->query($sql);
        }
      header("location:buyer_checkout_detail.php?id= $orders_id");
?>