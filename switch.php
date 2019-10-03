<?php
 
error_reporting(0);
include("bag.php");

Function ogrncgiris (){
ob_start(); session_start();
$ogno = $_POST["ogno"];
$ogsifre = $_POST["ogsifre"];
if(($ogno=="") or ($ogsifre=="")){
echo "<center> <h2>Öðrenci numaranýzý veya Þifrenizi Yazmadýnýz</h2></center>";
header("Refresh: 3; url=ogrencigiris.php");
}
else {
$sor = mysql_query("SELECT no,sifre FROM ogrenci WHERE no='$ogno' and sifre='$ogsifre'");
$_SESSION['ogno'] = $ogno;
$_SESSION["login"] = "true";
if(mysql_num_rows($sor)>0){
header("location:ogrenci.php");
}
else{
echo "<center><h1>HATA!...</h1>Yanlýþ Giriþ Yaptýnýz";
header("Refresh: 3; url=ogrencigiris.php");
}
}
}
Function ogretmengiris (){
ob_start(); session_start();
$ogretmenno = $_POST["ogretmenno"];
$ogretmensifre = $_POST["ogretmensifre"];

if(($ogretmenno=="") or ($ogretmensifre=="")){
echo "<center> <h2>Öðretmen numaranýzý veya Þifrenizi Yazmadýnýz</h2></center>";
header("Refresh: 3; url=ogretmengiris.php");
}
else {
$sor = $sql_check = mysql_query("select * from ogretmen where no='".$ogretmenno."' and sifre='".$ogretmensifre."' ");
$_SESSION['ogretmenno'] = $ogretmenno;
if(mysql_num_rows($sor)>0){
header("location:ogretmen.php");
}
else{
echo "<center><h1>HATA!...</h1>Yanlýþ Giriþ Yaptýnýz";
header("Refresh: 3; url=ogretmengiris.php");
}
}
}

Function admingiris (){
ob_start(); session_start();
$adminno = $_POST["adminno"];
$adminsifre = $_POST["adminsifre"];
if(($adminno=="") or ($adminsifre=="")){
echo "<center> <h2>Admin numaranýzý veya Þifrenizi Yazmadýnýz</h2></center>";
header("Refresh: 3; url=admin.html");
}
else if ($adminno=='68710217002' and $adminsifre=='04121989') {
$_SESSION['adminno'] = $adminno;
$_SESSION["login"] = "true";
	header("location:admin1.html");
	}
else{
echo "<center><h1>HATA!...</h1>Yanlýþ Giriþ Yaptýnýz";
header("Refresh: 3; url=admin.html");
}

}


