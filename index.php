<?php
    if (session_id() === '')
        session_start();
    if (empty($_SESSION["username"])) {
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
    <link rel="stylesheet" href="css/register_login.css">
    <link rel="stylesheet" href="css/Sachlist.css">
    <link rel="stylesheet" href="css/Sachupdate.css">
    <link rel="stylesheet" href="css/Sachadd.css">
    <link rel="stylesheet" href="css/Bandoclist.css">
    <link rel="stylesheet" href="css/Bandocdetail.css">
    <link rel="stylesheet" href="css/Sachbo_re.css">
    <link rel="stylesheet" href="css/Bandocupdate.css">
</head>
<body>
    <div class="nav-bar">
        <ul>
            <li><a href="?page=sachbore">Nhận/Trả sách</a></li>
            <li>
                <a href="?page=sachlist">Quản lý sách</a>
                <ul class="dropdown">
                    <li><a href="?page=sachlist">Danh sách sách</a></li>
                    <li><a href="?page=sachadd">Thêm sách mới</a></li>
                </ul>
            </li>
            <li>
                <a href="?page=bandoclist">Danh sách bạn đọc</a>
            </li>
            <li><a href="?page=bandocadd">Thêm bạn đọc mới</a></li>
            <li id="nav-name"><a>Xin chào <?php echo $_SESSION["tenThuThu"] ?></a></li>
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
            case 'sachlist' :
                require("pages/SachList.php");
                break;
            case 'sachupdate':
                require("pages/SachUpdate.php");
                break;
            case 'sachadd' :
                require("pages/SachAdd.php");
                break;
            case 'bandoclist':
                require("pages/BanDocList.php");
                break;
            case 'bandocdetail':
                require("pages/BanDocDetail.php");
                break;
            case 'sachbore':
                require("pages/SachBo_Re.php");
                break;
            case 'bandocupdate':
                require("pages/BanDocUpdate.php");
                break;
            default:
        }
        ?>
    </div>
</body>
</html>