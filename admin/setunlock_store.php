<?php
    session_start();        
    require("../dbconnect.php");
    $stores_id = $_GET['stores_id'];

    $sql = "update stores set stores_permit = 1 where stores_id = $stores_id ";
    $rs = $connect->query($sql);
    header("location:detail_store.php")
?>