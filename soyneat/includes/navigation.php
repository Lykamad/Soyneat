<?php
session_start();
if (isset($_POST['cierraSesion'])) {
    session_unset();
}
?>

<header>

    <div class="topnav">
        <div class="logo">
            <a href="index.php" class="element">
                <img src="imagenes/soyneat_logo.png" alt="logotipo" width="150" height="90">
            </a>
        </div>
        <div class="menu">
            <ul>

                <li><a href="impacto.php" class="element">Nuestro Impacto</a></li>

                <li><a href="conocenos.php" class="element">Conócenos</a></li>


                <li><a href="carta.php" class="element">Carta</a></li>


                <li><a href="login.php" class="element">Únete</a></li>
                <?php
                if (isset($_SESSION['login'])) {
                ?>

                    <li><a href="pedido.php" class="element">Hacer Pedido</a></li>
                    <li>
                        <?php if (isset($_SESSION['login']) ) echo "<a class='nav-link' disabled>Usuario: " . $_SESSION['login'] . "</a>";?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</header>
<link rel="stylesheet" href="../estilo/estilo_index.css">