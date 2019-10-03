<?php
include("class.phpmailer.php");
							
							//sýnýfýmýzý $gonder deðiþkenine yüklüyoruz
							$gonder = new PHPMailer();
							$gonder->CharSet  ="iso-8859-9"; // Türkçe karakter Karakter Seti
							$gonder->IsSMTP();
							$mail->SMTPDebug = 1;
							//gönderenin mail adresini girin
							$gonder->From       = "altanemre1989@gmail.com"; 
							$gonder->FromName   = "Gazi Bilgi Sistemi";
							$gonder->Sender     = "altanemre1989@gmail.com";
							$gonder->AddReplyTo = "altanemre1989@gmail.com";
							$gonder->Host       = "ssl://smtp.gmail.com";
							//gönderme portu (duruma göre 25. portta olabilir)
							$gonder->Port       = 465; 
							$gonder->SMTPAuth   = true;
							//SMTP kullanýcý adý girin
							$gonder->Username   = "altanemre1989@gmail.com";
							//SMTP þifre girin
							$gonder->Password   = "altanemre";
							$gonder->WordWrap   = 150;
							//mail formatýný HTML yapýyoruz
							$gonder->IsHTML(true);
							//mailin konusu
							$gonder->Subject    = "Þifre Deðiþikliði";
							//HTML formatýnda mailimizin içeriði
							$gonder->Body       = "Merhabalar <strong></strong><br/><br/>hastanerandevusistem.com yeni üyelik þifreniz aþaðýda belirtilmiþtir.<br /><br /><strong>Þifreniz : </strong>";
							//maili alacak adresi ve ismini girin
							$email = "altan_emre_1989@hotmail.com";
							$$kAdSoyad = "ali";
							$gonder->AddAddress($email,$kAdSoyad);
						
							//mail gönderilme iþlemi
							if ($gonder->Send()){
								
								echo '<div class="alert alert-success">
										  <a class="close" data-dismiss="alert" href="#">&times;</a>
										  <strong>Baþarýlý : </strong> 
										  Yeni Þifreniz <strong>'.$email.'</strong> adresine baþarýlý bir þekilde gönderilmiþtir.
									  </div>';
							
							}else{
								
								echo '<div class="alert alert-error">
										  <a class="close" data-dismiss="alert" href="#">&times;</a>
										  <strong>Hata : </strong> 
										  Yeni Þifreniz <strong>'.$email.'</strong> adresine gönderilirken bir hata oluþtu! Lütfen tekrar istekte bulununuz.
									  </div>';
							
							}
							
							$gonder->ClearAddresses(); 
							$gonder->ClearAttachments();
?>