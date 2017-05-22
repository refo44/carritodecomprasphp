<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Carrito de Compras</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>


<?php

if (isset($_SESSION['carrito'])) {

	$datos = $_SESSION['carrito'];
	$total = 0;

	for ($i = 0; $i < count($datos); $i++) {
		?>
		<div class="producto">
		<center>

			<img src="./productos/<?php echo $_datos[i]['Imagen'];?>" alt=""> <br>
			<span><?php echo $_datos[i]['Nombre'];?></span> <br>
			<span>Precio: <?php echo $_datos[i]['Precio'];?></span> <br>
			<span>Cantidad: <input type="text" value="<?php echo $_datos[i]['Cantidad'];?>"> </span> <br>
			<span>Precio Total: <?php echo $_datos[i]['Precio'] * $_datos[i]['Cantidad'];?></span> <br>

		</center>
		</div>


		<?php
	}

} else {

	echo "<h2> El carrito de compras está vacío</h2>";

}

?>

	</section>
</body>
</html>