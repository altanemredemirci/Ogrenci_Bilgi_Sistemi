<?php

include("bag.php");

error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="as.css" type="text/css" />
    <title>�GRETMEN B�LG� S�STEM�</title>
	<script src="js/as.js" type="text/javascript"></script>
  </head>
<body>
<div id="ogrencihesap">
<section id="giris_alani_kayit">
<ul id="menu"> <?php session_start();
$ogretmenno = $_SESSION['ogretmenno'];
?>
	<li><a href="switch.php?Git=cikis" >Gazi �niversitesi Bilgi Sistemi</a></li>
   
    <li> <a href=""><?php echo $ogretmenno;?></a>
    <ul>
			<li><a href="sfr.php?Git=ogretmen">Sifre De�i�tirme</a></li>
			
		</ul>	</li>
	<li>
		<a href="">Derslerim</a>
         <?php	$sonuc = mysql_query("select ders from ogretmen where no='$ogretmenno'");


while ($verigetir=mysql_fetch_array ($sonuc)) {


?> <ul> 
        <li> 
			<a href=""> <?php   echo $verigetir[0] ?> </a></li> <?php } ?> </ul> 					
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
<div style="margin: 30px 0 0 200px; width: 450px;">

        <form enctype="multipart/form-data" action="ogretmen.php" method="post">
            <input type="file" name="dosya" />
            <input type="submit" value="Y�kle" />
                    </form>
             
    </div>
    
    <form action='sil.php' method='POST'  class="sil"> &nbsp; <input type='submit' value='  Sil   '> </form>
    <?php
/*Formdan Bilgileri �ek***************************************************************************** */
$tip=$_FILES['dosya']['type']; // y�klenecek dosyan�n tipini al�yoruz 
if($_FILES)
{        //burada tip kontrol� yap�yoruz g�venlik gere�i sadece belirli dosyalar�n y�klenmesine izin veriyoruz
    if($tip=="application/msword" ||  $tip=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" ||  $tip=="application/vnd.ms-excel" || $tip=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $tip=="image/x-png" || $tip=="image/png" || $tip=="image/pjpeg" || $tip=="image/gif" || $tip=="image/jpeg" || $tip=="image/jpg" || $tip=="application/vnd.ms-powerpoint" || $tip=="application/vnd.openxmlformats-officedocument.presentationml.presentation" || $tip=="application/acrobat" || $tip=="application/x-pdf" || $tip=="applications/vnd.pdf" || $tip=="application/pdf")
    {
               $dosya_name=$_FILES['dosya']['name']; //y�klenecek olan dosyan�n ad�n� belirliyoruz "resmin kendi isminin kalmas�na yarar"
			   $sor=mysql_query("select ders from ogretmen where no='$ogretmenno'");
			   $ders=mysql_fetch_array ($sor);
			 
        $uploaddir= "upload/$ders[0]/".$dosya_name; //dosyan�n y�klenece�i yer
 
        if(move_uploaded_file($_FILES['dosya']['tmp_name'], $uploaddir))
        {
			include("phpmailer/class.phpmailer.php");
							
							//s�n�f�m�z� $gonder de�i�kenine y�kl�yoruz
							$gonder = new PHPMailer();
							$gonder->CharSet  ="iso-8859-9"; // T�rk�e karakter Karakter Seti
							$gonder->IsSMTP();
							$mail->SMTPDebug = 1;
							//g�nderenin mail adresini girin
							$gonder->From       = "altanemre1989@gmail.com"; 
							$gonder->FromName   = "Gazi Bilgi Sistemi";
							$gonder->Sender     = "altanemre1989@gmail.com";
							$gonder->AddReplyTo = "altanemre1989@gmail.com";
							$gonder->Host       = "ssl://smtp.gmail.com";
							//g�nderme portu (duruma g�re 25. portta olabilir)
							$gonder->Port       = 465; 
							$gonder->SMTPAuth   = true;
							//SMTP kullan�c� ad� girin
							$gonder->Username   = "altanemre1989@gmail.com";
							//SMTP �ifre girin
							$gonder->Password   = "altanemre";
							$gonder->WordWrap   = 150;
							//mail format�n� HTML yap�yoruz
							$gonder->IsHTML(true);
							//mailin konusu
							$gonder->Subject    = "�dev Bildirimi";
							//HTML format�nda mailimizin i�eri�i
							$gonder->Body       = "Gazi �niversitesi Bilgi Sistemi<br/><br/><strong>".$ders[0]." dersine yeni �dev dosya y�klendi </strong>";
							//maili alacak adresi ve ismini girin
							$email = "altan_emre_1989@hotmail.com";
							$$kAdSoyad = "ali";
							$gonder->AddAddress($email,$kAdSoyad);
						
							//mail g�nderilme i�lemi
							if ($gonder->Send()){
								
								echo '<div class="alert alert-success">
										  <a class="close" data-dismiss="alert" href="#">&times;</a>
										  <strong>Ba�ar�l� : </strong> 
										  Mail ba�ar�l� bir �ekilde g�nderilmi�tir.
									  </div>';
							
							}else{
								
								echo '<div class="alert alert-error">
										  <a class="close" data-dismiss="alert" href="#">&times;</a>
										  <strong>Hata : </strong> 
										  Mail g�nderilirken bir hata olu�tu!
									  </div>';
							
							}
							
							$gonder->ClearAddresses(); 
							$gonder->ClearAttachments();
                    echo '<br/>Dosya y�klemesi sorunsuz bir �ekilde yap�ld�.';
					
					header("Refresh: 3; url=ogretmen.php");
        }
                else
                {
                    echo 'Dosya y�klemesinde bir hata var. Hata Kodu :'.$_FILES['dosya']['error'];
                }
    }
    else
    {
        echo "<br />Uzant� uymamaktad�r sadece <b> 'png, jpeg, gif' ve word, excell </b> dosya t�rlerini y�kleyebilirsiniz";
        echo "<script> alert('Uzanti uymamaktadir sadece  png, jpeg, gif  ve word, excell dosya t�rlerini y�kleyebilirsiniz'); </script>";
    }
 }
?> <br> <br>
    <?php
$sor=mysql_query("select ders from ogretmen where no='$ogretmenno'");
			   $ders=mysql_fetch_array ($sor);
$path = "upload/$ders[0]/";

// Open the folder
$dir_handle = @opendir($path) or die("Unable to open $path");

// Loop through the files
while ($file = readdir($dir_handle)) {

if($file == "." || $file == ".." || $file == "ogretmen.php" )

continue;
echo "<a href='upload/$ders[0]/$file'>$file</a> <br />";

}

closedir($dir_handle);

?> 


</section>
</div>
</body>
</html>
