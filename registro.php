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
                <h2>Registro</h2>
                <p>Ingrese los datos que se solicitan para su registro al sistema.</p>
            </div>
            <div class="formulario">
                <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>
                    <div class="form-outline mb-4">
                        <input type="text" id="loginName" class="form-name" placeholder="Nombre" />
                    </div>
                    <div class="form-outline mb-4">
                        <input type="email" id="loginName" class="form-correo" placeholder="Correo electrónico" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" class="form-password" placeholder="Contraseña" />
                    </div>
                    <div class="form-outline mb-4">
                        <label for="" class="label-rol">Seleccione su rol dentro del sistema </label>
                        <select name="" id="" class="select-rol">
                            <option value="1">Ventas</option>
                            <option value="1">Atención al cliente</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                    <!-- MOSTRAR CUANDO EL ROL SEA ventas  -->
                    <div class="form-outline mb-4">
                        <label for="" class="label-area">Seleccione su área de ventas </label>
                        <select name="" id="" class="select-area">
                            <option value="1">Productos de conveniencia</option>
                            <option value="1">Productos de comparación</option>
                            <option value="1">Productos de especialidad</option>
                            <option value="1">Productos no buscados</option>
                        </select>
                    </div>
                    <div class="btn-btn">
                    <!-- <a href="login.php" class="btn-login">Iniciar sesión</a> -->
                    <button type="submit" class="btn btn-login btn-login-log">Registrarse</button>
                    </div>
                    </form>
                </div>
            
                </div>
            </div>
        </div>
    </main>
</body>
</html>