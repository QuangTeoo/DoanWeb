<?php
// 
function addBanDoc($conn, $hoten, $ngaysinh, $que, $cccd, $phone,$email,$gioitinh,$password) {
    $sql_statement = "INSERT INTO `bandoc` (`tenBandoc`, `ngaySinh`, `gioiTinh`, `queQuan`, `cmnd`, `dt`,`email`, `matKhau`) VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$que', '$cccd', '$phone','$email','$password')";
    mysqli_query($conn, $sql_statement);
}
function getpassThuThu($conn,$Username){
    $sql_statement = "SELECT * FROM thuthu WHERE mathuthu='$Username'";
    $result=null;
    if($sql_result=mysqli_query($conn,$sql_statement)){
        if($row= mysqli_fetch_array($sql_result)){
            $result=$row;
        }
    }
    return $result;
}
?>