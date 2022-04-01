<?php
if(!empty($_POST)){
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : NULL);
    $pass  = (isset($_POST['pass']) ? $_POST['pass'] : NULL);

    if(isset($_POST['nombre']) && isset($_POST['pass'])){
        if(!preg_match("/^[A-Za-zÀ-ÿ\s]{4,60}$/",$nombre) && !preg_match("/[A-Za-z0-9]{8,16}/",$pass)){
            echo "<div class='errFormato'>Por favor, rellene todos los campos correctamente para iniciar sesión.</div>";
        }else{
            require "config/Connection.php";
            $cnx = Connection::connectDB();
            try {
                $sql = "SELECT * FROM users WHERE nombre = ?";
                $query = $cnx->prepare($sql);
                $query -> bindParam(1,$nombre);
                $query->execute();
                if($query->rowCount()===1){
                    foreach($query as $data){
                        if(password_verify($pass,$data['pass'])){
                            $_SESSION["user"] = $data; // GUARDA LA SESIÓN PARA USARLO DESPUÉS
                            ?><script>
                                window.location.href='sections/index.php';
                                localStorage.setItem("login", "true");
                            </script><?php
                        }else{
                            echo "<div class='errFormato'>La contraseña que se introdujo es incorrecta.</div>";
                        }
                    }
                }else{
                    ?><div class='errFormato'>No existe un usuario con el nombre <b> <?php echo $nombre; ?> </b>en la Base de Datos, verifique si está escrito correctamente.</div><?php
                }
            } catch (PDOException $th) {
                echo "<div class='errFormato'>Ha ocurrido un error, no fue posible iniciar sesión</div>";
            }
        }
    }
}