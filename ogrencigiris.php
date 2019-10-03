<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>ÖGRENCİ BİLGİ SİSTEMİ</title>
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
		function SayiKontrol(e) {
    olay = document.all ? window.event : e;
    tus = document.all ? olay.keyCode : olay.which;
    if(tus<48||tus>57) {
        if(document.all) { olay.returnValue = false; } else { olay.preventDefault(); }
    }
}
		</script>
        


</head>

<body>
<div id="giris">
<div class="giris">
<section id="giris_panel">
<form action="switch.php?Git=ogrncgiris" method="POST">
  <label for="ogrenci_giris" font style="font-family:'Adobe Garamond Pro'">Öğrenci Numarası</label><br>

<input type="text" name="ogno" id="ogrenci_giris" class="kayit_formu_ogrtm"  onkeypress="SayiKontrol(event)">

<br>
  <label for="ogrenci_giris" font style="font-family:'Adobe Garamond Pro'">Öğrenci Şifresi</label><br>

<input type="password" name="ogsifre" id="sifre_giris" class="kayit_formu_ogrtm" autofocus="" value="";>

<br> <br />
<input type="submit" name="ogrncgiris" value="GİRİS" id="giris_kaydet" align="right" class="submit_ogrnc"/>

  </form>
   </section>
</div>
</div>
</body>
</html>
