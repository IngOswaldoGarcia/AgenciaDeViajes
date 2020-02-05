<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$id = $_POST['id'];
$folio = $_POST['folio'];
$nombre = $_POST['nombre']; 
$apellidos = $_POST['apellidos']; 
$direccion = $_POST['direccion']; 
$fechaInicio = $_POST['fechaInicio']; 
$telefono = $_POST['telefono']; 
$comentarios = $_POST['comentarios']; 

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

if (isset( $_POST['actualizar'])) {
	$sql="UPDATE empleados SET folio = '$folio', nombre = '$nombre', apellidos = '$apellidos', direccion = '$direccion', fecha_inicio = '$fechaInicio', telefono = '$telefono', comentarios = '$comentarios' WHERE id_empleados = $id";
	$resultado = mysqli_query($con, $sql);
	echo '<script>
	alert("Datos actualizados correctamente");
		window.history.go(-2);
		</script>
	';
	}

 if(isset($_POST['eliminar'])){
 	$sql="DELETE FROM empleados WHERE id_empleados = $id";
	$resultado = mysqli_query($con, $sql);
	$sql="DELETE FROM ventas WHERE id_ventas = $id";
	$resultado = mysqli_query($con, $sql);
	echo '<script>
	alert("Datos eliminados correctamente");
		window.history.go(-2);
		</script>
	';
}

?>
</body>
</html>