<?php 
    session_start();
    ob_start();
    require("../dbconnect.php");
    $detail_id = $_GET['detail_id'];
    $stores_id = $_GET['store_id'];
    
    $sql = "update orders_detail set detail_status = 3 where detail_id = $detail_id";

    if($_SESSION['store'] == $stores_id){
        $rs = $connect->query($sql);

        if($rs){
            $sql_in = "insert into orders_history(detail_id) values($detail_id)"; 
            $rs_in = $connect->query($sql_in);
            
            $sql_se = "select * from orders_history where detail_id = $detail_id";
            $rs_se = $connect->query($sql_se);
            $r = $rs_se->fetch_object();
            $ohistory_id = $r->ohistory_id;
            
            $update = "update orders_detail set ohistory_id = $ohistory_id where detail_id = $detail_id";
            $rs_update = $connect->query($update);
        }
?>
        <script>
        alert("ยืนยันเสร็จสิ้น");
        location.href = "notyet.php";
        </script>
<?php
    }
?>