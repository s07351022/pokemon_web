<?php
	session_start();
	unset($_SESSION['userid']);
	$_SESSION['islogin']=false;
?>