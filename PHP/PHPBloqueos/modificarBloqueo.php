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
$fecha_entrada = $_POST['fecha_entrada'];
$fecha_salida = $_POST['fecha_salida']; 
$lugar = $_POST['lugar']; 
$hotel = $_POST['hotel']; 
$habit_total = $_POST['habit_total']; 
$habit_dispo = $_POST['habit_dispo'];  

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

if (isset( $_POST['actualizar'])) {
	$sql="UPDATE bloqueos SET fecha_entrada = '$fecha_entrada', fecha_salida = '$fecha_salida', lugar = '$lugar', hotel = '$hotel', habit_total = '$habit_total', habit_dispo = '$habit_dispo' WHERE id_bloqueos = $id";
	$resultado = mysqli_query($con, $sql);
	echo '<script>
	alert("Datos actualizados correctamente");
		window.history.go(-2);
		</script>
	';
	}

 if(isset($_POST['eliminar'])){
 	$sql="DELETE FROM bloqueos WHERE id_bloqueos = $id";
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