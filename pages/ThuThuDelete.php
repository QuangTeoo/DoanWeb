<?php
require('./conn.php');
require('./func.php');
$result = deleteThuThu($conn,$_GET["mathuthu"]);
if($result>0){
    header("location:?page=thuthulist&deleteSuccess=true");
    exit();
}
?>