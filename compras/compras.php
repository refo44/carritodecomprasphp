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

		$total = 0;

		$tabla = '<table border="1">			
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>' ;

		for ($i=0; $i < count($arreglo) ; $i++) { 
			
			$tabla = $tabla . '<tr>
									<td>' . $arreglo[$i]["Nombre"] .'</td>
									<td>' . $arreglo[$i]["Cantidad"] .'</td>
									<td>' . $arreglo[$i]["Precio"] .'</td>
									<td>' . ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']) .'</td>
								</tr>';
			$total += ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);				
		}

		$tabla .= '</tbody>	 </table>';


		

		
		/* Se debe crear un archivo datos_correo.php con los datos de la pagina y el destinatario con el fomato mostrado en el archivo de ejemplo datos_correo.php.example*/
		require '../datos_correo.php';

		$nombre = "Fulano Perez";
		$fecha = date("d-m-Y");
		$hora = date("H-i-s");
		$asunto = "Compra en carrito";

		$body = '<div style="
							border:1px solid #d6d2d2;
							border-radius:5px;
							padding:10px;
							width:600px;
							height:600px;

		">

		<center>
			<img src="http://dummyimage.com/500x250/4d494d/686a82.gif" alt="placeholder+image" width="500px" height="250px">
			<h1>¡Muchas gracias por comprar en el carrito de compras!</h1>
			<p>Hola, ' .  $nombre . ' ,muchas gracias por comprar. Te enviamos los detalles de tu compra: </p>
			<br>
			<h2>Lista de artículos</h2>
			<p>' . $tabla .'
			<br>
			Total del pago es: ' . $total . '
			</p>
		</center>
			
		</div>';

		

		

		
		$headers = "MIME-Version: 1.0\r\n";

		$headers .= "Content-type: text/html; charset=utf8\r\n";

		$headers .= "From: Remitente\r\n";

		mail($to, $asunto, $body, $headers);



	


		
		unset($_SESSION['carrito']);
		header("Location: ../admin.php");



?>

