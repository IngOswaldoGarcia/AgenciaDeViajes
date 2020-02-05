<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$fecha_entrada = $_POST['fecha_entrada'];
$fecha_salida = $_POST['fecha_salida']; 
$lugar = $_POST['lugar'];
$hotel = $_POST['hotel']; 
$habit_total = $_POST['habit_total']; 
$habit_dispo = $_POST['habit_dispo']; 
 


$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

$sql="INSERT INTO bloqueos (fecha_entrada, fecha_salida, lugar, hotel, habit_total,habit_dispo) VALUES ('$fecha_entrada','$fecha_salida','$lugar', '$hotel', '$habit_total','$habit_dispo')";
$resultado = mysqli_query($con, $sql);
	echo '<script>
	alert("Datos guardados correctamente");
		window.history.go(-2);
		
		</script>
	';

?>
</body>
</html>