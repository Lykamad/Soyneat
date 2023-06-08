<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo_registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@100;400;600;700&display=swap" rel="stylesheet">
    <title>Registro</title>
</head>

<body>
    <?PHP
    if (!isset($_POST['email']) || !isset($_POST['usuario']) || !isset($_POST['contrasena']) || !isset($_POST['pago']) || !isset($_POST['nombre'])) {
        die("Faltan parámetros");
    }
    $email = $_POST['email'];
    $nombreUsuario = $_POST['usuario'];
    $password = md5($_POST['contrasena']);
    $pago = ($_POST['pago']);
    $nombreReal = ($_POST['nombre']);


    //el resultado está en la variable $conexion
    require_once('includes/conectarBD.php');
    $conexionBD = new conectarBD;

    $conexionBD->registrarUsuario($nombreUsuario, $password, $nombreReal, $email, $pago);
    ?>
</body>

</html>