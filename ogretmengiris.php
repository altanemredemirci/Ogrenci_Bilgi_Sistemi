<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>ÖGRETMEN BİLGİ SİSTEMİ</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script>
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

<form action="switch.php?Git=ogretmengiris" method="POST"> 
  <label for="ogrenci_giris" font style="font-family:'Adobe Garamond Pro'">Öğrt. Görevlisi Numarası</label><br>

<input type="text" name="ogretmenno" id="ogrenci_giris" class="kayit_formu_ogrtm" autocomplete="off" onkeypress="SayiKontrol(event)">

<br>
 <label for="ogrenci_giris" font style="font-family:'Adobe Garamond Pro'">Öğrt. Görevlisi Şifresi</label><br>

<input type="password" name="ogretmensifre" id="sifre_giris" class="kayit_formu_ogrtm" autocomplete="off" autofocus="">

<br> <br />
<input type="submit" name="ogretmengiris" value="GİRİS" id="giris_kaydet" align="right" class="submit_ogrnc"/>

  </form>
</section>
</div>
</div>
</body>
</html>
