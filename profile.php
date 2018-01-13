<?php
if (isset($_GET["username"])) {
	$uservar =  htmlspecialchars($_GET["username"]);
} else {
	$uservar = "ewpratten";
}



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
</head>

<body>

<div class="container container-fluid">
	<div class="row">
	  <div class=" mx-auto">
	    <div class="card maincard col-ldg-12 col-md-12 col-sm-12 col-xs-12">
	      <div class="card-body">
	        

				<a href='https://devrant.com/users/<?=$uservar; ?>'>
					
					<div class="my-card"></div>
					<script src="https://devunity.herokuapp.com/apps/cards/script.js.php?class=my-card&username=<?php echo $uservar; ?>"></script>

				
				</a>
				
	      </div>
	      
	    </div>
	  </div>
	</div>
</div>
<div class="avatar"><img src="https://devrant.com/static/devrant/img/devrant-header-developer.png"></div>
</body>
