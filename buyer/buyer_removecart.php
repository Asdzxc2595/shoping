<?php
session_start();
 
if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
  window.location.replace('../loginform.php');</script>";
    exit(0);
}

$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
 
if (!isset($_SESSION['cart']))
{
$_SESSION['cart'] = array();
$_SESSION['qty'][] = array();
}
 
$key = array_search($itemId, $_SESSION['cart']);
$_SESSION['qty'][$key] = "";
 
$_SESSION['cart'] = array_diff($_SESSION['cart'], array($itemId));
header('location:buyer_cart.php?a=removed');
?>