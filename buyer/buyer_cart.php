<?php
session_start();
require("dbconnect.php");

if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
  window.location.replace('../loginform.php');</script>";
    exit(0);
}

$user = $_SESSION["user"];

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
    $meSql = "SELECT * FROM books WHERE book_id IN ({$inputItems})";
    $meQuery = mysqli_query($connect, $meSql);
    $meCount = mysqli_num_rows($meQuery);
} else {
    $meCount = 0;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <title>ตะกร้าหนังสือ</title>
</head>

<body>
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
                        <a class="nav-link" href="buyer_index.php">
                            <h5 class="fw-semibold">หน้าหลัก</h5>
                        </a>
                    </li>
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
                                <i class="fa-solid fa-heart"></i><span class="badge text-dark position-absolute mt-3">
                                    <?php
                                    $sql = "SELECT *, COUNT(*) AS wishlistitem FROM books INNER JOIN wishlist ON wishlist.book_id=books.book_id WHERE users_id = '$user'";
                                    $result = mysqli_query($connect, $sql);
                                    $row = $result->fetch_assoc();
                                    echo $row["wishlistitem"];
                                    ?>
                                </span>
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

    <?php
    if ($action == 'removed') {
        echo "<div class='alert alert-danger mx-2'>ลบสินค้าเรียบร้อยแล้ว</div>";
    }
    if ($action == 'limit') {
        echo "<div class='alert alert-danger mx-2'>ไม่สามารถเพิ่มสินค้าได้อีก</div>";
    }

    if ($meCount == 0) {
        echo "<div class='alert alert-warning mx-2'>ไม่มีสินค้าอยู่ในตะกร้า</div>";
        echo '<h6 class="mb-0 ms-2"><a href="buyer_books.php" class="text-body">';
        echo '<i class="fas fa-long-arrow-alt-left me-2"></i>กลับไปยังหน้าแรก</a>';
        echo '</h6>';
    } else {
        ?>


        <section>
            <form action="buyer_updatecart.php" method="post" name="fromupdate">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">ตะกร้าหนังสือ</h1>
                                                <h6 class="mb-0 text-muted">
                                                    <?php echo $meQty; ?> เล่ม
                                                </h6>
                                            </div>
                                            <hr class="my-4">

                                            <?php
                                            $total_price = 0;
                                            $num = 0;
                                            while ($meResult = mysqli_fetch_assoc($meQuery)) {
                                                $key = array_search($meResult['book_id'], $_SESSION['cart']);
                                                $total_price = $total_price + ($meResult['book_price'] * $_SESSION['qty'][$key]);
                                                ?>
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="<?php echo $meResult['book_img'] ?>"
                                                            class="img-fluid rounded-3">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-black mb-0">
                                                            <?php echo $meResult['book_name'] ?>
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <input id="form1" min="1" name="qty[<?php echo $num; ?>]"
                                                            value="<?php echo $_SESSION['qty'][$key]; ?>" type="text"
                                                            class="form-control form-control-sm" />
                                                        <input type="hidden" name="arr_key_<?php echo $num; ?>"
                                                            value="<?php echo $key; ?>">
                                                    </div>
                                                    <div class="col-md-2 col-lg-1 col-xl-1">
                                                        <h6 class="mb-0">
                                                            <?php echo number_format($meResult['book_price'], 2); ?>
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-2 col-lg-1 col-xl-1 offset-lg-1">
                                                        <h6 class="mb-0">
                                                            <?php echo number_format(($meResult['book_price'] * $_SESSION['qty'][$key]), 2); ?>
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <a href="buyer_removecart.php?itemId=<?php echo $meResult['book_id']; ?>"
                                                            class="text-muted"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>

                                                <?php
                                                $num++;
                                            }
                                            ?>
                                            <button type="submit" class="btn btn-dark btn-block btn-lg w-100"
                                                data-mdb-ripple-color="dark">คำนวณราคาสินค้าใหม่</button>
                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="buyer_books.php" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>กลับไปยังหน้าแรก</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">สรุปรายการ</h3>

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">รวมราคาสุทธิ</h5>
                                                <h5>
                                                    <?php echo number_format($total_price, 2); ?>
                                                </h5>
                                            </div>

                                            <a href="buyer_order.php"
                                                class="btn btn-dark btn-block btn-lg w-100">ยืนยันการสั่งซื้อ</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <?php
    }
    mysqli_close($connect);
    ?>
</body>

</html>