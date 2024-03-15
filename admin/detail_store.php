<?php
    require("nav_admin.php");
    $a = 0;
    $sql_stores = "select * from stores";
    $rs_stores = $connect->query($sql_stores);
    #$row_store = $rs_stores->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>รายชื่อร้านหนังสือ</title>
    </head>
    <body>
        <div class="text-center mt-2">
            <strong><p class="fs-2">ข้อมูลร้านหนังสือ</p></strong>
        </div>
            
        <div class='container-fluid d-flex justify-content-center table-responsive mt-3'>
            <table class="table table-bordered w-auto">
                <thead class='text-center'>
                <?php if($rs_stores->num_rows >0){?>
                     <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">รูปร้านค้า</th>
                        <th scope="col">ชื่อร้านค้า</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">เบอร์โทรร้านค้า</th>
                        <th scope="col">วันที่สมัคร</th>
                        <th scope="col">สถานนะ</th>
                        <th scope="col" width="">จัดการบัญชี</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while($r_store = $rs_stores->fetch_object()){ $a++; ?>
                    <tr>
                        <th scope="row"><?php echo $a?></th>
                        <td ><img width="150" height="180" src="<?php echo $r_store->stores_img?>" alt=""></td>
                        <td width="150" ><strong><?php echo $r_store->stores_name?></strong></td>
                        <td width="200"><?php echo $r_store->stores_address .' '. "จังหวัด" .' '. $r_store->stores_province .' '."อำเภอ".' '.$r_store->stores_district.' '."ไปรษณีย์".' '.$r_store->stores_zipcode ?></td>
                        <td width="150"><?php echo $r_store->stores_phone?></td>
                        <td width="150"><?php echo $r_store->stores_created?></td>
                        <td><?php if($r_store->stores_permit != 0){?>
                            <div class="btn btn-success">ปกติ</div>
                        <?php }else{?>
                            <div class="btn btn-danger">ล๊อค</div>
                        <?php }?></td>
                        <td class="text-center" width="200">
                            <a href='delete_store.php?id=<?php echo $r_store->stores_id?>' class='text-decoration-none'
                             onclick="return confirm('คุณต้องการลบร้านค้านี้หรือไม่')"><button class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></a>
                            <?php if($r_store->stores_permit != 0 ){ ?>
                                <a href='setlockstore_permit.php?stores_id=<?php echo $r_store->stores_id ?>' 
                                onclick="return confirm('คุณต้องการล็อคบัญชีนี้หรือไม่')"><button class="btn btn-warning text-white"><strong>ล็อค</strong></button></a>
                            <?php }else{ ?> 
                                <a href='setunlock_store.php?stores_id=<?php echo $r_store->stores_id ?>' 
                                onclick="return confirm('คุณต้องการปลดล็อคบัญชีนี้หรือไม่')"><button class="btn btn-warning text-white"><strong>ปลดล็อค</strong></button></a>
                            <?php }?>   
                            </td>                  
                    </tr>
                    <?php }?>
                </tbody>
                <?php }?>  
            </table>
        </div> 
          
    </body>
</html> 