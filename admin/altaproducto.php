<?php
	include('../conexion.php');

	if (!isset($_POST['nombre']) && !isset($_POST['descripcion']) && !isset($_POST['precio'])) {
		header('Location: ./agregarproducto.php');
	}else{

		$allowedExts = array("gif","jpeg","jpg","png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		$imagen = "";
		$random = rand(1,999999);

		// verificamos que el archivo sea un formato de imagen soportado 
		if ((($_FILES["file"]["type"]) == "image/gif") 
			|| (($_FILES["file"]["type"]) == "image/jpg")
			|| (($_FILES["file"]["type"]) == "image/jpeg")
			|| (($_FILES["file"]["type"]) == "image/pjpeg")
			|| (($_FILES["file"]["type"]) == "image/x-png")
			|| (($_FILES["file"]["type"]) == "image/png")) {
			
			// verificamos si hay errores al tratar de subir el archivo 
			if ($_FILES["file"]['error'] > 0) {

				echo "Error: " . $_FILES["file"]["error"] . "<br/>"; 
				
			}else{
				// si no hay errores subimos la imagen
				
				$imagen = $random . "_" . $_FILES["file"]["name"];

				//verificamos si ya existe la imagen
				if(file_exists("../productos/" . $random . '_' . $_FILES['file']['name'] )){

					echo $_FILES["file"]["name"] . " ya existe.";

				}else{

					move_uploaded_file($_FILES["file"]["tmp_name"], "../productos/" . $random . '_' . $_FILES["file"]["name"] );
					echo "Archivo guardado en: " . "../productos/" . $random . '_' . $_FILES['file']['name'];

					$producto = $_POST['nombre'];
					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					$sql = "INSERT INTO productos (nombre, descripcion, imagen, precio) VALUES (
						'" . $producto . "' ,
						'" . $descripcion . "' ,
						'" . $imagen . "' ,
						'" . $precio . "')";

						mysql_query($sql); 

						header("Location: ../admin.php");

				}

			}
		}else

			echo "formato no soportado";

		}
		?>