<?php
session_start();

require("dbconnect.php");

$storeId = $_GET['storeId'];
$sql = "SELECT *, ROUND(AVG(rating), 2) AS score FROM stores INNER JOIN rating ON stores.stores_id = rating.stores_id WHERE stores.stores_id = $storeId";
$rs = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($rs);

$sql_b = "select * from books where stores_id = $storeId";
$rs_b = $connect->query($sql_b);

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
    <title>หน้าร้านหนังสือ</title>
    <style>
        .carousel-item {
            height: 50vh;
        }

        .card {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .footer-cta {
            box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px;
        }

        .price {
            color: #263238;
            font-size: 24px;
        }

        .card-title {
            color: #263238
        }

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
</body>
<section width="100%">

    <div class="profile" style="min-height:12rem;max-height:12rem;margin: 1% 25% 0 25%; ">
        <div class="row g-0 text-center position-relative">
            <div class="col-6 col-md-4  " style="max-height:0rem;background-image: url('images/assortment-with-books-dark-background.jpg');max-width:40%;">
            </div>
            <img class="mt-3 ms-3 position-absolute top-0 start-0 rounded-circle" src="<?php echo "../bookwhales" . $row['stores_img']; ?>" alt="" style="width:110px; height:110px;">

            <div class="col-sm-6 col-md-8 " style="min-height:10rem">
                <div class="d-flex align-items-start flex-column mb-3 ms-5" style="height: 200px;">
                    <div class="p-2">
                        <span>คะแนนร้านหนังสือ :</span>

                        <?php
                        if ($row["score"] == 0) {
                            echo "(ไม่มีคะแนน)";
                        } else {
                            echo "<span>(" . $row['score'] . ")</span>";
                        }
                        ?>
                    </div>
                    <div class="p-2">ชื่อร้าน :
                        <?php echo $row['stores_name']; ?>
                    </div>
                    <div class="p-2">สถานที่ร้าน :
                        <?php echo $row['stores_address']; ?>
                    </div>
                    <div class="p-2">
                        <?php echo "อำเภอ" . $row['stores_district'] . " จังหวัด" . $row['stores_province'] . " " . $row['stores_zipcode']; ?>
                    </div>
                    <div class="p-2">เบอร์โทรร้านค้า :
                        <?php echo $row['stores_phone'] ?>
                    </div>
                    <div class="p-2">Facebook :
                        <?php echo $row['stores_facebook'] ?>
                    </div>
                    <div class="p-2">Line :
                        <?php echo $row['stores_line'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>


    <div class="text-center w-100 mt-1">
        <br><br>
        <h5 class="mb-2 fw-semibold">พิกัดหน้าร้านหนังสือ</h5>
        <?php echo $row["stores_map"] ?>
    </div>

    <hr class="my-5">

    <div class="Show_goods" width="100%">
        <div class="" style="min-height: 12rem;max-height:12rem;margin: 0 20% 0 20%; ">
            <div class="d-flex justify-content-between">
                <h5 class="ms-5"><strong>รายการหนังสือ</strong></h5>

            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mt-4">

                <?php while ($obj = $rs_b->fetch_object()) { ?>
                    <div class="some-goods" style="min-height:23rem;max-height:23rem;min-width:12rem;max-width:12rem;margin-left:4.5rem;margin-bottom:2rem;">
                        <img class="bg-light" style="min-height:13rem;max-height:13rem;min-width:11rem;max-width:11rem;magin:0;padding:0;" src="<?php echo "../bookwhales" . ($obj->book_img); ?>" alt="">

                        <div class="mt-1" style="min-width:11rem;max-width:11rem;"><strong class="text-break">
                                <?php echo ($obj->book_name); ?>
                            </strong></div>
                        <div style="min-width:11rem;max-width:11rem;">
                            <p style="font-size:12px;">ผู้แต่ง :
                                <?php echo ($obj->book_author); ?>
                            </p>
                        </div>
                        <div style="min-width:11rem;max-width:11rem; ">
                            <p class="text-center" style="font-size:18px;">ราคา :
                                <?php echo ($obj->book_price); ?> บาท
                            </p>
                        </div>
                        <div class="m-auto text-center" style="min-width:11rem;max-width:11rem;">
                            <button type="button" class="btn btn-danger " style="min-width:5rem;" onclick="javascript:window.location='loginform.php'"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

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
    updateDarkModeFromCookie();

    function updateDarkModeFromCookie() {
        var darkMode = getDarkModeCookie();
        if (darkMode === "true") {
            $("body").addClass("dark-mode");
            $("#darkModeIcon").text("☀️");
        } else {
            $("body").removeClass("dark-mode");
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