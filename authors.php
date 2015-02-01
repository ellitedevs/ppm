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
$mail->Subject  = "Authorship Form";
$mail->WordWrap = 50;


// -------------------- END OF CONFIGURABLE SECTION ---------------

$title = $_POST['element_1'];
$fname = $_POST['element_4'];
$lname = $_POST['element_5'];
$designation = $_POST['element_7'];
$phone = $_POST['element_8'] ;
$email = $_POST['element_9'] ;
$brf = $_POST['element_12'];
$coa1 = $_POST['element_13'];
$tent = $_POST['element_14'];
$misc = $_POST['element_15'] ;
$name_of_uploaded_file = basename($_FILES['element_10']['name']);
$type_of_uploaded_file =
    substr($name_of_uploaded_file,
    strrpos($name_of_uploaded_file, '.') + 1);
$size_of_uploaded_file =
    $_FILES['element_10']['size']/1024;
	$max_allowed_file_size = 13000; // size in KB

if($size_of_uploaded_file > $max_allowed_file_size )
{
  $errors .= "\n Size of file should be less than $max_allowed_file_size";
}


$http_referrer = getenv( "HTTP_REFERER" );


$tmp_path =$_FILES['element_10']['tmp_name'];
if(is_uploaded_file($tmp_path))
{
  //if(!copy($tmp_path,$path_of_uploaded_file))
  //{
    //$errors .= '\n error while copying the uploaded file';
  //}
}
move_uploaded_file($_FILES["element_10"]["tmp_name"],
      "/home/ellituyc/www/pragatiprakashan.in/upload/" .$name_of_uploaded_file);
$mail->AddAttachment ('/home/ellituyc/www/pragatiprakashan.in/upload/'.$name_of_uploaded_file);

if (function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$mail->Body =
	"This message was sent from:\n" .
	"$http_referrer\n" .
	"------------------------------------------------------------\n" .
	"Name of sender: $title   $fname  $lname  \n\nDesignation: $designation\n\n" .
	"Email: $email\n\n".
	"Phone: $phone\n\n".
	"Breif about book: $brf\n\n" .
	"Co-authors:  $coa1\n\n" .
	"Tenative Plan of completion: $tent\n\n" .
	"Misc. details:" .
	$comments .
	"\n\n------------------------------------------------------------\n" ;



if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent. ';
}

exit ;

?>
