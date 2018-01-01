<?php
// /api/userprofile.php/?username=
if (isset($_GET["title"])) {
	$title = htmlspecialchars($_GET["title"]);
} else {
	$title = "devCredits";
}
if (isset($_GET["p"])) {
	$preset = htmlspecialchars($_GET["p"]);
}
if (isset($_GET["animation"])) {
	$bgIsAnimated = htmlspecialchars($_GET["animation"]);
} else {
	$bgIsAnimated = "false";
}
if (isset($_GET["heart"])) {
	$heartstyle = htmlspecialchars($_GET["heart"]);
} else {
	$heartstyle = "filled";
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
$_SESSION['bgIsAnimated'] = $bgIsAnimated;
if (isset($_GET["users"])) {
	$uservar =  htmlspecialchars($_GET["users"]);
	$uservar = str_replace(" ", "", $uservar);
} else {
	$uservar = "ewpratten,utwo,linuxxx,HAlex,Bindview,jay97,hacker,norom";
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
 
 function userispp($u){
 // check if the user is devrant ++ member. if they are, return true
 //https://skayo.2ix.at/DevRantStats/api/getUserInfo.php?username=
 
 $apiu = "https://skayo.2ix.at/DevRantStats/api/getUserInfo.php?username=" . $u;
 $apir = file_get_contents($apiu);
 $uresp = '{"success":false,"reason":"User not found"}';
 if ($apir == $uresp) {
 	return false;
 } else {
 	return true;
 }
 }
 
 if ($heartstyle == "open") {
 	$hs = "fa-heart-o";
 } else {
 	$hs = "fa-heart";
 }
 
 //preset loading code will go here
	if (isset($perset)) {
		if ($_GET['m'] == "local") {
			$root = "http://localhost:8088/?";
		} else {
			$root = "httpe://devcredits.herokuapp.com/?";
		}

		$presetFileContents = file_get_contents("./presets/" . $preset);
		$rdir = $root; $rdir += $presetFileContents;

		
	}
 //end preset loading code
 
 //adds ascii are banner to top of html file
 $htmlbanner = file_get_contents("banners/asciibanner.txt");
 echo $htmlbanner;
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
<?php //gotta have them easter eggs!! ?>
<script src="jsconsole.js"></script>
</head>

<body>

<div class="container container-fluid">
	<div class="row">
	  <div class=" mx-auto">
	    <div class="card maincard col-ldg-12 col-md-12 col-sm-12 col-xs-12">
	      <div class="card-body">
	        <h1 class="card-title text-center"><?=$title ?></h1>
	        <div class="card-text text-center">
	        	<?=$stext; ?>
	        </div>
	        <div class="credits card-text text-center">
	        	Made with <i class="fa <?=$hs; ?>"></i> by
	        </div>
	        <hr/>
	      	<?php foreach ($users as $user):?>
					<?php if (user_exists($user)):?>
				<a href='https://devrant.com/users/<?=$user?>'>
					<div class='user'>
						<h2><?=$user?><?php if (userispp($user) == true) { echo ' ++'; } ?></h2>
					</div>
				</a>
				<?php endif; ?>
				<?php endforeach; ?>
				
	      </div>
	      <div class="dc"><a href="https://devcredits.herokuapp.com/" class="dcc">devCredits</a></div>
	    </div>
	  </div>
	</div>
</div>
<div class="avatar"><img src="https://devrant.com/static/devrant/img/devrant-header-developer.png"></div>
</body>
