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

	<title>Pokemon卡牌查價系統---主頁</title>

	<link rel="stylesheet" href="index1.css">

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
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<?php
				if($_SESSION['islogin']){
echo"				<li class='nav-item dropdown mx-1'>";
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
echo"				<li class='nav-item mx-1'>";	
echo"					<a class='nav-link px-2 login-link' href='login.php'><b>登入</b></a>";	
echo"				</li>";					
				}
?>							
					<li class="nav-item mx-1">
						<a class="nav-link px-2" href="#"><b>關於我們</b></a>
					</li>
					<li class="nav-item mx-1">
						<div class="nav-link px-2" id="scroll_1"><b>最新消息</b></div>
					</li>
					<li class="nav-item mx-1">
						<div class="nav-link px-2" id="scroll_2"><b>快速查詢</b></div>
					</li>
					<li class="nav-item mx-1">
						<div class="nav-link px-2" id="scroll_3"><b>價格排行</b></div>
					</li>
					<li class="nav-item dropdown mx-1">
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
				<form class="d-flex" id="char-search-form" action="char-search.php" method="post">
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
						<form action="quick-search.php" method="POST" >
							<div class="row">
								<div class="col py-2 mb-2 check_area rounded">
									<input type="checkbox" class="btn-check" id="all" autocomplete="off">
									<label class="btn px-2 px-sm-3 px-md-4 px-lg-5 normal_btn check_box" for="all">全部</label>
									<input type="reset" class="btn px-2 px-sm-3 px-md-4 px-lg-5 ms-2 ms-sm-3 ms-mb-4 ms-lg-5 float-end normal_btn check_box" autocomplete="off">
									<input type="submit" class="btn px-2 px-sm-3 px-md-4 px-lg-5 float-end normal_btn check_box" autocomplete="off">
								</div>
							</div>
							<div class="row">
								<div class="col py-2 mb-2 check_area rounded">
									<h3 class="mx-0 my-0 pb-2">系列</h3>
									<div class="container">
										<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
											<div class="col">
												<input type="checkbox" class="btn-check" id="s4a" autocomplete="off">
												<label class="btn normal_btn check_box w-100 mb-2" for="s4a">閃色明星</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="s5i" autocomplete="off">
												<label class="btn normal_btn check_box w-100 mb-2" for="s5i">一擊大師</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="s5r" autocomplete="off">
												<label class="btn normal_btn check_box w-100 mb-2" for="s5r">連擊大師</label>
											</div>
										</div>
									</div>

									<h3 class="mx-0 my-0 pb-2">屬性</h3>
									<div class="container">
										<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_normal" autocomplete="off">
												<label class="btn normal_btn check_box w-100 mb-2" for="att_normal">一般</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_none" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_none" for="att_none">無</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_dendro" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_dendro" for="att_dendro">草</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_hydro" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_hydro" for="att_hydro">水</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_pyro" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_pyro" for="att_pyro">火</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_metal" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_metal" for="att_metal">鋼</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_super" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_super" for="att_super">超能力</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_evil" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_evil" for="att_evil">惡</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_battle" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_battle" for="att_battle">格鬥</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_dragon" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_dragon" for="att_dragon">龍</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_fairy" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_fairy" for="att_fairy">妖精</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="att_electro" autocomplete="off">
												<label class="btn check_box w-100 mb-2 att_electro" for="att_electro">電</label>
											</div>
										</div>
									</div>

									<h3 class="mx-0 my-0 pb-2">稀有度</h3>
									<div class="container">
										<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_none" autocomplete="off">
												<label class="btn normal_btn check_box w-100 mb-2" for="rare_none">無</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_ar" autocomplete="off">
												<label class="btn normal_btn check_box w-100 mb-2" for="rare_ar">AR</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_rr" autocomplete="off">
												<label class="btn normal_btn check_box w-100 mb-2" for="rare_rr">RR</label>
											</div>
											<div class="col">
												<input type="checkbox" class="btn-check" id="rare_rrr" autocomplete="off">
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
						$sql = "SELECT 		Number,Name,Picture,s_0
								FROM		card_info,shopee		
								WHERE 		Number=s_ID				
									
								ORDER BY 	s_0 DESC;";
						require_once("dbtools.inc.php");
						$link = create_connection();
						$result = execute_sql($link,"pokemon_card",$sql);
						$flag=0;
						while($row = mysqli_fetch_array($result)){
							if($flag==3){
								break;
							}
							$number[]	=$row["Number"];
							$name[]		=$row["Name"];
							$picture[]	=$row["Picture"];
							$price[]	=$row["s_0"];
							$flag++;
						}
					?>
					<div class="container-fluid">
						<h1 class="mx-0 my-0 py-3 dialog_title">價格排行</h1>
						<div class="row row-cols-1 row-cols-sm-1 row-cols-md-3">
							<div class="col mb-4">
								<div class="card shadow h-100 leader_card" data-bs-toggle="modal" data-bs-target="#modal_1st">
									<div class="card-header rounded-top leader_1st">
										<h3 class="mx-0 my-0">第一名</h3>
									</div>
