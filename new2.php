<?php
include("class.phpmailer.php");
							
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
							$gonder->Subject    = "�ifre De�i�ikli�i";
							//HTML format�nda mailimizin i�eri�i
							$gonder->Body       = "Merhabalar <strong></strong><br/><br/>hastanerandevusistem.com yeni �yelik �ifreniz a�a��da belirtilmi�tir.<br /><br /><strong>�ifreniz : </strong>";
							//maili alacak adresi ve ismini girin
							$email = "altan_emre_1989@hotmail.com";
							$$kAdSoyad = "ali";
							$gonder->AddAddress($email,$kAdSoyad);
						
							//mail g�nderilme i�lemi
							if ($gonder->Send()){
								
								echo '<div class="alert alert-success">
										  <a class="close" data-dismiss="alert" href="#">&times;</a>
										  <strong>Ba�ar�l� : </strong> 
										  Yeni �ifreniz <strong>'.$email.'</strong> adresine ba�ar�l� bir �ekilde g�nderilmi�tir.
									  </div>';
							
							}else{
								
								echo '<div class="alert alert-error">
										  <a class="close" data-dismiss="alert" href="#">&times;</a>
										  <strong>Hata : </strong> 
										  Yeni �ifreniz <strong>'.$email.'</strong> adresine g�nderilirken bir hata olu�tu! L�tfen tekrar istekte bulununuz.
									  </div>';
							
							}
							
							$gonder->ClearAddresses(); 
							$gonder->ClearAttachments();
?>