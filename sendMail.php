<?php

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->CharSet = "utf8";

if ($_POST['formDebug'] == "0") {
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
}else{
	$mail->SMTPDebug = 3;                               // Enable verbose debug output
}

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $_POST['formHost'];  // Specify main and backup SMTP servers
$mail->SMTPAuth = $_POST['formAuth'];                               // Enable SMTP authentication
$mail->Username = $_POST['formUser'];                 // SMTP username
$mail->Password = $_POST['formPass'];                           // SMTP password
$mail->SMTPSecure = $_POST['formSecure'];                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = $_POST['formPort'];                                    // TCP port to connect to

$mail->From = $_POST['formUser'];
$mail->FromName = 'Form de teste';
$mail->addAddress($_POST['formEmail'], $_POST['formName']);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

if (isset($_POST['formSubject'])) {
	$mail->Subject = $_POST['formSubject'];
	$mail->AltBody = $_POST['formSubject'];
}else{
	$mail->Subject = "Formulário de teste - Subject";
	$mail->AltBody = "Formulário de teste - Alt";
}

if (isset($_POST['formBody'])) {
	$mail->Body    = $_POST['formBody'];
}else{
	$mail->Body    = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
}

if(!$mail->send()) {
	header("Location: index.php?msg=Message could not be sent. Mailer Error: " . $mail->ErrorInfo . "&error=true");
} else {
	header("Location: index.php?msg=Message has been sent&error=false");
}

