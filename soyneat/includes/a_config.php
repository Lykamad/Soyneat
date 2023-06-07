<?php
switch ($_SERVER["SCRIPT_NAME"]) {
	case "/soyneat/#.php":
		$CURRENT_PAGE = "Impacto";
		$PAGE_TITLE = "Nuestro Impacto";
		break;
	case "/soyneat/#.php":
		$CURRENT_PAGE = "Info";
		$PAGE_TITLE = "Conócenos";
		break;
	case "/soyneat/#.php":
		$CURRENT_PAGE = "Productos";
		$PAGE_TITLE = "Carta";
		break;
	case "/soyneat/login.php":
		$CURRENT_PAGE = "Inicio Sesion";
		$PAGE_TITLE = "Inicia Sesión";
		break;
	case "/soyneat/#.php":
		$CURRENT_PAGE = "Pedido";
		$PAGE_TITLE = "Hacer Pedido";
		break;
	default:
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "Soyneat";
}
