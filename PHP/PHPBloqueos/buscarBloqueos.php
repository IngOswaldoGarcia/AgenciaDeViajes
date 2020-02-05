
<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3";    


$con = new mysqli($host,$user,$pw,$db);

$salida = "";
$query = "SELECT * FROM bloqueos ORDER By id_bloqueos";

if(isset($_POST['consulta'])){
	$q = $con->real_escape_string($_POST['consulta']);
	$query = "SELECT id_bloqueos, fecha_entrada, lugar, hotel FROM bloqueos WHERE fecha_entrada LIKE '%".$q."%' OR lugar LIKE '%".$q."%' OR hotel LIKE '%".$q."%'";
}
	$resultado = $con->query($query);
	if ($resultado->num_rows > 0) {
		$salida.="<table class='tabla_datos'>
					<thead>
						<tr>
							<td>ID</td>
							<td>Fecha del bloqueo</td>
							<td>Lugar</td>
							<td>Hotel</td>
							<td>Modificar</td>
						</tr>
					</thead>
					<tbody>";
		while($fila = mysqli_fetch_assoc($resultado)){
			$salida.="<tr>
					<td><input type=\"text\" name=\"idToSend\" readonly=\"\" class=\"form-control\" size=\"1\" style='text-align: center; background-color: rgba(255, 255, 255, 0); border: 0;' value=\" ".$fila['id_bloqueos']."\"</td>
					<td>".$fila['fecha_entrada']."</td>
					<td>".$fila['lugar']."</td>
					<td>".$fila['hotel']."</td>
					<td><a href=\"../../Interfaz/Bloqueos/ActualizarBloqueo.php?idToSend=".$fila['id_bloqueos']."\" class=\"btn btn-primary\">Ver Venta<i class=\"icon-doc-text\"></a></i> </td>
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