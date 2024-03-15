<?php
session_start();

require("dbconnect.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>ข่าวสารและโปรโมชั่น</title>
    <style>
    #darkModeButton {
        background-color: white; /* เปลี่ยนสีพื้นหลังเป็นขาว */
        color: black; /* เปลี่ยนสีตัวอักษรเป็นดำ */
         }
        .sale {
            border: 10px solid black;
        }

        .sale-badge {
            background-color: #000
        }.navbar {
            border: 10px solid black;
        }
    .carousel-item {
        height: 10vh;
    }
    .dark-mode {
    background-color: #000;
    color: #fff; 
    .newpro {border: 10px solid black;}
}
        
    </style>
</head>

<body id="body">
    <nav class="navbar navbar-expand-sm bg-white mx-3 mt-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-3 mb-2" href="#">Book Whales</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="index.php">
                            <h5 class="fw-semibold">หน้าหลัก</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="books.php">
                            <h5 class="fw-semibold">หนังสือ</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="store.php">
                            <h5 class="fw-semibold">ร้านหนังสือ</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="promotion.php">
                            <h5 class="fw-semibold">ข่าวสารและโปรโมชั่น</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <button id="darkModeButton" class="btn btn-primary">
                             <span id="darkModeIcon">🌙</span> Dark Mode
                        </button>
                     </li>
                    <li class="nav-item mx-3 d-lg-none d-xl-none">
                        <a class="nav-link" href="#">
                            <h5 class="fw-semibold">ล็อคอิน</h5>
                        </a>
                    </li>
                    <li class="nav-item mx-3 d-lg-none d-xl-none">
                        <a class="nav-link" href="register.php">
                            <h5 class="fw-semibold">สมัครสมาชิก</h5>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav d-none d-lg-flex d-xl-flex">
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="loginform.php">
                            <h5 class="fw-semibold">ลงชื่อเข้าใช้ระบบ</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border rounded bg-warning px-3 ms-2 text-white" href="register.php">
                            <h5 class="fw-semibold">สมัครสมาชิก</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>

        <div class="container mt-3">
            <?php
            $sql = "SELECT * FROM newpro";
            $result = mysqli_query($connect, $sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="row gx-5">
                    <div class="col-md-6 mb-4">
                        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                            <img src="<?php echo "../bookwhales" . $row['newpro_img'] ?>" width="600" height="300" />
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <h4 class="mt-4 mb-1"><strong>
                                <?php echo $row['newpro_name'] ?>
                            </strong></h4>
                        <p class="row gx-5">
                            <?php echo $row['newpro_detail'] ?>
                        </p>
                    </div>
                    <br>
                </div>
                <?php
            }
            ?>
        </div>

    </section>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // สร้างฟังก์ชันเพื่อบันทึกสถานะ Dark Mode ไปยังคุกกี้
    function setDarkModeCookie(darkMode) {
        document.cookie = "darkMode=" + darkMode;
    }

    // สร้างฟังก์ชันเพื่อดึงค่า Dark Mode จากคุกกี้ (หากมี)
    function getDarkModeCookie() {
        var name = "darkMode=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i];
            while (cookie.charAt(0) == ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(name) == 0) {
                return cookie.substring(name.length, cookie.length);
            }
        }
        return null;
    }

    // สร้างฟังก์ชันเพื่ออัพเดตสถานะ Dark Mode จากคุกกี้ (หากมี)
    function updateDarkModeFromCookie() {
        var darkMode = getDarkModeCookie();
        if (darkMode === "true") {
            $("#body").addClass("dark-mode");
            $("#darkModeIcon").text("☀️");
        } else {
            $("#body").removeClass("dark-mode");
            $("#darkModeIcon").text("🌙");
        }
    }

    $(document).ready(function() {
        // เรียกใช้ฟังก์ชันเพื่ออัพเดตสถานะ Dark Mode จากคุกกี้
        updateDarkModeFromCookie();

        $("#darkModeButton").click(function() {
            $("#body").toggleClass("dark-mode");

            // สร้างคุกกี้เพื่อบันทึกสถานะ Dark Mode
            var darkMode = $("#body").hasClass("dark-mode") ? "true" : "false";
            setDarkModeCookie(darkMode);

            // ตรวจสอบสถานะโหมดและอัพเดตไอคอนตามความเหมาะสม
            if (darkMode === "true") {
                $("#darkModeIcon").text("☀️"); // สลับไปเป็น Light Mode
            } else {
                $("#darkModeIcon").text("🌙"); // สลับไปเป็น Dark Mode
            }
        });
    });
</script>
</body>

</html>