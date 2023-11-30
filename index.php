
<?php


//$idUsuario =isset($_GET['i']) ? $_GET['i'] : null;
$idUsuario = 171;

if (intval($idUsuario) > 0) {


    include_once('./config/Connection.php');
    include_once('./sections/usuarios/model/usuarios.php');
    $usuario = new mdlUsuario();
    $accede = $usuario->validarUsuarioSIMFCO($idUsuario);

    if ($accede) {
        $nuevaURL = 'inicio.php';
        header("Location: $nuevaURL");
        echo $accede;
    } else {
        $nuevaURL = 'https://prb.simfcoh.com/';
        header("Location: $nuevaURL");
    }
} else {
    $nuevaURL = 'https://prb.simfcoh.com/';
    header("Location: $nuevaURL");
}

?>
