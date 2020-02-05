<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idEmpleado = $_POST['idEmpleado'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos']; 
$lugar = $_POST['lugar']; 
$fecha = $_POST['fecha']; 


$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

$sql="INSERT INTO ventas (id_empleado, venta_nombre_cliente, venta_apellidos_cliente, venta_lugar, venta_fecha_evento) VALUES ('$idEmpleado','$nombre','$apellidos','$lugar','$fecha')";
$resultado = mysqli_query($con, $sql);

echo '<script>
	alert("Datos guardados correctamente");
		window.history.go(-2);
		</script>
	';
?>
</body>
</html>