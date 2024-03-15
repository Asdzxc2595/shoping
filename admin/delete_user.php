<?php
    session_start();
    require("../dbconnect.php");

    $user_id = $_GET['id'];
    $sql = "delete from users where users_id = $user_id";
    $rs = $connect->query($sql);

    header("location:detail_users.php");
?>