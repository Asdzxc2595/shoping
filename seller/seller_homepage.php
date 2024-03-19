<?php

require("nav_seller.php");

if (!isset($_SESSION['store'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
        window.location.replace('../loginform.php');</script>";
    exit(0);
}

$store = $_SESSION['store'];
$sql = "SELECT * FROM stores WHERE stores_id = $store";
$rs = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($rs);

$sql_b = "select * from books where stores_id = $store";
$rs_b = $connect->query($sql_b);

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
    <title>หน้าร้านหนังสือ</title>
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
    <section width="100%">
        <div class="profile" style="min-height:12rem;max-height:12rem;margin: 1% 25% 0 25%; ">
            <div class="row g-0 text-center position-relative">
                <div class="col-6 col-md-4  " >
                </div>
                <img class="mt-3 ms-3 position-absolute top-0 start-0 rounded-circle" src="<?php echo $row['stores_img']; ?>" alt="" style="width:110px; height:110px;">

                <div class="col-sm-6 col-md-8 " style="min-height:10rem">
                    <div class="d-flex align-items-start flex-column mb-3 ms-5" style="height: 200px;">
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
</body>

<div class="text-center w-100 mt-1">
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
                    <img class="bg-light" style="min-height:13rem;max-height:13rem;min-width:11rem;max-width:11rem;magin:0;padding:0;" src="<?php echo ($obj->book_img); ?>" alt="">

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
                        <button type="button" class="btn btn-danger " style="min-width:5rem;" onclick="javascript:window.location='form_edit_goods.php?id=<?php echo ($obj->book_id); ?>'">แก้ไขข้อมูล</button>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

</section>

<script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>

</body>

</html>