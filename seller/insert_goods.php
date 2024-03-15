<?php
session_start();
ob_start();
require("dbconnect.php");

if (!isset($_SESSION['store'])) {
    echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
      window.location.replace('../loginform.php');</script>";
    exit(0);
}
$store = $_SESSION['store'];


$img = "../seller/img/" . basename($_FILES["book_img"]["name"]);
move_uploaded_file($_FILES["book_img"]["tmp_name"], $img);

$book_name = $_POST["book_name"];
$book_author = $_POST["book_author"];
$book_translator = $_POST["book_translator"];
$book_type = $_POST["book_type"];
$book_story = $_POST["book_story"];
$book_price = $_POST["book_price"];
$book_stock = $_POST["book_stock"];

$sql = "INSERT INTO books
            (book_name, book_img, book_author, book_translator, book_story, book_price, book_stock, stores_id, type_id)
            VALUES ('$book_name','$img','$book_author','$book_translator','$book_story','$book_price','$book_stock','$store','$book_type')";

$rs = mysqli_query($connect, $sql);
if ($rs) {
    ?>
    <script>
        alert("เพิ่มข้อมูลหนังสือสำเร็จ");
        location.href = "seller_editgoods.php";
    </script>
    <?php
} else {
    ?>
    <script>
        alert("ไม่สามารถเพิ่มได้ กรุณากรอกข้อมูลให้ครบ");
        location.href = "form_insert_goods.php";
    </script>
<?php
}
?>