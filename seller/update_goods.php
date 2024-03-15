<?php
    session_start();
    ob_start();
    require("../dbconnect.php");
    $store = $_SESSION['store'];
    $book_id = $_GET["id"];
    $book_img = "../seller/img/".basename($_FILES["book_img"]["name"]);
    move_uploaded_file($_FILES["book_img"]["tmp_name"],$book_img);
    
    $sql_sl = "select * from books where book_id = $book_id";
    $rs_sl = $connect->query($sql_sl);

    $row = $row = mysqli_num_rows($rs_sl);
    $r = $rs_sl->fetch_object();
    
    if($_FILES["book_img"]["name"] != ''){
        $book_img = "../seller/img/".basename($_FILES["book_img"]["name"]);
    }else{
        $book_img = $r->book_img;
        
    }
    if($_POST["book_name"] != ''){
        $book_name = $_POST["book_name"];
    }else{
        $book_name = $r->book_name;
        
    }
    if($_POST["book_author"] != ''){
        $book_author = $_POST["book_author"];
    }else{
        $book_author = $r->book_author;
        
    }
    if($_POST["book_translator"] != ''){
        $book_translator = $_POST["book_translator"];
    }else{
        $book_translator = $r->book_translator;
        
    }
    if($_POST["book_type"] = '4'){
        $book_type = $r->type_id;
    }else{
        $book_type = $_POST["book_type"];
    }
    if($_POST["book_story"] != ''){
        $book_story = $_POST["book_story"];
    }else{
        $book_story = $r->book_story;
        
    }
    if($_POST["book_price"] != ''){
        $book_price = $_POST["book_price"];
    }else{
        $book_price = $r->book_price;
        
    }
    if($_POST["book_stock"] != ''){
        $book_stock = $_POST["book_stock"];
    }else{
        $book_stock = $r->book_stock;
        
    }

    $sql = "UPDATE books set book_img = '$book_img',
                             book_name = '$book_name',
                             book_author = '$book_author',
                             book_translator = '$book_translator',
                             type_id = $book_type,
                             book_story = '$book_story',
                             book_price = $book_price,
                             book_stock = $book_stock
            where book_id =$book_id ";
    $rs = mysqli_query($connect,$sql);
    header("location:seller_editgoods.php");
?>