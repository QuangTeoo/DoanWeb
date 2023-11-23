<?php
require("conn.php");
require("func.php");
if (isset($_POST["masach"])) {
    $masach = $_POST["masach"];
    $tensach = $_POST["tensach"];
    $tacgia = $_POST["tacgia"];
    $theloai = $_POST["theloai"];
    $mota = $_POST["mota"];
    $hinh = (isset($_FILES["hinh"]) ? $_FILES["hinh"]["name"] : null);
    $namxuatban = $_POST["namxuatban"];
    $nhaxuatban = $_POST["nhaXuatban"];
    if ($hinh) {
        move_uploaded_file($_FILES["hinh"]["tmp_name"], "IMG/".$_FILES["hinh"]["name"]);
    }
    if (updateSach($conn, $masach, $tensach, $theloai, $tacgia, $mota, $namxuatban, $nhaxuatban, $hinh) > 0) {
        ?>
        <script>alert("Cập nhật thành công!")</script>
        <?php
    }
}
else if (!isset($_GET["masach"])) {
    header("Location: ?page=sachlist");
    exit();
}
$sach = getSach($conn, $_GET["masach"]);
?>
<div class="content-form">
    <h1>Thông tin sách</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="masach" value="<?php echo $sach["maSach"]?>">
        <div class="content-form-main">
            <div class="content-form-update-img">
                <img id="imgBookUpdate" src="<?php echo (isset($sach["hinh"]) && $sach["hinh"] != "") ? "IMG/".$sach["hinh"] : "https://placehold.co/600x400?text=KH%C3%94NG+C%C3%93+%E1%BA%A2NH"; ?>">
                <label for="hinh">Cập nhật hình mới</label>
                <input type="file" name="hinh" id="hinh" onchange="updateImg(this)">
            </div>
            <div class="content-form-update">
                <div class="content-form-col span-big">
                    <label for="tensach">Tên sách</label>
                    <input type="text" name="tensach" id="tensach" value="<?php echo $sach["tenSach"] ?>">
                </div>

                <div class="content-form-col">
                    <label for="tacgia">Tác giả </label>
                    <input type="text" name="tacgia" id="tacgia" value="<?php echo $sach["tacGia"] ?>">
                </div>

                <div class="content-form-col">
                    <label for="theloai">Thể loại </label>
                    <input type="text" name="theloai" id="theloai" value="<?php echo $sach["theLoai"] ?>">
                </div>

                <div class="content-form-col span-big">
                    <label for="mota">Mô tả</label>
                    <textarea name="mota" id="mota"><?php echo $sach["moTa"] ?></textarea>
                </div>

                <div class="content-form-col">
                    <label for="namxuatban">Năm xuất bản </label>
                    <input type="text" name="namxuatban" id="namxuatban" value="<?php echo $sach["namXuatban"] ?>">
                </div>

                <div class="content-form-col">
                    <label for="nhaxuatban">Nhà xuất bản</label>
                    <input type="text" name="nhaXuatban" id="nhaxuatban" value="<?php echo $sach["nhaXuatban"] ?>">
                </div>
            </div>
        </div>
        <div class="content-form-col">
            <button class="content-form-btn">Cập nhật</button>
        </div>
    </form>
</div>
<script>
    function updateImg(element) {
        // https://stackoverflow.com/questions/24837646
        document.getElementById("imgBookUpdate").src = window.URL.createObjectURL(element.files[0]);
    }
</script>