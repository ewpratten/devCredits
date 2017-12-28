<?php
$title = $_GET["title"];
$cin = $_GET['color'];
$uservar = $_GET["users"];
if ($uservar == null) {
	$uservar = "ewpratten,linuxxx,404response,thatdude";
}
$users = explode(",", $uservar);

if ($title == null) {
	$title = "devCredits";
}
if ($cin == null) {
	$cin = 1;
}

//colors:
//1 - purple
//2 - green
//3 - blue
//4 - red
//5 - yellow
//6 - orange

if ($cin == 1) { $color = "#a872a3"; }
if ($cin == 2) { $color = "#7cc8a2"; }
if ($cin == 3) { $color = "#2a8b9d"; }
if ($cin == 4) { $color = "#d55161"; }
if ($cin == 5) { $color = "#ecd175"; }
if ($cin == 6) { $color = "#f99a66"; }
?>
<head>
<title>devCredits - <?php echo $title ?></title>
<meta name="description" content="An easy way to make a credits page for devRant community projects">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet" type="text/css">
<link href="https://unpkg.com/picnic" rel="stylesheet">
<link rel="apple-touch-icon" sizes="60x60" href="/resources/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/resources/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/resources/favicon-16x16.png">
<link rel="mask-icon" href="/resources/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="style.css">
<style>body {background-color:<?php echo $color ?>; }</style>
</head>

<body>

<div class="flex one three-600 demo">
	<div><span></span></div>
	<div class="maincard">
			<h1><?php echo $title ?></h1>
			<div class="credits">Made with &#9825; by</div>
			<hr />
			<div class="flex two demo">
				<?php
				for ($i = 0; $i < count($users); $i++) {
					echo  '<a href="https://devrant.com/users/'; echo $users[$i]; echo '"><div class="user"><span><h2>'; echo $users[$i]; echo '</h2></span></div></a>';
				}
				?>
			</div>
		</div>
</div>
</body>
