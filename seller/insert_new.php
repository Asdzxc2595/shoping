<?php
    session_start();
    require("../dbconnect.php");

    $newpro_img =  "../seller/img/".basename($_FILES["newpro_img"]["name"]);
    $newpro_name = $_POST['newpro_name'];
    $newpro_detail = $_POST['newpro_detail'];
    $store = $_SESSION['store'];

    $sql = "insert into newpro (newpro_img,newpro_name,newpro_detail,stores_id) 
            values ('$newpro_img','$newpro_name','$newpro_detail',$store)";
    $rs = $connect->query($sql);

    if($rs){
        move_uploaded_file($_FILES["newpro_img"]["tmp_name"],$newpro_img);
?>
        <script>
            alert("เพิ่มข้อมูลข่าวสารสือสำเร็จ");
            location.href = "new&promo.php";
        </script>
<?php
    }else{
?>
        <script>
            alert("้พิ่มข้อมูลข่าวสารไม่สำเร็จกรุณาตรวจสอบข้อมูล");
            location.href = "form_insert_new&promo.php";
        </script>
<?php
    }
?>