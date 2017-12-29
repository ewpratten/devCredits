<?php
// /api/userprofile.php/?username=
if (isset($_GET["title"])) {
	$title = htmlspecialchars($_GET["title"]);
} else {
	$title = "devCredits";
}
if (isset($_GET["subtext"])) {
	$stext = htmlspecialchars($_GET["subtext"]);
} else {
	$stext = "An easy way to credit people from the devRant community";
}
if (isset($_GET["color"])) {
	$cin = filter_input(INPUT_GET, 'color', FILTER_SANITIZE_NUMBER_INT);
} else {
	$cin = 2;
}
session_start();
$_SESSION['mainColor'] = $cin;
if (isset($_GET["users"])) {
	$uservar =  htmlspecialchars($_GET["users"]);
	$uservar = str_replace(" ", "", $uservar);
} else {
	$uservar = "ewpratten,utwo,linuxxx,HAlex,Bindview,jay97";
}
$users = explode(",", $uservar);

/* if youget some err or users don't show
   that means that the host (herokuapp)
   doesn't have curl installd */
function user_exists($username) {
	$url="https://devrant.com/users/$username";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, '60'); // in seconds
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($ch);
    // devRant.com reditrect to its homepage if user doesn't exist
    if(curl_getinfo($ch)['url'] == $url){
        return 1;
    } return 0;
}

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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="/style.css">

<!-- Use set color to dynamically change the theme -->
<link rel="stylesheet" type="text/css" href="style.php">

</head>

<body>


	<div class="row">
	  <div class=" mx-auto">
	    <div class="card col-md-12 col-sm-4 col-xs-4">
	      <div class="card-body mx-auto">
	        <h1 class="card-title text-center"><?=$title ?></h1>
	        <div class="card-text text-center">
	        	<?=$stext; ?>
	        </div>
	        <div class="credits card-text text-center">
	        	Made with <i class="fa fa-heart"></i> by
	        </div>
	        <hr/>
<?php foreach ($users as $user):?>
<?php if (user_exists($user)):?>
				<a href='https://devrant.com/users/<?=$user?>'>
					<div class='user'>
						<h2><?=$user?></h2>
					</div>
				</a>
<?php endif; ?>
<?php endforeach; ?>
	      </div>
	    </div>
	  </div>
	</div>

<!-- OLD CARD BACKUP -->
<!-- <div class="flex one three-1000 demo">
	<div><span></span></div>
	<div class="maincard">
			<h1><?php echo $title ?></h1>
			<h4><?php echo $stext ?></h4>
			<br />
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
</div> -->
</body>