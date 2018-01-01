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
    $uservar = htmlspecialchars($_GET["users"]);
    $uservar = str_replace(" ", "", $uservar);
} else {
    $uservar = "ewpratten,utwo,linuxxx,HAlex,Bindview,jay97,hacker,norom,stiaanvm";
}
$users = explode(",", $uservar);

global $userimg, $userback, $spuser;

function loadvars($u) {
    global $userimg, $userback, $spuser;

    $useridcheck = json_decode(file_get_contents("https://devrant.com/api/get-user-id?app=3&username=" . $u), true);
    $userid = $useridcheck["user_id"];
    $apiu = "https://www.devrant.io/api/users/" . $userid . "?app=3&plat=2&content=all&skip=0";
    $apir = file_get_contents($apiu);
    $jsondata = json_decode($apir, true);
    if ($jsondata['success'] === true) {
        $userimg = "https://avatars.devrant.com/" . $jsondata['profile']['avatar']["i"];
        $userback = "#" . $jsondata['profile']['avatar']["b"];
        if ($jsondata['profile']['dpp'] === 1) {
            $spuser = true;
        } else {
            $spuser = false;
        }
        return true;
    } else {
        return false;
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
    $rdir = $root;
    $rdir += $presetFileContents;
}
//end preset loading code
//adds ascii are banner to top of html file
$htmlbanner = file_get_contents("banners/asciibanner.txt");
echo $htmlbanner;
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>devCredits - <?= $title ?></title>
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
    <?php //gotta have them easter eggs!!    ?>
    <script src="jsconsole.js"></script>
</head>

<body>

    <div class="container container-fluid">
        <div class="row">
            <div class=" mx-auto">
                <div class="card maincard col-ldg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-body">
                        <h1 class="card-title text-center"><?= $title ?></h1>
                        <div class="card-text text-center">
                            <?= $stext; ?>
                        </div>
                        <div class="credits card-text text-center">
                            Made with <i class="fa <?= $hs; ?>"></i> by
                        </div>
                        <hr/>
                        <?php foreach ($users as $user): ?>
                            <?php if (loadvars($user)): ?>
                                <a href='https://devrant.com/users/<?= $user ?>'>
                                    <div class='user'>
                                        <h2><img class="useravatar" src ="<?php echo $userimg ?>" /><?= $user ?><?php
                                            if ($spuser) {
                                                echo '<i class="pp"> ++</i>';
                                            }
                                            ?>
                                        </h2>
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
