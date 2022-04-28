<?php
if(!empty($_POST)){
    $pass  = (isset($_POST['pass']) ? $_POST['pass'] : NULL);

    if(isset($_POST['pass'])){
        if(!preg_match("/[A-Za-z0-9]{8,16}/",$pass)){
            echo "<div class='errFormato'>Por favor, rellene todos los campos correctamente para registrarse.</div>";
        }else{
            try {                   
                $sql = "UPDATE users SET pass = ? WHERE id_user = ?";
                $query = $cnx->prepare($sql);
                $encrypt = password_hash($pass,PASSWORD_BCRYPT);
                $arrData = array($encrypt,$id_user);
                $query -> execute($arrData);
                if($query){
                    $sql2 = "UPDATE users SET token = ? WHERE id_user = ?";
                    $query2 = $cnx->prepare($sql2);
                    $newToken = NULL;
                    $query2->bindParam(1,$newToken);
                    $query2->bindParam(2,$id_user);
                    $query2->execute();
                    if($query2){
                        ?>
                        <script>
                            Swal.fire({
                                title: "Nueva contraseña",
                                text: "Su contraseña se ha actualizado, a continuación intente iniciar sesión con ella.",
                                icon: 'success',
                                confirmButtonColor: '#325288',
                                confirmButtonText: "Aceptar",
                                allowOutsideClick: false,
                            }).then((button)=>{
                                if(button.isConfirmed === true){
                                    location.href=`login`;
                                }
                            });
                        </script>
                        <?php
                    }
                }
                ?>
                <?php
            } catch (PDOException $th) {
                echo "<div class='errFormato'>Ha ocurrido un error, no fue posible realizar su registro al sistema.</div>";
            }
        }
        if($rol === 2 || $rol === 3 && isset($_POST['area'])){
            echo "<div class='errFormato'>No es necesario agregar una área para el rol seleccionado.</div>";
        }
    }
}