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
				<h2>¿Estás seguro de que quieres eliminar tu usario? Será un cambio PERMANENTE</h2>
				<h2>Actualmente estas conectado con el usuario: <?php echo $_SESSION['login'] ?></h2>
				<form action="eliminar_usuario.php" method="POST">
					<input name='viejoUsuario' type="text" value="<?php echo $_POST['usuario'] ?>" hidden>
					<input name="eliminar" class="boton" type="submit" value="Eliminar Usuario" id="enviar">
					<a href="modificar.php"><br><br>Volver Atrás</a>
					<a href="index.php"><br><br>Volver a Inicio</a>
				</form>
		<?php
			}
		}
		else if (isset($_POST['eliminar'])) {
			if ($conexionBD->eliminarUsuario($_POST['viejoUsuario'])) {
				unset($_SESSION['login']);
			};
		}
		?>
	</div>
	<?php include("includes/footer.php"); ?>

</body>

</html>