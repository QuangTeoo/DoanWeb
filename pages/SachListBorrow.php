<div class="main-listborrow-table">
    <h1>Danh sách Mượn</h1>
    <div class="search-box">
        <form method="get">
            <input type="hidden" name="page" value="sachlistborrow">
            <input type="text" name="query" placeholder="Tìm kiếm..." value="<?php if (isset($_GET["query"])) echo $_GET["query"] ?>" required>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Bạn đọc</th>
            <th>Mã sách</th>
            <th>Tên sách </th>
            <th>Mã thủ duyệt mượn</th>
            <th>Ngày mượn </th>
            <th>Ngày trả dự kiến</th>
        </thead>
        <tbody>
            <?php
            require('./conn.php');
            require('./func.php');
            $result = null;
            if (isset($_GET["query"])) {
                $result = listSachborrow($conn,$_GET["query"]);
            } else {
                $result = listSachborrow($conn); 
            }
            if ($result->num_rows > 0) {
                while ($r = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $r["maBandoc"] ?> - <?php echo $r["tenBandoc"] ?></td>
                        <td><?php echo $r["maSach"] ?></td>
                        <td><?php echo $r["tenSach"] ?></td>
                        <td><?php echo $r["maThuthuduyet"] ?></td>
                        <td><?php echo $r["ngayMuon"] ?></td>
                        <td><?php echo $r["ngayTradukien"] ?></td>
                    </tr>
                <?php
                }
                ?>
            <?php
            } else {
            ?>
                <tr>
                    <td colspan="10">Không có dữ liệu</td>
                </tr>
        <?php
            }
            ?>
        </tbody>
    </table>