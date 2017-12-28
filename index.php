<?php
$title = $_GET["title"];

$uservar = $_GET["users"];
if ($uservar == null) {
	$uservar = "ewpratten,linuxxx,404response,thatdude";
}
$users = explode(",", $uservar);

if ($title == null) {
	$title = "devCredits";
}

?>
<head>
<title>devCredits - <?php echo $title ?></title>
<meta name="description" content="An easy way to make a credits page for devRant community projects">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet" type="text/css">
<link href="https://unpkg.com/picnic" rel="stylesheet">
<style>
	body {
		background-color:#a872a3;
		font-family: Comfortaa;
		font-weight: normal;
		margin:0;
	}
	h1 {
		font-weight: normal;
    color: #54556E;
    font-family: Comfortaa;
	}
	.maincard {
		background-color:#ffffff;
		height:100%;
		margin:0;
	}
	.user:hover, a:hover {
		background-color:#2a8b9d;
		font-weight: normal;
    color: #FFFFFF;
    font-family: Comfortaa;
	}
	.user {
		margin:0;
		padding:0;
	}
	.line {
		background-color:#54556E;
		width:96%;
		height:1px;
		display:flex;
		margin-left:auto;
		margin-right:auto;
	}
</style>
</head>
<body>


<div class="flex one three-600 demo">
	<div><span></span></div>
	<div style="text-align:center;" class="maincard"><span>
				<br>
				<h1><?php echo $title ?></h1>
				<div class="line"></div>
				<div class="flex two demo">
				<?php
				for ($i = 0; $i <= count($users); $i++) {
					echo  '<a href="https://devrant.com/users/'; echo $users[$i]; echo '"><div class="user"><span><h2>'; echo $users[$i]; echo '</h2></span></div></a>';
				}
				?>
				</div>
	</span></div>
	<div><span></span></div>
</div>
</body>
