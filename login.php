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
                        <a class="nav-link active" href="login.php">
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
        <div class="container-fluid" style="margin-top: 7%;">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="images/view-bookmark-book-arrangement.jpg" class="img-fluid">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form class="needs-validation" novalidate>
                        <div class="fw-bold fs-4 mb-3">ลงชื่อเข้าใช้ระบบ</div>
                        <!-- email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">อีเมล</label>
                            <input type="email" id="form3Example3" class="form-control" required />
                            <div class="invalid-feedback">กรุณากรอกอีเมล</div>
                        </div>

                        <!-- password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">รหัสผ่าน</label>
                            <input type="password" id="form3Example4" class="form-control" required />
                            <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">ลงชื่อเข้าใช้</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">หากยังไม่มีบัญชี <a href="register.php"
                                    class="link-danger">สมัครสมาชิกได้ที่นี่</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>
    <script>
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