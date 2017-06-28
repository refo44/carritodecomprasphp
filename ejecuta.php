<?php

include "./conexion.php";

if ($_POST['Caso'] == "Eliminar") {

	mysql_query("DELETE FROM productos WHERE id = $_POST[Id]");

	$path = dirname(__FILE__) . "/productos/" . trim($_POST['Imagen']);

	if (unlink($path)) {    
    
    	echo "El producto se ha eliminado";

	} else {

					$error = error_get_last();
	    			print_r($error["message"]);   
	}
	
}

if ($_POST['Caso'] == "Modificar") {

	mysql_query("UPDATE productos SET nombre = '$_POST[Nombre]' WHERE id = '$_POST[Id]'");
	mysql_query("UPDATE productos SET descripcion = '$_POST[Descripcion]' WHERE id = '$_POST[Id]'");
	mysql_query("UPDATE productos SET precio = '$_POST[Precio]' WHERE id = '$_POST[Id]'");
	
	print_r("datos actualizados");

    
    	  
}
