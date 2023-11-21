<?php
// Function for BanDoc

function addBanDoc($conn, $hoten, $ngaysinh, $que, $cccd, $phone,$email,$gioitinh,$password) {
    $sql_statement = "INSERT INTO `bandoc` (`tenBandoc`, `ngaySinh`, `gioiTinh`, `queQuan`, `cmnd`, `dt`,`email`, `matKhau`) VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$que', '$cccd', '$phone','$email','$password')";
    mysqli_query($conn, $sql_statement);
}

function updateBanDoc($conn,$Mabandoc,$Tenbandoc,$Ngaysinh,$Gioitinh,$Que,$Cmnd,$Phone,$Email) {
    $sql_statement = "UPDATE `bandoc` SET `tenBandoc`='$Tenbandoc', `ngaySinh` = '$Ngaysinh', `gioiTinh` ='$Gioitinh',`queQuan` = '$Que', `cmnd` = '$Cmnd', `dt` = '$Phone' , `email` = '$Email' WHERE `maBandoc` = $Mabandoc ";
    mysqli_query($conn,$sql_statement);
    return mysqli_affected_rows($conn);
}

function getBandoc($conn,$Mabandoc){
     $sql_statement = "SELECT * FROM `bandoc` WHERE maBandoc = '$Mabandoc'";
     $result = mysqli_query($conn,$sql_statement);
     return $result;
}

function listBanDoc($conn){
    $sql_statement = "SELECT maBandoc,tenBandoc,dt,email FROM `bandoc` WHERE `trangThai` = true ";
    $results = mysqli_query($conn,$sql_statement);
    return $results;
}

function detailBandoc($conn,$Mabandoc){
    $sql_statement = "SELECT maBandoc,tenBandoc,ngaySinh,gioiTinh,queQuan,cmnd,dt,email FROM `bandoc` WHERE maBandoc='$Mabandoc'";
    $result = mysqli_query($conn,$sql_statement);
    return $result;
}

function deleteBandoc($conn,$Mabandoc){
    $sql_statement ="UPDATE `bandoc` SET `trangThai` = false WHERE `maBandoc` ='$Mabandoc' AND `trangThai` = true";
    mysqli_query($conn,$sql_statement);
    return mysqli_affected_rows($conn);
}
// Funtion for Thuthu
function getThuThu($conn,$Username){
    $sql_statement = "SELECT * FROM thuthu WHERE mathuthu='$Username'";
    $result=null;
    if($sql_result=mysqli_query($conn,$sql_statement)){
        if($row= mysqli_fetch_array($sql_result)){
            $result=$row;
        }
    }
    return $result;

}
//Function for Sách

// function listSach($conn,$Masach){
//     $sql_statement= "SELECT maSach,tenSach,theLoai,tacGia"
// }

function addSach($conn,$Masach,$Tensach,$Theloai,$Tacgia,$Hinh,$Mota,$Namxb,$Nhaxb){
    $sql_statement = "INSERT INTO `sach` (`maSach`,`tenSach`, `theLoai`, `tacGia`, `hinh`, `moTa`, `namXuatban`,`nhaXuatban`) VALUES ('$Masach', '$Tensach', '$Theloai', '$Tacgia', '$Hinh', '$Mota','$Namxb','$Nhaxb')";
    mysqli_query($conn, $sql_statement);
}
?>