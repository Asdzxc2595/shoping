<?php
require("dbconnect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <link href="assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Book Whales</title>
    <style>
        .carousel-item {
            height: 50vh;
        }

        .footer-cta {
            box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px;
        }

        .h5-h {
            font-size: 50px;
            color: #263238
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
                    </style>
                </ul>
            </div>
        </div>
    </nav>

    <section>

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active overflow-hidden" style="height: 444px;">
                    <img src="images/high-angle-open-books-teacup.jpg" class="d-block">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                    <div class="carousel-caption d-none d-md-block mb-5">
                        <h1 class="mb-1">
                            <img src="favicon.ico"> Book Whales
                            <img src="favicon.ico">
                        </h1>

                        <p>
                        <h1 class="mb-4">
                            เว็บไซต์รวบรวมร้านหนังสือ
                        </h1>
                        </p>
                    </div>
                </div>
                <div class="carousel-item overflow-hidden" style="height: 444px;">
                    <img src="images/kids-being-part-sunday-school.jpg" class="d-block">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                    <div class="carousel-caption d-none d-md-block mb-5">
                        <h1 class="mb-4">
                            <strong class="text-white bg-black p-2 px-3 rounded"><img src="favicon.ico"> Book Whales
                                <img src="favicon.ico"></strong>
                        </h1>

                        <p>
                            <strong class="text-white bg-black p-2 px-3 rounded">เว็บไซต์รวบรวมร้านหนังสือ</strong>
                        </p>
                    </div>
                </div>
                <div class="carousel-item overflow-hidden" style="height: 444px;">
                    <img src="images/authentic-book-club-scene.jpg" class="d-block">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                    <div class="carousel-caption d-none d-md-block mb-5">
                        <h1 class="mb-4">
                            <strong class="text-white bg-black p-2 px-3 rounded"><img src="favicon.ico"> Book Whales
                                <img src="favicon.ico"></strong>
                        </h1>

                        <p>
                            <strong class="text-white bg-black p-2 px-3 rounded">เว็บไซต์รวบรวมร้านหนังสือ</strong>
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container py-5">
            <h5 class="mb-2">สินค้าเข้าชมเยอะมากที่สุด</h5>
            <?php
            $sql = "SELECT * FROM books ORDER BY books_visit DESC LIMIT 5;";
            $result = mysqli_query($connect, $sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="<?php echo '../bookwhales' . $row["book_img"]; ?>" class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>
                                            <?php echo $row["book_name"]; ?>
                                        </h5>

                                        <div class="mt-1 mb-0 text-muted small">
                                            <h5>
                                                <?php echo $row["book_author"]; ?>
                                            </h5>
                                        </div>
                                        <div class="mb-2 text-muted small">
                                            <h5>
                                                <?php echo $row["book_translator"]; ?>
                                            </h5>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0 text-wrap">
                                            <?php echo $row["book_story"]; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">
                                                <?php echo $row["book_price"] . " บาท" ?>
                                            </h4>
                                        </div>
                                        <h6 class="text-success">
                                            <?php echo $row["books_visit"] . " ครั้งการเข้าชม" ?>
                                        </h6>

                                        <div class="d-flex flex-column mt-4">
                                            <a href="books_detail.php?book=<?php echo $row["book_id"] ?>">
                                                <button class="btn btn-primary btn-sm w-100" type="button">รายละเอียดสินค้า</button>
                                            </a>
                                            <a href="loginform.php">
                                                <button class="btn btn-outline-primary btn-sm mt-2 w-100" type="button">
                                                    ลงชื่อเข้าใช้ระบบ
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="container py-5">
            <h5 class="mb-2">สินค้าทำยอดขายได้มากที่สุด</h5>
            <?php
            $sql = "SELECT *, COUNT(orders_detail.book_id) AS total FROM orders_detail INNER JOIN books ON orders_detail.book_id = books.book_id 
            GROUP BY orders_detail.book_id ORDER BY COUNT(orders_detail.book_id) DESC LIMIT 5";
            $result = mysqli_query($connect, $sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="<?php echo '../bookwhales' . $row["book_img"]; ?>" class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>
                                            <?php echo $row["book_name"]; ?>
                                        </h5>

                                        <div class="mt-1 mb-0 text-muted small">
                                            <h5>
                                                <?php echo $row["book_author"]; ?>
                                            </h5>
                                        </div>
                                        <div class="mb-2 text-muted small">
                                            <h5>
                                                <?php echo $row["book_translator"]; ?>
                                            </h5>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0 text-wrap">
                                            <?php echo $row["book_story"]; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">
                                                <?php echo $row["book_price"] . " บาท" ?>
                                            </h4>
                                        </div>
                                        <h6 class="text-success">
                                            <?php echo "ขายไปแล้ว " . $row["total"] . " เล่ม" ?>
                                        </h6>

                                        <div class="d-flex flex-column mt-4">
                                            <a href="books_detail.php?book=<?php echo $row["book_id"] ?>">
                                                <button class="btn btn-primary btn-sm w-100" type="button">รายละเอียดสินค้า</button>
                                            </a>
                                            <a href="loginform.php">
                                                <button class="btn btn-outline-primary btn-sm mt-2 w-100" type="button">
                                                    ลงชื่อเข้าใช้ระบบ
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function setDarkModeCookie(darkMode) {
            document.cookie = "darkMode=" + darkMode;
        }

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