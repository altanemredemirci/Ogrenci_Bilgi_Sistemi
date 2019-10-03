<?php
error_reporting(0);
global $baglan;
include("bag.php");
session_start();
$adminno = $_SESSION['adminno'];
if ($adminno==""){
	echo "<center> <h2>Giriþ Yapýnýz!..</h2></center>";
	header("Refresh: 3; url=admin.html");
	}
	else{
echo "<table border=\"1\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"#DDDDDD\">
	<tr>
	    <td width=\"4%\" height=\"29\" bgcolor=\"#C0C0C0\" align=\"center\"><b>Numara</b></td>
	    <td width=\"30%\" height=\"29\" bgcolor=\"#C0C0C0\" align=\"center\"><b>
		Ad Soyad</b></td>
	    <td width=\"20%\" height=\"29\" bgcolor=\"#C0C0C0\" align=\"center\"><b>
		Þifre</b></td>
		<td width=\"10%\" height=\"29\" bgcolor=\"#C0C0C0\" align=\"center\"><b>Desler</b></td>
		<td width=\"30%\" height=\"29\" bgcolor=\"#C0C0C0\" align=\"center\"><b>Email 
		Adresi</b></td>
		<td colspan=\"2\" height=\"29\" bgcolor=\"#C0C0C0\" align=\"center\"><b>Kontrol</b></td>
	</tr>";
		$sor = mysql_query("SELECT * FROM bogrenci");
		while($yaz=mysql_fetch_array($sor)){
		
		$no 			= $yaz['no'];
		$adsoyad        = $yaz['adsoyad'];
     	$sifre      	= $yaz['sifre'];
		$dersler      	= $yaz['dersler'];
		$email			= $yaz['email'];
		
			
			echo "<tr>
		<td width=\"2%\" bgcolor=\"#F7F7F7\">$no</td>
		<td width=\"10%\" bgcolor=\"#F7F7F7\">$adsoyad</td>
		<td width=\"14%\" bgcolor=\"#F7F7F7\">$sifre</td>
		<td width=\"10%\" bgcolor=\"#F7F7F7\">$dersler</td>
		<td width=\"30%\" bgcolor=\"#F7F7F7\">$email</td>
		<td width=\"9%\" align=\"center\" bgcolor=\"#F7F7F7\">
		<a href=\"switch.php?Git=bUyeDuzenle&no=$no\">Düzenle</a></td>
		<td width=\"9%\" align=\"center\" bgcolor=\"#F7F7F7\">
		<a href=\"switch.php?Git=bSil&no=$no\">Sil</a></td>
	</tr>";
		}
		echo "</table><br> <center> <br> <center> <a href=\"switch.php?Git=cikis\">Çýkýþ</a>";
		
		

	}
?>