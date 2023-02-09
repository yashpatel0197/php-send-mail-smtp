<?php
include('smtp/PHPMailerAutoload.php');
$html='Msg';
$to_email_address = ''; // Mail will send to this Email Address
$subject = ''; // Subject
echo smtp_mailer($to_email_address,$subject,$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "SMTP_EMAIL_ID"; // Mail will Send from This Email Address
	$mail->Password = "PASSWORD"; // Your Mail App Password
	$mail->SetFrom("SMTP_EMAIL_ID"); // Mail will Send from This Email Address
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>