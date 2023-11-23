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
            if (!checkBorrowValidity($conn, $Mabandoc, $Masach)) {
                echo "<script>alert(`Sách này đã có người đặt trước hoặc đã có người mượn.`)</script>";
                break;
            }
            borrowSach($conn,$Mabandoc,$Masach,$Mathuthu,$Ngaytradukien);
            echo "<script> alert('Mượn thành công')</script>";
            break;
        case "tra":
            $Mabandoc = $_POST["mabandoc"];
            $Masach = $_POST["masach"];
            $Mathuthu = $_SESSION["maThuthu"];
            if (returnSach($conn,$Mabandoc,$Masach,$Mathuthu) > 0) {
                echo "<script>alert('Trả sách thành công')</script>";
            } else {
                echo "<script>alert('Không có dữ liệu đang mượn với sách này.')</script>";
            }

    }
}
?>
<div id="bore-main" class="center-container">
    <div id="bo-main">
        <h1>Mượn sách</h1>
        <form method="POST">
            <input type="hidden" name="action" value="muon">
            <div class="bo-element-container">
                <label for="mabandocmuon">Mã bạn đọc</label>
                <input type="text" name="mabandoc" id="mabandocmuon" placeholder="Nhập mã bạn đọc" required>
            </div>
            <div class="bo-element-container">
                <label for="masachmuon">Mã sách</label>
                <input type="text" name="masach" id="masachmuon" placeholder="Nhập mã sách" required>
            </div>
            <div class="bo-element-container">
                <label for="ngaytramuon">Ngày trả dự kiến</label>
                <input type="date" name="ngaytradukien" id="ngaytramuon" required>
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
                <label for="mabandoctra">Mã bạn đọc</label>
                <input type="text" name="mabandoc" id="mabandoctra" required placeholder="Nhập mã bạn đọc">
            </div>
            <div class="re-element-container">
                <label for="masachtra">Mã sách</label>
                <input type="text" name="masach" id="masachtra" required placeholder="Nhập mã sách">
            </div>
            <div class="re-element-container">
                <button>Trả sách</button>
            </div>
        </form>
    </div>
</div>