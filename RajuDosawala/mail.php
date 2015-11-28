
<?php

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];
require 'PHPMailer-master/PHPMailerAutoload.php';
require 'PHPMailer-master/class.smtp.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact.rajudosawala@gmail.com';                 // SMTP username
$mail->Password = 'rameshraj';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = $email;
$mail->FromName = $name;
$mail->addAddress('rammi.r8@gmail.com', 'Ramesh');     // Add a recipient
//$mail->addAddress('sharathyadav123@gmail.com');               // Name is optional
$mail->addReplyTo($email, $name);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = '[Urgent]Customer contacted you for catering service.';
$mail->Body    = 'Dear Ramesh, '.$name.' is contacted you for catering service. Please respond back soon. <br/><br/>Customer Mail ID: '.$email.'<br/><br/>Message from customer: '.$message.'<br/><br/>Thanks and Regards,<br/>Team SharathSachin';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
?>
	<script type="text/javascript">    
		//alert("Message could not be sent. Mailer Error: <?php echo $mail->ErrorInfo; ?> ");
		alert("Message could not be sent. Please check your network connection");
		history.back();
	</script>
<?php
} else {

?>
	<script type="text/javascript">    
		alert("Your message has been sent.");
<?php echo "window.location.href='index.html#contactus'"; ?>
	</script>
<?php
}
?>
