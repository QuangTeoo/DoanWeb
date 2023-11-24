<?php
// Function for BanDoc
function addBanDoc($conn, $hoten, $ngaysinh, $que, $cccd, $phone, $email, $gioitinh, $password)
{
    $sql_statement = "INSERT INTO `bandoc` (`tenBandoc`, `ngaySinh`, `gioiTinh`, `queQuan`, `cmnd`, `dt`,`email`, `matKhau`) VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$que', '$cccd', '$phone','$email','$password')";
    mysqli_query($conn, $sql_statement);
}

function updateBanDoc($conn, $Mabandoc, $Tenbandoc, $Ngaysinh, $Gioitinh, $Que, $Cmnd, $Phone, $Email)
{
    $sql_statement = "UPDATE `bandoc` SET `tenBandoc`='$Tenbandoc', `ngaySinh` = '$Ngaysinh', `gioiTinh` ='$Gioitinh',`queQuan` = '$Que', `cmnd` = '$Cmnd', `dt` = '$Phone' , `email` = '$Email' WHERE `maBandoc` = $Mabandoc ";
    mysqli_query($conn, $sql_statement);
    return mysqli_affected_rows($conn);
}

function getBandoc($conn, $Mabandoc)
{
    $sql_statement = "SELECT * FROM `bandoc` WHERE maBandoc = '$Mabandoc' AND trangThai = true ";
    $result = mysqli_query($conn, $sql_statement);
    return $result;
}

function listBanDoc($conn,$term = null)
{
    $sql_statement = "SELECT maBandoc,tenBandoc,dt,email FROM `bandoc` WHERE `trangThai` = true ";
    if($term){
        $sql_statement = $sql_statement . " AND (`maBandoc`='$term' 
        OR `tenBandoc` LIKE '%$term%' 
        OR `dt` = '$term' 
        OR `email` LIKE '%$term%') ";
    }
    $results = mysqli_query($conn, $sql_statement);
    return $results;
}

function detailBandoc($conn, $Mabandoc)
{
    $sql_statement = "SELECT maBandoc,tenBandoc,ngaySinh,gioiTinh,queQuan,cmnd,dt,email FROM `bandoc` WHERE maBandoc='$Mabandoc'";
    $result = mysqli_query($conn, $sql_statement);
    return $result;
}

function deleteBandoc($conn, $Mabandoc)
{
    $sql_statement = "UPDATE `bandoc` SET `trangThai` = false WHERE `maBandoc` ='$Mabandoc' AND `trangThai` = true";
    mysqli_query($conn, $sql_statement);
    return mysqli_affected_rows($conn);
}


// Funtion for Thuthu
function getaccThuThu($conn, $Username)
{
    $sql_statement = "SELECT * FROM thuthu WHERE mathuthu='$Username' AND trangThai = true";
    $result = null;
    if ($sql_result = mysqli_query($conn, $sql_statement)) {
        if ($row = mysqli_fetch_array($sql_result)) {
            $result = $row;
        }
    }
    return $result;
}

function addThuThu($conn, $Mathuthu, $Tenthuthu, $Matkhau)
{
    $sql_statement = "INSERT INTO `thuthu`(`maThuthu`,`tenThuthu`,`matKhau`) VALUES ('$Mathuthu','$Tenthuthu','$Matkhau')";
    mysqli_query($conn, $sql_statement);
}

function listThuThu($conn,$term = null)
{
    $sql_statement = "SELECT maThuthu, tenThuthu FROM `thuthu` WHERE `trangThai`= true ";
    if($term){
        $sql_statement = $sql_statement . " AND (`maThuthu` LIKE '%$term%' OR `tenThuthu` LIKE '%$term%' ) ";
    }
    $result = mysqli_query($conn, $sql_statement);
    return $result;
}

function deleteThuThu($conn, $Mathuthu)
{
    $sql_statement = "UPDATE `thuthu` SET `trangThai` = false WHERE `maThuthu` = '$Mathuthu' AND `trangThai` = true";
    mysqli_query($conn, $sql_statement);
    return mysqli_affected_rows($conn);
}

function updateThuThu($conn, $Mathuthu, $Tenthuthu)
{
    $sql_statement = "UPDATE `thuthu` SET `tenThuthu` = '$Tenthuthu' WHERE `maThuthu` ='$Mathuthu'";
    mysqli_query($conn, $sql_statement);
    return mysqli_affected_rows($conn);
}

function getThuthu($conn, $Mathuthu)
{
    $sql_statement = "SELECT * FROM `thuthu` WHERE `mathuthu` = '$Mathuthu' AND `trangThai` = true ";
    $result = mysqli_query($conn, $sql_statement);
    return $result;
}
//Function for Sách

function listSach($conn, $term = null)
{
    $sql_statement = "SELECT maSach,tenSach,theLoai,tacGia FROM sach WHERE Trangthai = true";
    if ($term) {
        $sql_statement = $sql_statement . " AND (`maSach` LIKE '%$term%' OR `tenSach` LIKE '%$term%' OR `tacGia` LIKE '%$term%' OR `theLoai` LIKE '%$term%')";
    }
    $sql_result = mysqli_query($conn, $sql_statement);
    $result = [];
    while ($row = mysqli_fetch_assoc($sql_result)) {
        $result[] = $row;
    }
    return $result;
}

