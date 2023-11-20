<div class="detail-main">
        <h1>Thông tin chi tiết</h1>
        <table>
            <thead>
                <th>Mã bạn đọc</th>
                <th>Tên bạn đọc</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>CMND</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </thead>
            <tbody>
            <?php
            require('./conn.php');
            require('./func.php');
            $result = detailBandoc($conn,$_GET["mabandoc"]);
                while ($r = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $r["maBandoc"] ?></td>
                    <td><?php echo $r["tenBandoc"] ?></td>
                    <td><?php echo $r["ngaySinh"] ?></td>
                    <td><?php echo $r["gioiTinh"] ?></td>
                    <td><?php echo $r["queQuan"] ?></td>
                    <td><?php echo $r["cmnd"] ?></td>
                    <td><?php echo $r["dt"] ?></td>
                    <td><?php echo $r["email"] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>