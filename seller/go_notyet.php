<?php
    session_start();
    require("../dbconnect.php");

    $detail_id = $_GET['id'];
    $sql_up = "update orders_detail set detail_status = 1 where detail_id = $detail_id";
    $rs_up = $connect->query($sql_up);


    $sql = "UPDATE books INNER JOIN orders_detail ON books.book_id = orders_detail.book_id SET book_stock = book_stock - detail_quantity WHERE detail_id = $detail_id";
    mysqli_query($connect, $sql);
    
    header("location:order.php");
?>