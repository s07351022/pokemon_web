<?php
	session_start();
	header("Cache-Control:private");
?>
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

	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  		<symbol id="bootstrap" viewBox="0 0 118 94">
    	<path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  		</symbol>
  		<symbol id="facebook" viewBox="0 0 16 16">
    		<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
  		</symbol>
  		<symbol id="pokemon" viewBox="0 0 22 22">
    		<path d="M 11.9506 15 C 13.6075 15 14.9506 13.6569 14.9506 12 C 14.9506 10.3431 13.6075 9 11.9506 9 C 10.2938 9 8.95062 10.3431 8.95062 12 C 8.95062 13.6569 10.2938 15 11.9506 15 Z M 13.4506 12 C 13.4506 12.8284 12.7791 13.5 11.9506 13.5 C 11.1222 13.5 10.4506 12.8284 10.4506 12 C 10.4506 11.1716 11.1222 10.5 11.9506 10.5 C 12.7791 10.5 13.4506 11.1716 13.4506 12 Z"/>
    		<path d="M 21.9012 11 C 21.3995 5.94668 17.136 2 11.9506 2 C 6.76528 2 2.50172 5.94668 2 11 H 7.05064 C 7.51391 8.71776 9.53167 7 11.9506 7 C 14.3696 7 16.3873 8.71776 16.8506 11 H 21.9012 Z"/>
    		<path d="M 21.9012 13 H 16.8506 C 16.3873 15.2822 14.3696 17 11.9506 17 C 9.53167 17 7.51391 15.2822 7.05064 13 H 2 C 2.50172 18.0533 6.76528 22 11.9506 22 C 17.136 22 21.3995 18.0533 21.9012 13 Z">
    	</symbol>
  		<symbol id="youtube" viewBox="0 0 17 17">
    		<path d="M9.426,7.625h0.271c0.596,0,1.079-0.48,1.079-1.073V4.808c0-0.593-0.483-1.073-1.079-1.073H9.426c-0.597,0-1.079,0.48-1.079,1.073v1.745C8.347,7.145,8.83,7.625,9.426,7.625 M9.156,4.741c0-0.222,0.182-0.402,0.404-0.402c0.225,0,0.405,0.18,0.405,0.402V6.62c0,0.222-0.181,0.402-0.405,0.402c-0.223,0-0.404-0.181-0.404-0.402V4.741z M12.126,7.625c0.539,0,1.013-0.47,1.013-0.47v0.403h0.81V3.735h-0.81v2.952c0,0-0.271,0.335-0.54,0.335c-0.271,0-0.271-0.202-0.271-0.202V3.735h-0.81v3.354C11.519,7.089,11.586,7.625,12.126,7.625 M6.254,7.559H7.2v-2.08l1.079-2.952H7.401L6.727,4.473L6.052,2.527H5.107l1.146,2.952V7.559z M11.586,12.003c-0.175,0-0.312,0.104-0.405,0.204v2.706c0.086,0.091,0.213,0.18,0.405,0.18c0.405,0,0.405-0.451,0.405-0.451v-2.188C11.991,12.453,11.924,12.003,11.586,12.003 M14.961,8.463c0,0-2.477-0.129-4.961-0.129c-2.475,0-4.96,0.129-4.96,0.129c-1.119,0-2.025,0.864-2.025,1.93c0,0-0.203,1.252-0.203,2.511c0,1.252,0.203,2.51,0.203,2.51c0,1.066,0.906,1.931,2.025,1.931c0,0,2.438,0.129,4.96,0.129c2.437,0,4.961-0.129,4.961-0.129c1.117,0,2.024-0.864,2.024-1.931c0,0,0.202-1.268,0.202-2.51c0-1.268-0.202-2.511-0.202-2.511C16.985,9.328,16.078,8.463,14.961,8.463 M7.065,10.651H6.052v5.085H5.107v-5.085H4.095V9.814h2.97V10.651z M9.628,15.736h-0.81v-0.386c0,0-0.472,0.45-1.012,0.45c-0.54,0-0.606-0.515-0.606-0.515v-3.991h0.809v3.733c0,0,0,0.193,0.271,0.193c0.27,0,0.54-0.322,0.54-0.322v-3.604h0.81V15.736z M12.801,14.771c0,0,0,1.03-0.742,1.03c-0.455,0-0.73-0.241-0.878-0.429v0.364h-0.876V9.814h0.876v1.92c0.135-0.142,0.464-0.439,0.878-0.439c0.54,0,0.742,0.45,0.742,1.03V14.771z M15.973,12.39v1.287h-1.688v0.965c0,0,0,0.451,0.405,0.451s0.405-0.451,0.405-0.451v-0.45h0.877v0.708c0,0-0.136,0.901-1.215,0.901c-1.08,0-1.282-0.901-1.282-0.901v-2.51c0,0,0-1.095,1.282-1.095S15.973,12.39,15.973,12.39 M14.69,12.003c-0.405,0-0.405,0.45-0.405,0.45v0.579h0.811v-0.579C15.096,12.453,15.096,12.003,14.69,12.003"/>
  		</symbol>
  		<symbol id="tiktok" viewBox="0 0 33 33">
    		<path d="M 16.708 0.027 c 1.745 -0.027 3.48 -0.011 5.213 -0.027 c 0.105 2.041 0.839 4.12 2.333 5.563 c 1.491 1.479 3.6 2.156 5.652 2.385 v 5.369 c -1.923 -0.063 -3.855 -0.463 -5.6 -1.291 c -0.76 -0.344 -1.468 -0.787 -2.161 -1.24 c -0.009 3.896 0.016 7.787 -0.025 11.667 c -0.104 1.864 -0.719 3.719 -1.803 5.255 c -1.744 2.557 -4.771 4.224 -7.88 4.276 c -1.907 0.109 -3.812 -0.411 -5.437 -1.369 c -2.693 -1.588 -4.588 -4.495 -4.864 -7.615 c -0.032 -0.667 -0.043 -1.333 -0.016 -1.984 c 0.24 -2.537 1.495 -4.964 3.443 -6.615 c 2.208 -1.923 5.301 -2.839 8.197 -2.297 c 0.027 1.975 -0.052 3.948 -0.052 5.923 c -1.323 -0.428 -2.869 -0.308 -4.025 0.495 c -0.844 0.547 -1.485 1.385 -1.819 2.333 c -0.276 0.676 -0.197 1.427 -0.181 2.145 c 0.317 2.188 2.421 4.027 4.667 3.828 c 1.489 -0.016 2.916 -0.88 3.692 -2.145 c 0.251 -0.443 0.532 -0.896 0.547 -1.417 c 0.131 -2.385 0.079 -4.76 0.095 -7.145 c 0.011 -5.375 -0.016 -10.735 0.025 -16.093 Z"/>
  		</symbol>
	</svg>

	<title>Pokemon卡牌查價系統---主頁</title>

	<link rel="stylesheet" href="index.css">

	<style>
		td,tr{
			border: none !important;
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
echo"				<li class='nav-item dropdown mx-xl-1 mb-1 mb-xl-0'>";
echo"					<div class='nav-link dropdown-toggle px-2' id='navbarDropdown_user' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
echo"						<b>會員 : ".$_SESSION['username']."</b>";
echo"					</div>";
echo"					<ul class='dropdown-menu my-1' aria-labelledby='navbarDropdown_user'>";
echo"						<li><a class='dropdown-item' href='favorite.php'>最愛清單</a></li>";
echo"						<li><a class='dropdown-item' href='#'>會員資料</a></li>";
echo"						<div class='dropdown-divider'></div>";
echo"						<li><a class='dropdown-item log-out-btn' href='#'>登出</a></li>";
echo"					</ul>";
echo"				</li>";
				}
				else{
echo"				<li class='nav-item mx-xl-1 mb-1 mb-xl-0'>";	
echo"					<a class='nav-link px-2 login-link' href='login.php'><b>登入</b></a>";	
echo"				</li>";					
				}
