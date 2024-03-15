<?php
    require("nav_seller.php");
    $store = $_SESSION['store'];

    $sql ="select * from orders_history 
                                inner join orders_detail on orders_history.ohistory_id = orders_detail.ohistory_id
                                inner join books on orders_detail.book_id = books.book_id
                                inner join orders on orders_detail.orders_id = orders.orders_id
                            where books.stores_id = $store and orders_detail.detail_status = 3";
    $rs = $connect->query($sql);
    $rb = $rb= mysqli_num_rows($rs);
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="nav-small mb-3" width="100%">
            <div class="bg-black" style="min-height:2.5rem;">
                <div width="100%" style="margin: 0 25% 0 25%;">
                    <div class="d-flex justify-content-center">
                        <div class="text-center my-2 fw-semibold fs-6 text-white"><a href="history_orders.php"
                                style="text-decoration: none;color:black;">
                                <div class="text-white">ประวัติการทั้งหมด</div>
                            </a></div>
                        <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a href="history_ordersuccess.php"
                                style="text-decoration: none; color:black;">
                                <div class="text-white">ประวัติการขาย</div>
                        </a></div>
                        <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a href="history_ordercancel.php"
                                style="text-decoration: none; color:black;">
                                <div class="text-white">ประวัติการยกเลิก</div>
                        </a></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <strong><p class="fs-2">ประวัติการขาย</p></strong>
        </div>
        <?php if($rb >0) { ?>  
        <div class='container-fluid d-flex justify-content-center table-responsive mt-3'>
            <table class="table table-bordered w-auto">
                <thead class='text-center'>
                     <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">รูปปกหนังสือ</th>
                        <th scope="col">ชื่อหนังสือ</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคาต่อเล่ม</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">ชื่อผู้ซื้อ</th>
                        <th scope="col">ที่อยู่ผู้ซื้อ</th>
                        <th scope="col">เบอร์โทรลูกค้า</th>
                        <th scope="col">สถานะชำระเงิน</th>
                        <th scope="col">เลขติดตามพัสดุ</th>
                        <th scope="col">สถานะการทำรายการ</th>
                    </tr>
                </thead>
                <?php 
                $a=1;    
                    while($r = $rs->fetch_object()) {   
                    $price = $r->detail_price; 
                    $num = $r->detail_quantity; 
                    $amount = $price*$num;    
                    
                ?>
                <tbody>
                    <?php if($r->detail_status == 3){?>    
                        <th class="text-center" scope="row"><?php echo $a++?></th>
                        <td><img width="150" height="180" src="<?php echo $r->book_img?>" alt=""></td>
                        <td><?php echo $r->book_name?></td>
                        <td width="80" class="text-center"><?php echo $r->detail_quantity?> เล่ม</td>
                        <td><?php echo $r->detail_price?> บาท </td>
                        <td><?php echo $amount?> บาท </td>
                        <td ><?php echo $r->orders_fullname?></td>
                        <td width="200" ><?php echo $r->orders_address?></td>
                        <td><?php echo $r->orders_phone?></td>
                        <td ><?php if($r->detail_slip !='') { ?>
                            <img width="150" height="200" src="<?php echo $r->detail_slip ?>" alt="">
                       <?php }else{ ?>
                                
                       <?php } ?></td>
                        <td>
                                <?php if($r->post_id == 1){ ?>
                                    <div class=""> ชื่อขนส่ง : Kerry Express</div>
                                <?php }else if($r->post_id == 2){ ?>
                                    <div class=""> ชื่อขนส่ง : Flash Express</div>
                                <?php }else if($r->post_id == 3){?>
                                    <div class=""> ชื่อขนส่ง : DHL Express</div>
                                <?php }else if($r->post_id == 4){?>
                                    <div class=""> ชื่อขนส่ง : Ninja Van</div>
                                <?php }else{?>
                                    <div class=""> ชื่อขนส่ง : J&T Express</div>
                                <?php }?>    
                            <?php echo $r->detail_num?></td>
                        <td class="bg bg-success text-center"><?php if($r->detail_status == 3){ ?>
                            <div class="text-white ">สำเร็จการขาย</div>
                        <?php }?></td>
                   <?php }else{ 

                   }?>
                </tbody>
                <?php }?>
            </table>
        </div> 
        <?php }else{?>
            
                    <h4 class="text-center">ยังไม่มีรายการ</h4>
                
        <?php }?>
    </body>
</html>