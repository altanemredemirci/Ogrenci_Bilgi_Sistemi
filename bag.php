<?php

$vthost = "localhost";
$vtkullanici = "root";
$vtsifre = "usbw";
$vtadi = "bag";
$baglan = @mysql_connect($vtserver,$vtkullanici,$vtsifre);
if(! $baglan) die ("Mysql sunucusuna baglanılamadı.");
mysql_select_db($vtadi,$baglan) or die("Veri Tabanı Baglantısı Yapılamadı.");
?>