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
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <title>หนังสือ</title>
</head>

<body>
    <?php
    session_start();
    require("../dbconnect.php");

    if (!isset($_SESSION['admin'])) {
        echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
      window.location.replace('../loginform.php');</script>";
        exit(0);
    }
    $ser = "select * from `type`";
    $rs = $connect->query($ser);
    $r = mysqli_num_rows($rs);
    $r = $rs->fetch_assoc();

    $sql = "SELECT *, ifnull(sum(t2.book_stock), 0) stock, (SELECT  sum(orders_detail.detail_total)  FROM `type`
    left join books on type.type_id = books.type_id
    inner join orders_detail on orders_detail.book_id = books.book_id
    where ohistory_id != 0 and detail_num != '' and type.type_id = t2.type_id group by type.type_name) sold ,(SELECT  sum(orders_detail.detail_quantity)  FROM `type`
    left join books on type.type_id = books.type_id
    inner join orders_detail on orders_detail.book_id = books.book_id
    where ohistory_id != 0 and detail_num != '' and type.type_id = t2.type_id group by type.type_name) quantity   FROM `type` t1 
                                                        left JOIN books t2 ON t1.type_id = t2.type_id 
                                                        group by t1.type_name ";
    $result = mysqli_query($connect, $sql);

    ?>
    <div class='container-fluid d-flex justify-content-center table-responsive mt-3'>
        <table class="table table-bordered w-auto">
            <thead class='text-center'>
                <?php ?>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">ชื่อประเภท</th>
                    <th scope="col">จำนวนหนังสือคงเหลือ</th>
                    <th scope="col">Sold</th>
                    <th scope="col">quantity</th>

                </tr>
            </thead>
            <tbody>
                <?php if ($r > 0) {
                    $a = 1;
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <th scope="row">
                                <?php echo $a++ ?>
                            </th>
                            <td width="200">
                                <?php echo $row["type_name"] ?>
                            </td>
                            <td width="150">
                                <?php echo $row["stock"] ?>
                            </td>
                            <td>
                                <?php echo $row['sold'] ?>
                            </td>
                            <td><a href="report_book.php?types=<?php echo $row['type_id'] ?>"><?php echo $row['quantity'] ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
            <?php ?>
        </table>
    </div>

</body>

</html>