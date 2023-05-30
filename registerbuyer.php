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
            <div class="fw-bold fs-4 text-center">สมัครเป็นสมาชิก</div>
            <form class="needs-validation" novalidate>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลส่วนตัว</h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="form3Examplev1">ชื่อจริง</label>
                                            <input type="text" id="form3Examplev1"
                                                class="form-control form-control-lg" required/>
                                            <div class="invalid-feedback">กรุณากรอกชื่อจริง</div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <label class="form-label" for="form3Examplev2">นามสกุล</label>
                                            <input type="text" id="form3Examplev2"
                                                class="form-control form-control-lg" required/>
                                            <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="form3Examplev3">อีเมล</label>
                                        <input type="text" id="form3Examplev3" class="form-control form-control-lg" required/>
                                        <div class="invalid-feedback">กรุณากรอกอีเมล</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="form3Examplev4">รหัสผ่าน</label>
                                        <input type="password" id="form3Examplev4"
                                            class="form-control form-control-lg" required/>
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="form3Examplev5">ยืนยันรหัสผ่าน</label>
                                        <input type="password" id="form3Examplev5"
                                            class="form-control form-control-lg" required/>
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">ข้อมูลสถานที่จัดส่ง</h3>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="form3Examplea1">ที่อยู่</label>
                                        <textarea class="form-control" id="form3Examplea1"
                                            style="height: 100px" required></textarea>
                                        <div class="invalid-feedback">กรุณากรอกข้อมูลที่อยู่</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="form3Examplea2">จังหวัด</label>
                                        <input type="text" id="form3Examplea2" class="form-control form-control-lg" required/>
                                        <div class="invalid-feedback">กรุณากรอกจังหวัด</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="form3Examplea3">เขต/อำเภอ</label>
                                        <input type="text" id="form3Examplea3" class="form-control form-control-lg" required/>
                                        <div class="invalid-feedback">กรุณากรอกเขต/อำเภอ</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">
                                            <label class="form-label" for="form3Examplea4">รหัสไปรษณีย์</label>
                                            <input type="text" id="form3Examplea4"
                                                class="form-control form-control-lg" required/>
                                            <div class="invalid-feedback">กรุณากรอกรหัสไปรษณีย์</div>
                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">
                                            <label class="form-label" for="form3Examplea5">เบอร์มือถือ</label>
                                            <input type="text" id="form3Examplea5"
                                                class="form-control form-control-lg" required/>
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
    </script>

</body>

</html>