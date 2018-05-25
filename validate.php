<?php


$username=$_POST["username"];
$password=$_POST["password"];
$user="boosted@boosted.com";
$pass="boosted1234";
if(strcmp($username,$user)==0 && strcmp($password,$pass)==0)
{
    echo("Yes");

}

else
{
  echo("No");
}


?>
