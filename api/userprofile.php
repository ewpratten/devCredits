
<canvas id="profile" width="400" height="400" style="">
<script>
var canvas = document.getElementById("profile");
var ctx = canvas.getContext("2d");
context.rect(76, 58, 359, 177);
context.moveTo(130.5, 112.5 - 36.5);
context.bezierCurveTo(130.5 + (0.5522847498307936 * 36.5), 112.5 - 36.5,  130.5 + 36.5, 112.5 - (0.5522847498307936 * 36.5), 130.5 + 36.5, 112.5);
context.bezierCurveTo(130.5 + 36.5, 112.5 + (0.5522847498307936 * 36.5), 130.5 + (0.5522847498307936 * 36.5), 112.5 + 36.5, 130.5, 112.5 + 36.5);
context.bezierCurveTo(130.5 - (0.5522847498307936 * 36.5), 112.5 + 36.5, 130.5 - 36.5, 112.5 + (0.5522847498307936 * 36.5), 130.5 - 36.5, 112.5);
context.bezierCurveTo(130.5 - 36.5, 112.5 - (0.5522847498307936 * 36.5), 130.5 - (0.5522847498307936 * 36.5), 112.5 - 36.5, 130.5, 112.5 - 36.5);
context.moveTo(202,96);
context.lineTo(402,95);
</script>
<canvas id="banner" width="400" height="400" style="border-radius:100%;">
Your browser does not support the canvas element.
</canvas>
<script>
function banner(username,text){
	fetch("https://devrant.com/api/get-user-id?app=3&username="+username).then(function(response) {
  		return response.json()
	}).then(function(data){
		return fetch("https://www.devrant.io/api/users/"+data.user_id+"?app=3&plat=2&content=all&skip=0");
	}).then(function(resp){
		return resp.json()
	}).then(function(user){
		var canvas = document.getElementById("banner");
		var ctx = canvas.getContext("2d");
		var image = new Image();
		ctx.textAlign = "center";
		ctx.fillStyle = "white";
		ctx.textBaseline = 'middle';
		canvas.style.backgroundColor = "#"+user.profile.avatar.b;
		ctx.font = "50px Arial";

		image.src = 'https://avatars.devrant.com/'+user.profile.avatar.i;
		image.onload = function(){
    		ctx.drawImage(image, 69, 70, 300,300);
  		}


	})
}
  
  banner("<?php echo $_GET['username']?>", "leave this blank");
</script>
=======
<canvas id="banner" width="400" height="400" style="border-radius:100%;">
Your browser does not support the canvas element.
</canvas>
<script>
function banner(username,text){
	fetch("https://devrant.com/api/get-user-id?app=3&username="+username).then(function(response) {
  		return response.json()
	}).then(function(data){
		return fetch("https://www.devrant.io/api/users/"+data.user_id+"?app=3&plat=2&content=all&skip=0");
	}).then(function(resp){
		return resp.json()
	}).then(function(user){
		var canvas = document.getElementById("banner");
		var ctx = canvas.getContext("2d");
		var image = new Image();
		ctx.textAlign = "center";
		ctx.fillStyle = "white";
		ctx.textBaseline = 'middle';
		canvas.style.backgroundColor = "#"+user.profile.avatar.b;
		ctx.font = "50px Arial";

		image.src = 'https://avatars.devrant.com/'+user.profile.avatar.i;
		image.onload = function(){
    		ctx.drawImage(image, 69, 70, 300,300);
  		}


	})
}
  
  banner("<?php echo $_GET['username']?>", "leave this blank");
</script>
