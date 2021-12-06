<?php
require_once 'dbtools.inc.php';
require_once 'functions.php';
$check = add($_POST['user_id'],$_POST['card_id']);
//搜尋資料庫資料
if($check){
    echo 'yes';
}
else{
    echo 'no';
}

?>