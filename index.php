<?php

// /api/userprofile.php/?username=

if (isset($_GET["title"])) {
	$title = htmlspecialchars($_GET["title"]);
} else {
	$title = "devCredits";
}

if (isset($_GET["color"])) {
	$cin = filter_input(INPUT_GET, 'color', FILTER_SANITIZE_NUMBER_INT);
} else {
	$cin = 1;
}

session_start(); 
$_SESSION['mainColor'] = $cin;

if (isset($_GET["users"])) {
	$uservar =  htmlspecialchars($_GET["users"]);
	$uservar = str_replace(" ", "", $uservar);
} else {
	$uservar = "ewpratten,utwo,linuxxx,HAlex,Bindview";
}
$users = explode(",", $uservar);

?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>devCredits - <?=$title ?></title>
<meta name="description" content="An easy way to make a credits page for devRant community projects">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet" type="text/css">
<link href="https://unpkg.com/picnic" rel="stylesheet">
<link rel="apple-touch-icon" sizes="60x60" href="/resources/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/resources/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/resources/favicon-16x16.png">
<link rel="mask-icon" href="/resources/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="style.css">

<!-- Use set color to dynamically change the theme -->
<link rel="stylesheet" type="text/css" href="style.php">

</head>

<body>

<div class="flex one three-600 demo">
	<div><span></span></div>
	<div class="maincard">
			<h1><?php echo $title ?></h1>
			<div class="credits">Made with &#9825; by</div>
			<hr />
			<div class="flex two demo">
<?php foreach ($users as $user):?>
				<a href='https://devrant.com/users/<?=$user?>'>
					<div class='user'>
						<span><h2><?=$user?></h2></span>
					</div>
				</a>
<?php endforeach; ?>
			</div>
		</div>
</div>
</body>
