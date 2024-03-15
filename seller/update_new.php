<?php
    session_start();
    require("../dbconnect.php");
    $store = $_SESSION['store'];
    $newpro_id = $_GET['id'];

    $sql = "select * from newpro where newpro_id = $newpro_id";
    $rs = $connect->query($sql);
    $r = $rs->fetch_object();
    $newpro_img = "../seller/img/".basename($_FILES["newpro_img"]["name"]);
    move_uploaded_file($_FILES["newpro_img"]["tmp_name"],$newpro_img);

    if($_FILES["newpro_img"]["name"] != ''){
        $newpro_img = "../seller/img/".basename($_FILES["newpro_img"]["name"]);
    }else{
        $newpro_img = $r->newpro_img;
    }
    if($_POST["newpro_name"] != ''){
        $newpro_name = $_POST["newpro_name"];
    }else{
        $newpro_name = $r->newpro_name;  
    }
    if($_POST["newpro_detail"] != ''){
        $newpro_detail = $_POST["newpro_detail"];
    }else{
        $newpro_detail = $r->newpro_detail;
    }  
    
    $sql_up = "update newpro set newpro_img = '$newpro_img',
                                 newpro_name = '$newpro_name',
                                 newpro_detail = '$newpro_detail'
               where newpro_id = $newpro_id";

    $rs_up = $connect->query($sql_up);
    
    
    
    if(!$rs_up){
?>
        <script>
            alert("ไม่สามารถเพิ่มได้ กรุณาตรวจสอบข้อมูล");
            location.href = "form_edit_news.php?id=<?php echo $newpro_id?>";
        </script>
<?php        
    }else{
?>
        <script>
            alert("เพิ่มข้อมูลสำเร็จ");
            location.href = "new&promo.php";
        </script>
<?php        
    }
?>