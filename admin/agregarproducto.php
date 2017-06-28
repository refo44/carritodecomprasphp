<?php
session_start();
	include "../conexion.php";
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: ../login.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript"  src="../js/scripts.js"></script>
</head>
<body>
	<header>
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
	<section>
		<nav class="menu2">
		  <menu>
		    <li><a href="../">Catálogo</a></li>
		<li><a href="../admin.php">Ultimas compras</a></li>
	    <li><a href="./agregarproducto.php" class="selected">Agregar</a></li>
	    <li><a href="./modificar.php">Modificar</a></li>
	    <li><a href="./login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>

	<center><h1>Agregar un nuevo producto</h1></center>
	<form action="altaproducto.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Nombre<br>
			<input type="text" name="nombre">
		</fieldset>
		<fieldset>
			Descripción<br>
			<input type="text" name="descripcion">
		</fieldset>
		<fieldset>
			Imagen<br>
			<input type="file" name="file">
		</fieldset>
		<fieldset>
			Precio<br>
			<input type="text" name="precio">
		</fieldset>
		<input type="submit" name="accion" value="Enviar" class="aceptar">
	</form>	
	
		</form>
	</section>
</body>
</html>