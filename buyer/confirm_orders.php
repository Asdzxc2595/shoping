<?php
    session_start();
    require("../dbconnect.php");
    $user_id = $_SESSION['user'];


    $sql = "select * from orders inner join orders_detail on orders.orders_id = orders_detail.orders_id 
                                 inner join books on orders_detail.book_id = books.book_id
                                 inner join stores on books.stores_id = stores.stores_id
                                 where orders_detail.detail_status != 1 and orders_detail.detail_status != 0   and orders_detail.ohistory_id != '' and orders.users_id = $user_id";

    $rs = $connect->query($sql);
    $r = $rs->fetch_object();
    
    
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty'])) {
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem) {
        $meQty = (is_numeric($meQty) ? $meQty : 0) + (is_numeric($meItem) ? $meItem : 0);
    }
} else {
    $meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
    $itemIds = "";
    foreach ($_SESSION['cart'] as $itemId) {
        $itemIds = $itemIds . $itemId . ",";
    }
    $inputItems = rtrim($itemIds, ",");
    $meSql = "SELECT * FROM books WHERE book_id in ({$inputItems})";
    $meQuery = mysqli_query($connect, $meSql);
    $meCount = mysqli_num_rows($meQuery);
} else {
    $meCount = 0;
}
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
        <link rel="icon" type="image/x-icon" href="../favicon.ico">
        <title>Document</title>
        
    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-white mx-3 mt-3">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-3 mb-2" href="#">Book Whales</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="buyer_books.php">
                                <h5 class="fw-semibold">หนังสือ</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="buyer_store.php">
                                <h5 class="fw-semibold">ร้านหนังสือ</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="promotion.php">
                                <h5 class="fw-semibold">ข่าวสารและโปรโมชั่น</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="buyer_checkout.php">
                                <h5 class="fw-semibold">คำสั่งซื้อ</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3 d-lg-none d-xl-none">
                            <a href="userprofile.php" class="nav-link">
                                <h5 class="fw-semibold">จัดการบัญชี</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3 d-lg-none d-xl-none">
                            <a href="usercart.php" class="nav-link">
                                <h5 class="fw-semibold">ตะกร้าสินค้า</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3 d-lg-none d-xl-none">
                            <a href="wishlist.php" class="nav-link">
                                <h5 class="fw-semibold">สินค้าที่ชอบ</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3 d-lg-none d-xl-none">
                            <a href="../logout.php" class="nav-link">
                                <h5 class="fw-semibold">ออกจากระบบ</h5>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-none d-lg-flex d-xl-flex">
                        <li class="nav-item mx-1">

                            <?php
                            // Check if the logout form is submitted
                            if (isset($_POST['logout'])) {
                                session_destroy();
                                echo "
                            <script>
                            alert('กำลังออกจากระบบ...');
                            window.location.replace('../loginform.php');
                            </script>
                            ";
                            }
                            ?>

                            <a href="userprofile.php" class="text-decoration-none">
                                <button class="btn btn-lg">
                                    <i class="fa-solid fa-user"></i>
                                </button>
                            </a>
                            <a href="buyer_cart.php" class="text-decoration-none">
                                <button class="btn btn-lg position-relative">
                                    <i class="fa-solid fa-cart-shopping"></i><span
                                        class="badge text-dark position-absolute">
                                        <?php echo $meQty; ?>
                                    </span>
                                </button>
                            </a>
                            <a href="wishlist.php" class="text-decoration-none">
                                <button class="btn btn-lg">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </a>
                            <form method="post" class="d-inline">
                                <button type="submit" name="logout" class="btn btn-lg">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="nav-small mb-3" width="100%">
        <div class="bg-black" style="min-height:2.5rem;">
            <div width="100%" style="margin: 0 25% 0 25%;">
                <div class="d-flex justify-content-center">
                    <div class="text-center my-2 fw-semibold fs-6 text-white"><a href="buyer_checkout.php"
                            style="text-decoration: none;color:black;">
                            <div class="text-white">คำสั่งซื้อ</div>
                        </a></div>
                    <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a
                            href="confirm_orders.php" style="text-decoration: none; color:black;">
                            <div class="text-white">คำสั่งซื้อที่ได้รับการยืนยัน</div>
                        </a></div>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="" width="100%">
        <div class="text-center"><h3>สถานะ</h3></div>
        <div class=" class='container-fluid d-flex justify-content-center table-responsive mt-3'">
            
            <?php if($row = mysqli_num_rows($rs)> 0) { ?>
                
                <table class="table table-bordered w-auto mt-2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>รูปภาพ</th>
                            <th>ชื่อหนังสือ</th>
                            <th>ชื่อร้าน</th>
                            <th>สถานนะ</th>
                            <th>เลขติดตามพัสดุ</th>
                        </tr>
                    </thead>
                    <?php $a=0; while($r = $rs->fetch_object()){ ?>
                            <th class="text-center"><?php echo $a++;?></th>
                            <th ><img src="<?php echo $r->book_img?> " width="120" alt=""></th>
                            <th width="200"><?php echo $r->book_name?></th>
                            <th><?php echo $r->stores_name?></th>
                            <th><?php if( $r->detail_status == 2){ ?>
                                <div class="text-center "><a class="btn btn-danger">ถูกยกเลิก</a></div>
                            <?php } else{ ?>
                                <div class="text-center "><a class="btn btn-success">ยืนยันแล้ว</a></div>
                            <?php } ?></th>
                            <th width="">
                               <?php if($r->detail_status == 3){ ?>
                                <div class="text-center">
                                    <?php if($r->post_id ==1){
                                        echo('Kerry')."<br>"; 
                                        echo $r->detail_num;
                                        ?><div class="">
                                            <a href="https://th.kerryexpress.com/th/track/"><img width="80"src="https://www.gadgetzone.in.th/wp-content/uploads/2015/01/icon-kerry-express.png" alt=""></a>
                                        </div><?php
                                    }else if($r->post_id ==2){
                                        echo('Flash')."<br>"; 
                                        echo $r->detail_num;
                                        ?><div class="">
                                        <a href="https://www.flashexpress.co.th/fle/tracking"><img width="90"src="https://www.shipnity.com/landing_img/flash.png" alt=""></a>
                                    </div><?php
                                    }else if($r->post_id ==3){
                                        echo('DHL Express')."<br>"; 
                                        echo $r->detail_num;?>
                                        <div class="">
                                            <a href="https://www.dhl.com/th-en/home/tracking.html"><img src="https://logodix.com/logo/1001813.png" width="150" alt=""></a>
                                        </div><?php
                                    }else if($r->post_id ==4){
                                        echo('Ninja Van')."<br>"; 
                                        echo $r->detail_num;?>
                                        <div class="mt-2">
                                            <a href="https://www.ninjavan.co/th-th/tracking"><img src="https://th.bing.com/th/id/R.f86799b424244648ce07839a52759e6e?rik=2nW3VzhkVkjJTw&pid=ImgRaw&r=0" width="150" alt=""></a>
                                        </div><?php
                                    }else{
                                        echo('J&T Express')."<br>"; 
                                        echo $r->detail_num;?>
                                        <div class="">
                                            <a href="https://www.jtexpress.co.th/service/track"><img src="https://th.bing.com/th/id/R.d6b3ad0d73cdc799b0b073090374dc15?rik=sEoO8MfC03abSA&pid=ImgRaw&r=0" width="150" alt=""></a>
                                        </div><?php                                  
                                    }?>
                                </div>
                               <?php }else{}?>
                            
                            </th>
                    </tbody>
                    <?php }?>
                </table>
            <?php }?>
        </div>
    </div>
     <script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>

    </body>
</html>