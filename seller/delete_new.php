<?php
    session_start();
    require("../dbconnect.php");
    $newpro_id = $_GET['id'];

    $sql = "delete from newpro where newpro_id = $newpro_id";

   
    $rs = $connect->query($sql);

    header("location:new&promo.php");
?>