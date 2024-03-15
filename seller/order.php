<?php 
    require("nav_seller.php");
    $store = $_SESSION['store'];
    
    $sql = "select * from books
                        inner join orders_detail on books.book_id = orders_detail.book_id 
                        inner join orders on orders_detail.orders_id = orders.orders_id
            where books.stores_id = $store and orders_detail.detail_status = 0";
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
                        <div class="text-center my-2 fw-semibold fs-6 text-white"><a href="order.php"
                                style="text-decoration: none;color:black;">
                                <div class="text-white">รายการสั่งซื้อ</div>
                            </a></div>
                        <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a href="orders_success.php"
                                style="text-decoration: none; color:black;">
                                <div class="text-white">รายการที่จัดส่งแล้ว</div>
                        </a></div>
                        <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a href="notyet.php"
                                style="text-decoration: none; color:black;">
                                <div class="text-white">รายการที่ยังไม่จัดส่ง</div>
                        </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <strong><p class="fs-2">รายการสั่งซื้อ</p></strong>
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
                        <th scope="col">สถานะชำระเงิน</th>
                        <th scope="col">จัดการ</th>
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
                    <?php if($r->detail_status == 0){?>    
                        <th class="text-center" scope="row"><?php echo $a++?></th>
                        <td><img width="150" height="180" src="<?php echo $r->book_img?>" alt=""></td>
                        <td><?php echo $r->book_name?></td>
                        <td width="80" class="text-center"><?php echo $r->detail_quantity?> เล่ม</td>
                        <td><?php echo $r->detail_price?> บาท </td>
                        <td><?php echo $amount?> บาท </td>
                        <td ><?php echo $r->orders_fullname?></td>
                        <td width="200" ><?php echo $r->orders_address?></td>
                        <td ><?php if($r->detail_slip !='') { ?>
                            <img width="150" height="200" src="<?php echo $r->detail_slip ?>" alt="">
                       <?php }else{ ?>
                                
                       <?php } ?></td>
                        <td class="text-center" width="200"><a href='go_notyet.php?id=<?php echo $r->detail_id?>' 
                            class='text-decoration-none text-white'><button class='btn btn-warning mx-1'>ยืนยัน</button></a>
                            <a href='delete_order.php?id=<?php echo $r->detail_id?>' class='text-decoration-none text-white' >
                            <button onclick="return confirm('คุณต้องการยกเลิกรายการนี้หรือไม่')" class='btn btn-danger mx-1'>ยกเลิก</button></a>
                        </td>
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