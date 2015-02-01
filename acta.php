<?php


require("class.phpmailer.php");
require("class.smtp.php");

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "ssl://smtp.gmail.com"; // SMTP server
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "admin@pragatiprakashan.in";
$mail->Password = "mdyyuswygsuzvzqq";
$mail->From     = "admin@pragatiprakashan.in";
$mail->AddAddress("pragatiprakashan@gmail.com");
$mail->Subject  = "Acta Ciencia Form";
$mail->WordWrap = 50;

// -------------------- END OF CONFIGURABLE SECTION ---------------

$fname = $_POST['element_2'];
$lname = $_POST['element_3'];
$email = $_POST['element_5'];
$phone = $_POST['element_6'];
$comments = $_POST['element_7'];


if (function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$mail->Body =
	"This message was sent from:\n" .
	"$http_referrer\n" .
	"------------------------------------------------------------\n" .
	"Name of sender: $fname   $lname\n\n" .
	"Email: $email\n\n" .
	"Phone:  $phone\n\n" .
	"Comments:  $comments\n\n" .
	"\n\n------------------------------------------------------------\n" ;

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent. ';
}
exit ;

?>
