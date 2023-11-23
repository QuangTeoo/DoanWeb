<?php
require("conn.php");
require("func.php");
$listSach = null;
if (isset($_GET["query"])) {
    $listSach = listSach($conn, $_GET["query"]);
} else {
    $listSach = listSach($conn);
}
$listSachBorrowedID = listSachBorrowID($conn);
$listSachPreoderedID = listSachPreoderID($conn);
?>
<div class="main-listsach-table">
    <h1>Danh sách Sách</h1>
    <div class="search-box">
        <form method="get">
            <input type="hidden" name="page" value="sachlist">
            <input type="text" name="query" placeholder="Tìm kiếm..." value="<?php if (isset($_GET["query"])) echo $_GET["query"] ?>" required>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th>Trạng thái mượn </th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php foreach ($listSach as $sach) { ?>
            <tr>
                <td><?php echo $sach["maSach"]?></td>
                <td><?php echo $sach["tenSach"]?></td>
                <td><?php echo $sach["tacGia"]?></td>
                <td><?php echo $sach["theLoai"]?></td>
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
                    <a href="?page=sachupdate&masach=<?php echo $sach["maSach"]; ?>">Sửa</a>
                    <button onclick="confirmDelete('<?php echo $sach["maSach"] ?>',`<?php echo $sach["tenSach"]?>`)">Xóa</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(maSach, tenSach) {
    if (confirm(
            `Xác nhận xoá
${maSach} - ${tenSach}.
Thao tác này sẽ không thể hoàn tác.`
        )) {
        document.location = document.location.origin + document.location.pathname + '?page=sachdelete&masach=' + maSach;
    }
    }
<?php
if (isset($_GET["deleteSuccess"]) && $_GET["deleteSuccess"]) { ?>
    alert("Xóa thành công");
<?php } ?>
</script>