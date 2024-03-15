<?php 
    require("nav_seller.php");
    $store = $_SESSION['store'];
    $no =0;
    $sql = "select * from newpro where stores_id = $store"; 
    $rs = $connect->query($sql);
?>
<body>
    <div class="nav-small mb-3" width="100%">
        <div class="bg-black" style="min-height:2.5rem;">
            <div width="100%" style="margin: 0 25% 0 25%;">
                <div class="d-flex justify-content-center">
                    <div class="text-center my-2 fw-semibold fs-6 text-white"><a href="form_insert_new&promo.php"
                            style="text-decoration: none;color:black;">
                            <div class="text-white">เพิ่มข่าวสาร</div>
                        </a></div>
                    <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a href="new&promo.php"
                            style="text-decoration: none; color:black;">
                            <div class="text-white">จัดการข่าวสาร</div>
                    </a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="" width="100%">
        <div  style="margin:2% 10% 2% 10%;">
            
            <?php if($r = $rs->num_rows > 0) { ?>
                <div class="" style="margin:2% 42% 2% 42%;">
                    <h2>รายการข่าวสาร</h2>
                </div>
                <div class='table-responsive mt-3'>
                <table class='table table-bordered w-auto'>
                    <thead class='text-center'>
                        <tr>
                            <th scope='col'>ลำดับ</th>
                            <th scope='col'>รูปภาพประกอบ</th>
                            <th scope='col'>หัวข้อข่าวสาร</th>
                            <th scope='col'>รายละเอียดข่าวสาร</th>
                            <th scope='col'>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($r = $rs->fetch_object()){ $no++;?>
                            <tr>
                                <th class="text-center"><?php echo $no?></th>
                                <td ><img width="600" height="300" src="<?php echo $r->newpro_img?>" alt=""></td>
                                <td width="180"><?php echo $r->newpro_name?></td>
                                <td width="400"><?php echo $r->newpro_detail?></td>
                                <td class='text-center' width="200"><a href='form_edit_news.php?id=<?php echo $r->newpro_id?>' class='text-decoration-none text-white'><button class='btn btn-warning mx-1'><i class='fa-solid fa-pen-to-square text-white'></i></button></a>
                                <a href='delete_new.php?id=<?php echo $r->newpro_id?>' class='text-decoration-none' onclick="return confirm('คุณต้องการลบหนังสือเล่มนี้หรือไม่')"><button class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></a></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>  
                </div>
            <?php }else{ ?> 
                <div class="" style="margin:2% 40% 0 40%;">
                    <h1>ไม่มีรายการ</h1>
                </div>
           <?php } ?>
        </div>
    </div>
</body>