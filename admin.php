<?php

	session_start();
	include "conexion.php";

	if(isset($_SESSION['Usuario'])){

	}else{

		header("Location: ./login.php?Error=Acceso denegado");
	}
?>
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
	<nav class="menu2">
	  <menu>
	    <li><a href="./">Inicio</a></li>
	    <li><a href="./admin.php" class="selected">Ultimas Compras</a></li>
	    <li><a href="./admin/agregarproducto.php" >Agregar</a></li>
	    <li><a href="./login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>

	<center><h1>Últimas Compras</h1></center>
	<table border="1px" width="100%">
		<thead>			
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Subtotal</th>
			</tr>	
		</thead>
		<tbody>
			<?php
				$re = mysql_query("SELECT * FROM compras") or die("No fue posible realizar la consulta a la tabla seleccionada: " . mysql_error() );
				$numeroventa = 0;

				while($f = mysql_fetch_array($re)){
					if ($numeroventa != $f['numeroventa'] ) {
						echo '<tr> <td> Compra Número: ' . $f['numeroventa'] . '</td> </tr>';
					}

					$numeroventa = $f['numeroventa'];

					echo '<tr>
						<td> <img src="./productos/' . $f['imagen'] . ' " width= "100px" height="100px" alt="imagen producto"> </td>
						<td>' . $f['nombre'] . '</td>
						<td>' . $f['precio'] . '</td>
						<td>' . $f['cantidad'] . '</td>
						<td>' . $f['subtotal'] . '</td>
					</tr>';
				}

			?>
		</tbody>	


		
	</table>
	</section>
</body>
</html>