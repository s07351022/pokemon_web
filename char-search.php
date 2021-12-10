<?php
	session_start();
	header("Cache-Control:private");
	$search_char = $_POST["search_char"];

	$series=$_POST["srch_series"];
	$att=$_POST["srch_att"];	
    $rare=$_POST["srch_rare"];		

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
		.btn-add{
			background-color: rgba(0,0,0,.5);
			color: #fff;
		}
		.btn-add:hover{
			background-color: rgba(0,0,0,.6) !important;
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
				<div class="mx-1 mx-sm-4 mx-xl-2  mb-2 mb-xl-0" style="--bs-breadcrumb-divider:'>';" aria-label="breadcrumb">
					<ol class="breadcrumb my-auto px-2">
						<li class="breadcrumb-item"><a href="index.php">主頁</a></li>
<?php 	echo"			<li class='breadcrumb-item active' aria-current='page'>搜尋結果</li>";?>
					</ol>
				</div>
				<form class="d-flex me-xl-4 mx-1 mx-sm-4" id="char-search-form" action="char-search.php" method="post">
					<input class="form-control me-2" id="char-search-bar" type="search" placeholder="名稱/屬性/稀有度..." aria-label="Search" name="search_char" required>
					<button class="btn btn-outline-dark" id="char-search-btn" type="submit">search</button>
				</form>				
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col col-12 my-4">
				<div class="dialog search-result">
					<div class="container-fluid">
						<h1 class="mx-0 my-0 py-3 dialog_title">搜尋結果</h1>
						<div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
<?php   
	if($search_char!=NULL){
		if($search_char=="閃色明星"){
			$search_char="s4a";
		}
		else if($search_char=="一擊大師" || $search_char=="一擊"){
		    $search_char="s5i";
		}
		else if($search_char=="連擊大師" || $search_char=="連擊"){
		    $search_char="s5r";
		}

	    $sql = "SELECT 	*
	            FROM	card_info
	            WHERE	Name LIKE '%$search_char%' OR                
	                    Number LIKE '%$search_char%' OR
	                    Attribute LIKE '%$search_char%' OR
	                    Class LIKE '%$search_char%' OR
	                    Rarity = '$search_char';";

	    require_once("dbtools.inc.php");
    	$link = create_connection();
    	$result = execute_sql($link,"pokemon_card",$sql);

    	while($row = mysqli_fetch_array($result)){
echo"					<form method='post' action='card-info.php'>";
echo"						<div class='col mb-3'>";
echo"							<div class='card char-search-card'>";
echo"								<div class='card-header'>";
echo"									<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"									<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"								</div>";
echo"								<input type='hidden' name='search_char' value='".$search_char."'>";
echo"								<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"								<div class='card-body py-2'>";
echo"									<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"								</div>";
								if($_SESSION['islogin']){
echo"								<div class='card-footer py-2 pt-0'>";
echo"									<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"									<a class='btn btn-add'>最愛</a>";
echo"								</div>";
								}
echo"							</div>";
echo"						</div>";
echo"					</form>";
		}
	}					
	else if($series!=NULL && $att==NULL && $rare==NULL){/*只有選series*/
		for($i=0;$i<sizeof($series);$i++){
			if($series[$i]=='s4a'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%';";							
	        }

	        if($series[$i]=='s5i'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%';";								
	        }

	        if($series[$i]=='s5r'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%';";								
	        }
	        require_once("dbtools.inc.php");
	    	$link = create_connection();
	    	$result = execute_sql($link,"pokemon_card",$sql);		

			while($row = mysqli_fetch_array($result)){
echo"						<form method='post' action='card-info.php'>";
echo"							<div class='col mb-3'>";
echo"								<div class='card char-search-card'>";
echo"									<div class='card-header'>";
echo"										<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"										<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"									</div>";
echo"									<input type='hidden' name='search_char' value='".$search_char."'>";
echo"									<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"									<div class='card-body py-2'>";
echo"										<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"									</div>";
									if($_SESSION['islogin']){
echo"									<div class='card-footer py-2 pt-0'>";
echo"										<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"										<a class='btn btn-add'>最愛</a>";
echo"									</div>";
									}
echo"								</div>";
echo"							</div>";
echo"						</form>";
				}		    				
			}			    
		}
	else if($series==NULL && $att!=NULL && $rare==NULL){/*只有選att*/
		for($i=0;$i<sizeof($att);$i++){
			$sql = "SELECT 	*
	                FROM	card_info
	                WHERE	Attribute = '$att[$i]';";

			require_once("dbtools.inc.php");
	    	$link = create_connection();
	    	$result = execute_sql($link,"pokemon_card",$sql);		

			while($row = mysqli_fetch_array($result)){
echo"					<form method='post' action='card-info.php'>";
echo"						<div class='col mb-3'>";
echo"							<div class='card char-search-card'>";
echo"								<div class='card-header'>";
echo"									<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"									<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"								</div>";
echo"								<input type='hidden' name='search_char' value='".$search_char."'>";
echo"								<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"								<div class='card-body py-2'>";
echo"									<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"								</div>";
								if($_SESSION['islogin']){
echo"								<div class='card-footer py-2 pt-0'>";
echo"									<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"									<a class='btn btn-add'>最愛</a>";
echo"								</div>";
								}
echo"							</div>";
echo"						</div>";
echo"					</form>";
			}		    					                
		}
	}
	else if($series==NULL && $att==NULL && $rare!=NULL){/*只有選rare*/
		for($i=0;$i<sizeof($rare);$i++){
			$sql = "SELECT 	*
	                FROM	card_info
	                WHERE	Rarity = '$rare[$i]';";

			require_once("dbtools.inc.php");
	    	$link = create_connection();
	    	$result = execute_sql($link,"pokemon_card",$sql);		

			while($row = mysqli_fetch_array($result)){
echo"					<form method='post' action='card-info.php'>";
echo"						<div class='col mb-3'>";
echo"							<div class='card char-search-card'>";
echo"								<div class='card-header'>";
echo"									<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"									<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"								</div>";
echo"								<input type='hidden' name='search_char' value='".$search_char."'>";
echo"								<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"								<div class='card-body py-2'>";
echo"									<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"								</div>";
								if($_SESSION['islogin']){
echo"								<div class='card-footer py-2 pt-0'>";
echo"									<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"									<a class='btn btn-add'>最愛</a>";
echo"								</div>";
								}
echo"							</div>";
echo"						</div>";
echo"					</form>";
			}		    					                
		}
	}
	else if($series!=NULL && $att!=NULL && $rare==NULL){/*選series att*/
		for($i=0;$i<sizeof($series);$i++){
			for($j=0;$j<sizeof($att);$j++){
				if($series[$i]=='s4a'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%' AND Attribute = '$att[$j]';";							
	        }

	        if($series[$i]=='s5i'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%' AND Attribute = '$att[$j]';";								
	        }

	        if($series[$i]=='s5r'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%' AND Attribute = '$att[$j]';";								
	        }
	        require_once("dbtools.inc.php");
	    	$link = create_connection();
	    	$result = execute_sql($link,"pokemon_card",$sql);		

			while($row = mysqli_fetch_array($result)){
echo"						<form method='post' action='card-info.php'>";
echo"							<div class='col mb-3'>";
echo"								<div class='card char-search-card'>";
echo"									<div class='card-header'>";
echo"										<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"										<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"									</div>";
echo"									<input type='hidden' name='search_char' value='".$search_char."'>";
echo"									<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"									<div class='card-body py-2'>";
echo"										<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"									</div>";
									if($_SESSION['islogin']){
echo"									<div class='card-footer py-2 pt-0'>";
echo"										<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"										<a class='btn btn-add'>最愛</a>";
echo"									</div>";
									}
echo"								</div>";
echo"							</div>";
echo"						</form>";
						}		    				
			}			
		}		    
	}
	else if($series!=NULL && $att==NULL && $rare!=NULL){/*選series rare*/
		for($i=0;$i<sizeof($series);$i++){
			for($j=0;$j<sizeof($rare);$j++){
				if($series[$i]=='s4a'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%' AND Rarity = '$rare[$j]';";							
	        }

	        if($series[$i]=='s5i'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%' AND Rarity = '$rare[$j]';";								
	        }

	        if($series[$i]=='s5r'){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Number LIKE '%$series[$i]%' AND Rarity = '$rare[$j]';";								
	        }
	        require_once("dbtools.inc.php");
	    	$link = create_connection();
	    	$result = execute_sql($link,"pokemon_card",$sql);		

			while($row = mysqli_fetch_array($result)){
echo"						<form method='post' action='card-info.php'>";
echo"							<div class='col mb-3'>";
echo"								<div class='card char-search-card'>";
echo"									<div class='card-header'>";
echo"										<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"										<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"									</div>";
echo"									<input type='hidden' name='search_char' value='".$search_char."'>";
echo"									<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"									<div class='card-body py-2'>";
echo"										<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"									</div>";
									if($_SESSION['islogin']){
echo"									<div class='card-footer py-2 pt-0'>";
echo"										<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"										<a class='btn btn-add'>最愛</a>";
echo"									</div>";
									}
echo"								</div>";
echo"							</div>";
echo"						</form>";
				}		    				
			}			
		}		    		
	}
	else if($series==NULL && $att!=NULL && $rare!=NULL){/*選att rare*/
		for($i=0;$i<sizeof($att);$i++){
			for($j=0;$j<sizeof($rare);$j++){
	            $sql = "SELECT 	*
	                    FROM	card_info
	                    WHERE 	Attribute = '$att[$i]' AND Rarity = '$rare[$j]';";							
	        
	        require_once("dbtools.inc.php");
	    	$link = create_connection();
	    	$result = execute_sql($link,"pokemon_card",$sql);		

			while($row = mysqli_fetch_array($result)){
echo"						<form method='post' action='card-info.php'>";
echo"							<div class='col mb-3'>";
echo"								<div class='card char-search-card'>";
echo"									<div class='card-header'>";
echo"										<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"										<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"									</div>";
echo"									<input type='hidden' name='search_char' value='".$search_char."'>";
echo"									<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"									<div class='card-body py-2'>";
echo"										<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"									</div>";
									if($_SESSION['islogin']){
echo"									<div class='card-footer py-2 pt-0'>";
echo"										<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"										<a class='btn btn-add'>最愛</a>";
echo"									</div>";
									}
echo"								</div>";
echo"							</div>";
echo"						</form>";
				}		    				
			}			
		}		    		
	}
	else if($series!=NULL && $att!=NULL && $rare!=NULL){/*選series att rare*/
		for($i=0;$i<sizeof($series);$i++){
			for($j=0;$j<sizeof($att);$j++){
				for($k=0;$k<sizeof($rare);$k++){
					if($series[$i]=='s4a'){
			            $sql = "SELECT 	*
			                    FROM	card_info
			                    WHERE 	Number LIKE '%$series[$i]%' AND Attribute = '$att[$j]' AND Rarity = '$rare[$k]';";
			        }

			        if($series[$i]=='s5i'){
			            $sql = "SELECT 	*
			                    FROM	card_info
			                    WHERE 	Number LIKE '%$series[$i]%' AND Attribute = '$att[$j]' AND Rarity = '$rare[$k]';";
			        }

			        if($series[$i]=='s5r'){
			            $sql = "SELECT 	*
			                    FROM	card_info
			                    WHERE 	Number LIKE '%$series[$i]%' AND Attribute = '$att[$j]' AND Rarity = '$rare[$k]';";
			        }
						        
			        require_once("dbtools.inc.php");
			    	$link = create_connection();
			    	$result = execute_sql($link,"pokemon_card",$sql);		

					while($row = mysqli_fetch_array($result)){
echo"						<form method='post' action='card-info.php'>";
echo"							<div class='col mb-3'>";
echo"								<div class='card char-search-card'>";
echo"									<div class='card-header'>";
echo"										<h3 class='mx-0 my-0'>".$row["Number"]."</h3>";
echo"										<input type='hidden' name='card_id' value='".$row["Number"]."'>";
echo"									</div>";
echo"									<input type='hidden' name='search_char' value='".$search_char."'>";
echo"									<input type='image' id='input-img' class='shadow my-3' src='http://140.128.102.212/p-img/".$row["Picture"].".png' alt=''>";
echo"									<div class='card-body py-2'>";
echo"										<h3 class='mx-0 my-0'>".$row["Name"]."</h3>";
echo"									</div>";
											if($_SESSION['islogin']){
echo"									<div class='card-footer py-2 pt-0'>";
echo"										<input type='hidden' id='card_id' value='".$row["Number"]."'>";
echo"										<a class='btn btn-add'>最愛</a>";
echo"									</div>";
											}
echo"								</div>";
echo"							</div>";
echo"						</form>";
					}		    				
				}           
			}			
		}		    				
	}
?>									
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

			$(".btn-add").click(function(){
				//var id = $(this).siblings("#card_id").val();
				//console.log(id);
				$.ajax({
					url: 'add.php',
					type: 'POST',
					data: {
						'card_id' : $(this).siblings("#card_id").val(),//siblings 取德同層級物件
						'user_id' : "<?php echo $_SESSION['userid']; ?>"
					},
					dataType: 'html'
					}).done(function (data){				
						if(data == "yes"){
							alert("已加入最愛清單");
						}
						else{							
							alert("此卡片已存在最愛清單中!!");
						}
					}).fail(function(jqXHR, textStatus, errorThrown){
						alert("有錯誤發生");
						console.log(jqXHR.reponseText);
					});	
			});
    	});		
    </script>
</body>
</html>