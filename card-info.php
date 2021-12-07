<?php
	session_start();
	header("Cache-Control:private");
	$id=$_POST["card_id"];
	$search_char = $_POST["search_char"];
	$card_img = str_replace("/","_",$id,$count);

	$sql = "SELECT 	*
	FROM	card_info,shopee,ruten,pai
	WHERE	Picture = '$card_img' AND s_ID='$id' AND r_ID='$id' AND p_ID='$id';";
	
	require_once("dbtools.inc.php");
    $link = create_connection();
    $result = execute_sql($link,"pokemon_card",$sql);
    $row = mysqli_fetch_array($result);
    $ave=round((($row["s_0"]+$row["r_0"]+$row["p_0"])/3.0), 0);
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

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>

	<title>Pokemon卡牌查價系統---主頁</title>

	<link rel="stylesheet" href="index1.css">

	<style>
		.btn-shopee{
			background-color: #FF6725;
			color: #fff;
		}
		.btn-shopee:hover{
			background-color: #FF540A;
			color: #fff;
		}
		.btn-ruten{
			background-color: #FFB53A;
			color: #000;
		}
		.btn-ruten:hover{
			background-color: #FF9F00;
			color: #000;
		}
		.btn-pai{
			background-color: #616161;
			color: #fff;
		}
		.btn-pai:hover{
			background-color: #505050;
			color: #fff;
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
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<?php
				if($_SESSION['islogin']){
echo"				<li class='nav-item mx-1'>";
echo"					<div class='nav-link px-2'>";
echo"						<b>會員 : ".$_SESSION['username']."</b>";
echo"					</div>";
echo"				</li>";
				}
				else{
echo"				<li class='nav-item mx-1'>";	
echo"					<a class='nav-link px-2' href='login.php'><b>登入</b></a>";	
echo"				</li>";					
				}
?>																					
				</ul>
				<div class="my-2 me-5 mx-1" style="--bs-breadcrumb-divider:'>';" aria-label="breadcrumb">
					<ol class="breadcrumb my-auto px-2">
						<li class="breadcrumb-item"><a href="index.php">主頁</a></li>
<?php
					$url = $_SERVER["HTTP_REFERER"];
					if($url=="http://10.54.1.15/pokemon_web/favorite.php"){
echo"					<li class='breadcrumb-item'><a href='favorite.php'>最愛清單</a></li>";
echo"					<li class='breadcrumb-item active' aria-current='page'>$id</li>";						
					}
					else if($url=="http://10.54.1.15/pokemon_web/char-search.php"){
echo"					<li class='breadcrumb-item'><a href='#'' onclick='history.back();'>搜尋結果:$search_char</a></li>";
echo"					<li class='breadcrumb-item active' aria-current='page'>$id</li>";
					}
?>
					</ol>
				</div>			
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">			
			<div class="col-12 mt-4 mb-4">
				<div class="dialog card-info">
					<div class="container-fluid">
						<h1 class="mx-0 my-0 py-3 dialog_title">卡片資訊</h1>
						<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
							<div class="col mb-2">
								<div class="container-fluid px-2">
									<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
										<div class="col mb-2">
<?php 	echo"								<img id='input-img' class='shadow w-100' src='http://140.128.102.212/p-img/".$card_img.".png' alt=''>";?>
										</div>
										<div class="col">
											<table class="table mb-2 mb-md-4 mb-lg-1 mb-xl-3 mb-xxl-4">
												<tr>
													<td class='p-2 py-lg-1 py-xl-2'>編號 :</td>
<?php 	echo"										<td class='p-2 py-lg-1 py-xl-2'>".$row["Number"]."</td>";?>
												</tr>
												<tr>
													<td class='p-2 py-lg-1 py-xl-2'>名稱 :</td>
<?php 	echo"										<td class='p-2 py-lg-1 py-xl-2'>".$row["Name"]."</td>";?>
												</tr>
												<tr>
													<td class='p-2 py-lg-1 py-xl-2'>屬性 :</td>
<?php 	echo"										<td class='p-2 py-lg-1 py-xl-2'>".$row["Attribute"]."</td>";?>
												</tr>
												<tr>
													<td class='p-2 py-lg-1 py-xl-2'>稀有度 :</td>
<?php 	echo"										<td class='p-2 py-lg-1 py-xl-2'>".$row["Rarity"]."</td>";?>
												</tr>
												<tr>
													<td class='p-2 py-lg-1 py-xl-2'>平均價格 :</td>
<?php 	echo"										<td class='p-2 py-lg-1 py-xl-2'>".$ave." $</td>";?>
												</tr>
											</table>
											<div class="row row-cols-1">
												<div class="col mx-auto">
<?php 	echo'										<a class="btn btn-shopee w-100 mb-2 mb-sm-2 mb-md-4 mb-lg-1 mb-xl-2 mb-xxl-4 p-2 py-lg-1 py-xl-1 py-xxl-2" href="https://shopee.tw/search?keyword='.$row["Number"].'" target="_blank">蝦皮</a>';?>													
												</div>	
												<div class="col">
<?php	echo'										<a class="btn btn-ruten w-100 mb-2 mb-sm-2 mb-md-4 mb-lg-1 mb-xl-2 mb-xxl-4 p-2 py-lg-1 py-xl-1 py-xxl-2" href="https://www.ruten.com.tw/find/?q='.$row["Number"].'" target="_blank">露天</a>';?>														
												</div>


												<div class="col">
<?php	echo'										<a class="btn btn-pai w-100 mb-2 mb-sm-2 mb-md-4 mb-lg-1 mb-xl-2 mb-xxl-4 p-2 py-lg-1 py-xl-1 py-xxl-2" href="https://paipaizhan.com.tw/?s='.$row["Number"].'" target="_blank">牌牌戰</a>';?>														
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
<?php 								

$sql = "SELECT 	*										
FROM	shopee,ruten,pai
WHERE	s_ID = '$id' AND r_ID = '$id' AND p_ID = '$id';";

require_once("dbtools.inc.php");
$link = create_connection();
$result = execute_sql($link,"pokemon_card",$sql);
$row = mysqli_fetch_array($result);
?>
						<div class="col align-center mb-2 px-0">
							<div id="highchart" class="h-100 my-auto"></div>
						</div>
					</div>						
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$("#scroll_1").click(function(){
			window.scrollTo(0,0);
    		});
    		$("#scroll_2").click(function(){
    			const window_height = $(document).height();
    			const window_width = $(document).width();
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
    				window.scrollTo(0,2685);
    			}
    			else if(window_width < 576){
    				window.scrollTo(0,2550);
    			}
    		});

    		$(".log-out-btn").click(function(){
    			$.get('log-out.php',function(){  
    				location.reload(); 			
    				alert("已完成登出");
    			});
    		});
    	});		
    </script>
    <script>	
			var s_13 = 	<?php echo $row["s_13"]; ?>;
			var s_12 =	<?php echo $row["s_12"]; ?>;
			var s_11 =	<?php echo $row["s_11"]; ?>;
			var s_10 =	<?php echo $row["s_10"]; ?>;
			var s_9 =	<?php echo $row["s_9"]; ?>;
			var s_8 =	<?php echo $row["s_8"]; ?>;
			var s_7 =	<?php echo $row["s_7"]; ?>;
			var s_6 =	<?php echo $row["s_6"]; ?>;
			var s_5 =	<?php echo $row["s_5"]; ?>;	
			var s_4 =	<?php echo $row["s_4"]; ?>;
			var s_3 =	<?php echo $row["s_3"]; ?>;
			var s_2 =	<?php echo $row["s_2"]; ?>;
			var s_1 =	<?php echo $row["s_1"]; ?>;
			var s_0 =	<?php echo $row["s_0"]; ?>;
			//
			var r_13 = 	<?php echo $row["r_13"]; ?>;
			var r_12 =	<?php echo $row["r_12"]; ?>;
			var r_11 =	<?php echo $row["r_11"]; ?>;
			var r_10 =	<?php echo $row["r_10"]; ?>;
			var r_9 =	<?php echo $row["r_9"]; ?>;
			var r_8 =	<?php echo $row["r_8"]; ?>;
			var r_7 =	<?php echo $row["r_7"]; ?>;
			var r_6 =	<?php echo $row["r_6"]; ?>;
			var r_5 =	<?php echo $row["r_5"]; ?>;	
			var r_4 =	<?php echo $row["r_4"]; ?>;
			var r_3 =	<?php echo $row["r_3"]; ?>;
			var r_2 =	<?php echo $row["r_2"]; ?>;
			var r_1 =	<?php echo $row["r_1"]; ?>;
			var r_0 =	<?php echo $row["r_0"]; ?>;
			//
			var p_13 = 	<?php echo $row["p_13"]; ?>;
			var p_12 =	<?php echo $row["p_12"]; ?>;
			var p_11 =	<?php echo $row["p_11"]; ?>;
			var p_10 =	<?php echo $row["p_10"]; ?>;
			var p_9 =	<?php echo $row["p_9"]; ?>;
			var p_8 =	<?php echo $row["p_8"]; ?>;
			var p_7 =	<?php echo $row["p_7"]; ?>;
			var p_6 =	<?php echo $row["p_6"]; ?>;
			var p_5 =	<?php echo $row["p_5"]; ?>;	
			var p_4 =	<?php echo $row["p_4"]; ?>;
			var p_3 =	<?php echo $row["p_3"]; ?>;
			var p_2 =	<?php echo $row["p_2"]; ?>;
			var p_1 =	<?php echo $row["p_1"]; ?>;
			var p_0 =	<?php echo $row["p_0"]; ?>;
		//
		var date = new Array(14);

        for(var i=0;i<date.length;i++){
			var today = new Date();
			today = today.setDate(today.getDate()-i);
			today = new Date(today);
			date[i]=(today.getMonth()+1)+"/"+(today.getDate());          
        }

		document.addEventListener('DOMContentLoaded', function () {
			const chart = Highcharts.chart('highchart', {
				chart: {
					type: 'line',
					backgroundColor: '#fff',
					border: 'none'
				},

				title: {
					text: '<?php echo $id;?> 價格變動紀錄',
					style: {
						fontWeight: 'bold'
					}
				},

				xAxis: {
					categories: [date[13],date[12],date[11],date[10],date[9],date[8],date[7],
								date[6],date[5],date[4],date[3],date[2],date[1],date[0]]
				},

				yAxis: {
					title: {
						text: '價格(NTD)'
					}
				},

				credits: {
					enabled: false //不顯示LOGO
				},

				legend: {
					enabled: false
				},
				
				colors: ['#FF4D00', '#FF9900','#000000'],

				plotOptions: {
					line: {
						dataLabels: {
							enabled: false,
							style:{
								fontSize: '16px'
							},
						},
					},
					series: {
						dashStyle:'ShortDashDot'
					}
				},

				responsive: {
					rules: [{
						condition: {
							maxWidth: 100
						},
						chartOptions: {
							legend: {
								layout: 'horizontal',
								align: 'center',
								verticalAlign: 'middle'
							}
						}
					}]
				},

				series: [
					{
						name:'蝦皮',
						data:[
								s_13,s_12,s_11,s_10,s_9,s_8,s_7,s_6,s_5,s_4,s_3,s_2,s_1,s_0
							]
					},
					{
						name:'露天',
						data:[
								r_13,r_12,r_11,r_10,r_9,r_8,r_7,r_6,r_5,r_4,r_3,r_2,r_1,r_0
							]
					},
					{
						name:'牌牌戰',
						data:[
								p_13,p_12,p_11,p_10,p_9,p_8,p_7,p_6,p_5,p_4,p_3,p_2,p_1,p_0
							]
					},
				]
			});
		});
	</script>
</body>
</html>