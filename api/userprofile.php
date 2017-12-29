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
