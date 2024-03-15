<?php
    session_start();
    require("../dbconnect.php");
    $admin = $_SESSION['admin'];

    if (!isset($admin)) {
        echo "<script>alert('กรุณาลงชื่อเข้าใช้เพื่อใช้งาน');
      window.location.replace('../loginform.php');</script>";
        exit(0);
    } else {
    
    }
    $sql = "select * from users where users_email = '$admin' ";
    $rs = $connect->query($sql);
    $row = $rs->fetch_object();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="../assets/fontawesome/css/brands.css" rel="stylesheet">
        <link href="../assets/fontawesome/css/solid.css" rel="stylesheet">
        <title></title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-white mx-3 mt-3">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-3 mb-2" href="dashboard.php">Book Whales</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3">
                            <a class="nav-link " href="detail_store.php">
                                <h5 class="fw-semibold">รายชื่อร้านหนังสือ</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="detail_users.php">
                                <h5 class="fw-semibold">รายชื่อลูกค้า</h5>
                            </a>
                        </li>
                        <li class="nav-item mx-3 d-lg-none d-xl-none">
                            <a class="nav-link" href="register.php">
                                <h5 class="fw-semibold">ออกจากระบบ</h5>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-none d-lg-flex d-xl-flex">
                        <li class="nav-item mx-1">
                            <a class="nav-link" >
                                <h5 class="fw-semibold"><?php echo $row->users_lastname;?></h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  rounded px-3 ms-2 " href="../logout.php">
                                <h5 class="fw-semibold">ออกจากระบบ</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.js"></script>
    </body>
    
</html>
