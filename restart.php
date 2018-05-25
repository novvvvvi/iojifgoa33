<?php
exec("sudo /etc/init.d/squid restart",$output) or die("Could not restart Squid!");
?>
