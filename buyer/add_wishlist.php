<?php
session_start();

require("dbconnect.php");

// Check if the user session variable exists
if (!isset($_SESSION['user'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
  window.location.replace('../loginform.php');</script>";
    exit(0);
}

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

$user = $_SESSION['user'];
$book = $_GET['itemId'];

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
    <title>
        <?php echo $row['book_name']; ?>
    </title>
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
                    <li class="nav-item mx-3 d-lg-none d-xl-none">
                        <a href="userprofile.php" class="nav-link">
                            <h5 class="fw-semibold">จัดการบัญชี</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="buyer_checkout.php">
                            <h5 class="fw-semibold">คำสั่งซื้อ</h5>
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

    <section>
        <?php
        $sql = "SELECT * FROM wishlist WHERE book_id = '$book' AND users_id = '$user'";
        $result = mysqli_query($connect, $sql);

        if ($result->num_rows > 0) {
            echo "<script type='text/javascript'>
            alert('หนังสือเล่มนี้อยู่ในรายการที่ชื่นชอบอยู่แล้ว');
            window.location.replace('buyer_books_detail.php?book=" . $book . "');
        </script>";
        } else {
            $sql = "INSERT INTO wishlist (users_id, book_id) VALUES ('$user','$book')";

            $result = mysqli_query($connect, $sql);

            if ($result) {
                echo "<script type='text/javascript'>
                                alert('เพิ่มลงรายการเสร็จสิ้น');
                                window.location.replace('buyer_books_detail.php?book=" . $book . "');
                                </script>";
            } else {
                echo "<script type='text/javascript'>
                                alert('เกิดข้อผิดพลาดในระหว่างการดำเนินการ โปรดลองอีกครั้งในภายหลัง');
                                window.location.replace('buyer_books_detail.php?book=" . $book . "');
                                </script>";
            }
        }
        ?>

    </section>

    <script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>

</body>

</html>