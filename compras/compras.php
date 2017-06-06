<?php
session_start();
include "../conexion.php";
		$arreglo=$_SESSION['carrito'];
		$numeroventa=0;
		$re=mysql_query("SELECT * FROM compras ORDER BY numeroventa DESC LIMIT 1") or die(mysql_error());	
		while (	$f=mysql_fetch_array($re)) {
					$numeroventa=$f['numeroventa'];	
		}
		if($numeroventa==0){
			$numeroventa=1;
		}else{
			$numeroventa=$numeroventa+1;
		}
		for($i=0; $i<count($arreglo);$i++){
			mysql_query("INSERT INTO compras (numeroventa, imagen,nombre,precio,cantidad,subtotal) VALUES(
				".$numeroventa.",
				'".$arreglo[$i]['Imagen']."',
				'".$arreglo[$i]['Nombre']."',	
				'".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
				)")or die(mysql_error());
		}
		unset($_SESSION['carrito']);

		header("Location: ../admin.php");


?>

