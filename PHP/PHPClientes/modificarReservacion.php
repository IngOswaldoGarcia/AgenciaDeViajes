<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$host_correo = "localhost";
$user_correo = "id7810544_correoviajesanjose";
$db_correo = "id7810544_agencia_correo";
$pw_correo = "micorreo3";

$idReservacion = $_POST['idReservacion'];
$idCliente = $_POST['idCliente'];
$destino = $_POST['destino']; 
$hotel = $_POST['hotel']; 
$fechaReserva = $_POST['fechaReserva']; 
$fechas = $_POST['fechas']; 
$agente = $_POST['agente']; 
$pagosCliente = $_POST['pagosCliente'];
$pagosAgencia = $_POST['pagosAgencia']; 
$numAdultos = $_POST['numAdultos']; 
$numMenores = $_POST['numMenores']; 
$habitaciones = $_POST['habitaciones']; 
$comentarios = $_POST['comentarios']; 

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");
mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

$con_correo = mysqli_connect($host_correo,$user_correo,$pw_correo,$db_correo) or die ("no conecta al servidor local");
mysqli_select_db($con_correo,$db_correo) or die ("no conecta con la base de datos");


if (isset( $_POST['actualizar'])) {
	$sql="UPDATE reservaciones SET destino_reservacion = '$destino', hotel_reservacion = '$hotel', fecha_reservacion = '$fechaReserva', fecha_evento_reservacion = '$fechas', asesor_reservacion = '$agente',  num_adultos_reservacion = '$numAdultos', num_ninos_reservacion = '$numMenores', num_habitaciones_reservacion = '$habitaciones', pagos_cliente_reservacion = '$pagosCliente', pagos_agencia_reservacion = '$pagosAgencia', comentarios_reservacion = '$comentarios' WHERE id_reservaciones = $idReservacion";
	$resultado = mysqli_query($con, $sql);


	$sql_correo="UPDATE correo SET fecha_reserva = '$fechaReserva', fecha_viaje = '$fechas', destino = '$destino', hotel = '$hotel' WHERE id_reservacion = $idReservacion";
	$resultado_correo = mysqli_query($con_correo, $sql_correo);
   

	if($_FILES['imagen']['tmp_name'] == ""){
	}
	else {
		foreach($_FILES["imagen"]['tmp_name'] as $key => $tmp_name)
	{
		if($_FILES["imagen"]["name"][$key]) {
			$filename = $_FILES["imagen"]["name"][$key]; 
			$source = $_FILES["imagen"]["tmp_name"][$key]; 
			
			$directorio = '../../docs'; 
			
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); 
			$target_path = $directorio.'/'.$filename; 
			
			if(move_uploaded_file($source, $target_path)) {	
				$sql2="INSERT INTO imagenes (id_reservacion, id_cliente, nombre_imagen, path_imagen) VALUES ('$idReservacion', '$idCliente', '$filename', '$target_path')";
				$resultado2 = mysqli_query($con, $sql2);


				$sql_correo_imagenes="SELECT MAX(id_imagenes) AS id FROM imagenes";

					$rs = mysqli_query($con, $sql_correo_imagenes);
					if($row = mysqli_fetch_row($rs)){
						$aux_imagenes = trim($row[0]);
					}

					$sql_correo_cliente = "SELECT * FROM clientes WHERE id_cliente = $idCliente";
						$resultado_correo_cliente = mysqli_query($con,$sql_correo_cliente);
						while ($fila = mysqli_fetch_array($resultado_correo_cliente)){
							if($fila){
									$sql_correo="INSERT INTO correo(id_imagen, id_cliente, id_reservacion, nombre_cliente, apellidos_cliente, correo, fecha_reserva, fecha_viaje, destino, hotel, foto_ubicacion, foto_nombre) VALUES ('$aux_imagenes', '$idCliente', '$idReservacion', '".$fila['nombre_cliente']."', '".$fila['apellidos_cliente']."', '".$fila['correo_cliente']."', '$fechaReserva', '$fechas', '$destino', '$hotel', '$target_path', '$filename')";
									$resultado_correo = mysqli_query($con_correo, $sql_correo);
							}
						}
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); 
		}
	}
		}
		echo '<script>
	alert("Datos actualizados correctamente");
		window.history.go(-2);
		</script>
	';

	}

 if(isset($_POST['eliminar'])){
	$sql="DELETE FROM reservaciones WHERE id_reservaciones = $idReservacion";
	$resultado = mysqli_query($con, $sql);
	$sql2 = "SELECT * FROM imagenes WHERE id_reservacion = $idReservacion";
	$resultado2 = mysqli_query($con,$sql2);
	while ($fila = mysqli_fetch_array($resultado2)){
		if($fila){
			unlink($fila['path_imagen']);
		}
	}
	$sql3="DELETE FROM imagenes WHERE id_reservacion = $idReservacion";
	$resultado3 = mysqli_query($con, $sql3);
	$sql_correo="DELETE FROM correo WHERE id_reservacion = $idReservacion";
	$resultado_correo = mysqli_query($con_correo, $sql_correo);
	
	echo '<script>
	alert("Datos eliminados correctamente");
		window.history.go(-2);
		</script>
	';
}

if (isset( $_POST['mail'])) {

	$sql_mail ="SELECT * FROM correo WHERE id_reservacion = $idReservacion";
	$resultado_mail = mysqli_query($con_correo, $sql_mail);
	$Email = 'correoviajesanjose@gmail.com';
	$Nombre = $resultado_mail['nombre_cliente'] . ' ' . $resultado_mail['nombre_cliente'];
	$recibe = $resultado_mail['correo'];	
	$asunto = 'PAGOS HECHOS PARA RESERVACION';
	while($fila = mysqli_fetch_array($resultado_mail)){
		if($fila){
			$Mensaje = $fila['foto_ubicacion'];
		}
	}

        //para el envío en formato HTML
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        //dirección del remitente
        $headers .= "From: ".$Nombre." <".$Email.">\r\n";
        //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
        $headers .= "Reply-To: ".$Email."\r\n";
        //Direcciones que recibián copia
        //$headers .= "Cc: ejemplo2@gmail.com\r\n";
        //direcciones que recibirán copia oculta
        //$headers .= "Bcc: ejemplo3@yahoo.com\r\n";
        if(mail($recibe,$asunto,$Mensaje,$headers)){
    		echo "<script>alert('Funcion \"mail()\" ejecutada, por favor verifique su bandeja de correo.');</script>";
    	}else{
    		echo "<script>alert('No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.');</script>";
    	}

}

	/*echo '<script>
	alert("correo enviado correctamente");
		window.history.go(-1);
		</script>
	';	
	}*/

?>
</body>
</html>