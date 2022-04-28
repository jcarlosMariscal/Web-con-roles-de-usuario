<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require_once "config/Connection.php";

    $mail = new PHPMailer(true);
    $cnx = Connection::connectDB();
    function encrypt($string) {
    }
if(!empty($_POST)){
    $correo = (isset($_POST['correo']) ? $_POST['correo'] : NULL);
    if(isset($_POST['correo'])){
        if(!preg_match("/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/",$correo)){
            echo "<div class='errFormato'>Escriba un correo con el formato correcto.</div>";
        }else{
            try {
                // Validar si el correo existe en la bd
                $sqlEmail = "SELECT id_user,nombre,correo FROM users WHERE correo = ?";
                $queryEmail = $cnx->prepare($sqlEmail);
                $queryEmail->bindParam(1,$correo);
                $queryEmail->execute();
                if($queryEmail->rowCount()>=1){
                    $result = $queryEmail->fetch();
                    try {
                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'example@gmail.com';                     //SMTP username
                        $mail->Password   = 'password';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('example@gmail.com', 'Sistema Ventas');
                        $mail->addAddress($correo, $result['nombre']);     //Add a recipient
                        // $mail->addAddress($correo, 'Joe User');     //Add a recipient
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        
                        $tokenRandom = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
                        $encrypt = encrypt($tokenRandom);
                        $url = "http://seguridadweb.epizy.com/nuevo/".$encrypt;
                        $mail->Subject = 'Reestablecer Acceso al Sistema';
                        $mail->Body    = '<h3>Hola '.$result['nombre'].', se ha solicitado una nueva contraseña para su cuenta, crea una nueva con el enlace.</h3>
                                        <br /> <a href="'.$url.'">Recuperar acceso<a>';

                        if($mail->send()){
                            $sqlUpdate = "UPDATE users SET token = ? WHERE correo = ?";
                            $queryUpdate = $cnx->prepare($sqlUpdate);
                            $queryUpdate->bindParam(1,$encrypt);
                            $queryUpdate->bindParam(2,$correo);
                            if($queryUpdate->execute()){
                                ?>
                                                <script>
                    Swal.fire({
                        title: "Correo enviado",
                        text: "Revise su bandeja de entrada o spam para obtener el enlace y poder crear una nueva contraseña",
                        icon: 'success',
                        confirmButtonColor: '#325288',
                        confirmButtonText: "Aceptar",
                        allowOutsideClick: false,
                    }).then((button)=>{
                        if(button.isConfirmed === true){
                            location.href=`login`;
                        }
                    });
                </script>
                                <?php
                            }
                        }else{
                            echo "<div class='errFormato'>Hubo un error al enviar el correo. Intente de nuevo</div>";
                        }
                        
                    } catch (Exception $e) {
                        echo "<div class='errFormato'>No se ha podido reestablecer la contraseña.</div>";
                    }

                }else{
                    echo "<div class='errFormato'>El correo no existe en la bd.</div>";
                }
            } catch (PDOException $th) {
                echo "<div class='errFormato'>Ha ocurrido un error, no fue posible recuperar su contraseña</div>";
            }
        }
    }
}