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
$query = "SELECT * FROM ventas WHERE id_empleado = $id ORDER By id_ventas";

if(isset($_POST['consulta'])){
	$q = $con->real_escape_string($_POST['consulta']);
	$query = "SELECT id_ventas, venta_nombre_cliente, venta_apellidos_cliente, venta_lugar, venta_fecha_evento FROM ventas WHERE (id_empleado = $id) AND (venta_nombre_cliente LIKE '%".$q."%' OR venta_apellidos_cliente LIKE '%".$q."%' OR venta_lugar LIKE '%".$q."%' OR venta_fecha_evento LIKE '%".$q."%')";
}
	$resultado = $con->query($query);
	if ($resultado->num_rows > 0) {
		$salida.="<table class='tabla_datos'>
					<thead>
						<tr>
							<td>ID</td>
							<td>Nombre del cliente</td>
							<td>Apellidos</td>
							<td>Lugar</td>
							<td>Fecha del evento</td>
							<td>Modificar</td>
						</tr>
					</thead>
					<tbody>";
		while($fila = mysqli_fetch_assoc($resultado)){
			$salida.="<tr>
					<td><input type=\"text\" name=\"idToSend\" readonly=\"\" class=\"form-control\" size=\"1\" style='text-align: center; background-color: rgba(255, 255, 255, 0); border: 0;' value=\" ".$fila['id_ventas']."\"</td>
					<td>".$fila['venta_nombre_cliente']."</td>
					<td>".$fila['venta_apellidos_cliente']."</td>
					<td>".$fila['venta_lugar']."</td>
					<td>".$fila['venta_fecha_evento']."</td>
					<td><a href=\"../../Interfaz/Empleados/ActualizarVenta.php?idToSend=".$fila['id_ventas']."\" class=\"btn btn-primary\">Ver Venta<i class=\"icon-doc-text\"></a></i> </td>
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