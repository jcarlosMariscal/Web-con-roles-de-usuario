<?php
    function encrypt($string) {
        $METHOD = "AES-256-CBC";
        $SECRET_KEY = "&ven%tas@2022";
        $SECRET_IV = "416246";
        $output=false;
        $key = hash('sha256',$SECRET_KEY);
        $iv=substr(hash('sha256',$SECRET_IV),0,16);
        $output=openssl_encrypt($string,$METHOD,$key,0,$iv);
        $output=base64_encode($output);
        return $output;
    }
if(!empty($_POST)){
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : NULL);
    $pass  = (isset($_POST['pass']) ? $_POST['pass'] : NULL);

    if(isset($_POST['nombre']) && isset($_POST['pass'])){
        if(!preg_match("/^[A-Za-zÀ-ÿ\s]{4,60}$/",$nombre) && !preg_match("/[A-Za-z0-9]{8,16}/",$pass)){
            echo "<div class='errFormato'>Por favor, rellene todos los campos correctamente para iniciar sesión.</div>";
        }else{
            try {
                $sql = "SELECT * FROM users WHERE nombre = ?";
                $query = $cnx->prepare($sql);
                $query -> bindParam(1,$nombre);
                $query->execute();
                if($query->rowCount()===1){
                    foreach($query as $data){
                        if(password_verify($pass,$data['pass'])){
                            $cadenaToken = $data['id_rol']."-".$data['id_area']."-".$data['nombre']."-".$data['id_user'];
                            $encryption = encrypt($cadenaToken);
                            
                            $encryptIdUser = encrypt($data['id_user']);
                            $_SESSION["user".$data['id_user']] = $encryption;
                            ?><script>
                                window.location.href='usuario/<?php echo $encryptIdUser; ?>';
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