<?php
    session_start();
    require("../dbconnect.php");
    $book_id = $_GET["id"];
    $sql = "delete from books where book_id = $book_id";
    $rs = $connect->query($sql);
    header("location:seller_editgoods.php");
?>