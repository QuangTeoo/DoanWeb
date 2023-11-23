<?php
require("conn.php");
require("func.php");
$listSach = listSach($conn);
$listSachBorrowedID = listSachBorrowID($conn);
$listSachPreoderedID = listSachPreoderID($conn);
?>
<div class="main-listsach-table">
    <h1>Danh sách Sách</h1>
    <div class="search-box">
        <form method="get">
            <input type="hidden" name="page" value="sachlist">
            <input type="text" name="query" placeholder="Tìm kiếm..." required>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Trạng thái mượn </th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php foreach ($listSach as $sach) { ?>
            <tr>
                <td><?php echo $sach["maSach"]?></td>
                <td><?php echo $sach["tenSach"]?></td>
                <td><?php echo $sach["tacGia"]?></td>
                <td><?php
                if (in_array($sach["maSach"], $listSachBorrowedID)) {
                    echo "<span class=\"txtStatusBorrowed\">Đang được mượn</span>";
                } else if (in_array($sach["maSach"], $listSachPreoderedID)) {
                    echo "<span class=\"txtStatusPreordered\">Đã được đặt mượn</span>";
                } else {
                    echo "Đang sẵn sàng";
                }
                 ?></td>
                <td>
                    <a href="?page=sachupdate">Sửa</a>
                    <a href="#">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>