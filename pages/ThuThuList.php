<div class="usermain-thuthu-table">
    <h1>Danh sách thủ thư </h1>
    <div class="search-box">
        <form method="get">
            <input type="hidden" name="page" value="thuthulist">
            <input type="text" name="query" placeholder="Tìm kiếm..."  value="<?php if (isset($_GET["query"])) echo $_GET["query"] ?>" required>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Mã thủ thư</th>
            <th>Tên thủ thư</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
            require('./conn.php');
            require('./func.php');
            $result = null;
            if (isset($_GET["query"])) {
                $result = listThuThu($conn, $_GET["query"]);
            } else {
                $result = listThuThu($conn);
            }
            if ($result->num_rows > 0) {
                while ($r = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $r["maThuthu"] ?></td>
                        <td><?php echo $r["tenThuthu"] ?></td>
                        <td>
                            <a href="?page=thuthuupdate&mathuthu=<?php echo $r["maThuthu"] ?>">Sửa</a>
                            <button onclick='confirmDelete("<?php echo $r["maThuthu"] ?>","<?php echo $r["tenThuthu"] ?>")'>Xóa</button>
                        </td>
                    </tr>
                <?php
                }
            } else { ?>
                <tr>
                    <td colspan="10">Không có dữ liệu</td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>
<script>
    function confirmDelete(maThuthu, tenThuthu) {
        if (confirm(
                `Xác nhận xoá
${maThuthu} - ${tenThuthu}.
Thao tác này sẽ không thể hoàn tác.`
            )) {
            // console.log(document.location.origin + document.location.pathname + '?page=bandocdelete&mabandoc=' + maBandoc);
            document.location = document.location.origin + document.location.pathname + '?page=thuthudelete&mathuthu=' + maThuthu;
        }
    }
</script>
<?php
if (isset($_GET["deleteSuccess"]) && $_GET["deleteSuccess"]) { ?>
    <script>
        alert("Xóa thành công");
    </script>
<?php
}
?>