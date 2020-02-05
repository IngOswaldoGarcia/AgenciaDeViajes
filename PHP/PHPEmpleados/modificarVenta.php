<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idVenta = $_POST['idVenta'];
$idEmpleado = $_POST['idEmpleado'];
$nombre = $_POST['nombre']; 
$apellidos = $_POST['apellidos']; 
$lugar = $_POST['lugar']; 
$fecha = $_POST['fecha']; 

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

if (isset( $_POST['actualizar'])) {
	$sql="UPDATE ventas SET venta_nombre_cliente = '$nombre', venta_apellidos_cliente = '$apellidos', venta_lugar = '$lugar', venta_fecha_evento = '$fecha' WHERE id_ventas = $idVenta";
	$resultado = mysqli_query($con, $sql);
	echo '<script>
	alert("Datos actualizados correctamente");
		window.history.go(-2);
		</script>
	';
	}

 if(isset($_POST['eliminar'])){
	$sql="DELETE FROM ventas WHERE id_ventas = $idVenta";
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