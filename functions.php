<?php
session_start();
header("Cache-Control:private");

function verify_user($userid, $userpw){
	require_once 'dbtools.inc.php';
	$userpw = md5($userpw);
    $result = null;
    $sql = "SELECT * 
            FROM  `member` 
            WHERE `user_id` = '{$userid}' AND `user_pw` = '{$userpw}'";

    $link = create_connection();
    $query = execute_sql($link,"pokemon_card",$sql);
    if($query){
        if (mysqli_num_rows($query)>=1) { 
        	$user = mysqli_fetch_assoc($query);

            $_SESSION['islogin']=true;
        	$_SESSION['username']=$user['user_nickname'];
            $_SESSION['userid']=$user['user_id'];
            $result = true;
        }
    }
    return $result;
}

function add_user($userid, $userpw, $usernickname){
    require_once 'dbtools.inc.php';
    $userpw = md5($userpw);
    $result = null;
    $sql = "INSERT INTO `member` (`user_id`, `user_pw`, `user_nickname`)
            VALUE ('{$userid}', '{$userpw}', '{$usernickname}')";

    $link = create_connection();

    $query = execute_sql($link,"pokemon_card",$sql);
    if($query){
        if (mysqli_affected_rows($link)==1) { 
            $result = true;
        }
    }
    return $result;
}

function id_repeat($userid){
    require_once 'dbtools.inc.php';
    $result = null;
    $sql = "SELECT * 
            FROM  `member` 
            WHERE `user_id` = '{$userid}'";

    $link = create_connection();
    $query = execute_sql($link,"pokemon_card",$sql);
    if($query){
        if (mysqli_num_rows($query)>=1) { 
            $result = true;
        }
    }
    return $result;
}

function add($user_id,$card_id){
    require_once 'dbtools.inc.php';
    $result = null;
    $sql = "INSERT INTO `favorite` (`user_ID`, `card_ID`)
            VALUE ('{$user_id}', '{$card_id}')";

    $link = create_connection();
    $query = execute_sql($link,"pokemon_card",$sql);
    if($query){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function delete($user_id,$card_id){
    require_once 'dbtools.inc.php';
    $result = null;
    $sql = "DELETE FROM `favorite`
            WHERE `user_ID` = '{$user_id}' AND `card_ID` = '{$card_id}';";

    $link = create_connection();
    $query = execute_sql($link,"pokemon_card",$sql);
    if($query){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
?>