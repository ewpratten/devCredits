<?php

[B// /api/userprofile.php/?username=

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
?>

<?php
	
	$boots = "<p>The button requires <a href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css'>bootstrap</a></p>";
	
	$generated = false;
	$validLink;
	$buttonText;
	$buttonColor;
	$buttonSize;
	$hrefValue;
	if(isset($_GET['link']))
	{
		$link = $_GET['link'];
	}
	if(isset($_POST['generate']))
	{
		$generated = true;

		if(!empty($_POST['button-text'] && $_POST['button-color'] && $_POST['button-size'] && $_POST['link']))
		{
			$buttonText = $_POST['button-text'];
			$buttonColor = $_POST['button-color'];
			$buttonSize = $_POST['button-size'];
			if(checkLink($_POST['link']))
			{
				$hrefValue = $_POST['link'];
				$validLink = true;
			}
			else
			{
				$validLink = false;
			}
		}

	}


	function checkLink($link)
	{
		
		if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link))
		{
 			 if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[devdevcredits.herokuapp.com]/",$link))
 			 {
 			 	return true;
 			 }
 			 else
 			 {
 			 	return false;
 			 }
		}
		else
		{
			return  false;
		}
	}

	//remove this if passing https:// through $_GET['link']
	$link = "https://" . $link

	function button($link, $buttonText,$color, $size)
	{
		switch ($color)
    	{
    		case 'dark': ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-dark <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots; ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-dark <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;

    		case 'blue': ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-primary <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-primary <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;

    		case 'red': ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-danger <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-danger <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;

    		case 'green': ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-success <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-success <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;

    		case 'grey': ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-secondary btn-lg" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-secondary <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;

    		case 'orange': ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-warning <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-warning <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;

    		case 'white': ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-light <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-white <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;
    		
    		default: ?>
    			<xmp><a href="<?php echo $link; ?>" class="btn btn-outline-dark <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a></xmp>
    			<?php echo $boots ?>
	        	<p>Your button will look like this</p><br/>
	        	<a href="<?php echo $link; ?>" class="btn btn-outline-dark <?php echo $size; ?>" role="button" aria-disabled="true"><?php echo $buttonText; ?></a>
    			<?php break;
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
	        
	        <?php if($generated): ?>
	        	<?php if($validLink): ?>
				<div class="alert alert-success" role="alert">
				  Button generated
				</div>
				<?php else: ?>
	        	<div class="alert alert-danger" role="alert">
				  Invalid url provided
				</div>
	        	<?php endif; ?>
	        <?php endif; ?>
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
					  <div class="col">
					  	<label for="button-size">Choose button size</label>
					    <select class="form-control" id="button-size" name="button-size" required>
					      <option value=""> -- Choose size -- </option>
					      <option value="btn-sm">Small</option>
					      <option value="btn-lg">Large</option>
					      <input type="hidden" name="link" value="<?php echo $link; ?>"></input>
					    </select>
					  </div>
	        			
	        		</div>
				  <input type="submit" name="generate" class="btn btn-dark" value="Generate"/>
				</form>
	        </div>

	        <?php if($generated): ?>
	        	<?php if($validLink): ?>
		        <div class="generated-content text-center">
		        	<code>Paste the following code in your html to get your button working</code>
		        	<?php
		        	button($hrefValue, $buttonText,$buttonColor,$buttonSize);
		        	?>
		        	<br/>
		        </div>
		    <?php endif; ?>
		     <?php endif; ?>
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
