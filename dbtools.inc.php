<?php
    function create_connection()
    {
        $link = mysqli_connect("140.128.102.212","pokemon","pokemon")/*140.128.102.212  pokemon pokemon*/ 
            or die("無法進行資料連接 : " . mysqli_connect_error());
        mysqli_query($link,"SET NAMES utf-8");
        return $link;
    }
    function execute_sql($link,$database,$sql)
    {
        mysqli_select_db($link,$database)
            or die("開啟資料庫失敗 : " . mysqli_error($link));
        $result = mysqli_query($link,$sql);
        return $result;
    }
?>