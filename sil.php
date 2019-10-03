<?php
include("bag.php");
session_start();
$ogretmenno = $_SESSION['ogretmenno'];
error_reporting(0);
$sor=mysql_query("select ders from ogretmen where no='$ogretmenno'");
			   $ders=mysql_fetch_array ($sor);
$dizinadi="upload/$ders[0]/";

$dizin=opendir($dizinadi);

while(gettype($isim=readdir($dizin))!=boolean)

{

@unlink("$dizinadi$isim");

}
echo'Önbellek Temizlendi...';
closedir($dizin);
header("Refresh: 3; url=ogretmen.php");
?>