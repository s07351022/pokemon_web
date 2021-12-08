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
		input{
			outline: none !important;
  			box-shadow:none !important;
		}
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
		.error{
			border-color: #FF3F3F;
		}
		.success{
			border-color: #269700;
		}
		#account-invalid{
			display: none;
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
					<li class="nav-item mx-xl-1 mb-1 mb-xl-0">
						<a class="nav-link px-2" href="index.php"><b>回到首頁</b></a>
					</li>
				</ul>
				<div class="me-3  mx-1 mx-sm-4 ms-xl-2  mb-2 mb-xl-0" style="--bs-breadcrumb-divider:'>';" aria-label="breadcrumb">
					<ol class="breadcrumb my-auto px-2">
						<li class="breadcrumb-item"><a href="index.php">主頁</a></li>
						<li class='breadcrumb-item'><a href="login.php">登入</a></li>
						<li class='breadcrumb-item active' aria-current='page'>註冊</li>
					</ol>
				</div>
			</div>
		</div>
	</nav>
	<div class="container pt-4">
		<div class="row justify-content-center">
			<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-header"><h3 class="my-0">註冊帳號</h3></div>
					<div class="card-body">
						<div id="account-invalid" class="mb-2 alert alert-danger">
							
						</div>
						<form id="register-form" method="post">
							<div class="mb-3">
								<label for="userid" class="form-label">ID</label>
								<input type="text" class="form-control" id="userid" required>
							</div>
							<div class="mb-3">
								<label for="userpw" class="form-label">密碼</label>
								<input type="password" class="form-control" id="userpw" required>
							</div>
							<div class="mb-3">
								<label for="userpwconfirm" class="form-label">確認密碼</label>
								<input type="password" class="form-control" id="userpwconfirm" required>
							</div>
							<div class="mb-3">
								<label for="usernickname" class="form-label">暱稱</label>
								<input type="text" class="form-control" id="usernickname" required>
							</div>
							<div class="row">
								<div class="col-6 mx-auto">
									<button type="submit" class="btn btn-register w-100">註冊</button>
								</div>
								<div class="col">
									<a href="login.php" class="btn btn-login w-100">返回</a>
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
			$("#userid").keyup(function(){
				if($(this).val()!=''){
					$.ajax({
					url: 'id-repeat-check.php',
					type: 'POST',
					data: {
						'userid' : $("#userid").val()
					},
					dataType: 'html'
					}).done(function (data){			
						if(data == "yes"){
							alert("此ID已存在,請使用其他ID!");
							$(".btn-register").attr('disabled','disabled');
							$("#userid").removeClass('success').addClass('error');
						}
						else{
							$("#userid").removeClass('error').addClass('success');
							$(".btn-register").removeAttr('disabled');
						}
					}).fail(function(jqXHR, textStatus, errorThrown){
						alert("有錯誤發生");
						console.log(jqXHR.reponseText);
					});				
				}
				else{
					$("#userid").removeClass('error').removeClass('success');
					$(".btn-register").removeAttr('disabled');
				}				
			});
			
			$("#register-form").submit(function(){
				if($("#userpw").val() != $("#userpwconfirm").val()){
					$("#userpw").addClass('error');
					$("#userpwconfirm").addClass('error');

					alert("密碼與確認密碼不符,請再次確認!");
				}
				else{
					$.ajax({
					url: 'register-check.php',
					type: 'POST',
					data: {
						'userid' : $("#userid").val(), 
						'userpw' : $("#userpw").val(),
						'usernickname' : $("#usernickname").val()
					},
					dataType: 'html'
					}).done(function (data){				
						if(data == "yes"){
							alert("註冊成功,將進入登入頁面");
							window.location.href = "login.php";
						}
						else{
							alert("註冊失敗,請確認電腦連線狀態")
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