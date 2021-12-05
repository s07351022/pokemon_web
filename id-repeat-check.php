<?php
require_once 'dbtools.inc.php';
require_once 'functions.php';
$check = id_repeat($_POST['userid']);
//搜尋資料庫資料
if($check){
    echo 'yes';
}
else{
    echo 'no';
}
?>