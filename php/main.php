<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$name = $_POST['name'];
$phone = $_POST['phone'];
$user_message = $_POST['message'];
$mail = $_POST['mail'];
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bach_larisa@mail.ru';                 // SMTP username
$mail->Password = 'XfqrfXfqrf';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('bach_larisa@mail.ru', 'Лариса Бахтина');
$mail->addAddress('melnik_rursant@mail.ru', 'Артем Мельник');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Магазин';
$mail->Body    = "
	Номер клиента: ".htmlspecialchars($phone)."<br>
	Имя пользователя ".htmlspecialchars($name)."<br>
	Почта: ".htmlspecialchars($mail)."<br>
	Сообщение: ".htmlspecialchars($user_message);
$mail->AltBody = 'Это сообщение в формате plain text';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('Location: thanks.html');
}

?>