Function bogrencikaydet(){
global $baglan;

  $ogno = $_POST["ogno"];
  $adsoyad = $_POST["adsoyad"];
  $onay = $_POST["onay"];
  $ogsifre = $_POST["ogsifre"];
  $ogsifre1 = $_POST["ogsifre1"];
  $email = $_POST["email"];
if(($ogno=="") or ($adsoyad=="") or ($ogsifre=="") or ($ogsifre1=="") or ($email=="")){

echo "<center> <h2>Kayýtta Lütfen Boþ Alan Býrakmayýn</h2></center>";
header("Refresh: 3; url=bogrencikayit.html");
}
else if($ogsifre!=$ogsifre1){
echo "<center> <h2>Girdiðiniz Sifreler Uyuþmamaktadýr..</h2></center>";
header("Refresh: 3; url=bogrencikayit.html");
 	}
else{

	$sor = mysql_query("SELECT no,email FROM bogrenci WHERE no='$ogno' or email='$email'");
	$sor = mysql_query("SELECT no FROM ogrenci WHERE no='$ogno'");
	$sor = mysql_query("SELECT no FROM dersler WHERE no='$ogno'");
if(mysql_num_rows($sor)>0){
echo "<center><h1>HATA!...</h1><br>Öðrenci numarasý veya email kullanýlýyor.";
header("Refresh: 2; url=bogrencikayit.html");}
    else {
      $dersler = implode($_POST['onay'],', ');
	$ekle=mysql_query("insert into bogrenci(no,adsoyad,sifre,dersler,email) values('$ogno','$adsoyad','$ogsifre','$dersler','$email')");
	mysql_query("insert into ogrenci(no,sifre) values('$ogno','$ogsifre')");
    
	$ders= implode($_POST['onay'],',');
    $dizi=explode(",",$ders);
    mysql_query("insert into dersler(no,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12) values('$ogno','$dizi[0]','$dizi[1]','$dizi[2]','$dizi[3]','$dizi[4]','$dizi[5]','$dizi[6]','$dizi[7]','$dizi[8]','$dizi[9]','$dizi[10]','$dizi[11]')");
  
		
	if($ekle){
	    $_SESSION['ogno'] = $ogno;
		echo "Sayýn ".$adsoyad." Kaydýnýz Yapýlmýþtýr<br>Bilgileriniz Aþaðýdaki gibidir.<br>";
		echo "Öðrenci Numaranýz : ".$ogno."<br>";
		echo "Adýnýz Soyadýnýz : ".$adsoyad."<br>";
		echo "Öðrenci Þifreniz : ".$ogsifre."<br>";
		echo "Email Adresiniz : ".$email."<br>";
		 header("Refresh: 4; url=ogrencigiris.php");
	}else{
	
	echo "Hata ! <br>Üye Kaydý yapýlamýyor";
	header("Refresh: 2; url=bogrencikayit.html");
	}


}
}
}
Function eogrencikaydet(){
global $baglan;

  $ogno = $_POST["ogno"];
  $adsoyad = $_POST["adsoyad"];
  $onay = $_POST["onay"];
  $ogsifre = $_POST["ogsifre"];
  $ogsifre1 = $_POST["ogsifre1"];
  $email = $_POST["email"];
if(($ogno=="") or ($adsoyad=="") or ($ogsifre=="") or ($ogsifre1=="") or ($email=="")){

echo "<center> <h2>Kayýtta Lütfen Boþ Alan Býrakmayýn</h2></center>";
header("Refresh: 3; url=eogrencikayit.html");
}
else if($ogsifre!=$ogsifre1){
echo "<center> <h2>Girdiðiniz Sifreler Uyuþmamaktadýr..</h2></center>";
header("Refresh: 3; url=eogrencikayit.html");
 	}
else{

	$sor = mysql_query("SELECT no,email FROM eogrenci WHERE no='$ogno' or email='$email'");
	$sor = mysql_query("SELECT no FROM ogrenci WHERE no='$ogno'");
	$sor = mysql_query("SELECT no FROM dersler WHERE no='$ogno'");
if(mysql_num_rows($sor)>0){
echo "<center><h1>HATA!...</h1><br>Öðrenci numarasý veya email kullanýlýyor.";
header("Refresh: 2; url=eogrencikayit.html");}
    else {
      $dersler = implode($_POST['onay'],', ');
	$ekle=mysql_query("insert into eogrenci(no,adsoyad,sifre,dersler,email) values('$ogno','$adsoyad','$ogsifre','$dersler','$email')");
	mysql_query("insert into ogrenci(no,sifre) values('$ogno','$ogsifre')");
    
	$ders= implode($_POST['onay'],',');
    $dizi=explode(",",$ders);
    mysql_query("insert into dersler(no,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12) values('$ogno','$dizi[0]','$dizi[1]','$dizi[2]','$dizi[3]','$dizi[4]','$dizi[5]','$dizi[6]','$dizi[7]','$dizi[8]','$dizi[9]','$dizi[10]','$dizi[11]')");
  
		
	if($ekle){
	    $_SESSION['ogno'] = $ogno;
		echo "Sayýn ".$adsoyad." Kaydýnýz Yapýlmýþtýr<br>Bilgileriniz Aþaðýdaki gibidir.<br>";
		echo "Öðrenci Numaranýz : ".$ogno."<br>";
		echo "Adýnýz Soyadýnýz : ".$adsoyad."<br>";
		echo "Öðrenci Þifreniz : ".$ogsifre."<br>";
		echo "Email Adresiniz : ".$email."<br>";
		 header("Refresh: 4; url=ogrencigiris.php");
	}else{
	
	echo "Hata ! <br>Üye Kaydý yapýlamýyor";
	header("Refresh: 2; url=eogrencikayit.html");
	}


}
}
}
Function sifredegistirme1(){
global $baglan;
session_start(); ob_start();
$ogretmenno = $_SESSION['ogretmenno'];
$ogretmensifre = $_POST["ogretmensifre"];
$ogretmensifre1 = $_POST["ogretmensifre1"];
$ogretmensifre2 = $_POST["ogretmensifre2"];
$sonuc = mysql_query("SELECT sifre FROM ogretmen WHERE no='$ogretmenno'");
$ogrtsifre = mysql_fetch_array($sonuc);
if(($ogretmensifre=="") or ($ogretmensifre1=="") or ($ogretmensifre2=="")){

echo "<center> <h2>Lütfen Boþ Alan Býrakmayýn</h2></center>";
header("Refresh: 3; url=sfr.php?Git=ogretmen");
}
else if($ogrtsifre[0]!=$ogretmensifre){
	echo "<center> <h2>Eski Þifrenizi Yanlýþ Girdiniz..</h2></center>";
header("Refresh: 3; url=sfr.php?Git=ogretmen");
	}
else if($ogretmensifre1!=$ogretmensifre2){
echo "<center> <h2>Girdiðiniz Þifreler Uyuþmamaktadýr..</h2></center>";
header("Refresh: 3; url=sfr.php?Git=ogretmen");
 	}
else{

mysql_query("update ogretmen set sifre ='$ogretmensifre1' where no='$ogretmenno'");
echo "<center> <h2>Þifreniz Baþarýyla Deðiþtirilmiþtir...</h2></center>";
header("Refresh: 3; url=ogretmen.php");
	
	}	
	
	
}

