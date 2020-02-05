<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$host_correo = "localhost";
$user_correo = "id7810544_correoviajesanjose";
$db_correo = "id7810544_agencia_correo";
$pw_correo = "micorreo3";


$con_correo = mysqli_connect($host_correo,$user_correo,$pw_correo,$db_correo) or die ("no conecta al servidor local");
mysqli_select_db($con_correo,$db_correo) or die ("no conecta con la base de datos");

$cone=mysqli_connect($host,$user,$pw,$db);
mysqli_select_db($cone, $db);

$idToGet = $_GET['idToSend'];
$pathImagen = $_GET['pathImagen'];
echo $pathImagen;



$sql = "DELETE FROM imagenes WHERE id_imagenes = $idToGet";
$sql_correo = "DELETE FROM correo WHERE id_imagen = $idToGet";

	$resultado = mysqli_query($cone,$sql);
	$resultado_correo = mysqli_query($con_correo,$sql_correo);
	if($resultado){
		unlink($pathImagen);
		echo '<script>
	alert("Imagen eliminada correctamente");
		window.history.go(-2);
		</script>
	';
	}
	

?>