<?PHP
if ( !isset($_POST['nombreUsuario']) || !isset($_POST['apellidosUsuario']) || !isset($_POST['clave']) ){
    die("Faltan parámetros");
}
$nombreUsuario = $_POST['nombreUsuario'];
$apellidosUsuario = $_POST['apellidosUsuario'];
$clave = md5($_POST['clave']);


//el resultado está en la variable $conexion
require_once('../includes/conectarBD.php');
$conexionBD = new conectarBD;

$conexionBD->registrarUsuario($nombreUsuario, $apellidosUsuario, $clave);
?>