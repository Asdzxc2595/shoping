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
    <title>Book Whales</title>
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
                        <a class="nav-link active" href="#">
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
                        <a class="nav-link" href="login.php">
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
            <div class="fw-bold fs-4 text-center">สมัครสมาชิกเป็นเจ้าของร้านหนังสือ</div>
            <form action="registerseller.php" method="POST" class="needs-validation" novalidate>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลบัญชี</h3>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="storename">ชื่อร้านหนังสือ</label>
                                        <input type="text" id="storename" class="form-control form-control-lg"
                                            required />
                                        <div class="invalid-feedback">กรุณากรอกชื่อร้านหนังสือ</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="firstname">ชื่อจริง</label>
                                            <input type="text" id="firstname" class="form-control form-control-lg"
                                                name="firstname" required />
                                            <div class="invalid-feedback">กรุณากรอกชื่อจริง</div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="lastname">นามสกุล</label>
                                            <input type="text" id="lastname" class="form-control form-control-lg"
                                                name="lastname" required />
                                            <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="email">อีเมล</label>
                                        <input type="text" id="email" class="form-control form-control-lg" 
                                            name="email" required />
                                        <div class="invalid-feedback">กรุณากรอกอีเมล</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="password">รหัสผ่าน</label>
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            name="password" required />
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="confirmpassword">ยืนยันรหัสผ่าน</label>
                                        <input type="password" id="confirmpassword" class="form-control form-control-lg"
                                            name="confirmpassword" required />
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่านให้ตรงกัน</div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลสถานที่ร้านหนังสือ</h3>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="address">ที่อยู่</label>
                                        <textarea class="form-control" id="address" style="height: 100px"
                                            name="address" required></textarea>
                                        <div class="invalid-feedback">กรุณากรอกข้อมูลที่อยู่</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="province">จังหวัด</label>
                                        <input type="text" id="province" class="form-control form-control-lg"
                                            name="province" required />
                                        <div class="invalid-feedback">กรุณากรอกจังหวัด</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="distict">เขต/อำเภอ</label>
                                        <input type="text" id="distict" class="form-control form-control-lg"
                                            name="district" required />
                                        <div class="invalid-feedback">กรุณากรอกเขต/อำเภอ</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">
                                            <label class="form-label" for="zipcode">รหัสไปรษณีย์</label>
                                            <input type="text" id="zipcode" class="form-control form-control-lg"
                                                name="zipcode" required />
                                            <div class="invalid-feedback">กรุณากรอกรหัสไปรษณีย์</div>
                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">
                                            <label class="form-label" for="phone">เบอร์มือถือ</label>
                                            <input type="text" id="phone" class="form-control form-control-lg"
                                                name="phone" required />
                                            <div class="invalid-feedback">กรุณากรอกเบอร์มือถือ</div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg" data-mdb-ripple-color="dark"
                                        href="#">ลงทะเบียน</button>
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

        let password = document.getElementById("password")
            , confirm_password = document.getElementById("confirmpassword");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

</body>

</html>