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

<?php
	
	$generated = false;
	$buttonText;
	$buttonColor;
	if(isset($_POST['generate']))
	{
		$generated = true;

		if(!empty($_POST['button-text'] && $_POST['button-color']))
		{
			$buttonText = $_POST['button-text'];
			$buttonColor = $_POST['button-color'];
		}

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

<div class="container ">
	<div class="row">
	  <div class=" mx-auto">
	    <div class="card maincard col-ldg-12 col-md-12 col-sm-12 col-xs-12">
	      <div class="card-body">
	        <h1 class="card-title text-center"><?php echo $title ?></h1>
	        <div class="card-text text-center">
	        	<?php echo $stext; ?>
	        </div>
	        
	        <div class="form-control input-content">
	        	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	        		<div class="row">
					  <div class="col">
					  	<label for="button-text">Button title</label>
					    <input type="text" class="form-control" id="button-text" name="button-text" aria-describedby="button-text-help" placeholder="Enter text" required>
					    <small id="button-text-help" class="form-text text-muted">Enter the text that you want on your button</small>
					  </div>
					  <div class="col">
					  	<label for="button-color">Choose color</label>
					    <select class="form-control" id="button-color" name="button-color" required>
					      <option value=""> -- Choose color -- </option>
					      <option value="dark">Dark</option>
					      <option value="blue">Blue</option>
					      <option value="red">Red</option>
					      <option value="green">Green</option>
					      <option value="grey">Grey</option>
					      <option value="orange">Orange</option>
					      <option value="white">White</option>
					    </select>
					  </div>
	        			
	        		</div>
				  <input type="submit" name="generate" class="btn btn-dark" value="Generate"/>
				</form>
	        </div>

	        <?php if($generated): ?>
		        <div class="generated-content text-center">
		        	<code>Paste the following code in your html to get your button working</code>
		        	<?php switch ($buttonColor) 
		        	{
		        		case 'dark': ?>
		        			<xmp><a href="#" class="btn btn-outline-dark btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-dark btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;

		        		case 'blue': ?>
		        			<xmp><a href="#" class="btn btn-outline-primary btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-primary btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;

		        		case 'red': ?>
		        			<xmp><a href="#" class="btn btn-outline-danger btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-danger btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;

		        		case 'green': ?>
		        			<xmp><a href="#" class="btn btn-outline-success btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-success btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;

		        		case 'grey': ?>
		        			<xmp><a href="#" class="btn btn-outline-secondary btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-secondary btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;

		        		case 'orange': ?>
		        			<xmp><a href="#" class="btn btn-outline-warning btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-warning btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;

		        		case 'white': ?>
		        			<xmp><a href="#" class="btn btn-outline-light btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-white btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;
		        		
		        		default: ?>
		        			<xmp><a href="#" class="btn btn-outline-dark btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
				        	<p>Your button will look like this</p><br/>
				        	<a href="#" class="btn btn-outline-dark btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
		        			<?php break;
		        	} ?>
		        	
		        	<br/>
		        </div>
		     <?php endif; ?>


	        <div class="credits card-text text-center">
	        	Made with <i class="fa fa-heart"></i> by
	        </div>
	        <hr/>
	        <?php foreach ($users as $user):?>
				<a href='https://devrant.com/users/<?=$user?>'>
					<div class='user'>
						<h2><?=$user?></h2>
					</div>
				</a>
			<?php endforeach; ?>
	      </div>
	    </div>
	  </div>	
	</div>	
</div>


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
