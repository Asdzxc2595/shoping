<?php
session_start();
require 'dbconnect.php';

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
    $meSql = "SELECT * FROM books WHERE book_id in ({$inputItems})";
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
                                    <i class="fa-solid fa-heart"></i><span
                                        class="badge text-dark position-absolute mt-3">
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
            echo "<div class=\"alert alert-danger mx-2\">ลบสินค้าเรียบร้อยแล้ว</div>";
        }

        if ($meCount == 0) {
            echo "<div class=\"alert alert-warning mx-2\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
        } else {
            ?>

            <form action="buyer_updateorder.php" method="post" name="formupdate" role="form" id="formupdate">

                <div class="form-group">
                    <?php
                    $user = $_SESSION['user'];
                    $sql = "SELECT * FROM users WHERE users_id ='$user'";
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h5 class="fw-bold mt-5">ข้อมูลสถานที่จัดส่ง</h5>

                    <div class="ms-5 mt-3">
                        <h6>
                            <?php echo $row['users_firstname'] . " " . $row['users_lastname']; ?>
                        </h6>
                        <h6>
                            <?php echo $row['users_address'] ?>
                        </h6>
                        <h6>
                            <?php echo $row['users_district'] . " " . $row['users_province'] . " " . $row['users_zip']; ?>
                        </h6>
                        <h6>
                            <?php echo $row['users_mobile'] ?>
                        </h6>
                    </div>
                </div>

                <table class="table table-striped table-bordered mt-5">
                    <thead>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคาต่อหน่วย</th>
                            <th>จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_price = 0;
                        $num = 0;
                        while ($meResult = mysqli_fetch_assoc($meQuery)) {
                            $key = array_search($meResult['book_id'], $_SESSION['cart']);
                            $total_price = $total_price + ($meResult['book_price'] * $_SESSION['qty'][$key]);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $meResult['book_name']; ?>
                                </td>
                                <td>
                                    <?php echo $_SESSION['qty'][$key]; ?>
                                    <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                                    <input type="hidden" name="book_id[]" value="<?php echo $meResult['book_id']; ?>" />
                                    <input type="hidden" name="book_price[]" value="<?php echo $meResult['book_price']; ?>" />
                                </td>
                                <td>
                                    <?php echo number_format($meResult['book_price'], 2); ?>
                                </td>
                                <td>
                                    <?php echo number_format(($meResult['book_price'] * $_SESSION['qty'][$key]), 2); ?>
                                </td>
                            </tr>
                            <?php
                            $num++;
                        }
                        ?>
                        <tr>
                            <td colspan="8" style="text-align: right;">
                                <h5 class="fw-bold">จำนวนเงินรวมทั้งหมด
                                    <?php echo number_format($total_price, 2); ?> บาท
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align: right;" class="my-2">
                                <a href="buyer_cart.php" type="button" class="btn btn-danger">ย้อนกลับ</a>
                                <button type="submit" class="btn btn-primary">บันทึกการสั่งซื้อสินค้า</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php
        }
        ?>

    </div>
</body>

</html>
<?php
mysqli_close($connect);
?>