<?php
    require "config/Connection.php";
    $cnx = Connection::connectDB();

    $sqlRol = "SELECT * FROM rol ORDER BY id_rol DESC";
    $queryRol = $cnx->prepare($sqlRol);
    $queryRol->execute();
    $sqlArea = "SELECT * FROM area";
    $queryArea = $cnx->prepare($sqlArea);
    $queryArea->execute();

    $validate = "SELECT * FROM users WHERE id_rol = ?";
    $queryVal = $cnx->prepare($validate);
    $id=3;
    $queryVal->bindParam(1,$id);
    $queryVal->execute();
    $res = $queryVal->rowCount();
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>Registro</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="important form-text">
                <h2>Registro</h2>
                <p>Ingrese los datos que se solicitan para su registro al sistema.</p>
            </div>
            <div class="formulario">
                <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form method="POST">
                    <div class="form-outline mb-4">
                        <input type="text" name="nombre" id="loginName" class="form-name" placeholder="Nombre" autocomplete="off" minlength="4" required pattern="[A-Za-zÀ-ÿ\s]{4,60}" />
                    </div>
                    <div class="form-outline mb-4">
                        <input type="email" name="correo" id="login" class="form-correo" placeholder="Correo electrónico" autocomplete="off" required pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" name="pass" id="loginPassword" class="form-password" placeholder="Contraseña" minlength="8" required pattern="[A-Za-z0-9]{8,16}" />
                    </div>
                    <div class="form-outline mb-4">
                        <?php if($res===0) {
                            echo "<div class='errFormato'><h4>Es necesario que registre un administrador para el sistema</h4></div>";} ?>
                        <label for="rol" class="label-rol">Seleccione su rol dentro del sistema </label>
                        <select name="rol" id="rol" class="select-rol">
                            <?php
                                if($queryRol){
                                    foreach($queryRol as $rol){
                                        if($res === 1){
                                            if($rol['id_rol'] != 3 ){
                                        ?><option value="<?php echo $rol['id_rol']; ?>" required><?php echo $rol['rol']?></option><?php
                                            }
                                        }else{
                                            ?><option value="<?php echo $rol['id_rol']; ?>" required><?php echo $rol['rol']?></option><?php

                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-outline mb-4" id="sec-area">
                        <label for="area" class="label-area">Seleccione su área de ventas </label>
                        <select name="area" id="area" class="select-area">
                            <?php
                                if($queryArea){
                                    foreach($queryArea as $area){
                                        ?><option value="<?php echo $area['id_area']; ?>" required><?php echo $area['area']?></option><?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="btn-btn">
                        <button type="submit" class="btn btn-login btn-login-log">Registrarse</button>
                    </div>
                    </form>
                    <?php require "logicPhp/registro.php"; ?>
                </div>
            
                </div>
            </div>
        </div>
    </main>
    <footer class="">
        <div class="text-center">
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
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="js/logic.js"></script>
</body>
</html>