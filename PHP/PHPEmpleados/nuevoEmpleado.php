<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$folio = $_POST['folio'];
$nombre = $_POST['nombre']; 
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion']; 
$fechaInicio = $_POST['fechaInicio']; 
$telefono = $_POST['telefono']; 
$comentarios = $_POST['comentarios']; 


$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

$sql="INSERT INTO empleados (folio, nombre, apellidos, direccion, fecha_inicio, telefono, comentarios) VALUES ('$folio','$nombre','$apellidos', '$direccion', '$fechaInicio','$telefono','$comentarios')";
$resultado = mysqli_query($con, $sql);
	echo '<script>
	alert("Datos guardados correctamente");
		window.history.go(-2);
		</script>
	';
 
?>
</body>
</html>