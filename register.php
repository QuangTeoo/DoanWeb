<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/register_login.css">
    <title>Document</title>
</head>

<body>
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
</body>

</html>