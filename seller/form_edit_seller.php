<?php
require("nav_seller.php");
$store = $_SESSION['store'];

$sql = "select * from stores where stores_id = $store";
$r = $connect->query($sql);
$obj = $r->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลบัญชี</title>
</head>

<body>
    <section style="margin-top: 1%;" width="100%">
        <div class="container">
            <div class="fw-bold fs-4 text-center">แก้ไขบัญชี</div>
            <form action="update_sellerpro.php" method="POST" enctype="multipart/form-data" class="needs-validation"
                novalidate>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-semibold mb-4 fs-5">เปลี่ยนข้อมูลบัญชี</h3>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="stores_email">อีเมล</label>
                                        <input type="text" id="stores_email" class="form-control form-control-lg" name="stores_email"
                                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
                                        <div class="invalid-feedback">กรุณากรอกอีเมล</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="password">รหัสผ่าน</label>
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            name="stores_password" pattern=".{4,}"/>
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="confirmpassword">ยืนยันรหัสผ่าน</label>
                                        <input type="password" id="confirmpassword" class="form-control form-control-lg"
                                            name="confirmpassword" pattern=".{4,}"/>
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่านให้ตรงกัน</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="formFile" class="form-label">อัปโหลดรูปโปรไฟล์ร้านหนังสือ</label>
                                        <input class="form-control" type="file" id="formFile" name="stores_img"
                                            accept="image/jpeg, image/png" onchange="previewImage(event)">
                                        <div class="invalid-feedback">กรุณาอัปโหลดรูปภาพ</div>
                                    </div>

                                    <img id="profile-preview" src="<?php echo $obj->stores_img ?>"
                                        class="border border-3" width="300" height="300" />

                                    <div class="my-4 pb-2">
                                        <label for="formFile" class="form-label">อัปโหลดรูป QR CODE บัญชีรายรับ</label>
                                        <input class="form-control" type="file" id="formFile" name="stores_qr" accept="image/jpeg, image/png" onchange="previewImage2(event)">
                                        <div class="invalid-feedback">กรุณาอัปโหลดQR CODE</div>
                                    </div>

                                    <img id="qr-preview" src="<?php echo $obj->stores_qr ?>" class="border border-3" width="300" height="300"/>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">

                                    <h3 class="fw-semibold mb-4 fs-5">เปลี่ยนข้อมูลสถานที่ร้านหนังสือ</h3>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="facebook">Facebook</label>
                                        <input type="text" id="facebook" class="form-control form-control-lg"
                                            value="<?php echo $obj->stores_facebook ?>" name="facebook" required />
                                        <div class="invalid-feedback">กรุณากรอกชื่อ Facebook</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="line">Line</label>
                                        <input type="text" id="line" class="form-control form-control-lg"
                                            value="<?php echo $obj->stores_line ?>" name="line" required />
                                        <div class="invalid-feedback">กรุณากรอกชื่อ Line</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="storename">ชื่อร้านหนังสือ</label>
                                        <input type="text" id="storename" class="form-control form-control-lg"
                                            name="store_name" value="<?php echo $obj->stores_name ?>">
                                        <div class="invalid-feedback">กรุณากรอกชื่อร้านหนังสือ</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="address">ที่อยู่</label>
                                        <textarea class="form-control" id="address" style="height: 100px"
                                            name="stores_address"><?php echo $obj->stores_address ?></textarea>
                                        <div class="invalid-feedback">กรุณากรอกข้อมูลที่อยู่</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="province">จังหวัด</label>
                                        <input type="text" id="province" class="form-control form-control-lg"
                                            value="<?php echo $obj->stores_province ?>" name="stores_province" />
                                        <div class="invalid-feedback">กรุณากรอกจังหวัด</div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="distict">เขต/อำเภอ</label>
                                        <input type="text" id="distict" class="form-control form-control-lg"
                                            value="<?php echo $obj->stores_district ?>" name="stores_district" />
                                        <div class="invalid-feedback">กรุณากรอกเขต/อำเภอ</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">
                                            <label class="form-label" for="zipcode">รหัสไปรษณีย์</label>
                                            <input type="text" id="zipcode" class="form-control form-control-lg"
                                                pattern="[0-9]{5}"  value="<?php echo $obj->stores_zipcode ?>" name="stores_zipcode" />
                                            <div class="invalid-feedback">กรุณากรอกรหัสไปรษณีย์</div>
                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">
                                            <label class="form-label" for="phone">เบอร์มือถือ</label>
                                            <input type="text" id="phone" class="form-control form-control-lg"
                                                pattern="[0-9]{10}"  value="<?php echo $obj->stores_phone ?>" name="stores_phone" />
                                            <div class="invalid-feedback">กรุณากรอกเบอร์มือถือ</div>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label class="form-label" for="stores_map">พิกัดแผนที่หน้าร้าน</label>
                                        <input type="text" id="stores_map" class="form-control form-control-lg"
                                            name="stores_map" />
                                        <div class="invalid-feedback">กรุณาใส่พิกัดแผนที่หน้าร้าน</div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg" data-mdb-ripple-color="dark"
                                        href="">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
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


        // Preview images after upload
        function previewImage(event) {
            let input = event.target;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profile-preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewImage2(event) {
            let input = event.target;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('qr-preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>