<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$con = new mysqli($host,$user,$pw,$db);

$salida = "";
$query = "SELECT * FROM empleados ORDER By id_empleados";

if(isset($_POST['consulta'])){
	$q = $con->real_escape_string($_POST['consulta']);
	$query = "SELECT id_empleados, folio, nombre, apellidos FROM empleados WHERE folio LIKE '%".$q."%' OR nombre LIKE '%".$q."%' OR apellidos LIKE '%".$q."%'";
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
					<td><input type=\"text\" name=\"idToSend\" readonly=\"\" class=\"form-control\" size=\"1\" style='text-align: center; background-color: rgba(255, 255, 255, 0); border: 0;' value=\" ".$fila['id_empleados']."\"</td>
					<td>".$fila['folio']."</td>
					<td>".$fila['nombre']."</td>
					<td>".$fila['apellidos']."</td>
					<td><a href=\"../../Interfaz/Empleados/ActualizarEmpleado.php?idToSend=".$fila['id_empleados']."\" class=\"btn btn-primary\">Ver Empleado<i class=\"icon-doc-text\"></a></i> </td>
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