?>							
					<li class="nav-item mx-xl-1 mb-1 mb-xl-0">
						<a class="nav-link px-2" href="#"><b>關於我們</b></a>
					</li>
					<li class="nav-item mx-xl-1 mb-1 mb-xl-0">
						<div class="nav-link px-2" id="scroll_1"><b>最新消息</b></div>
					</li>
					<li class="nav-item mx-xl-1 mb-1 mb-xl-0">
						<div class="nav-link px-2" id="scroll_2"><b>快速查詢</b></div>
					</li>
					<li class="nav-item mx-xl-1 mb-1 mb-xl-0">
						<div class="nav-link px-2" id="scroll_3"><b>價格排行</b></div>
					</li>
					<li class="nav-item dropdown mx-xl-1 mb-1 mb-xl-0">
						<a class="nav-link dropdown-toggle px-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<b>商場</b>
						</a>
						<ul class="dropdown-menu my-1" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="https://shopee.tw/search?keyword=%E5%AF%B6%E5%8F%AF%E5%A4%A2%E5%8D%A1%E7%89%8C" target="_blank">蝦皮</a></li>
							<li><a class="dropdown-item" href="https://www.ruten.com.tw/find/?q=%E5%AF%B6%E5%8F%AF%E5%A4%A2%E5%8D%A1%E7%89%8C" target="_blank">露天</a></li>
							<li><a class="dropdown-item" href="https://paipaizhan.com.tw/cardgame-ptcg/" target="_blank">牌牌戰</a></li>
						</ul>
					</li>
				</ul>
				<form class="d-flex me-xl-4 mx-1 mx-sm-4" id="char-search-form" action="char-search.php" method="post">
					<input class="form-control me-2" id="char-search-bar" type="search" placeholder="名稱/屬性/稀有度..." aria-label="Search" name="search_char" required>
					<button class="btn btn-outline-dark" id="char-search-btn" type="submit">search</button>
				</form>				
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-12 mt-4 mb-4">
				<div class="dialog news">
					<?php   
					for($i=1;$i<=6;$i++){
						$sql = "SELECT 	figure,href,content,date
						FROM	news
						WHERE 	Number=$i";
						require_once("dbtools.inc.php");
						$link = create_connection();
						$result = execute_sql($link,"pokemon_card",$sql);
						while($row = mysqli_fetch_array($result)){
							$content[]=$row["content"];
							$figure[]=$row["figure"];
							$href[]=$row["href"];
							$date[]=$row["date"];
						}       
					}
					?>
					<div class="container-fluid">
						<h1 class="mx-0 my-0 py-3 dialog_title">最新消息</h1>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
							<div class="col mb-4">
				<?php 	echo "	<div class='card shadow h-100 news_card' title='$content[0](另開視窗)'>";?>								
				<?php 	echo "		<img src='$figure[0]' class='card-img-top' alt='$content[0]'>";?>
									<div class='card-body'>
				<?php	echo "			<h5 class='card-title'>$content[0]</h5>";?>								
									</div>
									<div class="card-footer">
				<?php	echo "			<p class='card-text'>$date[0]</p>";?>						
				<?php	echo "			<a href='$href[0]' class='btn btn-primary news_btn' target='_blank'>查看</a>";?>					
									</div>
								</div>
							</div>
							<div class="col mb-4">
				<?php 	echo "	<div class='card shadow h-100 news_card' title='$content[1](另開視窗)'>";?>							
				<?php 	echo "		<img src='$figure[1]' class='card-img-top' alt='$content[1]'>";?>
									<div class='card-body'>
				<?php	echo "			<h5 class='card-title'>$content[1]</h5>";?>
									</div>
									<div class="card-footer">
				<?php	echo "			<p class='card-text'>$date[1]</p>";?>						
				<?php	echo "			<a href='$href[1]' class='btn btn-primary news_btn' target='_blank'>查看</a>";?>					
									</div>
								</div>
							</div>
							<div class="col mb-4">
				<?php 	echo "	<div class='card shadow h-100 news_card' title='$content[2](另開視窗)'>";?>	
				<?php 	echo "		<img src='$figure[2]' class='card-img-top' alt='$content[2]'>";?>
									<div class='card-body'>
				<?php	echo "			<h5 class='card-title'>$content[2]</h5>";?>
									</div>
									<div class="card-footer">
				<?php	echo "			<p class='card-text'>$date[2]</p>";?>						
				<?php	echo "			<a href='$href[2]' class='btn btn-primary news_btn' target='_blank'>查看</a>";?>
									</div>
								</div>
							</div>
							<div class="col mb-4">
				<?php 	echo "	<div class='card shadow h-100 news_card' title='$content[3](另開視窗)'>";?>						
				<?php 	echo "		<img src='$figure[3]' class='card-img-top' alt='$content[3]'>";?>
									<div class='card-body'>
				<?php	echo "			<h5 class='card-title'>$content[3]</h5>";?>
									</div>
									<div class="card-footer">
				<?php	echo "			<p class='card-text'>$date[3]</p>";?>						
				<?php	echo "			<a href='$href[3]' class='btn btn-primary news_btn' target='_blank'>查看</a>";?>
									</div>
								</div>
							</div>
							<div class="col mb-4">
				<?php 	echo "	<div class='card shadow h-100 news_card' title='$content[4](另開視窗)'>";?>
				<?php 	echo "		<img src='$figure[4]' class='card-img-top' alt='$content[4]'>";?>
									<div class='card-body'>
				<?php	echo "			<h5 class='card-title'>$content[4]</h5>";?>
									</div>
									<div class="card-footer">
				<?php	echo "			<p class='card-text'>$date[4]</p>";?>						
				<?php	echo "			<a href='$href[4]' class='btn btn-primary news_btn' target='_blank'>查看</a>";?>
									</div>
								</div>
							</div>
							<div class="col mb-4">
				<?php 	echo "	<div class='card shadow h-100 news_card' title='$content[5](另開視窗)'>";?>
				<?php 	echo "		<img src='$figure[5]' class='card-img-top' alt='$content[5]'>";?>
									<div class='card-body'>
				<?php	echo "			<h5 class='card-title'>$content[5]</h5>";?>
									</div>
									<div class="card-footer">
				<?php	echo "			<p class='card-text'>$date[5]</p>";?>						
				<?php	echo "			<a href='$href[5]' class='btn btn-primary news_btn' target='_blank'>查看</a>";?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 mb-4">
				<div class="dialog quick_search">
					<div class="container-fluid">
						<h1 class="mx-0 my-0 py-3 dialog_title">快速查詢</h1>
						<h3 class="mx-0 my-0 pb-2">透過選取<mark>系列</mark>/<mark>屬性</mark>/<mark>稀有度</mark>可以更快找到符合條件的卡片!!</h3>
						<form action="char-search.php" method="POST" >
							<div class="row">
								<div class="col py-2 mb-2 check_area rounded">
									<h3 class="mx-0 my-0 pb-2">操作</h3>
									<div class="container">
										<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
											<div class="col">
												<input type="submit" class="btn normal_btn check_box w-100" autocomplete="off">
											</div>
											<div class="col">
												<input type="reset" class="btn normal_btn check_box w-100" autocomplete="off">
											</div>									
										</div>
									</div>											
								</div>
							</div>
							<div class="row">
								<div class="col py-2 mb-2 check_area rounded">	
									<h3 class="mx-0 my-0 pb-2">系列</h3>
									<div class="container">
										<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
											<div class="col">
												<input type="checkbox" class="btn-check" id="s4a" name="srch_series[]" value="s4a">
												<label class="btn normal_btn check_box w-100 mb-2" for="s4a">閃色明星</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="s5i" name="srch_series[]" value="s5i">
												<label class="btn normal_btn check_box w-100 mb-2" for="s5i">一擊大師</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="s5r" name="srch_series[]" value="s5r">
												<label class="btn normal_btn check_box w-100 mb-2" for="s5r">連擊大師</label>
											</div>
										</div>
									</div>

									<h3 class="mx-0 my-0 pb-2">屬性</h3>
									<div class="container">
										<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_normal" autocomplete="off" name="srch_att[]" value="一般">
												<label class="btn normal_btn check_box w-100 mb-2" for="att_normal">一般</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_none" autocomplete="off" name="srch_att[]" value="無">
												<label class="btn check_box w-100 mb-2 att_none" for="att_none">無</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_dendro" autocomplete="off" name="srch_att[]" value="草">
												<label class="btn check_box w-100 mb-2 att_dendro" for="att_dendro">草</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_hydro" autocomplete="off" name="srch_att[]" value="水">
												<label class="btn check_box w-100 mb-2 att_hydro" for="att_hydro">水</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_pyro" autocomplete="off" name="srch_att[]" value="火">
												<label class="btn check_box w-100 mb-2 att_pyro" for="att_pyro">火</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_metal" autocomplete="off" name="srch_att[]" value="鋼">
												<label class="btn check_box w-100 mb-2 att_metal" for="att_metal">鋼</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_super" autocomplete="off" name="srch_att[]" value="超能力">
												<label class="btn check_box w-100 mb-2 att_super" for="att_super">超能力</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_evil" autocomplete="off" name="srch_att[]" value="惡">
												<label class="btn check_box w-100 mb-2 att_evil" for="att_evil">惡</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_battle" autocomplete="off" name="srch_att[]" value="格鬥">
												<label class="btn check_box w-100 mb-2 att_battle" for="att_battle">格鬥</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_dragon" autocomplete="off" name="srch_att[]" value="龍">
												<label class="btn check_box w-100 mb-2 att_dragon" for="att_dragon">龍</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_fairy" autocomplete="off" name="srch_att[]" value="妖精">
												<label class="btn check_box w-100 mb-2 att_fairy" for="att_fairy">妖精</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_electro" autocomplete="off" name="srch_att[]" value="電">
												<label class="btn check_box w-100 mb-2 att_electro" for="att_electro">電</label>
											</div>
										</div>
									</div>

									<h3 class="mx-0 my-0 pb-2">稀有度</h3>
									<div class="container">
										<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_none" autocomplete="off" name="srch_rare[]" value="普卡">
												<label class="btn normal_btn check_box w-100 mb-2" for="rare_none">普卡</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_ar" autocomplete="off" name="srch_rare[]" value="AR">
												<label class="btn normal_btn check_box w-100 mb-2" for="rare_ar">AR</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_rr" autocomplete="off" name="srch_rare[]" value="RR">
												<label class="btn normal_btn check_box w-100 mb-2" for="rare_rr">RR</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_rrr" autocomplete="off" name="srch_rare[]" value="RRR">
												<label class="btn normal_btn check_box w-100 mb-2" for="rare_rrr">RRR</label>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
			<div class="col-12 mb-4">
				<div class="dialog leaderboard">
					<?php
						$sql = "SELECT 		Number,Name,Picture,s_0,r_0,p_0
								FROM		card_info,shopee,ruten,pai		
								WHERE 		Number=s_ID	AND Number=r_ID AND	Number=p_ID		
									
								ORDER BY 	s_0 DESC;";
						require_once("dbtools.inc.php");
						$link = create_connection();
						$result = execute_sql($link,"pokemon_card",$sql);
						$flag=0;
						while($row = mysqli_fetch_array($result)){
							if($flag==3){
								break;
							}
							$number[$flag]	=$row["Number"];
							$name[$flag]	=$row["Name"];
							$picture[$flag]	=$row["Picture"];

							$ave[$flag]		=round((($row["s_0"]+$row["r_0"]+$row["p_0"])/3.0), 0);

							$flag++;
						}
					?>
					<div class="container-fluid">
						<h1 class="mx-0 my-0 py-3 dialog_title">價格排行</h1>
						<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
							<div class="col mb-4">
								<form action="card-info.php" method="POST">
									<div class="card shadow h-100 leader_card">
										<div class="card-header rounded-top leader_1st">
											<h3 class="mx-0 my-0">第一名</h3>
										</div>
	<?php	echo"							<input type='image' class='image shadow my-4' src='http://140.128.102.212/p-img/".$picture[0].".png' alt='...'>";?>
	<?php	echo"							<input type='hidden' name='card_id' value='".$number[0]."'>";?>			
										<div class="card-body rounded-bottom leader_1st">
											<div class="card-text">
												<div class="container px-0">											
													<table class="table mb-0">
														<tr>
															<td class='p-0'><h4 class='mb-0'>名稱 :</h4></td>
	<?php 	echo"											<td class='p-0'><h4 class='mb-0 float-end'>$name[0]</h4></td>";?>
														</tr>
														<tr>
															<td class='p-0'><h4 class='mb-0'>價格 :</h4></td>
	<?php 	echo"											<td class='p-0'><h4 class='mb-0 float-end'>$ave[0] $</h4></td>";?>
														</tr>
													</table>
												</div>											
											</div>										
										</div>
									</div>
								</form>								
							</div>
							<div class="col mb-4">
								<form action="card-info.php" method="POST">
									<div class="card shadow h-100 leader_card">
										<div class="card-header rounded-top leader_2nd">
											<h3 class="mx-0 my-0">第二名</h3>
										</div>
	<?php	echo"							<input type='image' class='image shadow my-4' src='http://140.128.102.212/p-img/".$picture[1].".png' alt='...'>";?>
	<?php	echo"							<input type='hidden' name='card_id' value='".$number[1]."'>";?>		
										<div class="card-body rounded-bottom leader_2nd">
											<div class="card-text">
												<div class="container px-0">
													<table class="table mb-0">
														<tr>
															<td class='p-0'><h4 class='mb-0'>名稱 :</h4></td>
	<?php 	echo"											<td class='p-0'><h4 class='mb-0 float-end'>$name[1]</h4></td>";?>
														</tr>
														<tr>
															<td class='p-0'><h4 class='mb-0'>價格 :</h4></td>
	<?php 	echo"											<td class='p-0'><h4 class='mb-0 float-end'>$ave[1] $</h4></td>";?>
														</tr>
													</table>													
												</div>		
											</div>										
										</div>
									</div>
								</form>								
							</div>
							<div class="col mb-4">
								<form action="card-info.php" method="POST">
									<div class="card shadow h-100 leader_card">
										<div class="card-header rounded-top leader_3rd">
											<h3 class="mx-0 my-0">第三名</h3>
										</div>
	<?php	echo"							<input type='image' class='image shadow my-4' src='http://140.128.102.212/p-img/".$picture[2].".png'  alt='...''>";?>
	<?php	echo"							<input type='hidden' name='card_id' value='".$number[2]."'>";?>	
										<div class="card-body rounded-bottom leader_3rd">
											<div class="card-text">
												<div class="container px-0">												
													<table class="table mb-0">
														<tr>
															<td class='p-0'><h4 class='mb-0'>名稱 :</h4></td>
	<?php 	echo"											<td class='p-0'><h4 class='mb-0 float-end'>$name[2]</h4></td>";?>
														</tr>
														<tr>
															<td class='p-0'><h4 class='mb-0'>價格 :</h4></td>
	<?php 	echo"											<td class='p-0'><h4 class='mb-0 float-end'>$ave[2]  $</h4></td>";?>
														</tr>
													</table>
												</div>		
											</div>
										</div>									
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
		<i class="fas fa-arrow-up"></i>
	</button>
	<footer class="border-top"> 
		<div class="container">
			<div class="row row-cols-2 row-cols-sm-2 row-cols-lg-4 py-5">
				<div class="col px-2 px-sm-5 mb-3 mb-lg-0">
    				<ul class="list-unstyled d-flex">
      					<li class="px-2"><a class="text-muted" href="https://asia.pokemon-card.com/tw/"><svg class="bi" width="24" height="24"><use xlink:href="#pokemon"/></svg></a></li>
      					<li class="px-2"><a class="text-muted" href="https://www.facebook.com/Pokemon.TCG.Official.Taiwan/"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      					<li class="px-2"><a class="text-muted" href="https://www.youtube.com/channel/UCCI-s2RRbUVPUEKVCcgil_g"><svg class="bi" width="24" height="24"><use xlink:href="#youtube"/></svg></a></li>
      					<li class="px-2"><a class="text-muted" href="https://www.tiktok.com/@pokemon?"><svg class="bi" width="24" height="24"><use xlink:href="#tiktok"/></svg></a></li>
    				</ul>
    			</div>
    			<div class="col px-2 px-sm-5 mb-3 mb-lg-0">
     			<h5>商場</h5>
      				<ul class="list-unstyled">
        				<li class="mb-2"><a href="https://shopee.tw/search?keyword=%E5%AF%B6%E5%8F%AF%E5%A4%A2%E5%8D%A1%E7%89%8C" class="btn p-0 ">蝦皮購物</a></li>
        				<li class="mb-2"><a href="https://www.ruten.com.tw/find/?q=%E5%AF%B6%E5%8F%AF%E5%A4%A2%E5%8D%A1%E7%89%8C" class="btn p-0 ">露天拍賣</a></li>
        				<li class="mb-2"><a href="https://paipaizhan.com.tw/cardgame-ptcg/" class="btn p-0">牌牌戰</a></li>
      				</ul>
    			</div>
   				<div class="col px-2 px-sm-5 mb-3 mb-lg-0">
      			<h5 class="px-3 px-sm-0">快速連結</h5>
      				<ul class="list-unstyled px-3 px-sm-0">
        				<li class="mb-2"><a href="#" class="btn p-0">關於我們</a></li>
        				<li class="mb-2"><a href="#" class="btn p-0">最新消息</a></li>
        				<li class="mb-2"><a href="#" class="btn p-0">快速查詢</a></li>
        				<li class="mb-2"><a href="#" class="btn p-0">價格排行</a></li>
      				</ul>
    			</div>
       			<div class="col px-2 px-sm-5 mb-3 mb-lg-0">
      			<h5>聯繫我們</h5>
      				<ul class="list-unstyled">
        				<li class="mb-2"><a href="http://www.cs.thu.edu.tw/" class="btn p-0">東海大學資工系</a></li>
      				</ul>
   	 			</div>
			</div>
		</div>    	
	</footer>
    <script>
    	$(function(){
    		const window_height = $(document).height();
    		const window_width = $(document).width();	
    		$("#scroll_1").click(function(){
    			window.scrollTo(0,0);
    		});
    		$("#scroll_2").click(function(){
    			if(window_width >= 1400){
    				window.scrollTo(0,900);
    			}
    			else if((1200 <= window_width) && (window_width < 1400)){
    				window.scrollTo(0,862);
    			}
    			else if((992 <= window_width) && (window_width < 1200)){
    				window.scrollTo(0,824);
    			}
    			else if((768 <= window_width) && (window_width < 992)){
    				window.scrollTo(0,1199);
    			}
    			else if((576 <= window_width) && (window_width < 768)){
    				window.scrollTo(0,2930);
    			}
    			else if(window_width < 576){
    				window.scrollTo(0,2550);
    			}
    		});
    		$("#scroll_3").click(function(){
    			if(window_width >= 1400){
    				window.scrollTo(0,9999);
    			}
    			else if((1200 <= window_width) && (window_width < 1400)){
    				window.scrollTo(0,9999);
    			}
    			else if((992 <= window_width) && (window_width < 1200)){
    				window.scrollTo(0,9999);
    			}
    			else if((768 <= window_width) && (window_width < 992)){
    				window.scrollTo(0,9999);
    			}
    			else if((576 <= window_width) && (window_width < 768)){
    				window.scrollTo(0,3627);
    			}
    			else if(window_width < 576){
    				window.scrollTo(0,3382);
    			}
    		});

    		$(".news_btn").click(function(){//已經按news_btn
    			$(this).data("clicked", true);
    		});
    		$(".news_card").click(function(){
    			if(!$(this).find(".news_btn").data("clicked")){//按news_btn以外的區域
    				$(this).find(".news_btn")[0].click();//也會使news_btn.data => true
    				//Note that this calls the DOM click method instead of the jQuery click method (which is very incomplete and completely ignores href).
    			}
    			else{
    				$(this).find(".news_btn").data("clicked", false);//重設將news_btn.data => false
    			}
    		});

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
    		
    		$(".log-out-btn").click(function(){
    			$.get('logout.php',function(){  
    				location.reload(); 			
    				alert("已完成登出");
    			});
    		});
    	});		
    </script>
</body>
</html>