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

$idCliente = $_POST['idCliente'];
$destino = $_POST['destino'];
$hotel = $_POST['hotel']; 
$fechaReserva = $_POST['fechaReserva']; 
$fechas = $_POST['fechas']; 
$asesor = $_POST['asesor']; 
$numAdultos = $_POST['numAdultos']; 
$numMenores = $_POST['numMenores']; 
$numHabitaciones = $_POST['numHabitaciones']; 
$comentarios = $_POST['comentarios']; 

$con_correo = mysqli_connect($host_correo,$user_correo,$pw_correo,$db_correo) or die ("no conecta al servidor local");
mysqli_select_db($con_correo,$db_correo) or die ("no conecta con la base de datos");

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");
mysqli_select_db($con,$db) or die ("no conecta con la base de datos");


$sql="INSERT INTO reservaciones (id_cliente_reservacion, destino_reservacion, hotel_reservacion, fecha_reservacion, fecha_evento_reservacion, asesor_reservacion, num_adultos_reservacion, num_ninos_reservacion, num_habitaciones_reservacion, comentarios_reservacion) VALUES ('$idCliente','$destino','$hotel','$fechaReserva','$fechas','$asesor','$numAdultos','$numMenores','$numHabitaciones','$comentarios')";

$resultado = mysqli_query($con, $sql);

$sql3="SELECT MAX(id_reservaciones) AS id FROM reservaciones";

$rs = mysqli_query($con, $sql3);
if($row = mysqli_fetch_row($rs)){
	$aux = trim($row[0]);
}

foreach($_FILES["imagen"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["imagen"]["name"][$key]) {
			$filename = $_FILES["imagen"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["imagen"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../../docs'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				$sql2="INSERT INTO imagenes (id_reservacion, id_cliente, nombre_imagen, path_imagen) VALUES ('$aux', '$idCliente', '$filename', '$target_path')";
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
									$sql_correo="INSERT INTO correo(id_imagen, id_cliente, id_reservacion, nombre_cliente, apellidos_cliente, correo, fecha_reserva, fecha_viaje, destino, hotel, foto_ubicacion, foto_nombre) VALUES ('$aux_imagenes', '$idCliente', '$aux', '".$fila['nombre_cliente']."', '".$fila['apellidos_cliente']."', '".$fila['correo_cliente']."', '$fechaReserva', '$fechas', '$destino', '$hotel', '$target_path', '$filename')";
									$resultado_correo = mysqli_query($con_correo, $sql_correo);
							}
						}
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
	echo '<script>
	alert("Datos guardados correctamente");
		window.history.go(-2);
		</script>';
?>
</body>
</html>