<?php
if (isset($_GET["username"])) {
	$username = htmlspecialchars($_GET["username"]);
}

function userispp($u){
 $apiu = "https://skayo.2ix.at/DevRantStats/api/getUserInfo.php?username=" . $u;
 $apir = file_get_contents($apiu);
 $uresp = '{"success":false,"reason":"User not found"}';
 if ($apir == $uresp) {
 	return false;
 } else {
 	return true;
 }
 }
 
 if (userispp($username) == true){ $ispp = "true"; } else { $ispp = "false"; }
//{"success":false,"reason":"User not found"}
//output
echo '{"username" : "' . $username . '", "membership" : ' . $ispp . '}';
?>