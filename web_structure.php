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
	<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
				<img src="img/logo_v2.png" alt="" height="75px">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item mx-2">
						<a class="nav-link px-2" href="#"><b>關於我們</b></a>
					</li>
					<li class="nav-item mx-2">
						<div class="nav-link px-2" id="scroll_1"><b>最新消息</b></div>
					</li>
					<li class="nav-item mx-2">
						<div class="nav-link px-2" id="scroll_2"><b>快速查詢</b></div>
					</li>
					<li class="nav-item mx-2">
						<div class="nav-link px-2" id="scroll_3"><b>價格排行</b></div>
					</li>
					<li class="nav-item dropdown mx-2">
						<a class="nav-link dropdown-toggle px-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<b>商場</b>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="https://shopee.tw/search?keyword=%E5%AF%B6%E5%8F%AF%E5%A4%A2%E5%8D%A1%E7%89%8C" target="_blank">蝦皮</a></li>
							<li><a class="dropdown-item" href="https://www.ruten.com.tw/find/?q=%E5%AF%B6%E5%8F%AF%E5%A4%A2%E5%8D%A1%E7%89%8C" target="_blank">露天</a></li>
							<li><a class="dropdown-item" href="https://paipaizhan.com.tw/cardgame-ptcg/" target="_blank">牌牌戰</a></li>
						</ul>
					</li>
				</ul>
				<form class="d-flex" id="char-search-form">
					<input class="form-control me-2" id="char-search-bar" type="search" placeholder="名稱/屬性/稀有度..." aria-label="Search" name="search_char" required>
					<button class="btn btn-outline-dark" id="char-search-btn" type="submit">search</button>
				</form>
			</div>
		</div>
	</nav>
</body>
</html>