<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$con = new mysqli($host,$user,$pw,$db);

$salida = "";
$query = "SELECT * FROM clientes ORDER By id_cliente";

if(isset($_POST['consulta'])){
	$q = $con->real_escape_string($_POST['consulta']);
	$query = "SELECT id_cliente, folio_cliente, nombre_cliente, apellidos_cliente FROM clientes WHERE folio_cliente LIKE '%".$q."%' OR nombre_cliente LIKE '%".$q."%' OR apellidos_cliente LIKE '%".$q."%'";
}
	$resultado = $con->query($query);
	if ($resultado->num_rows > 0) {
		$salida.="<table class='tabla_datos'>
					<thead>
						<tr>
							<td>ID</td>
							<td>Num. Folio</td>
							<td>Nombre</td>
							<td>Apellidos</td>
							<td>Modificar</td>
						</tr>
					</thead>
					<tbody>";
		while($fila = mysqli_fetch_assoc($resultado)){
			$salida.="<tr>
					<td><input type=\"text\" name=\"idToSend\" readonly=\"\" class=\"form-control\" size=\"1\" style='text-align: center; background-color: rgba(255, 255, 255, 0); border: 0;' value=\" ".$fila['id_cliente']."\"</td>
					<td>".$fila['folio_cliente']."</td>
					<td>".$fila['nombre_cliente']."</td>
					<td>".$fila['apellidos_cliente']."</td>
					<td><a href=\"../../Interfaz/Clientes/Modificar-EliminarCliente.php?idToSend=".$fila['id_cliente']."\" class=\"btn btn-primary\">Ver Cliente<i class=\"icon-doc-text\"></a></i> </td>
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