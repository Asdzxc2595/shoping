<?php
    session_start();
    require("../dbconnect.php");

    $detail_id = $_GET['id'];

    $sql_up = "update orders_detail set detail_status = 2
                                    where detail_id = $detail_id";
    $rs_up = $connect->query($sql_up);
    if($rs_up ){
        $sql_up_his = "insert into orders_history(detail_id) values($detail_id)";
        $rs_up_his = $connect->query($sql_up_his);

        
        $sql_se = "select * from orders_history where detail_id = $detail_id";
        $rs_se = $connect->query($sql_se);
        $r = $rs_se->fetch_object();
        $ohistory_id = $r->ohistory_id;

        $update = "update orders_detail set ohistory_id = $ohistory_id where detail_id = $detail_id";
        $rs_update = $connect->query($update);
            
    }
    header("location:order.php");
?>