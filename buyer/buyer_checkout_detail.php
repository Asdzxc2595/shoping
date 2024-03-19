<?php
session_start();
require 'dbconnect.php';
$a = 0;
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
    <title>คำสั่งซื้อ</title>
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
        <div class="container">
        <?php

        $checkout = $_GET["id"];

        $user = $_SESSION['user'];

        $sql = "SELECT *
            FROM books
            INNER JOIN orders_detail ON books.book_id = orders_detail.book_id
            INNER JOIN stores ON books.stores_id = stores.stores_id
            WHERE orders_id = '$checkout'
            ";
        $rs = mysqli_query($connect, $sql);


        if ($rs->num_rows > 0) {
            echo "<div class='container-fluid d-flex flex-column align-items-center table-responsive mt-5'>";
            echo "<div class='align-self-start fw-semibold mb-1'>รายการหนังสือ</div>";
            echo "<table class='table table-bordered table-fluid table-light'>";
            echo "<thead class='text-center'>";
            echo "<tr>
                        <th scope='col'>ชื่อร้านค้า</th>
                        <th scope='col'>จำนวน</th>
                        <th scope='col'>ราคาต่อเล่ม</th>
                        <th scope='col'>ราคารวม</th>
                      </tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($r = $rs->fetch_object()) {
                $price = $r->detail_price;
                $num = $r->detail_quantity;
                $amount = $price * $num;


                echo "<tr>";
                echo "<td hidden>" . $r->orders_id . "</td>";
                echo "<td class='text-center'>" . $r->stores_name . "</td>";
                echo "<td class='text-center'>" . $r->detail_quantity . ' เล่ม' . "</td>";
                echo "<td class='text-center'>" . $r->detail_price . ' บาท' . "</td>";
                echo "<td class='text-center'>" . $amount . ' บาท' . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger mx-3' role='alert'>ไม่พบรายละเอียดคำสั่งซื้อ</div>";
        }

        $sql = "SELECT *, SUM(detail_total) AS total
        FROM books
        INNER JOIN orders_detail ON books.book_id = orders_detail.book_id
        INNER JOIN stores ON books.stores_id = stores.stores_id
        WHERE orders_detail.orders_id = '$checkout' GROUP BY stores_name
        ";
        $rs = mysqli_query($connect, $sql);

        if ($rs->num_rows > 0) {


            echo "<div class='container-fluid d-flex flex-column align-content-center table-responsive mt-5'>";
            echo "<div class='align-self-start fw-semibold mb-1'>รายการที่ต้องชำระ</div>";
            echo "<table class='table table-bordered table-fluid table-light'>";
            echo "<thead class='text-center'>";
            echo "<tr>
                        <th scope='col'>ชื่อร้านค้า</th>
                        <th scope='col'>ราคารวม</th>
                        <th scope='col'>สถานะ</th>
                        <th scope='col'>ช่องทางการชำระ</th>
                        <th scope='col'>แจ้งการชำระเงิน</th>
                        
                      </tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($r = $rs->fetch_object()) {


                echo "<tr>";
                echo "<td hidden>" . $r->orders_id . "</td>";
                echo "<td class='text-center'>" . $r->stores_name . "</td>";
                echo "<td class='text-center'>" . $r->total . "</td>";

                if ($r->detail_status == 0) {
                    echo "<td class='text-center'>รอการชำระ</td>";
                } else if ($r->detail_status == 1) {
                    echo "<td class='text-center'>กำลังจัดส่ง</td>";
                } else if ($r->detail_status == 2) {
                    echo "<td class='text-center'>คำสั่งซื้อถูกยกเลิก</td>";
                } else if ($r->detail_status == 3) {
                    echo "<td class='text-center'>เสร็จสิ้น</td>";
                }

                echo "<td class='text-center'><img width='100' height='100' src=" . $r->stores_qr . "></td>";
                echo "<td  >";

                $sqd = "select detail_slip from orders_detail inner join books on orders_detail.book_id = books.book_id 
                                    where stores_id = $r->stores_id and orders_id = $r->orders_id and detail_slip != ' '  ";
                $de = $connect->query($sqd);
                $s = mysqli_num_rows($de);
                $rsd = $de->fetch_object();

                if ($s == 0) {
        ?>
                    <form action='buyer_slip.php?orders_id=<?php echo $r->orders_id ?>&stores_id=<?php echo $r->stores_id ?>' method='POST' enctype='multipart/form-data'>
                        <input class='form-control' type='file' id='formFile' name='detail_slip' multiple required>
                        <div class="text-center mt-2"><button type='submit' class="btn btn-primary">ยืนยันการชำระ</button></div>
                    </form>


                <?php } else { ?>
                    <div class="text-center"><img width="150" height="200" src="<?php echo $r->detail_slip ?>" alt=""></div>
        <?php }
                "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "<div class='container-fluid d-flex justify-content-end'>";


            echo "</div>";
            echo "";
        } else {
            echo "<div class='alert alert-danger mx-3' role='alert'>ไม่พบรายละเอียดคำสั่งซื้อ</div>";
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