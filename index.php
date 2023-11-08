<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/register_login.css">
    <link rel="stylesheet" type="text/css" href="css/Sachlist.css">
</head>
<body>
    <div class="nav-bar">
        <ul>
            <li><a href="?">Nhận/Trả sách</a></li>
            <li>
                <a href="?page=SachList">Quản lý sách</a>
                <ul class="dropdown">
                    <li><a href="?page=SachList">Danh sách sách</a></li>
                    <li><a href="?page=sachadd">Thêm sách mới</a></li>
                </ul>
            </li>
            <li>
                <a href="?page=bandoclist">Danh sách bạn đọc</a>
            </li>
            <li><a href="?page=bandocadd">Thêm bạn đọc mới</a></li>
            <li id="nav-name"><a>Xin chào HOTEN</a></li>
            <li><a href="login.php?logout=1">Đăng xuất</a></li>
        </ul>
    </div>
    <div id="main">
        <?php
        if (isset($_GET["page"]))
            switch ($_GET["page"]) {
                case 'bandocadd':
                    require("pages/BanDocAdd.php");
                    break;
                case 'SachList' :
                    require("pages/SachList.php");
                    break;
                default:
                
            }
        ?>
    </div>
</body>
</html>