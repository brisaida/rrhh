
<?php


    $idUsuario =isset($_GET['i']) ? $_GET['i'] : null;

    if(intval($idUsuario)>0){
       // echo "hola bienvenido recio";
       /*  include_once('./config/Connection.php');
        include_once('./modules/usuarios/models/usuarios.php');
        $usuario = new mdlUsuario();
        $accede = $usuario->validarUsuarioSIMFCO($idUsuario);

        if($accede){
            $nuevaURL = 'inicio.php';
            header("Location: $nuevaURL");
        }else{
            $nuevaURL = 'https://prb.simfcoh.com/';
            header("Location: $nuevaURL");
        } */

    }else{
       /*  $nuevaURL = 'https://prb.simfcoh.com/';
        header("Location: $nuevaURL");  */
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RRHH">

    <title>Recursos Humanos</title>


    <link rel="icon" href="./assets/images/naturalista.png" type="image/png">

    <?php include "./include/links.php" ?>
</head>

<body>
    <?php include "./include/header.php" ?>

    <div class="main-content" id="panel">

        <?php include "./content.php" ?>
    </div>

    <?php include "./include/scripts.php" ?>
</body>

</html>