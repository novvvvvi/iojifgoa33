<?php
shell_exec(": > /etc/squid/passwd");
$squidUname = "htpasswd -b /etc/squid/passwd ".$_POST["username"]." ".$_POST["password"];
shell_exec($squidUname);
echo $_POST["username"].":".$_POST["password"];
$newsedCmnd="'s/http_access allow dreamtmip/http_access allow dreamtmup/g'";
$changeipnew = "sed -i ".$newsedCmnd." /etc/squid/squid.conf";
 shell_exec($changeipnew);
exec("sudo /etc/init.d/squid restart ",$output) or die("Could not restart Squid!");
?>
