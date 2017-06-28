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
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript"  src="../js/scripts.js"></script>
	<script type="text/javascript"  src="../js/modificar.js"></script>
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
		<li><a href="../admin.php">Ultimas Compras</a></li>
	    <li><a href="./agregarproducto.php" >Agregar</a></li>
	    <li><a href="./modificar.php"  class="selected">Modificar</a></li>
	    <li><a href="./login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>	
	<h1>Modificar/Eliminar producto</h1>
	<br>
		<table width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</tr>
			</thead>

			<tbody>		
			<?php
				$resultado =  mysql_query("SELECT * FROM productos");

				while ($row = mysql_fetch_array($resultado)) {
					echo '
						<tr>
							<td>
						  		<input type="hidden" value="' . $row["id"] . '"> ' . $row["id"] . '
						  		<input type="hidden" class="imagen" value="' . $row["imagen"] . '"> 
							</td>
							<td>
								<input type="text" class="nombre" value="' . $row["nombre"] .'">
							</td>
							<td>
								<input type="text" class="descripcion" value="' . $row["descripcion"] .'">
							</td>
							<td>
								<input type="text" class="precio" value="' . $row["precio"] .'">
							</td>
							<td> <button type="button" class="modificarprod" data-id="' . $row["id"] . '">Modificar</button></td>
							<td> <button  class="eliminarprod" data-id="' . $row["id"] . '"> Eliminar</button></td>	
						</tr>		
					';
				}
			?>
			</tbody>
			
		</table>
	</section>
</body>
</html>