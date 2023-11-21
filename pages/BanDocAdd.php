<?php
if (isset($_POST["password"])) {
    require('./func.php');
    require('./conn.php');
    $Hoten = $_POST['hoten'];
    $Ngaysinh = $_POST['ngaysinh'];
    $Que = $_POST['que'];
    $CMND = $_POST['cccd'];
    $SDT = $_POST['phone'];
    $Email=$_POST['email'];
    $Gioitinh = $_POST['gioitinh'];
    $Matkhau = $_POST['password'];
    $Matkhau = password_hash($Matkhau,PASSWORD_DEFAULT);
    
    addBanDoc($conn,$Hoten,$Ngaysinh,$Que,$CMND,$SDT,$Email,$Gioitinh,$Matkhau);
}
?>
<div class="form-main">
    <h1>Cấp tài khoản</h1>
    <form class="register-form" method="post">
        <label for="hoten">Họ tên</label>
        <input type="text" name="hoten" id="hoten" placeholder="Nhập họ và tên" required>
        <label for="ngaysinh">Ngày sinh</label>
        <input type="date" name="ngaysinh" id="ngaysinh">

        <label for="que">Quê</label>
        <input type="text" name="que" id="que" placeholder="Nhập quê">

        <label for="cccd">CCCD/CMND</label>
        <input type="text" name="cccd" id="cccd" placeholder="Nhập CCCD/CMNN" required>

        <label for="sdt">Số điện thoại</label>
        <input type="text" name="phone" id="" placeholder="Nhập số điện thoại" required>

        <label for="email">Email</label>
        <input type="text" name="email" id="" placeholder="Nhập email" required>

        <div>
            <label for="gioitinh">Giới tính</label>
            <div>
                <input type="radio" name="gioitinh" id="gt-nam" value="nam" required>
                <label for="gt-nam">Nam</label>
            </div>
            <div>
                <input type="radio" name="gioitinh" id="gt-nu" value="nu">
                <label for="gt-nu">Nữ</label>
            </div>
        </div>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" required>
        <div class="submit-btn">
            <button type="submit">Thêm</button>
        </div>
    </form>
</div>