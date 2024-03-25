<?php
session_start();

require("dbconnect.php");

$book = $_GET['book'];
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

$sql = "SELECT `books`.*, `type`.*, `stores`.*
FROM `books` 
	LEFT JOIN `type` ON `books`.`type_id` = `type`.`type_id` 
	LEFT JOIN `stores` ON `books`.`stores_id` = `stores`.`stores_id`
    WHERE `book_id` = '$book'";
$result = mysqli_query($connect, $sql);
$row = ($result->fetch_assoc());
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>
        <?php echo $row['book_name']; ?>
    </title>
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
                        <a class="nav-link" href="index.php">
                            <h5 class="fw-semibold">หน้าหลัก</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="books.php">
                            <h5 class="fw-semibold">หนังสือ</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="store.php">
                            <h5 class="fw-semibold">ร้านหนังสือ</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="promotion.php">
                            <h5 class="fw-semibold">ข่าวสารและโปรโมชั่น</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <button id="darkModeButton" class="btn btn-primary">
                            <span id="darkModeIcon">🌙</span> Dark Mode
                        </button>
                    </li>
                    <li class="nav-item mx-3 d-lg-none d-xl-none">
                        <a class="nav-link" href="#">
                            <h5 class="fw-semibold">ล็อคอิน</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3 d-lg-none d-xl-none">
                        <a class="nav-link" href="register.php">
                            <h5 class="fw-semibold">สมัครสมาชิก</h5>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav d-none d-lg-flex d-xl-flex">
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="loginform.php">
                            <h5 class="fw-semibold">ลงชื่อเข้าใช้ระบบ</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border rounded bg-warning px-3 ms-2 text-white" href="register.php">
                            <h5 class="fw-semibold">สมัครสมาชิก</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>

        <div class="container mt-5">
            <div class="card-body">
                <h3 class="card-title fw-semibold">
                    <?php echo $row['book_name']; ?>
                </h3>
                <h6 class="card-subtitle">
                    <?php echo $row['type_name']; ?>
                </h6>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center mt-4"><img src="<?php echo "../bookwhales" . $row['book_img'] ?>" class="img-responsive" width="430" height="600">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5 fs-5 fw-semibold">เรื่องย่อ</h4>
                        <p>
                            <?php echo $row['book_story']; ?>
                        </p>
                        <h2 class="mt-5 mb-2">
                            <?php echo $row['book_price']; ?> บาท
                        </h2>
                        <a href="loginform.php" class="text-decoration-none">
                            <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip">
                                ลงชื่อเข้าใช้ระบบ
                            </button>
                        </a>
                        <?php if($row['pre_oder'] != ''){ ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                หนังสือนี้เป็นหนังสือพรีออเดอร์
                            </div>
                            <div class="alert alert-warning mt-3" role="alert">
                                <?PHP ECHO $row['pre_oder']?>
                            </div>
                        <?php }else if($row['pre_oder'] == ''){ ?>
                            
                        <?php };?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title fs-5 fw-semibold mt-5 mb-3">คุณสมบัติสินค้า</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    <tr>
                                        <h4>
                                            <td width="390">ผู้เขียน</td>
                                        </h4>
                                        <td>
                                            <?php echo $row['book_author'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ผู้แปล</td>
                                        <td>
                                            <?php echo $row['book_translator'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>หนังสือคงเหลือ</td>
                                        <td>
                                            <?php echo $row['book_stock'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ประเภทสินค้า</td>
                                        <td>
                                            <?php echo $row['type_name'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ร้านหนังสือ</td>
                                        <td>
                                            <?php echo $row['stores_name'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Facebook ของร้าน</td>
                                        <td>
                                            <?php echo $row['stores_facebook'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Line ของร้าน</td>
                                        <td>
                                            <?php echo $row['stores_line'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php
    $sql = "UPDATE books SET books_visit = books_visit + 1 WHERE book_id = '$book'";
    mysqli_query($connect, $sql);
    ?>

    <script src="assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>
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