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
     $sql_statement = "SELECT * FROM `bandoc` WHERE maBandoc = '$Mabandoc' ";
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
function getaccThuThu($conn,$Username){
    $sql_statement = "SELECT * FROM thuthu WHERE mathuthu='$Username'";
    $result=null;
    if($sql_result=mysqli_query($conn,$sql_statement)){
        if($row= mysqli_fetch_array($sql_result)){
            $result=$row;
        }
    }
    return $result;

}   

function addThuThu($conn,$Mathuthu,$Tenthuthu,$Matkhau){
    $sql_statement ="INSERT INTO `thuthu`(`maThuthu`,`tenThuthu`,`matKhau`) VALUES ('$Mathuthu','$Tenthuthu','$Matkhau')";
    mysqli_query($conn, $sql_statement);
}

function listThuThu($conn){
    $sql_statement = "SELECT maThuthu, tenThuthu FROM `thuthu` WHERE `trangThai`= true ";
    $result= mysqli_query($conn,$sql_statement);
    return $result;
}

function deleteThuThu($conn,$Mathuthu){
    $sql_statement = "UPDATE `thuthu` SET `trangThai` = false WHERE `maThuthu` = '$Mathuthu' AND `trangThai` = true";
    mysqli_query($conn,$sql_statement);
    return mysqli_affected_rows($conn);
}

function updateThuThu($conn,$Mathuthu,$Tenthuthu){
    $sql_statement = "UPDATE `thuthu` SET `tenThuthu` = '$Tenthuthu' WHERE `maThuthu` ='$Mathuthu'";
    mysqli_query($conn,$sql_statement);
    return mysqli_affected_rows($conn);
}

function getThuthu($conn,$Mathuthu){
    $sql_statement = "SELECT * FROM `thuthu` WHERE `mathuthu` = '$Mathuthu' ";
    $result = mysqli_query($conn,$sql_statement);
    return $result;
}
//Function for Sách

function listSach($conn){
    $sql_statement= "SELECT maSach,tenSach,theLoai,tacGia,namXuatban FROM sach WHERE Trangthai = true";
    $sql_result = mysqli_query($conn, $sql_statement);
    $result = [];
    while ($row = mysqli_fetch_assoc($sql_result)) {
        $result[] = $row;
    }
    return $result;
}

function listSachborrow($conn){
    $sql_statement = "SELECT `bandoc`.`maBandoc`, `bandoc`.`tenBandoc`,`sach`.`maSach`,`sach`.`tenSach`,`sach`.`tacGia`,`muon`.`maThuthuduyet`,`muon`.`ngayMuon`,`muon`.`ngayTradukien`FROM muon ,bandoc ,sach  WHERE `muon`.`maBandoc` = `bandoc`.`maBandoc`  AND `muon`.`maSach` = `sach`.`maSach`";
    $result = mysqli_query($conn,$sql_statement);
    return $result;
}

function addSach($conn,$Masach,$Tensach,$Theloai,$Tacgia,$Hinh,$Mota,$Namxb,$Nhaxb){
    $sql_statement = "INSERT INTO `sach` (`maSach`,`tenSach`, `theLoai`, `tacGia`, `hinh`, `moTa`, `namXuatban`,`nhaXuatban`) VALUES ('$Masach', '$Tensach', '$Theloai', '$Tacgia', '$Hinh', '$Mota','$Namxb','$Nhaxb')";
    mysqli_query($conn, $sql_statement);
}
//Function for borrow and return 
function borrowSach($conn,$Mabandoc,$Masach,$Mathuthu,$Ngaytradukien){
    $sql_statement = "INSERT INTO `muon` (`maBandoc`,`maSach`,`maThuthuduyet`,`ngayMuon`,`ngayTradukien`) values ('$Mabandoc','$Masach','$Mathuthu',CURRENT_TIMESTAMP(),'$Ngaytradukien')";
    mysqli_query($conn,$sql_statement);
}
function returnSach($conn,$Mabandoc,$Masach,$Mathuthu){
    $sql_statement = "UPDATE `muon` SET `maThuthutra` = '$Mathuthu',`ngayDatra` = CURRENT_TIMESTAMP() WHERE `maBandoc` = '$Mabandoc' AND `maSach` = '$Masach' AND `ngayDatra` IS NULL" ;
    mysqli_query($conn,$sql_statement);
} 
?>