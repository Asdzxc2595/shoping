<?php
require("dbconnect.php");
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
    <title>สมัครสมาชิก</title>
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
                        <a class="nav-link" href="loginform.php">
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

    <section style="margin-top: 1%;">
        <div class="container">
            <div class="fw-bold fs-4 text-center">สมัครสมาชิกเป็นนักอ่านหนังสือ</div>
            <form action="registerbuyer.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลส่วนตัว</h3>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="email">อีเมล</label>
                                        <input type="text" id="email" class="form-control form-control-lg" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                                        <div class="invalid-feedback">กรุณากรอกอีเมล</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="password">รหัสผ่าน</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password" pattern=".{8,}" required />
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่านอย่างน้อย4ตัว</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="confirmpassword">ยืนยันรหัสผ่าน</label>
                                        <input type="password" id="confirmpassword" class="form-control form-control-lg" required />
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่านให้ตรงกัน</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="formFile" class="form-label">อัปโหลดรูปโปรไฟล์</label>
                                        <input class="form-control" type="file" id="formFile" name="image" accept="image/jpeg, image/png" onchange="previewImage(event)" required>
                                        <div class="invalid-feedback">กรุณาอัปโหลดรูปภาพ</div>
                                    </div>

                                    <img id="profile-preview" src="#" class="border border-3" width="300" height="300" />

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลสถานที่จัดส่ง</h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="firstname">ชื่อจริง</label>
                                            <input type="text" id="firstname" class="form-control form-control-lg" name="firstname" pattern="[a-zA-Zก-๙]+" title="โปรดป้อนตัวอักษรเท่านั้น" required />
                                            <div class="invalid-feedback">กรุณากรอกชื่อจริง</div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="lastname">นามสกุล</label>
                                            <input type="text" id="lastname" class="form-control form-control-lg" name="lastname" pattern="[a-zA-Zก-๙]+" title="โปรดป้อนตัวอักษรเท่านั้น" required />
                                            <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="address">ที่อยู่</label>
                                        <textarea class="form-control" id="address" style="height: 100px" name="address" pattern="^\S+$" title="ระบุข้อมูล โดยไม่มีเว้นวรรค" required></textarea>
                                        <div class="invalid-feedback">กรุณากรอกข้อมูลที่อยู่</div>
                                    </div>


                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="district">เขต/อำเภอ</label>
                                        <input type="text" id="district" class="form-control form-control-lg" name="district" pattern="[a-zA-Zก-๙]+" title="โปรดป้อนตัวอักษรเท่านั้น" required />
                                        <div class="invalid-feedback">กรุณากรอกเขต/อำเภอ</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="province">จังหวัด</label>
                                        <input type="text" id="province" class="form-control form-control-lg" name="province" pattern="[a-zA-Zก-๙]+" title="โปรดป้อนตัวอักษรเท่านั้น" required />
                                        <div class="invalid-feedback">กรุณากรอกจังหวัด</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">
                                            <label class="form-label" for="zipcode">รหัสไปรษณีย์</label>
                                            <input type="text" id="zipcode" class="form-control form-control-lg" name="zipcode" pattern="[0-9]{5}" required />
                                            <div class="invalid-feedback">กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง</div>
                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">
                                            <label class="form-label" for="phone">เบอร์มือถือ</label>
                                            <input type="text" id="phone" class="form-control form-control-lg" name="phone" pattern="[0-9]{10}" required />
                                            <div class="invalid-feedback">กรุณากรอกเบอร์มือถือให้ถูกต้อง</div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg" data-mdb-ripple-color="dark">ลงทะเบียน</button>
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
            let passwordValue = password.value;
            let confirmPasswordValue = confirm_password.value;

            if (passwordValue.length < 6) {
                confirm_password.setCustomValidity("รหัสผ่านต้องมีความยาวอย่างน้อย 6 ตัวอักษร");
            } else if (passwordValue !== confirmPasswordValue) {
                confirm_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.addEventListener('input', validatePassword);
        confirm_password.addEventListener('input', validatePassword);


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