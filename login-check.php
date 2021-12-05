<?php
require_once 'dbtools.inc.php';
require_once 'functions.php';
$check = verify_user($_POST['userid'],$_POST['userpw']);
//搜尋資料庫資料
if($check){
    echo 'yes';
}
else{
    echo 'no';
}

?>