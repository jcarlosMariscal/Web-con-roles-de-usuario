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
    <title>Error 404</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="important form-text not-found">
                <h1>Error 404</h1>
                <p>Ups lo siento, la página a la que intentaste acceder no existe.</p>
                <p><a href="inicio">Regresar a Inicio</a></p>
            </div>
            <div class="formulario">
                </div>
            </div>
        </div>
    </main>
</body>
</html>