<?php
    session_start();
    require("../dbconnect.php");
    $wishlist = $_GET["id"];
    $sql = "DELETE FROM wishlist WHERE wishlist_id = $wishlist";
    $rs = $connect->query($sql);
    header("location:wishlist.php?a=remove");
?>