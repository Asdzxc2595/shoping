<?php
require("nav_admin.php");

$a = 0;
$sql_users = "select * from users where users_role != 0";
$rs_users = $connect->query($sql_users);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อผู้ใช้</title>
</head>

<body>
    <div class="text-center mt-2">
        <strong>
            <p class="fs-2">ข้อมูลลูกค้า</p>
        </strong>
    </div>

    <div class='container-fluid d-flex justify-content-center table-responsive mt-3'>
        <table class="table table-bordered w-auto">
            <thead class='text-center'>
                <?php if ($rs_users->num_rows > 0) { ?>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">รูปลูกค้า</th>
                        <th scope="col">ชื่อลูกค้า</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">เบอร์โทรลูกค้า</th>
                        <th scope="col">วันที่สมัคร</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">จัดการ</th>
                    </tr>
            </thead>
            <tbody>
                <?php while ($r_user = $rs_users->fetch_object()) {
                        $a++; ?>
                    <tr>
                        <th scope="row"><?php echo $a ?></th>
                        <td><img width="150" src="<?php echo $r_user->users_img ?>" alt=""></td>
                        <td width="150"><?php echo $r_user->users_firstname . " " . $r_user->users_lastname ?></td>
                        <td width="200"><?php echo $r_user->users_address . ' ' . "จังหวัด" . ' ' . $r_user->users_province . ' ' . "อำเภอ" . ' ' . $r_user->users_district . ' ' . "ไปรษณีย์" . ' ' . $r_user->users_zip ?></td>
                        <td width="150"><?php echo $r_user->users_mobile ?></td>
                        <td width="150"><?php echo $r_user->users_created ?></td>
                        <td><?php if ($r_user->users_permit != 0) { ?>
                                <div class="btn btn-success">ปกติ</div>
                            <?php } else { ?>
                                <div class="btn btn-danger">ล๊อค</div>
                            <?php } ?>
                        </td>
                        <td class="text-center" width="200">
                            <a href='delete_store.php?id=<?php echo $r_user->users_id ?>' class='text-decoration-none' onclick="return confirm('คุณต้องการลบร้านค้านี้หรือไม่')"><button class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></a>
                            <?php if ($r_user->users_permit != 0) { ?>
                                <a href='setlockuser_permit.php?users_id=<?php echo $r_user->users_id ?>' onclick="return confirm('คุณต้องการล็อคบัญชีนี้หรือไม่')"><button class="btn btn-warning text-white"><strong>ล็อค</strong></button></a>
                            <?php } else { ?>
                                <a href='setunuser_user.php?users_id=<?php echo $r_user->users_id ?>' onclick="return confirm('คุณต้องการปลดล็อคบัญชีนี้หรือไม่')"><button class="btn btn-warning text-white"><strong>ปลดล็อค</strong></button></a>
                            <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        <?php } ?>
        </table>
    </div>
</body>

</html>