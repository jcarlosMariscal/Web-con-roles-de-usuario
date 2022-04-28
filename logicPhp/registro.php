<?php
if(!empty($_POST)){
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : NULL);
    $correo = (isset($_POST['correo']) ? $_POST['correo'] : NULL);
    $pass  = (isset($_POST['pass']) ? $_POST['pass'] : NULL);
    $rol  = (isset($_POST['rol']) ? $_POST['rol'] : NULL);
    $area  = (isset($_POST['area']) ? $_POST['area'] : NULL);

    if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['pass']) && isset($_POST['rol']) && isset($_POST['area'])){
        if(!preg_match("/^[A-Za-zÀ-ÿ\s]{4,60}$/",$nombre) && !preg_match("/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/",$correo) && !preg_match("/[A-Za-z0-9]{8,16}/",$pass) && $rol >= 4 && $rol <=0 && $area >= 5 && $area <=0){
            echo "<div class='errFormato'>Por favor, rellene todos los campos correctamente para registrarse.</div>";
        }else{
            try {
                // Validar usuario existente
                $sqlName = "SELECT nombre FROM users WHERE nombre = ? OR correo = ?";
                $queryName = $cnx->prepare($sqlName);
                $queryName->bindParam(1,$nombre);
                $queryName->bindParam(2,$correo);
                $queryName->execute();
                if($queryName->rowCount()>=1){
                    echo "<div class='errFormato'>Parece que ya existe un usuario con el mismo nombre/correo. Intente con otro.</div>";
                }else{                    
                $sqlInsert = "INSERT INTO users(nombre,correo,pass,id_rol,id_area) VALUES (?,?,?,?,?)";
                $queryInsert = $cnx->prepare($sqlInsert);
                $encrypt = password_hash($pass,PASSWORD_BCRYPT);
                $arrData = array($nombre,$correo,$encrypt,$rol,$area);
                $queryInsert -> execute($arrData);
                ?>
                <script>
                    Swal.fire({
                        title: "Usted se ha registrado",
                        text: "El registro se realizó correctamente. Inicie sesión a continuación.",
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
            } catch (PDOException $th) {
                echo "<div class='errFormato'>Ha ocurrido un error, no fue posible realizar su registro al sistema.</div>";
            }
        }
        if($rol === 2 || $rol === 3 && isset($_POST['area'])){
            echo "<div class='errFormato'>No es necesario agregar una área para el rol seleccionado.</div>";
        }
    }
}