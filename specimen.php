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
$mail->Subject  = "Specimen Request";
$mail->WordWrap = 50;
// -------------------- END OF CONFIGURABLE SECTION ---------------


$title = $_POST['element_0'];
$fname = $_POST['element_3'];
$lname = $_POST['element_4'];
$designation = $_POST['element_6'];
$colg = $_POST['element_8'];
$coladdr = $_POST['element_10'];
$coladdr2 = $_POST['element_11'];
$city = $_POST['element_12'] ;
$state = $_POST['element_13'] ;
$zip = $_POST['element_14'] ;
$conutry = $_POST['element_15'] ;
$phone = $_POST['element_16'] ;
$email = $_POST['element_17'] ;
$bin = $_POST['element_19'];
$obr = $_POST['element_21'];



if (empty($email)) {
	$email = $mailto ;
}
$fromemail = (!isset( $use_webmaster_email_for_from ) || ($use_webmaster_email_for_from == 0)) ? $email : $mailto ;

if (function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$mail->Body =
	"This message was sent from: Specimen Page\n" .
	"\n" .
	"------------------------------------------------------------\n" .
	"Name of sender: $title $fname $lname\n\n" .
	"Designation: $designation\n\n" .
	"Institute/Company:  $colg\n\n" .
	"Address:  $coladdr\n $coladdr2\n" .
	"City : $city                State: $state                   ZIP Code: $zip\n\n" .
	"Phone: $phone               Email: $email\n\n" .
	"Books interested in: $bin\n\n" .
	"Other books referring to: $obr\n\n" .
	"\n\n------------------------------------------------------------\n" ;

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent. ';
}

exit ;

?>
