<?php
require("nav_seller.php");
if (!isset($_SESSION['store'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
      window.location.replace('../loginform.php');</script>";
    exit(0);
}


$store = $_SESSION['store'];

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
    <title>จัดการร้านหนังสือ</title>
    
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
                    <div class="text-center my-2 fw-semibold fs-5 text-white" style="margin-left:4.5rem;"><a href="seller_editgoods.php"
                            style="text-decoration: none; color:black;">
                            <div class="text-white">จัดการหนังสือ</div>
                        </a></div>
                    <div class="dropdown " style="margin-left:4.5rem;">
                        <button class="btn dropdown-toggle fw-semibold fs-5 text-white" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            หมวดหนังสือ
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="search_type_goods.php?type=1">นิยาย/วรรณกรรม</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=2">บริหาร</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=3">การศึกษา</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=4">จิตวิทยาและการพัฒนาตัวเอง</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=5">หนังสือเด็กและการ์ตูนความรู้</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=6">การ์ตูนและไลท์โนเวล</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=7">วิทยาการและเทคโนโลยี</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=8">ความรู้ทั่วไป</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=9">ประวัติศาสตร์ ศาสนา วัฒนธรรม การเมือง การปกครอง</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=10">อัตชีวประวัติ ชีวประวัติ</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=11">อาหารและสุขภาพ</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=12">บันเทิงและท่องเที่ยว</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=13">การเกษตรและธรรมชาติ</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=14">ครอบครัว</a></li>
                            <li><a class="dropdown-item" href="search_type_goods.php?type=15">บ้านและที่อยู่อาศัย</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

            <?php
            $sql = "SELECT * FROM books WHERE stores_id = '$store'";
            $result = mysqli_query($connect, $sql);
            
            if ($result->num_rows > 0) {
                echo "<form method='GET' action='search_goods.php' class='d-flex justify-content-center'>";
                echo "<input type='text' name='query' class='form-control w-50 d-inline' placeholder='ค้นหาข้อมูลตามชื่อหนังสือ...'>";
                echo "<button type='submit' class='btn btn-primary ms-2'><i class='fa-solid fa-magnifying-glass'></i></button>";
                echo "<button type='button' class='btn btn-success mx-1'><a href='form_insert_goods.php'><i class='fa-solid fa-plus text-white'></i></a></button>";
                echo "</form>";
                echo "<div class='text-center mt-3'><h1>รายการที่วางขาย</h1> </div>";
                echo "<div class='container-fluid d-flex justify-content-center table-responsive mt-3'>";
                echo "<table class='table table-bordered w-auto'>";
                echo "<thead class='text-center'>";
                echo "<tr>
                        <th scope='col'>ลำดับ</th>
                        <th scope='col'>ชื่อหนังสือ</th>
                        <th scope='col'>รูปปกหนังสือ</th>
                        <th scope='col'>ชื่อผู้เขียน</th>
                        <th scope='col'>ชื่อผู้แปล</th>
                        <th scope='col'>เรื่องย่อ</th>
                        <th scope='col'>ราคาปกติ</th>
                        <th scope='col'>จำนวนสินค้า</th>
                        <th scope='col'>การกระทำ</th>
                      </tr>";
                echo "</thead>";
                echo "<tbody>";
            
            $order = 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr >";
                echo "<th scope='row' class='text-center' style='width: 100px;'>" . $order++ . "</th>";
                echo "<td>". $row["book_name"] . "</td>";
                echo "<td class='text-center'><img src='" . $row["book_img"] . "' width='100' height='130'></td>";
                echo "<td>" . $row["book_author"] . "</td>";
                echo "<td>" . $row["book_translator"] . "</td>";
                echo "<td class='w-25'>" . $row["book_story"] . "</td>";
                echo "<td class='text-center'>" . $row["book_price"] . "</td>";
                echo "<td class='text-center'>" . $row["book_stock"] . "</td>";
                echo "<td class='text-center'><a href='form_edit_goods.php?id=" . $row["book_id"] . "' class='text-decoration-none text-white'><button class='btn btn-warning mx-1'><i class='fa-solid fa-pen-to-square text-white'></i></button></a>
                <a href='delete_goods.php?id=" . $row["book_id"] . "' class='text-decoration-none' onclick=\"return confirm('คุณต้องการลบหนังสือเล่มนี้หรือไม่')\"><button class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></a></td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            } else {
                echo "<div class='alert alert-danger mx-3' role='alert'>ไม่พบสินค้าหนังสือ</div>";
                echo "<form method='GET' action='seller_search.php' class='d-flex justify-content-center'>";
                echo "<input type='text' name='query' class='form-control w-50 d-inline' placeholder='ค้นหาข้อมูลตามชื่อหนังสือ...'>";
                echo "<button type='submit' class='btn btn-primary ms-2'><i class='fa-solid fa-magnifying-glass'></i></button>";
                echo "<button type='button' class='btn btn-success mx-1'><a href='form_insert_goods.php'><i class='fa-solid fa-plus text-white'></i></a></button>";
                echo "</form>";
            }
            ?>

</body>

<script src="assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>

</html>