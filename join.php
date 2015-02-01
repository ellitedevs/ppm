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
$mail->Subject  = "Join Us Form";
$mail->WordWrap = 50;
// -------------------- END OF CONFIGURABLE SECTION ---------------

$title = $_POST['element_0'];
$fname = $_POST['element_3'];
$lname = $_POST['element_4'];
$prof = $_POST['element_6'];
$cname = $_POST['element_7'] ;
$caddr1 = $_POST['element_9'] ;
$caddr2 = $_POST['element_10'] ;
$city = $_POST['element_11'] ;
$state = $_POST['element_12'] ;
$zip = $_POST['element_13'] ;
$country = $_POST['element_14'] ;
$phone = $_POST['element_15'] ;
$email = $_POST['element_16'] ;
$knwabt1 = $_POST['element_17_0'] ;
$knwabt2 = $_POST['element_17_1'] ;
$knwabt3 = $_POST['element_17_2'] ;
$knwabt4 = $_POST['element_17_3'] ;
$knwabt5 = $_POST['element_17_4'] ;

$mail->Body =
	"This message was sent from: Join Us Page\n" .
	"------------------------------------------------------------\n" .
	"Name of sender: $title $fname $lname\n\n" .
	"Address: \n$caddr1            \n$caddr2\n\n" .
	"City : $city                State: $state                   ZIP Code: $zip\n" .
	"Country: $country\n\n".
	"Phone: $phone                Email: $email\n\n" .
	"Occupation: $prof\n\n" . 
	"Would Like to know about:\n" .
	"$knwabt1    $knwabt2    $knwabt3    $knwabt4    $knwabt5\n\n" .
	
	"\n\n------------------------------------------------------------\n" ;

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent. ';
}

exit ;

?>
