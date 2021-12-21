<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">		
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/3826950c16.js" crossorigin="anonymous"></script>

	<title>Pokemon卡牌查價系統---搜尋結果</title>

	<link rel="stylesheet" href="index.css">

	<style>
		.card input[type="image"]{
			width: 80% !important;
			margin: auto;
		}
		.card{
			border: 1px solid rgba(0,0,0,.125) !important;
		}
		.card:hover .card-body,.card:hover .card-footer,.card:hover .card-header{
			background-color: #D9D9D9;
			transition: .3s;
		}
		.btn-delete{
			background-color: #FF5E5E;
			color: #fff;
		}
		.btn-delete:hover{
			background-color: #FB4040 !important;
			color: #fff;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-xl navbar-light sticky-top shadow">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
				<img class="logo ms-1 ms-sm-4" src="img/logo_v2.png" alt="" height="75px">
			</a>
			<button class="navbar-toggler me-1 me-sm-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-xl-auto mx-1 mx-sm-4 ms-xl-2 mb-xl-0">
<?php
				if($_SESSION['islogin']){
echo"				<li class='nav-item mx-xl-1 mb-1 mb-xl-0'>";
echo"					<div class='nav-link px-2'>";
echo"						<b>會員 : ".$_SESSION['username']."</b>";
echo"					</div>";
echo"				</li>";
				}
				else{
echo"				<li class='nav-item mx-xl-1 mb-1 mb-xl-0'>";	
echo"					<a class='nav-link px-2' href='login.php'><b>登入</b></a>";	
echo"				</li>";					
				}
?>						
				</ul>
				<div class="me-3  mx-1 mx-sm-4 ms-xl-2  mb-2 mb-xl-0" style="--bs-breadcrumb-divider:'>';" aria-label="breadcrumb">
					<ol class="breadcrumb my-auto px-2">
						<li class="breadcrumb-item"><a href="index.php">主頁</a></li>
						<li class='breadcrumb-item active' aria-current='page'>關於我們</li>
					</ol>
				</div>				
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col col-12 my-4">
				<div class="dialog">
					<div class="container-fluid">
						<h1 class="mx-0 my-0 py-3 dialog_title">關於我們</h1>
						<div class='pb-3 text-center'>
							<img class='w-100' src='img/about_us.png'>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
	<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
		<i class="fas fa-arrow-up"></i>
	</button>
    <script>
    	$(function(){
    		$(window).scroll(function(){
    			if($(document).scrollTop() > 50 || $(window).scrollTop() > 50){
    				$("#btn-back-to-top").css("display", "block");
    			}
    			else{
    				$("#btn-back-to-top").css("display", "none");
    			}
    		});
    		$("#btn-back-to-top").click(function(){
    			window.scrollTo(0,0);   			
    		});
    	});		
    </script>
</body>
</html>