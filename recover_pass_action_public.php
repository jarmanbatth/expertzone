<html>
<head>
<title>Recover Password Public</title>
</head>
<body>

<?php
include "connection.php";
$address = $_REQUEST['email'];
$select="select * from signup";
$res=mysqli_query($con,$select);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($address==$row[2])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{


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

$mail->Subject    = "Recover Password";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$pass="";
for($i=1;$i<=6;$i++)
{
    $choice=rand(1,10);
    if($choice>3)
    {
        $x=rand(48,57);
    }
    else
    {
        $x=rand(65,90);
    }
    $pass=$pass.chr($x);
}

$query="update `signup` set password='".$pass."' where email='".$address."'";
mysqli_query($con,$query);
$body="You have recovered your Password.  Your auto Generated Password is <b>$pass</b>";
$mail->MsgHTML($body);


$mail->AddAddress($address, "Knowledge Base");

/*$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); */// attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {

    echo "Message sent!";
    header("location:confirm_public_recover.php?q=public");
}
}
else
{
    header("location:recover_pass_public.php?q=1");
}
?>

</body>
</html>
