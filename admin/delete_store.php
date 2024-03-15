<?php
    session_start();
    require("../dbconnect.php");

    $stores_id = $_GET['id'];
    $sql = "delete from stores where stores_id = $stores_id";
    $rs = $connect->query($sql);

    header("location:detail_store.php");
?>