Function sifredegistirme2(){
global $baglan;
session_start(); ob_start();
$ogno = $_SESSION['ogno'];
$ogsifre = $_POST["ogsifre"];
$ogsifre1 = $_POST["ogsifre1"];
$ogsifre2 = $_POST["ogsifre2"];
$sonuc = mysql_query("SELECT sifre FROM ogrenci WHERE no='$ogno'");
$sonucb = mysql_query("SELECT no FROM bogrenci WHERE no='$ogno'");
$ogrncsifre = mysql_fetch_array($sonuc);
$ogrncnob = mysql_fetch_array($sonucb);
if(($ogsifre=="") or ($ogsifre1=="") or ($ogsifre2=="")){

echo "<center> <h2>Lütfen Boþ Alan Býrakmayýn</h2></center>";
header("Refresh: 3; url=sfr.php?Git=ogrenci");
}
else if($ogrncsifre[0]!=$ogsifre){
	echo "<center> <h2>Eski Þifrenizi Yanlýþ Girdiniz..</h2></center>";
header("Refresh: 3; url=sfr.php?Git=ogrenci");
	}
else if($ogsifre1!=$ogsifre2){
echo "<center> <h2>Girdiðiniz Þifreler Uyuþmamaktadýr..</h2></center>";
header("Refresh: 3; url=sfr.php?Git=ogrenci");
 	}
else{

    
if($ogno==$ogrncnob[0]){
    mysql_query("update bogrenci set sifre ='$ogsifre1' where no='$ogno'");
	mysql_query("update ogrenci set sifre ='$ogsifre1' where no='$ogno'");}
else{
	mysql_query("update eogrenci set sifre ='$ogsifre1' where no='$ogno'");
	mysql_query("update ogrenci set sifre ='$ogsifre1' where no='$ogno'");}
echo "<center> <h2>Þifreniz Baþarýyla Deðiþtirilmiþtir...</h2></center>";

header("Refresh: 3; url=ogrenci.php");
	
	}	
	
	
}
Function cikis(){
global $baglan;
session_start(); ob_start();
 
session_destroy();
 
header("location:index.html");
	
}

Function bUyeDuzenle(){
global $baglan;
$no = $_GET["no"];

		$yaz = mysql_fetch_array(mysql_query("SELECT * FROM bogrenci WHERE no='$no' "));
		$adsoyad      = $yaz["adsoyad"];
		$sifre        = $yaz["sifre"];
		$dersler      = $yaz["dersler"];
		$email        = $yaz["email"];
		echo "<form action=\"switch.php?Git=bUyeGuncelle&no=$no\" method=\"POST\">
<div align=\"center\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	<tr>
		<td colspan=\"3\">
		<p align=\"center\">Kullanýcý Güncelleme Formu<br>
&nbsp;</td>
	</tr>
	<tr>
		<td>Adsoyad</td>
		<td>:</td>
		<td><input type=\"text\" name=\"adsoyad\" value=\"$adsoyad\" size=\"20\"></td>
	</tr>
	<tr>
		<td>Þifreniz</td>
		<td>:</td>
		<td><input type=\"text\" name=\"sifre\" value=\"$sifre\" size=\"20\"></td>
	</tr>
	<tr>
		<td>Dersleriniz</td>
		<td>:</td>
		<td><input name=\"dersler\" size=\"20\" value=\"$dersler\"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type=\"text\" name=\"email\" size=\"20\" value=\"$email\"></td>
	</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
		<input type=\"hidden\" name=\"id\" value=\"$id\">
		<input type=\"submit\" value=\"Güncelle\"></td>
	</tr>
</table>

</div>

</form>";;
}
Function bUyeGuncelle(){
global $baglan;
$no = $_GET["no"];
$adsoyad      = $_POST["adsoyad"];
$sifre        = $_POST["sifre"];
$dersler      = $_POST["dersler"];
$email        = $_POST["email"];
            $guncelle = mysql_query("UPDATE bogrenci SET adsoyad='$adsoyad',sifre='$sifre',dersler='$dersler',email='$email' WHERE no='$no'");
			mysql_query("UPDATE ogrenci SET sifre='$sifre' WHERE no='$no'");
		if($guncelle){
		echo "<center> Üye Güncellendi </center>";
		header("Refresh:2;url=badmin.php");}
		else{
		echo "<center> Hata! Üye Güncellenemedi </center>";
		header("location:admin1.html");
		}
}


