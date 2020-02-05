<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 



$con = new mysqli($host,$user,$pw,$db);

if(isset($_POST['id'])){
	$id = $_POST['id'];
}
else{
	echo "Error ocurrido. Vuelva a recargar la pagina.";
}

$salida = "";
$query = "SELECT * FROM reservaciones WHERE id_cliente_reservacion = $id ORDER By id_reservaciones";

if(isset($_POST['consulta'])){
	$q = $con->real_escape_string($_POST['consulta']);
	$query = "SELECT id_reservaciones, fecha_reservacion, fecha_evento_reservacion, destino_reservacion, hotel_reservacion, num_adultos_reservacion, num_ninos_reservacion, num_habitaciones_reservacion FROM reservaciones  WHERE (id_cliente_reservacion = $id)  AND (fecha_reservacion LIKE '%".$q."%' OR fecha_evento_reservacion LIKE '%".$q."%' OR destino_reservacion LIKE '%".$q."%' OR hotel_reservacion LIKE '%".$q."%' OR num_adultos_reservacion LIKE '%".$q."%' OR num_ninos_reservacion LIKE '%".$q."%' OR num_habitaciones_reservacion LIKE '%".$q."%')" ;
}
	$resultado = $con->query($query);
	if ($resultado->num_rows > 0) {
		$salida.="<table class='tabla_datos'>
					<thead>
						<tr>
							<td>ID</td>
							<td>Fecha de Reserva</td>
							<td>Fecha de Viaje</td>
							<td>Destino</td>
							<td>Hotel</td>
							<td>Adultos</td>
							<td>Menores</td>
							<td>Habitaciones</td>
							<td>Modificaciones</td>
						</tr>
					</thead>
					<tbody>";
		while($fila = mysqli_fetch_assoc($resultado)){
			$salida.="<tr>
					<td><input type=\"text\" name=\"idToSend\" readonly=\"\" class=\"form-control\" size=\"1\" style='text-align: center; background-color: rgba(255, 255, 255, 0); border: 0;' value=\" ".$fila['id_reservaciones']."\"</td>
					<td>".$fila['fecha_reservacion']."</td>
					<td>".$fila['fecha_evento_reservacion']."</td>
					<td>".$fila['destino_reservacion']."</td>
					<td>".$fila['hotel_reservacion']."</td>
					<td>".$fila['num_adultos_reservacion']."</td>
					<td>".$fila['num_ninos_reservacion']."</td>
					<td>".$fila['num_habitaciones_reservacion']."</td>
					<td><a href=\"../../Interfaz/Clientes/Reservacion.php?idToSend=".$fila['id_reservaciones']."\" class=\"btn btn-primary\">Ver Res.<i class=\"icon-doc-text\"></a></i> </td>
					</form>	
					</tr>
					";
		}

		$salida.="</tbody></table>";
	}else{
		$salida.="No hay Datos";
	}
	echo $salida;

	$con->close();

?>