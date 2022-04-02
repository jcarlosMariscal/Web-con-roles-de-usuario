<?php
    session_start();
    $token = $_GET['token'];
    function decryption($string){
        $METHOD = "AES-256-CBC";
        $SECRET_KEY = "&ven%tas@2022";
        $SECRET_IV = "416246";
        $key = hash('sha256',$SECRET_KEY);
        $iv=substr(hash('sha256',$SECRET_IV),0,16);
        $output=openssl_decrypt(base64_decode($string),$METHOD,$key,0,$iv);
        return $output;
    }
    $decryptionToken = decryption($token);
    if (!isset($_SESSION["user".$decryptionToken])){
        header("Location: ../login");
    }
    $decryption = decryption($_SESSION['user'.$decryptionToken]);
    $dataUser = explode('-',$decryption);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/script.js"></script>
    <link rel="icon" type="image/png" href="../img/favicon.png" />
    <link rel="stylesheet" href="../css/style.css">
    <title><?php
        if($dataUser[0] == 3) echo "Administrador | ".$dataUser[2];
        if($dataUser[0] == 2) echo "Atención al cliente | ".$dataUser[2];
        if($dataUser[0] == 1) echo "Ventas | ".$dataUser[2];
    ?></title>
</head>
<body class="color-active">
    <main>
        <div class="container">
            <div class="important">
                <div class="info">
                    <h4>Bienvenido(a) <?php echo $dataUser[2]; ?></h4>
                    <h6>Ha iniciado sesión con el rol de <span class="sp-rol"><?php
                        if($dataUser[0] == 3) echo "Administrador";
                        if($dataUser[0] == 2) echo "Atención al cliente";
                        if($dataUser[0] == 1) echo "Ventas";
                        ?></span>
                    <?php
                        if($dataUser[0] == 1){
                            if($dataUser[1] == 1) echo "en el área de <span class='sp-area'>Productos de conveniencia</span>";
                            if($dataUser[1] == 2) echo "en el área de <span class='sp-area'>Productos de comparación</span>";
                            if($dataUser[1] == 3) echo "en el área de <span class='sp-area'>Productos de especialidad</span>";
                            if($dataUser[1] == 4) echo "en el área de <span class='sp-area'>Productos no buscados</span>";
                        };
    
                    ?>
                    </h6>
                </div>
                <div class="cerrar">
                    <a class="btn-login" href="cerrar/<?php echo $token; ?>">Cerrar sesión</a>
                </div>
            </div>

        </div>
        <div class="content">
            <?php
            switch ($dataUser[0]) {
                case '1':
                    switch ($dataUser[1]){
                        case '1':
                            ?>
                            <?php
                            require "prod_conveniencia.php";
                            break;
                        case '2':
                            require "prod_comparacion.php";
                            break;
                        case '3':
                            require "prod_especialidad.php";
                            break;
                        case '4':
                            require "prod_noBuscados.php";
                            break;
                        default:
                            # code...
                            break;
                    }
                    break;
                case '2':
                    require "atencionCliente.php";
                    break;
                case '3':
                    require "administrador.php";
                    break;
                default:
                    # code...
                    break;
            }
            ?>
        </div>
    </main>
    <template id="my-template">
    <swal-title>
        ¡Bievenido(a) <?php echo $dataUser[2]; ?>!
    </swal-title>
    <swal-icon type="success" color="#325288"></swal-icon>
    <swal-param name="allowEscapeKey" value="false" />
    <swal-param
        name="customClass"
        value='{ "popup": "my-popup" }' />
    </template>
    <footer class="footer-form">
        <div class="text-center icons">
            <!-- Facebook -->
            <a class="fb-ic"><i class="bi bi-facebook"></i></a>
            <!-- Twitter -->
            <a class="tw-ic"><i class="bi bi-twitter"></i></a>
            <!-- Google +-->
            <a class="gplus-ic"><i class="bi bi-google"></i></a>
            <!--Linkedin -->
            <a class="li-ic"><i class="bi bi-linkedin"></i></a>
            <!--Instagram-->
            <a class="ins-ic"><i class="bi bi-instagram"></i></a>
            <!--Pinterest-->
            <a class="pin-ic"><i class="bi bi-pinterest"></i></a>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2022 Copyright
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum at mollitia, <br> praesentium cupiditate fugiat tempore debitis</p>
        </div>
        <!-- Copyright -->
    </footer>
    
</body>
</html>
<script>
    let msj = localStorage.getItem("login");
    console.log(msj);
    if(msj === "true"){
        Swal.fire({
            template: '#my-template',
            timer: 3000,
            toast: true,
            position: 'top-end',
        });
    } 
    setTimeout(function(){
        localStorage.removeItem("login");
    }, 2000);
</script>