<?php	echo"								<img src='http://140.128.102.212/p-img/".$picture[0].".png' class='my-3 shadow' alt='...'>";?>
									<div class="card-body rounded-bottom leader_1st">
										<div class="card-text">
											<div class="container px-0">											
												<div class="row row-cols-2">
													<div class="col">
														<h4 class="mx-0 my-0">名稱 :</h4>
													</div>
													<div class="col">
<?php	echo"											<h4 class='mx-0 my-0 float-end'>$name[0]</h4>";?>
													</div>
												</div>
												<div class="row row-cols-2">
													<div class="col">
														<h4 class="mx-0 my-0">售價 :</h4>
													</div>
													<div class="col">
<?php	echo"											<h4 class='mx-0 my-0 float-end'>$price[0]$</h4>";?>
													</div>
												</div>
											</div>											
										</div>
										<div class="modal fade" id="modal_1st" tabindex="-1" aria-labelledby="modal_label_1st" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="modal_label_1st">卡牌資訊</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														...
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col mb-4">
								<div class="card shadow h-100 leader_card" data-bs-toggle="modal" data-bs-target="#modal_2nd">
									<div class="card-header rounded-top leader_2nd">
										<h3 class="mx-0 my-0">第二名</h3>
									</div>
<?php	echo"							<img src='http://140.128.102.212/p-img/".$picture[1].".png' class='my-3 shadow' alt='...'>";?>
									<div class="card-body rounded-bottom leader_2nd">
										<div class="card-text">
											<div class="container px-0">												
												<div class="row row-cols-2">
													<div class="col">
														<h4 class="mx-0 my-0">名稱 :</h4>
													</div>
													<div class="col">
<?php	echo"											<h4 class='mx-0 my-0 float-end'>$name[1]</h4>";?>
													</div>
												</div>
												<div class="row row-cols-2">
													<div class="col">
														<h4 class="mx-0 my-0">售價 :</h4>
													</div>
													<div class="col">
<?php	echo"											<h4 class='mx-0 my-0 float-end'>$price[1]$</h4>";?>
													</div>
												</div>
											</div>		
										</div>
										<div class="modal fade" id="modal_2nd" tabindex="-1" aria-labelledby="modal_label_2nd" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="modal_label_2nd">卡牌資訊2</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														...
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col mb-4">
								<div class="card shadow h-100 leader_card" data-bs-toggle="modal" data-bs-target="#modal_3rd">
									<div class="card-header rounded-top leader_3rd">
										<h3 class="mx-0 my-0">第三名</h3>
									</div>
<?php	echo"							<img src='http://140.128.102.212/p-img/".$picture[2].".png' class='my-3 shadow' alt='...''>";?>
									<div class="card-body rounded-bottom leader_3rd">
										<div class="card-text">
											<div class="container px-0">												
												<div class="row row-cols-2">
													<div class="col">
														<h4 class="mx-0 my-0">名稱 :</h4>
													</div>
													<div class="col">
<?php	echo"											<h4 class='mx-0 my-0 float-end'>$name[2]</h4>";?>
													</div>
												</div>
												<div class="row row-cols-2">
													<div class="col">
														<h4 class="mx-0 my-0">售價 :</h4>
													</div>
													<div class="col">
<?php	echo"											<h4 class='mx-0 my-0 float-end'>$price[2]$</h4>";?>
													</div>
												</div>
											</div>		
										</div>
									</div>
									<div class="modal fade" id="modal_3rd" tabindex="-1" aria-labelledby="modal_label_3rd" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modal_label_3rd">卡牌資訊3</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													...
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</div>
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