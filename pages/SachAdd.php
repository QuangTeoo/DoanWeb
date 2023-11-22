<?php
    require('./func.php');
    require('./conn.php');
if (isset($_POST["masach"])) {
  $Masach = $_POST["masach"];
  $Tensach = $_POST["tensach"];
  $Theloai = $_POST["theloai"];
  $Tacgia = $_POST["tacgia"];
  $Hinh =$_FILES['hinh']['name'];
  move_uploaded_file($_FILES['hinh']['tmp_name'],"./IMG/".$_FILES['hinh']['name']);
  $Mota = $_POST["mota"];
  $Namxb = $_POST["namxuatban"];
  $Nhaxb = $_POST["nhaxuatban"];
  addSach($conn,$Masach,$Tensach,$Theloai,$Tacgia,$Hinh,$Mota,$Namxb,$Nhaxb);
}
?>
<div class="mainadd-form center-container">
  <h1>Thêm sách mới </h1>
  <form method="post" enctype="multipart/form-data">
    <div class="add-form">
      <div class="add-form-col">
        <label for="masach">Mã sách </label>
        <input type="text" name="masach" id="masach" value="">
      </div>
      <div class="add-form-col">
        <label for="tensach">Tên sách</label>
        <input type="text" name="tensach" id="tensach" value="">
      </div>

      <div class="add-form-col">
        <label for="theloai">Thể loại </label>
        <input type="text" name="theloai" id="theloai" value="">
      </div>

      <div class="add-form-col">
        <label for="tacgia">Tác giả </label>
        <input type="text" name="tacgia" id="tacgia" value="">
      </div>

      <div class="add-form-col">
        <label for="hinh">Hình</label>
        <input type="file" name="hinh" id="hinh">
      </div>


      <div class="add-form-col">
        <label for="mota">Mô tả</label>
        <textarea name="mota" id="mota"></textarea>
      </div>

      <div class="add-form-col">
        <label for="namxuatban">Năm xuất bản </label>
        <input type="text" name="namxuatban" id="namxuatban" value="">
      </div>

      <div class="add-form-col">
        <label for="nhaxuatban">Nhà xuất bản</label>
        <input type="text" name="nhaxuatban" id="nhaxuatban" value="">
      </div>

    </div>
    <div class="add-form-col">
      <button class="mainadd-form-btn">Thêm sách</button>
    </div>
  </form>

</div>
<?php
if (isset($_POST["masach"])) {
?>
    <script>
        alert("Cập nhật thành công");
    </script>
<?php
}
?>