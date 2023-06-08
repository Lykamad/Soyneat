<?php
require_once("includes/conectarBD.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="estilo/unete.css">

</head>

<body>

	<div class="container" id="main-content">
		<?php
		include("includes/navigation.php");
		$conexionBD = new conectarBD;
		if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
			if ($conexionBD->consigueUsuario($_POST['usuario'], $_POST['contrasena'])) {
		?>

				<h2>Realiza una modificación a tu usuario</h2>
				<h2>Actualmente estas conectado con el usuario: <?php echo $_SESSION['login'] ?></h2>
				<form action="modificar_usuario.php" method="POST">
					<label for="nombreUsuario">Nuevo nombre de Usuario:</label>
					<input name="nombreUsuario" type="text" id="pastillas"><br>
					<label for="password">Nueva Contraseña:</label>
					<input name='password' type='password' id="pastillas"><br>
					<input name='viejoUsuario' type="text" value="<?php echo $_POST['usuario'] ?>" hidden>
					<input name="modificar" class="boton" type="submit" value="ENVÍA" id="enviar">
					<a href="modificar.php"><br><br>Volver Atrás</a>
					<a href="index.php"><br><br>Volver a Inicio</a>
				</form>
		<?php
			}
		}
		else if (isset($_POST['nombreUsuario']) && isset($_POST['password']) && isset($_POST['modificar'])) {
			if ($conexionBD->modificarUsuario($_POST['viejoUsuario'], $_POST['nombreUsuario'], $_POST['password'])) {
				$_SESSION['usuario'] = $_POST['nombreUsuario'];
			};
		}
		?>
	</div>
	<?php include("includes/footer.php"); ?>

</body>

</html>