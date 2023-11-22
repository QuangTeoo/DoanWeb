<?php
require('./func.php');
require('./conn.php');
if (isset($_POST["mathuthu"])) {
    $Mathuthu = $_POST["mathuthu"];
    $Tenthuthu = $_POST["tenthuthu"];

    updateThuThu($conn,$Mathuthu,$Tenthuthu);
}
if (isset($_GET["mathuthu"])) {
    $result =  getThuthu($conn, $_GET["mathuthu"]);
    $r = mysqli_fetch_array($result);
}
?>
<div class="container-thuthu-update">
    <h1>Cập nhật thông tin </h1>
    <form class="container-thuthu-update-form" method="post">
        <label for="ma">Mã thủ thư </label>
        <input type="text" id="ma" value="<?php echo $_GET["mathuthu"] ?>" disabled>
        <input type="hidden" name="mathuthu" value="<?php echo $_GET["mathuthu"] ?>">

        <label for="ten">Tên thủ thư</label>
        <input type="text" name="tenthuthu" id="ten" placeholder="Nhập tên thủ thư" value="<?php echo $r["tenThuthu"] ?>">
        <div class="container-thuthu-update-btn">
            <button type="submit">Cập nhật</button>
        </div>
    </form>
</div>
<?php
if (isset($_POST["mathuthu"])) {
?>
    <script>
        alert("Cập nhật thành công");
    </script>
<?php
}
?>