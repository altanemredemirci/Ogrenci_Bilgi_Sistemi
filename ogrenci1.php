<?php

include("bag.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="as.css" type="text/css" />
    <title>ÖGRENCÝ BÝLGÝ SÝSTEMÝ</title>
	<script src="js/as.js" type="text/javascript"></script>
  </head>
<body>
<div id="ogrencihesap">
<section id="giris_alani_kayit">
<ul id="menu"> <?php session_start();
$ogno = $_SESSION['ogno'];
?>
	<li><a href="switch.php?Git=cikis" >Gazi Üniversitesi Bilgi Sistemi</a></li>
   
    <li> <a href=""><?php echo $ogno;?></a>
    <ul>
			<li><a href="sfr.php?Git=ogrenci">Sifre Deðiþtirme</a></li>
			
		</ul>	</li>
	<li>
		<a href="">Derslerim</a>
         <?php		$sonuc = mysql_query("select d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12 from dersler where no='$ogno'");


while ($verigetir=mysql_fetch_array ($sonuc)) {


?> <ul> <?php for($i=0; $i<12; $i++){ 
		if($verigetir[$i]){ 
		?>
        
        <li> 
			<?php echo'<a href="ogrenci.php?Git='.$verigetir[$i].'">'  ?> <?php   echo $verigetir[$i] ?></a></li> <?php }}} ?> </ul> 					
    </li> 
    <li>
		<a href="">E-Maillerim</a>
			<ul>
			<li><a href="http://www.hotmail.com">Hotmail</a></li>
			<li><a href="http://mail.google.com/">Gmail</a></li>
            <li><a href="https://login.yahoo.com/config/mail?&.src=ym&.intl=tr">Yahoo!</a></li>
            <li><a href="https://gunet.gazi.edu.tr/">Gazi Mail</a></li>
		</ul>	
	</li>		
 
	
</ul>
<?php 
$secim = $_GET['Git'];
if($secim){
	?>  <br><br><font size="4" face="Action Man Extended" color="#0033FF"><center>ÖDEVLERINIZ:</center></font> <br> <br>
    
	
<?php
if($_SESSION['ogno']){	
$path = "upload/$secim/";
echo "<font color='#770000' size='4'><b><center>$secim</center></b></font><br>";
// Open the folder
$dir_handle = @opendir($path) or die("Unable to open $path");

// Loop through the files
while ($file = readdir($dir_handle)) {

if($file == "." || $file == ".." || $file == "ogrenci.php" )

continue;
echo "<a href='upload/$secim/$file'>$file</a> <br />";

}}
else 
echo "GÝriþ Yapmadýnýz Dosyalarý Göremezsiniz";

closedir($dir_handle);}
?>
</section>
</div>
</body>
</html>
