<?php
require('./func.php');
require('./conn.php');
if (isset($_POST["password"])) {
    $Mathuthu = $_POST['mathuthu'];
    $Tenthuthu = $_POST['tenthuthu'];
    $Matkhau = $_POST['password'];
    $Matkhau = password_hash($Matkhau, PASSWORD_DEFAULT);

    addThuThu($conn,$Mathuthu,$Tenthuthu,$Matkhau);
}
?>
<div class="form-thuthu-main">
    <h1>Cấp tài khoản Thủ thư</h1>
    <form method="post" class="register-thuthu-form">
        <label for="ma">Mã thủ thư</label>
        <input type="text" name="mathuthu" id="ma">
        <label for="ten">Tên thủ thư</label>
        <input type="text" name="tenthuthu" id="ten">
        <label for="password">Mật khẩu </label>
        <input type="password" name="password" id="password">
        <div class="submit-thuthu-btn">
            <button type="submit">Thêm</button>
        </div>
    </form>
</div>
<?php
if (isset($_POST["password"])) {
?>
    <script>
        alert("Thêm thủ thư thành công !");
    </script>
<?php
}
?>
