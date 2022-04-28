<?php
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
    <title>Recuperar contraseña</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="important form-text">
                <h2>Recuperar contraseña</h2>
                <p>Escriba el correo con el que realizó su registro.</p>
                <p><a href="inicio">Ir a Inicio</a></p>
            </div>
            <div class="formulario">
                <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form method="POST">

                    <div class="form-outline mb-4">
                        <input type="email" name="correo" id="login" class="form-correo" placeholder="Correo electrónico" autocomplete="off" required pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" />
                    </div>
                    <div class="row mb-4">
                    </div>
                    <div class="btn-btn">
                        <button type="submit" class="btn btn-login btn-login-log">Enviar</button>
                    </div>
                    </form>
                    <?php require "logicPhp/recuperar.php"; ?>
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