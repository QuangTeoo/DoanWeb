<div class="usermain-table">
    <h1>Danh sách Bạn Đọc </h1>
    <div class="search-box">
        <form method="get">
            <input type="hidden" name="page" value="sachlist">
            <input type="text" name="query" placeholder="Tìm kiếm..." required>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Mã bạn đọc</th>
            <th>Tên bạn đọc</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
            require('./conn.php');
            require('./func.php');
            $result = listBanDoc($conn);
            if ($result->num_rows > 0) {
                while ($r = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $r["maBandoc"] ?></td>
                        <td><?php echo $r["tenBandoc"] ?></td>
                        <td><?php echo $r["dt"] ?></td>
                        <td><?php echo $r["email"] ?></td>
                        <td>
                            <a href="?page=bandocdetail&mabandoc=<?php echo $r["maBandoc"]?>">Chi tiết</a>
                            <a href="?page=bandocupdate&mabandoc=<?php echo $r["maBandoc"]?>">Sửa</a>
                            <a href="?page=bandocdelete&mabandoc=<?php echo $r["maBandoc"]?>">Xóa</a>
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
<?php 
    if(isset($_GET["deleteSuccess"])){ ?>
    <script>
        alert("Xóa thành công");
    </script>
<?php
    }
?>