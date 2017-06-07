<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
	<form id="formulario" method="post" action="./login/verificar.php">
		<?php 
		if(isset($_GET['error2'])){
			echo '<center>Datos No Validos</center>';
		}elseif(isset($_GET['Error'])){
			echo '<center>Debe iniciar sesión</center>';
		}
		?>
		<label for="usuario">Usuario</label><br>
		<input type="text" id="usuario" name="usuario" placeholder="usuario" ><br>
		<label for="password">Password</label><br>
		<input type="password" id="password" name="password" placeholder="password" ><br>
		<input type="submit" name="aceptar" value="aceptar" class="aceptar">
	</form>
	</section>
</body>
</html>