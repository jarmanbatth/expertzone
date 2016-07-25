<?php
$id=$_REQUEST['id'];
include "connection.php";
$query="select * from feedback where feedbackid=$id";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$email=$row[1];
$type =$row[3];
$ans=$_REQUEST['msg'];
?>
<html>
<head>
    <title>Feedback Reply</title>
</head>
<body>

<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('Asia/Kolkata');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

/*$body             = file_get_contents('contents.html');
$body             = preg_replace('/[\]/','',$body);*/

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "tania.vmmteachers23@gmail.com";  // GMAIL username
$mail->Password   = "vmmteachers123";            // GMAIL password

$mail->SetFrom('tania.vmmteachers23@gmail.com', 'VMM Education');

$mail->AddReplyTo("tania.vmmteachers23@gmail.com","VMM Education");

$mail->Subject    = "Feedback Reply";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$body="Feedback for your <b> $type </b> is as Follows: <br> ".$ans;
$mail->MsgHTML($body);

$address = $email;
$mail->AddAddress($address, "Knowledge Base");

/*$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); */// attachment

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    header("location:confirm_reply.php?q=$email");
}

?>

</body>
</html>
