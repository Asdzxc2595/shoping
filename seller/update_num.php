<?php
    session_start();
    ob_start();
    require("../dbconnect.php");
    $detail_id = $_GET['id'];
    $detail_num = $_POST['detail_num'];
    $post_id = $_POST['post_id'];

    echo $post_id;
    
    $sql = "update orders_detail set detail_num = '$detail_num',
                                     post_id = $post_id where detail_id =$detail_id";
    $rs = $connect->query($sql);

    if($rs){?>
        <script>
            alert("เพิ่มข้อมูลเสร็จสิ้น");
           location.href = "notyet.php";
        </script>
   <?php }else{?>
    <script>
        alert("ไม่สามารถเพิ่มข้อมูลได้");
        location.href = "form_update_num.php?id=<?php echo $detail_id?>";
    </script>
 <?php  }?>
