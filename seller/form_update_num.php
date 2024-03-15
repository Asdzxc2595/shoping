<?php 
    session_start();
    ob_start();
    require("../dbconnect.php");

    $id = $_GET['id']
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="../assets/fontawesome/css/brands.css" rel="stylesheet">
        <link href="../assets/fontawesome/css/solid.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../favicon.ico">
        <title>Document</title>
    </head>
    <body width="100%" height="100%">
        
        <div class="rounded" style="margin:10% 33% 10% 33%;border: 1px solid;padding: 10px;box-shadow: 3rem 1rem #888888;">
            <div class="">
                <div class="text-body-secondary fw-semibold fs-3 text-center">
                    เพิ่มเลขติดตามพัสดุ
                </div>
                <div class=" my-5">
                    <form action="update_num.php?id=<?php echo $id?>" method="post">
                        <label for="">เลือกชื่อขนส่ง</label>
                        <select class="form-select" aria-label="Default select example" name="post_id">
                            <option selected>รายชื่อบริษัทขนส่ง</option>
                            <option value="1">Kerry Express</option>
                            <option value="2">Flash Express</option>
                            <option value="3">DHL Express</option>
                            <option value="4">Ninja Van</option>
                            <option value="5">J&T Express</option>
                        </select>
                        <label class="form-label mt-1">เพิ่มเลขติดตามพัสดุ</label>
                        <input type="text" class="form-control form-control-lg"
                                name="detail_num" />
                        <div class="invalid-feedback">กรุณากรอกเลขติดตาม</div>
                        <div class="my-3 mt-4 text-center">
                            <input type="submit" class="btn btn-primary" value="ยืนยันข้อมูล">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>
    </body>
</html>