Function bSil(){
global $baglan;
$no = $_GET["no"];

            $sil = mysql_query("DELETE FROM bogrenci WHERE no='$no'");
			mysql_query("DELETE FROM ogrenci WHERE no='$no'");
			mysql_query("DELETE FROM dersler WHERE no='$no'");
		if($sil){
		echo "<center> Üye Silindi </center>";
		header("Refresh:2;url=badmin.php");}
		else{
		echo "<center> Hata! Üye Silinmedi </center>";
		header("location:admin1.html");
		}
}



Function eUyeDuzenle(){
global $baglan;
$no = $_GET["no"];

		$yaz = mysql_fetch_array(mysql_query("SELECT * FROM eogrenci WHERE no='$no' "));
		$adsoyad      = $yaz["adsoyad"];
		$sifre        = $yaz["sifre"];
		$dersler      = $yaz["dersler"];
		$email        = $yaz["email"];
		echo "<form action=\"switch.php?Git=eUyeGuncelle&no=$no\" method=\"POST\">
<div align=\"center\">
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	<tr>
		<td colspan=\"3\">
		<p align=\"center\">Kullanýcý Güncelleme Formu<br>
&nbsp;</td>
	</tr>
	<tr>
		<td>Adsoyad</td>
		<td>:</td>
		<td><input type=\"text\" name=\"adsoyad\" value=\"$adsoyad\" size=\"20\"></td>
	</tr>
	<tr>
		<td>Þifreniz</td>
		<td>:</td>
		<td><input type=\"text\" name=\"sifre\" value=\"$sifre\" size=\"20\"></td>
	</tr>
	<tr>
		<td>Dersleriniz</td>
		<td>:</td>
		<td><input name=\"dersler\" size=\"20\" value=\"$dersler\"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type=\"text\" name=\"email\" size=\"20\" value=\"$email\"></td>
	</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
		<input type=\"hidden\" name=\"id\" value=\"$id\">
		<input type=\"submit\" value=\"Güncelle\"></td>
	</tr>
</table>

</div>

</form>";;
}
Function eUyeGuncelle(){
global $baglan;
$no = $_GET["no"];
$adsoyad      = $_POST["adsoyad"];
$sifre        = $_POST["sifre"];
$dersler      = $_POST["dersler"];
$email        = $_POST["email"];
            $guncelle = mysql_query("UPDATE eogrenci SET adsoyad='$adsoyad',sifre='$sifre',dersler='$dersler',email='$email' WHERE no='$no'");
		mysql_query("UPDATE ogrenci SET sifre='$sifre' WHERE no='$no'");
		if($guncelle){
		echo "<center> Üye Güncellendi </center>";
		header("Refresh:2;url=admin.php");}
		else{
		echo "<center> Hata! Üye Güncellenemedi </center>";
		header("location:admin1.html");
		}
}


Function eSil(){
global $baglan;
$no = $_GET["no"];

            $sil = mysql_query("DELETE FROM eogrenci WHERE no='$no'");
            mysql_query("DELETE FROM ogrenci WHERE no='$no'");
			mysql_query("DELETE FROM dersler WHERE no='$no'");
		if($sil){
		echo "<center> Üye Silindi </center>";
		header("Refresh:2;url=eadmin.php");}
		else{
		echo "<center> Hata! Üye Silinmedi</center>";
		header("location:admin1.html");
		}
}

$secim = $_GET["Git"];
switch($secim){

case "ogrnc":
	include("ogrencigiris.php");
	break;
case "ogrtmn":
	include("ogretmengiris.php");
	break;
case "ogrncgiris":
	ogrncgiris();
	break;
case "admingiris":
	admingiris();
	break;
case "ogretmengiris":
	ogretmengiris();
	break;
case "bogrencikaydet":
	bogrencikaydet();
	break;
case "eogrencikaydet":
	eogrencikaydet();
	break;
case "sifredegistirme1":
	sifredegistirme1();
	break;
case "sifredegistirme2":
	sifredegistirme2();
	break;
case "cikis":
	cikis();
	break;
case "bUyeGuncelle":
    bUyeGuncelle();
	break;
case "bUyeDuzenle":
    bUyeDuzenle();
	break;
case "bSil":
    bSil();
	break;
case "eUyeGuncelle":
    eUyeGuncelle();
	break;
case "eUyeDuzenle":
    eUyeDuzenle();
	break;
default:
     echo 'Yanlýþ giriþ!...';
     break;
}

?>