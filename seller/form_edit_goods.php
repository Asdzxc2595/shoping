<?php
require("nav_seller.php");
$store = $_SESSION['store'];
$book_id = $_GET['id'];

$sql = "select * from books where book_id = $book_id ";
$rs = $connect->query($sql);
$obj = $rs->fetch_object()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลหนังสือ</title>
</head>

<body>
    <div class="nav-small mb-3" width="100%">
        <div class="bg-black" style="min-height:2.5rem;">
            <div width="100%" style="margin: 0 25% 0 25%;">
                <div class="d-flex justify-content-center">
                    <div class="text-center my-2 fw-semibold fs-5 text-white"><a href="seller_homepage.php"
                            style="text-decoration: none;color:black;">
                            <div class="text-white">หน้าร้านหนังสือ</div>
                        </a></div>
                    <div class="text-center my-2 fw-semibold fs-5 text-white" style="margin-left:4.5rem;"><a
                            href="seller_editgoods.php" style="text-decoration: none; color:black;">
                            <div class="text-white">จัดการหนังสือ</div>
                        </a></div>
                    <div class="dropdown " style="margin-left:4.5rem;">
                        <button class="btn dropdown-toggle fw-semibold fs-5 text-white" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            หมวดหนังสือ
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">นิยาย/วรรณกรรม</a></li>
                            <li><a class="dropdown-item" href="#">บริหาร</a></li>
                            <li><a class="dropdown-item" href="#">การศึกษา</a></li>
                            <li><a class="dropdown-item" href="#">จิตวิทยาและการพัฒนาตัวเอง</a></li>
                            <li><a class="dropdown-item" href="#">หนังสือเด็กและการ์ตูนความรู้</a></li>
                            <li><a class="dropdown-item" href="#">การ์ตูนและไลท์โนเวล</a></li>
                            <li><a class="dropdown-item" href="#">วิทยาการและเทคโนโลยี</a></li>
                            <li><a class="dropdown-item" href="#">ความรู้ทั่วไป</a></li>
                            <li><a class="dropdown-item" href="#">ประวัติศาสตร์ ศาสนา วัฒนธรรม การเมือง การปกครอง</a></li>
                            <li><a class="dropdown-item" href="#">อัตชีวประวัติ ชีวประวัติ</a></li>
                            <li><a class="dropdown-item" href="#">อาหารและสุขภาพ</a></li>
                            <li><a class="dropdown-item" href="#">บันเทิงและท่องเที่ยว</a></li>
                            <li><a class="dropdown-item" href="#">การเกษตรและธรรมชาติ</a></li>
                            <li><a class="dropdown-item" href="#">ครอบครัว</a></li>
                            <li><a class="dropdown-item" href="#">บ้านและที่อยู่อาศัย</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section width="100%">
        <div class="text-body-secondary fw-semibold fs-3 text-center my-2">แก้ไขข้อมูลหนังสือ</div>

        <div class="rounded" style="margin:0 33% 3% 33%;border: 1px solid;padding: 10px;box-shadow: 3rem 1rem #888888;">
            <div class="">
                <form action="update_goods.php?id=<?php echo $book_id ?>" method="POST" enctype="multipart/form-data">
                    <div class="text-center mt-5">
                        <img id="profile-preview" src="<?php echo ($obj->book_img); ?>" class="border border-3"
                            width="150" height="195" />
                    </div>
                    <div class="mb-4 pb-2">
                        <label for="formFile" class="form-label ms-3 mt-3">รูปหน้าปกเล่ม<span
                                class="text-body-secondary">&nbsp;(อัปโหลดไฟล์ขนาด 150 x 195px เท่านั้น)</span></label>
                        <input class="form-control" type="file" name="book_img" onchange="previewImage(event)">
                        <div class="invalid-feedback">กรุณาอัปโหลดรูปภาพ</div>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label ms-3">ชื่อหนังสือ</label>
                        <input type="text" class="form-control" name="book_name" id="formGroupExampleInput"
                            value="<?php echo ($obj->book_name); ?>" placeholder="กรุณากรอกชื่อหนังสือ">
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <label class="ms-3">ชื่อผู้แต่ง</label>
                            <input type="text" class="form-control mt-1" name="book_author"
                                value="<?php echo ($obj->book_author); ?>" placeholder="กรุณากรอกชื่อผู้แต่ง">
                        </div>
                        <div class="col">
                            <label class="ms-3">ชื่อผู้แปล</label>
                            <input type="text" class="form-control mt-1" name="book_translator"
                                value="<?php echo ($obj->book_translator); ?>" placeholder="กรุณากรอกชื่อผู้แปล">
                        </div>
                    </div>

                    <?php
                    $sql = "SELECT * FROM type";
                    $result = mysqli_query($connect, $sql);

                    $options = array();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $options[] = $row["type_name"];
                        }
                    }
                    ?>

                    <div class="row g-3 mt-1">
                        <div class="col">
                            <label class="ms-3">ประเภทหนังสือ</label>
                            <select class="form-select mt-1" name="book_type">
                                <option selected disabled>โปรดเลือกประเภทหนังสือ</option>
                                <?php foreach ($options as $key => $option): ?>
                                    <option value="<?php echo $key + 1; ?>"><?php echo $option; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="mb-3 mt-3">
                        <label for="exampleFormControlTextarea1" class="form-label ms-3">เรื่องย่อ</label>
                        <textarea class="form-control" style="height:10rem;" name="book_story"
                            id="exampleFormControlTextarea1" rows="3"><?php echo ($obj->book_story); ?></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <label class="ms-3">ราคา</label>
                            <input type="number" class="form-control mt-1" name="book_price"
                                value="<?php echo ($obj->book_price); ?>" placeholder="กรุณากรอกราคาต่อเล่ม">
                        </div>
                        <div class="col">
                            <label class="ms-3">จำนวน</label>
                            <input type="number" class="form-control mt-1" name="book_stock"
                                value="<?php echo ($obj->book_stock); ?>" placeholder="กรุณากรอกจำนวนที่จะลงขาย">
                        </div>
                    </div>

                    <div class="my-3 mt-4 text-center">
                        <input type="submit" class="btn btn-primary" value="แก้ไขข้อมูล">
                    </div>

                </form>

            </div>
        </div>
    </section>

    <script src="assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>
    <script>

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
    </script>
</body>

</html>