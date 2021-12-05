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

	<title>Pokemon卡牌查價系統---主頁</title>

	<link rel="stylesheet" href="css/login1.css">

	<style>
		.btn-register{
			background-color: rgb(255, 217, 0)
		}
		.btn-register:hover{
			background: #FFC300 !important;
		}
		.btn-login{
			background-color: rgb(79, 126, 255);
			color: #fff;
		}
		.btn-login:hover{
			background-color: #3067FF;
			color: #fff;
		}
		#account-invalid{
			display: none;
		}
		#input-invalid{
			display: none;
		}
	</style>	
</head>
<body>
	<nav class="navbar navbar-expand-xl navbar-light sticky-top shadow">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
				<img src="img/logo_v2.png" alt="" height="75px">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="my-2 me-5 mx-1" style="--bs-breadcrumb-divider:'>';" aria-label="breadcrumb">
					<ol class="breadcrumb my-auto px-2">
						<li class="breadcrumb-item"><a href="index.php">主頁</a></li>
						<li class='breadcrumb-item active' aria-current='page'>登入</li>
					</ol>
				</div>
			</div>
			
		</div>
	</nav>
	<div class="container pt-4">
		<div class="row justify-content-center">
			<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-header"><h3 class="my-0">登入</h3></div>
					<div class="card-body">
						<div id="account-invalid" class="mb-2 alert alert-danger">
							ID或密碼錯誤!
						</div>
						<div id="input-invalid" class="mb-2 alert alert-danger">
							請輸入ID及密碼!
						</div>
						<form id="login-form" method="post">
							<div class="mb-3">
								<label for="userid" class="form-label">ID</label>
								<input type="text" class="form-control" id="userid">
							</div>
							<div class="mb-3">
								<label for="userpw" class="form-label">密碼</label>
								<input type="password" class="form-control" id="userpw">
							</div>
							<div class="row">
								<div class="col">
									<button type="submit" class="btn btn-login w-100">登入</button>
								</div>
								<div class="col">
									<a href="register.php" class="btn btn-register w-100">註冊</a>
								</div>
							</div>							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function(){
			$("#login-form").submit(function(){
				if($("#userid").val()=="" || $("#userpw").val()==""){
					$("#account-invalid").hide();
					$("#input-invalid").show();
				}
				else{
					$.ajax({
					url: 'login-check.php',
					type: 'POST',
					data: {
						'userid' : $("#userid").val(), 
						'userpw' : $("#userpw").val()
					},
					dataType: 'html'
					}).done(function (data){
						console.log();				
						if(data == "yes"){
							$("#account-invalid").hide();
							alert("登入成功");
							window.location.href = "index.php";
						}
						else{
							$("#input-invalid").hide();
							$("#account-invalid").show();
						}
					}).fail(function(jqXHR, textStatus, errorThrown){
						alert("有錯誤發生");
						console.log(jqXHR.reponseText);
					});				
				}
				return false;				
			});
		});	
	</script>
</body>
</html>