<?php
            require('./conn.php');
            require('./func.php');
            $result = deleteBandoc($conn,$_GET["mabandoc"]);
            if($result>0){
            header("location:?page=bandoclist&deleteSuccess=true");
            exit();
        }
?>