<?php
    session_start();
    if (!isset($_SESSION["user"])){
        header("Location: ../login.php");
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Inicio</title>
</head>
<body class="color-active">
    <main>
        <div class="container">
            <div class="important">
                <div class="info">
                    <h2>Bienvenido(a) <?php echo $_SESSION["user"]["nombre"]; ?></h2>
                    <h6>Ha iniciado sesión con el rol de <span class="sp-rol"><?php
                        if(($_SESSION["user"]["id_rol"]) === 3) echo "Administrdor";
                        if(($_SESSION["user"]["id_rol"]) === 2) echo "Atención al cliente";
                        if(($_SESSION["user"]["id_rol"]) === 1) echo "Ventas";
                        ?></span>
                    <?php
                        if(($_SESSION["user"]["id_rol"]) === 1){
                            if(($_SESSION["user"]["id_area"]) === 1) echo "en el área de <span class='sp-area'>Productos de conveniencia</span>";
                            if(($_SESSION["user"]["id_area"]) === 2) echo "en el área de <span class='sp-area'>Productos de comparación</span>";
                            if(($_SESSION["user"]["id_area"]) === 3) echo "en el área de <span class='sp-area'>Productos de especialidad</span>";
                            if(($_SESSION["user"]["id_area"]) === 4) echo "en el área de <span class='sp-area'>Productos no buscados</span>";
                        };
    
                    ?>
                    </h6>
                </div>
                <div class="cerrar">
                    <a class="btn-login" href="cerrar.php">Cerrar sesión</a>
                </div>
            </div>

            <div class="content">
                <?php
                switch ($_SESSION["user"]["id_rol"]) {
                    case '1':
                        # Ventas
                        // require "ventas.php";
                        echo "<h2>Esta es la sección de ventas</h2>";
                        break;
                    case '2':
                        # Atención al cliente
                        // require "atencionCliente.php";
                        echo "<h2>Esta es la sección de atención al cliente</h2>";
                        break;
                    case '3':
                        # Administrador
                        // require "Administrador.php";
                        echo "<h2>Esta es la sección del Administrador</h2>";
                        break;
                    default:
                        # code...
                        break;
                }
                ?>
            </div>
        </div>
    </main>
    <template id="my-template">
    <swal-title>
        ¡Bievenido(a) <?php echo $_SESSION["user"]["nombre"]; ?>!
    </swal-title>
    <swal-icon type="success" color="#325288"></swal-icon>
    <swal-param name="allowEscapeKey" value="false" />
    <swal-param
        name="customClass"
        value='{ "popup": "my-popup" }' />
    </template>
    <footer class="">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="/"> MDBootstrap.com</a>
        </div>
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