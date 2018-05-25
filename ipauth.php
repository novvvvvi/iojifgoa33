<?php


$ipfromsquid = shell_exec("grep \"acl dreamtmip src\" /etc/squid/squid.conf  |rev|cut -f1 -d' '|rev"); $trimmed = trim($ipfromsquid);
$sedCmnd="'s/".$trimmed."/".$_POST["newipconfig"]."/g'";

$changeip = "sed -i ".$sedCmnd." /etc/squid/squid.conf";
 shell_exec($changeip);
$newsedCmnd="'s/dreamtmup/dreamtmip/g'";
$changeipnew = "sed -i ".$newsedCmnd." /etc/squid/squid.conf";
shell_exec($changeipnew);

$newsedCmnd="'s/acl dreamtmip proxy_auth REQUIRED/acl dreamtmup proxy_auth REQUIRED/g'";
$changeipnew = "sed -i ".$newsedCmnd." /etc/squid/squid.conf";
shell_exec($changeipnew);
exec("sudo /etc/init.d/squid restart",$output) or die("Could not restart Squid!");
echo $output;
echo "sriya";
?>
