<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/cufon.js"></script>
        <script type="text/javascript">$(function() {
		Cufon.now();
		Cufon.replace("#giris_baslik", {
		hover: true,
		fontFamily: "Aller",
		fontWeight: 700
		});
		});
		</script>
<title>Untitled Document</title>
</head>

<body>
<div id="giris_ogrtm">
<div class="giris_ogrtm">
<section id="giris_panel_ogrtm">
<?php error_reporting(0);
include("bag.php");
session_start(); 
$ogretmenno = $_SESSION['ogretmenno'];
$ogno = $_SESSION['ogno'];
$secim = $_GET["Git"];
switch($secim){

case "ogretmen":
	 ogretmen();
	break;
case "ogrenci":
	ogrenci();
	break;
default:
     echo 'Bir hata oluştu. Lütfen Tekrar Deneyiniz!...';
     break;
}

?>
<?php Function ogretmen(){
echo '
<aside class="form_tasiyici_ogrtm">

<form action="switch.php?Git=sifredegistirme1" method="POST">
<label for="ogrenci_giris" class="kayıt_label_ogrtm">Eski Şifresiniz:</label><br>

<input type="password" name="ogretmensifre" id="ogrenci_giris" class="kayit_formu_ogrtm" autocomplete="off" autofocus="">

<br>
  <label for="ogrenci_giris" class="kayıt_label_ogrtm">Yeni Şifresiniz:</label><br>

<input type="password" name="ogretmensifre1" id="ogrenci_giris" class="kayit_formu_ogrtm" autocomplete="off" autofocus="">

<br>
  <label for="ogrenci_giris" class="kayıt_label_ogrtm">Yeni Şifresiniz(Tekrar):</label><br>

<input type="password" name="ogretmensifre2" id="sifre_giris" class="kayit_formu_ogrtm" autocomplete="off" autofocus="">

<br><br />
<input type="submit" name="Kaydet" value="Kaydet" id="giris_kaydet" class="submit">

  </form>


</aside>



</section>
</div>
</div>';
}

Function ogrenci(){
echo '
<aside class="form_tasiyici_ogrtm">

<form action="switch.php?Git=sifredegistirme2" method="POST">
<label for="ogrenci_giris" class="kayıt_label_ogrtm">Eski Şifresiniz:</label><br>

<input type="password" name="ogsifre" id="ogrenci_giris" class="kayit_formu_ogrtm" autocomplete="off" autofocus="">

<br>
  <label for="ogrenci_giris" class="kayıt_label_ogrtm">Yeni Şifresiniz:</label><br>

<input type="password" name="ogsifre1" id="ogrenci_giris" class="kayit_formu_ogrtm" autocomplete="off" autofocus="">

<br>
  <label for="ogrenci_giris" class="kayıt_label_ogrtm">Yeni Şifresiniz(Tekrar):</label><br>

<input type="password" name="ogsifre2" id="sifre_giris" class="kayit_formu_ogrtm" autocomplete="off" autofocus="">

<br><br />
<input type="submit" name="Kaydet" value="Kaydet" id="giris_kaydet" class="submit">

  </form>


</aside>



</section>
</div>
</div>';
} ?>
</body>
</html>