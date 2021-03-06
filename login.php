<?php
    session_start();
    require "config/Connection.php";
    $cnx = Connection::connectDB();

    $sql = "SELECT id_user,nombre FROM users";
    $query = $cnx->prepare($sql);
    $query->execute();
    $activos=0;
    foreach($query as $data){
        if(isset($_SESSION["user".$data['id_user']])) {
            $activos++;
        };
    }
    $c = (isset($_GET['c']) ? $_GET['c'] : NULL);
    if(isset($_GET['c']) && $_GET['c'] == "logout") $activos--;
    if($activos>=1 ||  $c == "logout") {

        if($activos == 1) {
            echo "<div class='errFormato text-center'>Parace que hay una sesión activa en el sistema.</h5></div>";
        }else if($activos >=2){
            echo "<div class='errFormato text-center'>Parace que hay algunas sesiones activas en el sistema.</h5></div>";
        }else{
            echo "";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="important form-text">
                <h2>Iniciar sesión</h2>
                <p>¡Bienvenido! Inicie sesión para acceder al sistema.</p>
                <p><a href="inicio">Ir a Inicio</a></p>
            </div>
            <div class="formulario">
                <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form method="POST">
                    <div class="form-outline mb-4">
                        <input type="text" name="nombre" id="loginName" class="form-name" placeholder="Nombre" autocomplete="off" minlength="4" required pattern="[A-Za-zÀ-ÿ\s]{4,60}" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" name="pass" id="loginPassword" class="form-password" placeholder="Contraseña" minlength="8" required pattern="[A-Za-z0-9]{8,16}" />
                        <span style="color:red;" class="msj">*La contraseña puede tener mayúsculas, minúsculas y números, no se permiten caracteres especiales</span>
                    </div>
                    <div class="row mb-4">

                    <div class="col-md-6 d-flex">
                        <a href="recuperar" class="gde">¿Ha olvidado su contraseña?</a>
                    </div>
                    </div>
                    <div class="btn-btn">
                        <button type="submit" class="btn btn-login btn-login-log">Entrar</button>
                    </div>
                    <br>
                    <div class="text-center">
                        <p class="gde">¿Aún no se ha registrado? <a href="registro">Registrese</a></p>
                    </div>
                    </form>
                    <?php require "logicPhp/login.php"; ?>
                </div>
            
                </div>
            </div>
        </div>
    </main>
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