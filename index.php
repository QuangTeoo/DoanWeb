<?php
if (session_id() === '')
    session_start();
if (empty($_SESSION["maThuthu"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/register.css">

    <link rel="stylesheet" href="css/Sachlist.css">
    <link rel="stylesheet" href="css/Sachupdate.css">
    <link rel="stylesheet" href="css/Sachadd.css">

    <link rel="stylesheet" href="css/Bandocadd.css">
    <link rel="stylesheet" href="css/Bandoclist.css">
    <link rel="stylesheet" href="css/Bandocdetail.css">
    <link rel="stylesheet" href="css/Bandocupdate.css">

    <link rel="stylesheet" href="css/Sachbo_re.css">
    <link rel="stylesheet" href="css/Sachlistborrow.css">

    <link rel="stylesheet" href="css/Thuthuupdate.css">
    <link rel="stylesheet" href="css/Thuthulist.css">
    <link rel="stylesheet" href="css/Thuthuadd.css">
</head>

<body>
    <div class="nav-bar">
        <ul>
            <li><a href="?page=sachbore">Nhận/Trả sách</a></li>
            <li>
                <a href="?page=sachlist">Quản lý sách</a>
                <ul class="dropdown">
                    <li><a href="?page=sachlist">Danh sách sách</a></li>
                    <li><a href="?page=sachlistborrow">Danh sách mượn</a></li>
                    <li><a href="?page=sachadd">Thêm sách mới</a></li>
                </ul>
            </li>
            <li><a href="?page=bandoclist">Danh sách bạn đọc</a></li>
            <li><a href="?page=bandocadd">Thêm bạn đọc mới</a></li>
            <li>
                <a href="?page=thuthulist">Quản lý thủ thư</a>
                <ul class="dropdown">
                    <li><a href="?page=thuthulist">Danh sách thủ thư</a></li>
                    <li><a href="?page=thuthuadd">Thêm thủ thư mới</a></li>
                </ul>
            </li>
            <li id="nav-name"><a>Xin chào<br><?php echo $_SESSION["tenThuThu"] ?></a></li>
            <li><a href="login.php?logout=1">Đăng xuất</a></li>
        </ul>
    </div>
    <div id="main">
        <?php
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        switch ($page) {
            case 'bandocadd':
                require("pages/BanDocAdd.php");
                break;
            case 'thuthuadd':
                require("pages/ThuThuAdd.php");
                break;
            case 'thuthulist':
                require("pages/ThuThuList.php");
                break;
            case 'thuthuupdate':
                require("pages/ThuThuUpdate.php");
                break;
            case 'thuthudelete':
                require("pages/ThuThuDelete.php");
                break;
            case 'sachlist':
                require("pages/SachList.php");
                break;
            case 'sachlistborrow':
                require("pages/SachListBorrow.php");
                break;
            case 'sachupdate':
                require("pages/SachUpdate.php");
                break;
            case 'sachadd':
                require("pages/SachAdd.php");
                break;
            case 'sachdelete':
                require("pages/SachDelete.php");
                break;
            case 'bandoclist':
                require("pages/BanDocList.php");
                break;
            case 'bandocdetail':
                require("pages/BanDocDetail.php");
                break;
            case 'bandocupdate':
                require("pages/BanDocUpdate.php");
                break;
            case 'bandocdelete':
                require("pages/BanDocDelete.php");
                break;
            case 'sachbore':
            default:
                require("pages/SachBo_Re.php");
                break;
        }
        ?>
    </div>
</body>

</html>