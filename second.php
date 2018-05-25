<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="index.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="second.js"></script>


</head>
<div class="login-page">

  <div class="form">

    <img src="logo.png" width="200" />
	<p><h3>Proxies Config</h3> </p>
    <form class="login-form">
    <label style ="text-align: left;float: left;color:#FFFFFF;font: normal 12px Helvetica Neue !important;">Settings :</label>
        <select id="age" name="age" class = "form-control" style ="color:white">
            <option value="1">USER:PASSWORD AUTHORIZE</option>
          <!--  <option value="2">RESET PROXIES</option> -->
            <option value="3">IP AUTHORIZE</option>   
        </select>
   <p></p><br> 

    <form class="login-form" method="post" enctype="multipart/form-data"  action ="third.php">


       <div id="first">

    <label style ="text-align: left;float: left;color:#FFFFFF;font: normal 12px Helvetica Neue !important;" >UserName:  ( 7 alphabets lowercase)</label>
            <input type="text" id="username" STYLE='color:#FFFFFF' class ="form-control"/>
       
    <label style ="text-align: left;float: left;color:#FFFFFF;font: normal 12px Helvetica Neue !important;">Password:  ( 8 characters lowercase)</label>
            <input type="text" id="password" STYLE='color:#FFFFFF'   class ="form-control"/>
        <p></p><br>
         <button type ="button" id="newusepass">send</button> 

        </div>
      

      
     <!--
       <div id="second" >
        <p>You can reset your proxies using this method.
        </p>
        <p>If proxies are failing </br> please check your IP or USER:PASS </br> is it same as Current Authorized
        </p>
       
         <button type ="button" id ="reset" name ="reset">send</button> 
        
    </div> -->

        
     
       <div id="third">
        <p>
    <label style ="text-align: left;float: left;color:#898281;font: normal 12px Helvetica Neue !important;color:#FFFFFF;">New IP Address :</label>

            <input type="text" id ="newip" name ="newip" class ="form-control" style ="color:#FFFFFF;"/>
        </p>
        <p>
          &nbsp;
        </p>
         <button type ="button" id ="ipcon" name ="ipcon" >send</button>
</div>
    </form>
<p></p><br>
	<label style="color:white"> Current Authorized</label>
<br>	
<label style ="font-size: 24px;
    color: white;
    font-weight: bold;margin-bottom: 0px;"><?php
                
		$var =shell_exec("grep \"http_access allow dreamtmup\" /etc/squid/squid.conf  |rev|cut -f1 -d' '|rev");	
		if(empty($var)){		
		$ipaddress = shell_exec("grep \"acl dreamtmip src\" /etc/squid/squid.conf  |rev|cut -f1 -d' '|rev");
		echo $ipaddress;
		}
		else
		{
			 $ipaddress = "USER:PASS";
                echo $ipaddress;
		}
		?></label>
</div>
</div>

</html>
