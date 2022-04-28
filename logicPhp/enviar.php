<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cuenta0test61@gmail.com';                     //SMTP username
        $mail->Password   = 'cuenta0Test61Master';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('cuenta0test61@gmail.com', 'Mailer');
        $mail->addAddress('juanc.ramirezm16@gmail.com', 'Joe User');     //Add a recipient
        // $mail->addAddress($correo, 'Joe User');     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        
        $passwordRandom = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $mail->Subject = 'Reestablecer contraseña';
        $mail->Body    = '<h4>Usted a solicitado que se reestablezca su contraseña</h4>
                        <br /> <p>Use la siguiente contraseña para iniciar sesión: <b>'.$passwordRandom.'</b><p>
                        <p>No olvidé cambiar su contraseña después.</p>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
