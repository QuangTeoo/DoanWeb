<?php
// 
function addBanDoc($conn, $hoten, $ngaysinh, $que, $cccd, $phone, $gioitinh, $password) {
    $sql_statement = "INSERT INTO `bandoc` (`tenBandoc`, `ngaySinh`, `gioiTinh`, `queQuan`, `cmnd`, `dt`, `matKhau`) VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$que', '$cccd', '$phone', '$password')";
    mysqli_query($conn, $sql_statement);
}
?>