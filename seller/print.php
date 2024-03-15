<?php 
    session_start();
    require("../dbconnect.php");
    $store = $_SESSION['store'];
    $orders_id = $_GET['orders_id'];
    $sql = "select * from books
                        inner join orders_detail on books.book_id = orders_detail.book_id 
                        inner join orders on orders_detail.orders_id = orders.orders_id
                        where orders_detail.orders_id = $orders_id ";
    $rs = $connect->query($sql);
    $rb = $rb= mysqli_num_rows($rs);
    $r = $rs->fetch_object();

    $sqlr = "select * from stores where stores_id = $store";
    $s = $connect->query($sqlr);
    $ss = $s->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/solid.css" rel="stylesheet">
    <title>Document</title>
</head>
<body> 
   <div class="" width="100%" style="padding:5% 20% 5% 20%;">
        <div class="border border-5 " style="min-width:750px;max-width:750px;min-height:500px;max-height:500px;">
            <div class="p-4">
                <div class="row g-0 ">
                    <div class="col-sm-6 col-md-8 " style="width:200px;"><h3>ผู้ส่ง From.&nbsp&nbsp</h3></div>
                    <div class="col-6 col-md-4"><h3>โทร. <?php echo $ss->stores_phone?></h3></div>
                </div>
                <h4>ชื่อผู้ส่ง : &nbsp<?php echo $ss->stores_name?> <php></h4>
                <h4>
                    ที่อยู่ : &nbsp<?php echo $ss->stores_address;?> อำเภอ.<?php echo $ss->stores_district;?> จังหวัด.<?php echo $ss->stores_province;?>
                    รหัสไปรษณีย์.<?php echo $ss->stores_zipcode?>
                </h4>
            </div>
            
             
                <div class="mt-5" style="padding-left:230px;"><h3>ผู้รับ To.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspโทร. &nbsp&nbsp<?php  echo $ss->stores_phone?></h3></div>
                <div class="" style="margin-left:230px;">
                    <h4>ชื่อผู้รับ : <?php echo $r->orders_fullname?></h4>
                    <h4>ที่อยู่ผู้รับ : <?php echo $r->orders_address?></h4>
                </div>
                </div>
                
                
            </div>
            </div>
            
        </div>
        <div class="text-center"><?php echo "<input type='button' onclick='javascript:print()' value='สั่งปริ้น'>";?>  </div>
        
        
   </div>
   
</body>
</html>