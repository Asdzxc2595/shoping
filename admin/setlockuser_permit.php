<?php
    session_start();
    require("../dbconnect.php");

    $users_id = $_GET['users_id'];
    $sql = "update users set users_permit = 0 where users_id = $users_id";    
    $rs = $connect->query($sql);
    header("location:detail_users.php");
?>