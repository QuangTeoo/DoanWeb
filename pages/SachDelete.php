<?php
require('./conn.php');
require('./func.php');
$result = deleteSach($conn,$_GET["masach"]);
if($result > 0){
    header("Location: ?page=sachlist&deleteSuccess=true");
} else {
    header("Location: ?page=sachlist&deleteSuccess=false");
}
exit();
?>