<?php
require('./conn.php');
require('./func.php');
$result = detailBandoc($conn,$_GET["mabandoc"]);
    $r = mysqli_fetch_array($result)
?>
<div class="detail-main center-container">
    <div>Bạn đọc</div>
    <h1 id="titleTenBanDoc"><?php echo $r["tenBandoc"] ?></h1>
    <div class="container-bandoc-info">
        <table>
            <thead>
                <th colspan="2">Thông tin bạn đọc</th>
            </thead>
            <tbody>
                <tr>
                    <td>Mã bạn đọc</td>
                    <td><?php echo $r["maBandoc"] ?></td>
                </tr>
                <tr>
                    <td>Tên bạn đọc</td>
                    <td><?php echo $r["tenBandoc"] ?></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><?php echo $r["ngaySinh"] ?></td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td><?php echo $r["gioiTinh"] ?></td>
                </tr>
                <tr>
                    <td>Quê quán</td>
                    <td><?php echo $r["queQuan"] ?></td>
                </tr>
                <tr>
                    <td>CMND</td>
                    <td><?php echo $r["cmnd"] ?></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><?php echo $r["dt"] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $r["email"] ?></td>
                </tr>
            </tbody>
        </table>
        <div class="bandoc-action">
            <a href="?page=bandocupdate&mabandoc=<?php echo $r["maBandoc"] ?>" class="btnSuaBanDoc">Chỉnh sửa thông tin</a>
            <a href="?page=sachlistborrow&query=<?php echo $r["maBandoc"] ?>" class="btnSuaBanDoc">Sách đang được mượn</a>
            <button onClick="confirmDelete('<?php echo $r["maBandoc"] ?>','<?php echo $r["tenBandoc"] ?>')" class="btnXoaBanDoc">Xoá bạn đọc</button>
        </div>
    </div>
</div>
<script>
    function confirmDelete(maBandoc, tenBandoc) {
        if (confirm(
`Xác nhận xoá
${maBandoc} - ${tenBandoc}.
Thao tác này sẽ không thể hoàn tác.`
            )) {
                // console.log(document.location.origin + document.location.pathname + '?page=bandocdelete&mabandoc=' + maBandoc);
                document.location = document.location.origin + document.location.pathname + '?page=bandocdelete&mabandoc=' + maBandoc;
            }
            
    }
</script>