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
    <style>
        .navbar {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: bottom 0.3s ease;
        }

        #darkModeButton {
            background-color: white;
            /* เปลี่ยนสีพื้นหลังเป็นขาว */
            color: black;
            /* เปลี่ยนสีตัวอักษรเป็นดำ */
        }

        .sale {
            color: #E53935
        }

        .sale-badge {
            background-color: #E53935
        }

        .carousel-item {
            height: 10vh;
        }

        .dark-mode {
            background-color: gray;
            color: #fff;
        }
    </style>
</head>

<body id="body">

        <nav class="navbar navbar-expand-sm bg-white mx-3 mt-3">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-3 mb-2" href="#">Book Whales</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
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
                        <li class="nav-item mx-3">
                            <button id="darkModeButton" class="btn btn-primary">
                                <span id="darkModeIcon">🌙</span> Dark Mode
                            </button>
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
                                    <i class="fa-solid fa-cart-shopping"></i><span class="badge text-dark position-absolute">
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

    <div class="nav-small mb-3" width="100%">
        <div class="bg-black" style="min-height:2.5rem;">
            <div width="100%" style="margin: 0 25% 0 25%;">
                <div class="d-flex justify-content-center">
                    <div class="text-center my-2 fw-semibold fs-6 text-white"><a href="buyer_checkout.php" style="text-decoration: none;color:black;">
                            <div class="text-white">คำสั่งซื้อ</div>
                        </a></div>
                    <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a href="confirm_orders.php" style="text-decoration: none; color:black;">
                            <div class="text-white">คำสั่งซื้อที่ได้รับการยืนยัน</div>
                        </a></div>

                </div>
            </div>
        </div>
    </div>
    <?php
    if ($action == 'order') {
        echo "<div class='alert alert-success mx-2'>สั่งซื้อสินค้าเรียบร้อยแล้ว</div>";
    }
    if ($action == 'paid') {
        echo "<div class='alert alert-success mx-2'>ยืนยันการชำระสำเร็จ</div>";
    }

    $user = $_SESSION['user'];
    $sql = "SELECT * FROM orders WHERE users_id = '$user'";
    $result = mysqli_query($connect, $sql);

    if ($result->num_rows > 0) {
        echo "<div class='container-fluid d-flex justify-content-center table-responsive mt-3'>";
        echo "<table class='table table-bordered table-fluid table-light'>";
        echo "<thead class='text-center'>";
        echo "<tr>
                        <th scope='col'>ลำดับ</th>
                        <th scope='col'>เวลาสั่งซื้อ</th>
                        <th scope='col'>ชื่อผู้รับ</th>
                        <th scope='col'>ที่อยู่รับ</th>
                        <th scope='col'>เบอร์มือถือผู้รับ</th>
                        <th scope='col'>รายละเอียด</th>
                        </tr>";
        echo "</thead>";
        echo "<tbody>";

        $order = 1;

        while ($row = $result->fetch_assoc()) {
            echo "<tr >";
            echo "<th scope='row' class='text-center' style='width: 100px;'>" . $order++ . "</th>";
            echo "<td class='text-center'>" . $row["orders_created"] . "</td>";
            echo "<td>" . $row["orders_fullname"] . "</td>";
            echo "<td>" . $row["orders_address"] . "</td>";
            echo "<td class='text-center'>" . $row["orders_phone"] . "</td>";
            echo "<td class='text-center'><a href='buyer_checkout_detail.php?id=" . $row['orders_id'] . "' class='text-decoration-none text-white'>
                     <button class='btn btn-info mx-1'>ตรวจสอบ</button></a></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger mx-3' role='alert'>ไม่พบคำสั่งซื้อ</div>";
    }

    ?>

    <script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // สร้างฟังก์ชันเพื่อบันทึกสถานะ Dark Mode ไปยังคุกกี้
        function setDarkModeCookie(darkMode) {
            document.cookie = "darkMode=" + darkMode;
        }

        // สร้างฟังก์ชันเพื่อดึงค่า Dark Mode จากคุกกี้ (หากมี)
        function getDarkModeCookie() {
            var name = "darkMode=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var cookieArray = decodedCookie.split(';');
            for (var i = 0; i < cookieArray.length; i++) {
                var cookie = cookieArray[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) == 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return null;
        }

        // สร้างฟังก์ชันเพื่ออัพเดตสถานะ Dark Mode จากคุกกี้ (หากมี)
        function updateDarkModeFromCookie() {
            var darkMode = getDarkModeCookie();
            if (darkMode === "true") {
                $("#body").addClass("dark-mode");
                $("#darkModeIcon").text("☀️");
            } else {
                $("#body").removeClass("dark-mode");
                $("#darkModeIcon").text("🌙");
            }
        }

        $(document).ready(function() {
            // เรียกใช้ฟังก์ชันเพื่ออัพเดตสถานะ Dark Mode จากคุกกี้
            updateDarkModeFromCookie();

            $("#darkModeButton").click(function() {
                $("#body").toggleClass("dark-mode");

                // สร้างคุกกี้เพื่อบันทึกสถานะ Dark Mode
                var darkMode = $("#body").hasClass("dark-mode") ? "true" : "false";
                setDarkModeCookie(darkMode);

                // ตรวจสอบสถานะโหมดและอัพเดตไอคอนตามความเหมาะสม
                if (darkMode === "true") {
                    $("#darkModeIcon").text("☀️"); // สลับไปเป็น Light Mode
                } else {
                    $("#darkModeIcon").text("🌙"); // สลับไปเป็น Dark Mode
                }
            });
        });
    </script>
</body>

</html>