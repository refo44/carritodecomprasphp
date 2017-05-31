<?php

session_start();

include './conexion.php';
if(isset($_SESSION["carrito"])){


	if (isset($_GET['id'])) {

	$arreglo = $_SESSION["carrito"];

	$encontro = false;

	$numero = 0;


	for ($i=0; $i < count($arreglo) ; $i++) { 


		if($arreglo[$i]['Id'] == $_GET['id']){

			$encontro = true;
			$numero = $i;


			break;
		}
	}

	if ($encontro) {
		
		$arreglo[$numero]['Cantidad'] += 1;

		$_SESSION['carrito'] = $arreglo;
	}else{


		if (isset($_GET['id'])) {
		$nombre = "";
		$precio = 0;
		$imagen = "";
		$re = mysql_query("SELECT * FROM productos WHERE id = " . $_GET['id']);
		while ( $f = mysql_fetch_array($re)) {
			$nombre = $f["nombre"];
			$precio = $f["precio"];
			$imagen = $f["imagen"];
		}

		$datosNuevos = array(
			'Id' => $_GET['id'] , 
			'Nombre' => $nombre,
			'Precio' => $precio,
			'Imagen' => $imagen,
			'Cantidad' => 1  );



		array_push($arreglo, $datosNuevos);

		$_SESSION['carrito'] = $arreglo;
	}


	}


}

}else{
	if (isset($_GET['id'])) {
		$nombre = "";
		$precio = 0;
		$imagen = "";
		$re = mysql_query("SELECT * FROM productos WHERE id = " . $_GET['id']);
		while ( $f = mysql_fetch_array($re)) {
			$nombre = $f["nombre"];
			$precio = $f["precio"];
			$imagen = $f["imagen"];
		}

		$arreglo[] = $arrayName = array(
			'Id' => $_GET['id'] , 
			'Nombre' => $nombre,
			'Precio' => $precio,
			'Imagen' => $imagen,
			'Cantidad' => 1  );

		$_SESSION['carrito'] = $arreglo;
	}else{

	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  src="./js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
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

$total = 0;

if (isset($_SESSION['carrito'])) {

	$datos = $_SESSION['carrito'];
	


	for ($i = 0; $i < count($datos); $i++	) {

	
		if ( $datos[$i]['Cantidad'] != 0 ) {
			# code...
		
		?>

		<div class="productos">
		<center>
			<img src="./productos/<?php echo $datos[$i]['Imagen'];?>" alt=""> <br>
			<span><?php echo $datos[$i]['Nombre'];?></span> <br>
			<span>Precio: <?php echo $datos[$i]['Precio'];?></span> <br>
			<span>Cantidad: 
				<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>" data-precio="<?php echo $datos[$i]['Precio'];?>"
				data-id="<?php echo $datos[$i]['Id'];?>"
				class="cantidad">
			</span> <br>
			<span class="subtotal">Subtotal: <?php echo $datos[$i]['Precio'] * $datos[$i]['Cantidad'];?></span> <br>

		</center>
		</div>


		<?php

		} # endif

		$total += $datos[$i]['Precio'] * $datos[$i]['Cantidad'];
	}

} else {

	echo "<h2> No has añadido productos</h2>";

}
	echo ' <center> <h2 id="total">Total: ' . $total . ' </h2> </center>';

?>

	<center>
		<a href="./index.php"> Ver Catalogo</a>
	</center>

	</section>
</body>
</html>