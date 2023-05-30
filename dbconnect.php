<?php
    $connect = mysqli_connect("localhost","root","","bookwhalesdb");
    if ($connect->connect_error) {
        die("การเชื่อมต่อผิดพลาด :" .$connect->connect_error);
    }
?>