<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('dextercu');
include_once("PHPMailer/class.phpmailer.php");

  if($_POST['name'] == null || $_POST['company'] == null || $_POST['email'] == null || $_POST['phone'] == null || $_POST['comments'] == null ):
    	echo "<script type='text/javascript'>alert('Please Complete required form contact !');</script>";

	echo "<meta http-equiv='refresh' content='0;URL=contact.php' />";
  else:
	  
if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
    echo "<script type='text/javascript'>alert('Invalid Verification Code !');</script>";

	echo "<meta http-equiv='refresh' content='0;URL=contact.php' />";
    }else{

$name = htmlspecialchars(trim($_POST['name']));
$company = htmlspecialchars(trim($_POST['company']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$address = htmlspecialchars(trim($_POST['address']));
$city = htmlspecialchars(trim($_POST['city']));
$state = htmlspecialchars(trim($_POST['state']));
$country = htmlspecialchars(trim($_POST['country']));
$comments = htmlspecialchars(trim($_POST['comments']));

// subject
$subject = 'Email Contact From '.$email;

// message
$message = '
<html>
<body>
  <table>
    <tr>
      <td>Name</td><td>:</td><td>'.$name.'</td>
    </tr>
    <tr>
      <td>Company</td><td>:</td><td>'.$company.'</td>
    </tr>
    <tr>
      <td>Email</td><td>:</td><td>'.$email.'</td>
    </tr>
    <tr>
      <td>Phone</td><td>:</td><td>'.$phone.'</td>
    </tr>
    <tr>
      <td>Address</td><td>:</td><td>'.$address.'</td>
    </tr>
    <tr>
      <td>City</td><td>:</td><td>'.$city.'</td>
    </tr>
    <tr>
      <td>State</td><td>:</td><td>'.$state.'</td>
    </tr>
    <tr>
      <td>Country</td><td>:</td><td>'.$country.'</td>
    </tr>
    <tr>
      <td>Comments</td><td>:</td><td>'.$comments.'</td>
    </tr>
  </table>
</body>
</html>
';

//$tujuan = "ibnudrift@gmail.com";
$tujuan = "info@dextercut.com";
$name_pengirim = $name;
$pengirim = $email;
 
$mail = new PHPMailer;

$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "localhost";
$mail->Port = 26;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "no-reply@dextercut.com"; // SMTP username
$mail->Password = "5-vtceHy{5Mt"; // SMTP password 

$mail->ClearAddresses();
$mail->AddAddress($tujuan, $tujuan);
$mail->From = "no-reply@dextercut.com";
$mail->FromName = "no-reply@dextercut.com";
$mail->Subject = $subject;
$mail->IsHTML(true);
$mail->Body = $message;

// setting save to database
$sql_ins = "INSERT INTO `client_email`
VALUES (NULL, '".$mail->Username."', '$tujuan', '".$mail->Subject."', '$message', '".strip_tags($message)."', NOW(), NOW())";
// echo $sql_ins; exit;
mysql_query($sql_ins); 
// end setting save to database

if ($mail->Send())
{
$_SESSION['keterangan'] =  "berhasil";
header('location:contact.php');
}else{
echo "<script type='text/javascript'>alert('Email yang anda inputkan tidak valid !');</script>";

	echo "<meta http-equiv='refresh' content='0;URL=contact.php' />";
}
		
}
    unset($_SESSION['captcha']);
}

endif;

?>