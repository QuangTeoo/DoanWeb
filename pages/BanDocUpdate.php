<?php 
            require('./func.php');
            require('./conn.php');
    if(isset($_POST["mabandoc"])){
        $Mabandoc = $_POST["mabandoc"];
        $Tenbandoc = $_POST["tenbandoc"];
        $Ngaysinh = $_POST["ngaysinh"];
        $Gioitinh = $_POST["gender"];
        $Que = $_POST["que"];
        $Cmnd = $_POST["cccd"];
        $Phone = $_POST["phone"];
        $Email = $_POST["email"];
        updateBanDoc($conn,$Mabandoc,$Tenbandoc,$Ngaysinh,$Gioitinh,$Que,$Cmnd,$Phone,$Email);
    }
    if(isset($_GET["mabandoc"])){
    $result =  getBandoc($conn,$_GET["mabandoc"]);
    $r = mysqli_fetch_array($result);
}
?>
<div class="container-update">
    <h1>Cập nhật thông tin </h1>
    <form class="container-update-form" method="post">
        <label for="ma">Mã bạn đọc </label>
        <input type="text" id="ma" value="<?php echo $_GET["mabandoc"]?>" disabled>
        <input type="hidden" name="mabandoc" value="<?php echo $_GET["mabandoc"]?>">

        <label for="ten">Tên bạn đọc</label>
        <input type="text" name="tenbandoc" id="tenbandoc" placeholder="Nhập tên bạn đọc" value="<?php echo $r["tenBandoc"]?>" required>
        <div class="content-grid">
            <div class="content-grid-date">
                <label for="date">Ngày sinh</label>
                <input type="date" name="ngaysinh" id="date" value="<?php echo $r["ngaySinh"]?>" required>
            </div>
            <div class="content-grid-gender">
                <label for="gioitinh">Giới tính</label>
                <select name="gender" id="gioitinh">
                    <option value="<?php echo $r["gioiTinh"]?>">Nam</option>
                    <option value="<?php echo $r["gioiTinh"]?>">Nữ</option>
                </select>
            </div>
            <div class="content-grid-vilage">
                <label for="que">Quê</label>
                <input type="text" name="que" id="que" placeholder="Nhập quê" value="<?php echo $r["queQuan"]?>" required>
            </div>
            <div class="content-grid-cmnd">
                <label for="cccd">CCCD/CMND</label>
                <input type="text" name="cccd" id="cccd" placeholder="Nhập CCCD/CMNN" value="<?php echo $r["cmnd"]?>" required>
            </div>
            <div class="content-grid-phone">
                <label for="sdt">Số điện thoại</label>
                <input type="text" name="phone" id="" placeholder="Nhập số điện thoại" value="<?php echo $r["dt"]?>" required>
            </div>
            <div class="content-grid-email">
                <label for="email">Email</label>
                <input type="text" name="email" id="" placeholder="Nhập email" value="<?php echo $r["email"]?>" required>
            </div>
        </div>
        <div class="container-update-btn">
            <button type="submit">Cập nhật</button>
        </div>
    </form>
</div>
<?php
    if(isset($_POST["mabandoc"])){
?>
    <script>
        alert("Cập nhật thành công");
    </script>
<?php
    }
?>