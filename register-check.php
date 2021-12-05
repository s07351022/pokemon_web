<?php
require_once 'dbtools.inc.php';
require_once 'functions.php';
$check = add_user($_POST['userid'],$_POST['userpw'],$_POST['usernickname']);
//搜尋資料庫資料
if($check){
    echo 'yes';
}
else{
    echo 'no';
}

?>