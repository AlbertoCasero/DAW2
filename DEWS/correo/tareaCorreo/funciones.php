<?php

  function enviarEmail($email, $asunto, $body, $attach)
  {
    require('src/PHPMailer.php');
    require('src/SMTP.php');
    $recipients =$email;
    $mail = new PHPMailer();
    $mail -> isSMTP();
    $mail -> Mailer = "SMTP";
    $mail -> SMTPAuth = false;
    $mail -> isHTML(true);
    $mail -> SMTPAutoTLS = false;
    $mail -> Port = 25;
    $mail -> CharSet = 'UTF-8';
    $mail -> Host = "localhost";
    $mail -> setFrom("casero@domenico.es");
    $mail -> addAttachment($attach);
    if(is_array($email))
    {
      foreach($recipients as $correo)
      {
          $mail->addAddress($correo);
      }
    }
    else
    {
      $mail -> addAddress($email);
    }
    $mail -> Subject = $asunto;
    $mail -> Body = $body;

    if(!$mail -> send())
    {
        echo $mail->ErrorInfo;
    }
    else
    {
      echo 'El mensaje ha sido enviado correctamente. Revise su bandeja de entrada.';
    }
  }
  $correo=$_POST['correo'];
  echo $correo;
  $mensaje=$_POST['mensaje'];
  if(empty($mensaje))
  {
      $mensaje="Postal de temporada";
  }
  $attach=$_POST['postal'];
  enviarEmail($correo, "Correo con PHPMailer", $mensaje, $attach);
?>