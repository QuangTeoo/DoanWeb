<?php
require('./func.php');
require('./conn.php');
if(isset($_POST["action"])){
    switch ($_POST["action"]) {
        case "muon":
            $Mabandoc = $_POST["mabandoc"];
            $Masach = $_POST["masach"];
            $Ngaytradukien = $_POST["ngaytradukien"];
            $Mathuthu = $_SESSION["maThuthu"];
            borrowSach($conn,$Mabandoc,$Masach,$Mathuthu,$Ngaytradukien);
            break;
        case "tra":
            $Mabandoc = $_POST["mabandoc"];
            $Masach = $_POST["masach"];
            $Mathuthu = $_SESSION["maThuthu"];
            returnSach($conn,$Mabandoc,$Masach,$Mathuthu);
    }
}
?>
<div id="bore-main">
    <div id="bo-main">
        <h1>Mượn sách</h1>
        <form method="POST">
            <input type="hidden" name="action" value="muon">
            <div class="bo-element-container">
                <label for="mabandoc">Mã bạn đọc</label>
                <input type="text" name="mabandoc" id="mabandoc" placeholder="Nhập mã bạn đọc" required>
            </div>
            <div class="bo-element-container">
                <label for="masach">Mã sách</label>
                <input type="text" name="masach" id="masach" placeholder="Nhập mã sách" required>
            </div>
            <div class="bo-element-container">
                <label for="ngaytra">Ngày trả dự kiến</label>
                <input type="date" name="ngaytradukien" id="ngaytra" required>
            </div>
            <div class="bo-element-container">
                <button>Mượn sách</button>
            </div>
        </form>
    </div>
    <div id="re-main">
        <h1>Trả sách</h1>
        <form method="POST">
            <input type="hidden" name="action" value="tra">
            <div class="re-element-container">
                <label for="mabandoc">Mã bạn đọc</label>
                <input type="text" name="mabandoc" id="mabandoc" required placeholder="Nhập mã bạn đọc">
            </div>
            <div class="re-element-container">
                <label for="masach">Mã sách</label>
                <input type="text" name="masach" id="masach" required placeholder="Nhập mã sách">
            </div>
            <div class="re-element-container">
                <button>Trả sách</button>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST["action"])) {
    switch ($_POST["action"]){
        case 'muon':
?>
        <script> alert('Mượn thành công')</script>
<?php
            break;
        case 'tra' :
?>
            <script>alert('Trả sách thành công')</script>
<?php
            break;
    }
}
?>