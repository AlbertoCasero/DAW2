<?php

  function enviarEmail($email, $asunto, $body, $attach)
  {
    require('PHPMailer-master/src/PHPMailer.php');
    require('PHPMailer-master/src/SMTP.php');

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
    $mail -> setFrom('maria@domenico.es');

    $mail -> addAttachment($attach);
    //Compruebo si es un correo o son varios
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
  enviarEmail("casero@domenico.es", "Prueba de envío", "Este es un mensaje de prueba.", "");
?>