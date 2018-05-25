
<!DOCTYPE html> 
<html>
<head>
  <link rel="stylesheet" href="third.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
window.onload = function () {
    var sessionValue = sessionStorage.getItem("loggedin");
if(sessionStorage.getItem("loggedin") === null) {
        window.location.href="index.html";
}
    window.setTimeout(setDisabled, 60000);

}
function setDisabled() {
    document.getElementById('back').disabled = false;
}
function gotoindex()
{
sessionStorage.clear();
window.location.href="index.html";
}
function goback()
{
window.location=document.referrer;

}
</script> 

</head>
<div class="login-page">

  <div class="form">

    <img src="logo.png"  width="200" />


    <form class="login-form" method="post" enctype="multipart/form-data"  action ="second.html">

	<?php
		$ipaddress = shell_exec("grep \"acl dreamtmip src\" /etc/squid/squid.conf  |rev|cut -f2 -d' '|rev");
		if((!empty($_REQUEST['user'])))
		{
		 $user= ":".$_REQUEST["user"];
			
		}	
		$numOfPort = shell_exec("grep \"numofproxy\" /etc/squid/squid.conf  |rev|cut -f1 -d' '|rev");
		$numOfPort = $numOfPort +24000;
		for ($x = 24000; $x <= $numOfPort; $x++) {
  			  echo $_SERVER['HTTP_HOST'].":".$x.$user."<br>";
		} 
	?>
    
    </form>
  <button onclick="goback();" id="back">back</button>
      <button  onclick="gotoindex();" >exit</button>
<br>
<img src="bp.png"  width="150" />
  </div>
</div>
</html>