function listSachborrow($conn, $term = null)
{
    $sql_statement = "SELECT `bandoc`.`maBandoc`, `bandoc`.`tenBandoc`,`sach`.`maSach`,`sach`.`tenSach`,`sach`.`tacGia`,`muon`.`maThuthuduyet`,`muon`.`maThuthutra`,`muon`.`ngayMuon`,`muon`.`ngayTradukien`,`muon`.`ngayDatra` FROM muon ,bandoc ,sach  WHERE `muon`.`maBandoc` = `bandoc`.`maBandoc`  AND `muon`.`maSach` = `sach`.`maSach` ";
    if ($term) {
        $sql_statement = $sql_statement . " AND (`bandoc`.`maBandoc`LIKE '$term' 
        OR `bandoc`.`tenBandoc` LIKE '%$term%' 
        OR `sach`.`tenSach` LIKE '%$term%' 
        OR `sach`.`maSach` LIKE '$term' 
        OR `sach`.`tacGia` LIKE  '%$term%' 
        OR DATE(`muon`.`ngayMuon`) = '$term' 
        OR `muon`.`maThuthuduyet` LIKE '%$term%' 
        OR DATE(`muon`.`ngayTradukien`) = '$term' 
        ) ";
    }
    $sql_statement = $sql_statement . " ORDER BY ID DESC";
    $result = mysqli_query($conn, $sql_statement);
    return $result;
}

function deleteSach($conn, $maSach) {
    $sql_statement = "UPDATE `sach` SET `trangThai` = false WHERE `maSach` = '$maSach' AND `trangThai` = true";
    mysqli_query($conn, $sql_statement);
    return mysqli_affected_rows($conn);
}

function listSachBorrowID($conn)
{
    $sql_statement = "SELECT DISTINCT maSach FROM muon WHERE ngayDatra IS NULL";
    $result = [];
    if ($sql_result = mysqli_query($conn, $sql_statement)) {
        while ($row = mysqli_fetch_array($sql_result)) {
            $result[] = $row[0];
        }
    }
    return $result;
}

function listSachPreoderID($conn)
{
    $sql_statement = "SELECT DISTINCT maSach FROM yeucau WHERE hanNhansach >= CURRENT_DATE() AND maSach NOT IN (SELECT DISTINCT maSach FROM muon WHERE ngayDatra IS NULL) AND trangThai = true";
    $result = [];
    if ($sql_result = mysqli_query($conn, $sql_statement)) {
        while ($row = mysqli_fetch_array($sql_result)) {
            $result[] = $row[0];
        }
    }
    return $result;
}

function getSach($conn, $maSach) {
    $sql_statement = "SELECT * FROM sach WHERE maSach = '$maSach' AND trangThai = true";
    $result = mysqli_query($conn, $sql_statement);
    return mysqli_fetch_assoc($result);
}

function addSach($conn, $Masach, $Tensach, $Theloai, $Tacgia, $Hinh, $Mota, $Namxb, $Nhaxb) {
    $sql_statement = "INSERT INTO `sach` (`maSach`,`tenSach`, `theLoai`, `tacGia`, `hinh`, `moTa`, `namXuatban`,`nhaXuatban`) VALUES ('$Masach', '$Tensach', '$Theloai', '$Tacgia', '$Hinh', '$Mota','$Namxb','$Nhaxb')";
    mysqli_query($conn, $sql_statement);
}

function updateSach($conn, $maSach, $tenSach, $theLoai, $tacGia, $moTa, $namXuatBan, $nhaXuatBan, $hinh = null) {
    $sql_statement = "UPDATE `sach` SET `tenSach` = '$tenSach', `theLoai` = '$theLoai', `tacGia` = '$tacGia', `moTa` = '$moTa', `namXuatban` = '$namXuatBan', `nhaXuatban` = '$nhaXuatBan' WHERE `sach`.`maSach` = '$maSach'";
    if ($hinh)
        $sql_statement = "UPDATE `sach` SET `tenSach` = '$tenSach', `theLoai` = '$theLoai', `tacGia` = '$tacGia', `hinh` = '$hinh', `moTa` = '$moTa', `namXuatban` = '$namXuatBan', `nhaXuatban` = '$nhaXuatBan' WHERE `sach`.`maSach` = '$maSach'";
    mysqli_query($conn, $sql_statement);
    return mysqli_affected_rows($conn);
}

//Function for borrow and return 
function checkBorrowValidity($conn, $maBandoc, $maSach) {
    // Nếu hàm này trả về false thì nghĩa là không đủ đk.
    $sql_statement = "SELECT 1 FROM sach WHERE maSach IN (SELECT DISTINCT maSach FROM yeucau WHERE maSach = '$maSach' AND maBandoc != '$maBandoc' AND hanNhansach >= CURRENT_DATE() AND trangThai = true) OR maSach IN (SELECT DISTINCT maSach FROM muon WHERE maSach = '$maSach' AND ngayDatra IS NULL);";
    $result = mysqli_query($conn, $sql_statement);
    return (mysqli_num_rows($result) == 0);
}
function borrowSach($conn, $Mabandoc, $Masach, $Mathuthu, $Ngaytradukien)
{
    $sql_statement = "INSERT INTO `muon` (`maBandoc`,`maSach`,`maThuthuduyet`,`ngayMuon`,`ngayTradukien`) values ('$Mabandoc','$Masach','$Mathuthu',CURRENT_TIMESTAMP(),'$Ngaytradukien')";
    mysqli_query($conn, $sql_statement);
    $sql_statement =" UPDATE `yeucau` SET `trangThai` = false WHERE `maSach` = '$Masach' AND `maBandoc` = '$Mabandoc' AND `trangThai` = true ";
    mysqli_query($conn, $sql_statement);

}
function returnSach($conn, $Mabandoc, $Masach, $Mathuthu)
{
    $sql_statement = "UPDATE `muon` SET `maThuthutra` = '$Mathuthu',`ngayDatra` = CURRENT_TIMESTAMP() WHERE `maBandoc` = '$Mabandoc' AND `maSach` = '$Masach' AND `ngayDatra` IS NULL";
    mysqli_query($conn, $sql_statement);
    return mysqli_affected_rows($conn);
}

?>