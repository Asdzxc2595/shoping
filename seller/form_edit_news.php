<?php
    require("nav_seller.php");
    $newpro_id = $_GET['id'];
    $sql = "select * from newpro where newpro_id = $newpro_id";
    $rs = $connect->query($sql);
    $r = $rs->fetch_object();
?>
<body>
    <div class="nav-small mb-3" width="100%">
        <div class="bg-black" style="min-height:2.5rem;">
            <div width="100%" style="margin: 0 25% 0 25%;">
                <div class="d-flex justify-content-center">
                    <div class="text-center my-2 fw-semibold fs-6 text-white"><a href="form_insert_new&promo.php"
                            style="text-decoration: none;color:black;">
                            <div class="text-white">เพิ่มข่าวสาร&โปรโมชั่น</div>
                        </a></div>
                    <div class="text-center my-2 fw-semibold fs-6 text-white" style="margin-left:4.5rem;"><a href="new&promo.php"
                            style="text-decoration: none; color:black;">
                            <div class="text-white">จัดการข่าวสาร&โปรโมชั่น</div>
                    </a></div>
                </div>
            </div>
        </div>
    </div>
    <section class="mt-5" width="100%">
        <div class="rounded" style="margin:0 20% 3% 20%;border: 1px solid;padding: 10px;box-shadow: 3rem 2rem #888888;">
            <div class="text-body-secondary fw-semibold fs-2 text-center mt-3">
                เพิ่มข่าวสารหรือโปรโมชั่น
            </div>
            <div class="">
                <form action="update_new.php?id=<?php echo $r->newpro_id?>" method="POST" enctype="multipart/form-data">
                    <div class="" style="margin:0 18% 3% 18%;">
                        <div class="text-center mt-5">
                            <img id="profile-preview" src="<?php echo $r->newpro_img?>" class="border border-3" width="600" height="300" />
                        </div>
                        <div class=" pb-2">
                            <label for="formFile" class="form-label ms-3 mt-3">รูปภาพข่าวสาร<span
                                    class="text-body-secondary">(อัปโหลดไฟล์ขนาด 600x300pxเท่านั้น)</span></label>
                            <input class="form-control" type="file" id="newpro_img" name="newpro_img"
                                accept="image/jpeg, image/png" onchange="previewImage(event)" >
                            <div class="invalid-feedback">กรุณาอัปโหลดรูปภาพ</div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label ms-3">หัวข้อข่าวสาร</label>
                            <input type="text" class="form-control" name="newpro_name" id="formGroupExampleInput"
                                placeholder="กรุณากรอกชื่อหนังสือ">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label ms-3">รายละเอียดข่าวสาร </label>
                            <textarea class="form-control" style="height:10rem;" name="newpro_detail"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="text-center my-3 mt-4">
                            <input type="submit" class="btn btn-primary" value="ยืนยันข้อมูล">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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