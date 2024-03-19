<?php
session_start();

require("dbconnect.php");

// Check if the user session variable exists
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
        $meQty = $meQty + $meItem;
    }
} else {
    $meQty = 0;
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
    <title>บัญชีผู้ใช้</title>
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
                        <a class="nav-link" href="books.php">
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

    <?php
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE users_id ='$user'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <section style="margin-top: 1%;">
        <div class="container">
            <div class="fw-bold fs-4 text-center">แก้ไขข้อมูลบัญชีนักอ่านหนังสือ</div>
            <form action="editbuyer.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลส่วนตัว</h3>


                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="firstname">ชื่อจริง</label>
                                            <input type="text" id="firstname" class="form-control form-control-lg" name="firstname" value="<?php echo $row['users_firstname']; ?>" required />
                                            <div class="invalid-feedback">กรุณากรอกชื่อจริง</div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="lastname">นามสกุล</label>
                                            <input type="text" id="lastname" class="form-control form-control-lg" name="lastname" value="<?php echo $row['users_lastname']; ?>" required />
                                            <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="email">อีเมล</label>
                                        <input type="text" id="email" class="form-control form-control-lg" name="email" value="<?php echo $row['users_email']; ?>" required />
                                        <div class="invalid-feedback">กรุณากรอกอีเมล</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="password">รหัสผ่าน</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="confirmpassword">ยืนยันรหัสผ่าน</label>
                                        <input type="password" id="confirmpassword" class="form-control form-control-lg" required />
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่านให้ตรงกัน</div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลสถานที่จัดส่ง</h3>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="address">ที่อยู่</label>
                                        <textarea class="form-control" id="address" style="height: 100px" name="address" required><?php echo $row['users_address']; ?></textarea>
                                        <div class="invalid-feedback">กรุณากรอกข้อมูลที่อยู่</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="district">เขต/อำเภอ</label>
                                        <input type="text" id="district" class="form-control form-control-lg" name="district" value="<?php echo $row['users_district']; ?>" required />
                                        <div class="invalid-feedback">กรุณากรอกเขต/อำเภอ</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="province">จังหวัด</label>
                                        <input type="text" id="province" class="form-control form-control-lg" name="province" value="<?php echo $row['users_province']; ?>" required />
                                        <div class="invalid-feedback">กรุณากรอกจังหวัด</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">
                                            <label class="form-label" for="zipcode">รหัสไปรษณีย์</label>
                                            <input type="text" id="zipcode" class="form-control form-control-lg" name="zipcode" value="<?php echo $row['users_zip']; ?>" required />
                                            <div class="invalid-feedback">กรุณากรอกรหัสไปรษณีย์</div>
                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">
                                            <label class="form-label" for="phone">เบอร์มือถือ</label>
                                            <input type="text" id="phone" class="form-control form-control-lg" name="phone" value="<?php echo $row['users_mobile']; ?>" required />
                                            <div class="invalid-feedback">กรุณากรอกเบอร์มือถือ</div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-lg" data-mdb-ripple-color="dark" href="#">แก้ไขข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>
    <script>
        // Validation for invalid input after submit

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        // Validation password and confirmpassword form
        let password = document.getElementById("password"),
            confirm_password = document.getElementById("confirmpassword");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        // Preview images after upload
        function previewImage(event) {
            let input = event.target;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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