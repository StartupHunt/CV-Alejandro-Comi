<?php
require("includes/class.phpmailer.php");
$mail = new PHPMailer();

if($_POST['mail-suscriber']){
  $email = $_POST['mail-suscriber'];
  $mail->From  = ("contacto@cafedelossentidos.com");
  $mail->setFrom = $email;//Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
  $mail->FromName = "Mensaje CV";
  $mail->AddAddress("alejandro@cafedelossentidos.com"); // Dirección a la que llegaran los mensajes.
  $mail->AddAddress("contacto@cafedelossentidos.com");

  // Aquí van los datos que apareceran en el correo que reciba
  $mail->WordWrap = 50;
  $mail->IsHTML(true);
  $mail->Subject  =  "Registro para CV";
  $mail->Body     =  "Email registrado: $email ";
}else{
  $name = $_POST['name'];
  $message = $_POST['message'];
  $email = $_POST['email'];

  $mail->From  = ("contacto@cafedelossentidos.com");
  $mail->setFrom = $email;//Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
  $mail->FromName = $name;
  $mail->addReplyTo($email, $name);
  $mail->AddAddress("alejandro@cafedelossentidos.com"); // Dirección a la que llegaran los mensajes.
  $mail->AddAddress("contacto@cafedelossentidos.com");

  // Aquí van los datos que apareceran en el correo que reciba
  $mail->WordWrap = 50;
  $mail->IsHTML(true);
  $mail->Subject  =  "Registro de CV";
  $mail->Body     =  "Nombre: $name \n<br />".
  "Mensaje: $message \n<br />".
  "Email: $email \n<br />";

}



$mail->IsSMTP();
$mail->Host = "mail.cafedelossentidos.com";  // Servidor de Salida.
$mail->SMTPAuth = true;
$mail->Username = "contacto@cafedelossentidos.com";  // Correo Electrónico
$mail->Password = "Adayinthelife999@"; // Contraseña

header('Location: index.html');
exit;

if (!$mail->send()){
 echo "Mailer Error: " . $mail->ErrorInfo;
}

// $to = 'contacto@cafedelossentidos.com';
// $subject = 'the subject';
// $message = "name = : $name <br/> email is : $email <br/>phone: $phone <br/> address:  $address <br/> city : $city <br/>country : $cuntery <br/> code: $code  ";
// $headers = 'From: webmaster@example.com' . "\r\n" .
//         'Reply-To: webmaster@example.com' . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, $message, $headers);
?>
