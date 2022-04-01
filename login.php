<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="important form-text">
                <h2>Iniciar sesión</h2>
                <p>¡Bienvenido! Inicie sesión para acceder al sistema.</p>
            </div>
            <div class="formulario">
                <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>
                    <div class="form-outline mb-4">
                        <input type="text" id="loginName" class="form-name" placeholder="Nombre" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" class="form-password" placeholder="Contraseña" />
                    </div>
                    <div class="row mb-4">

                        <div class="col-md-6 d-flex">
                        <a href="#!">¿Olvidó su contraseña?</a>
                        </div>
                    </div>
                    <div class="btn-btn">
                    <a href="sections/index.php" class="btn-login">Entrar</a>
                    <!-- EL BOTON ENVIARÁ LOS DATOS PARA EL INICIO DE SESIÓN, POR AHORA MANDAREMOS DIRECTAMENTE A LA SECCIÓN PRINCIPAL CON UN ENLACE -->
                    <!-- <button type="submit" class="btn btn-login btn-login-log">Entrar</button> -->
                    </div>
                    <br>
                    <div class="text-center">
                        <p>¿Aún no se ha registrado? <a href="registro.php">Registrese</a></p>
                    </div>
                    </form>
                </div>
            
                </div>
            </div>
        </div>
    </main>
</body>
</html>