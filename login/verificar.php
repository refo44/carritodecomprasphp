<?php

session_start();

include './../conexion.php';

$re = mysql_query("SELECT * FROM usuarios WHERE usuario ='" . $_POST['usuario'] . "' AND
					password ='" . $_POST['password'] . "' ") or die("No se pudo realizar la consulta a la base de datos: " . mysql_error());

	while($re = mysql_fetch_array($re)){
		$arreglo[] = array('Nombre' => $f['nombre'], 'Apellido' => $f['apellido'],
			'Imagen' => $f['imagen']); 
	}

	if(isset($arreglo)){

		$_SESSION['Usuario'] = $arreglo;
		header("Location: ./../admin.php");

	}else{

		header("Location: ./../login.php?error2= datos no validos");
	}

?>