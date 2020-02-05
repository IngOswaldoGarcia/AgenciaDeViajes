<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$host_correo = "localhost";
$user_correo = "id7810544_correoviajesanjose";
$db_correo = "id7810544_agencia_correo";
$pw_correo = "micorreo3";

$id = $_POST['id'];
$folio = $_POST['folio'];
$nombre = $_POST['nombre']; 
$apellidos = $_POST['apellidos']; 
$telefono = $_POST['telefono']; 
$email = $_POST['email']; 
$ciudad = $_POST['ciudad']; 

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");
mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

$con_correo = mysqli_connect($host_correo,$user_correo,$pw_correo,$db_correo) or die ("no conecta al servidor local");
mysqli_select_db($con_correo,$db_correo) or die ("no conecta con la base de datos");

if (isset( $_POST['actualizar'])) {
	$sql="UPDATE clientes SET folio_cliente = '$folio', nombre_cliente = '$nombre', apellidos_cliente = '$apellidos', telefono_cliente = '$telefono', correo_cliente = '$email',  ciudad_cliente = '$ciudad' WHERE id_cliente = $id";
	$resultado = mysqli_query($con, $sql);

	$sql_correo="UPDATE correo SET nombre_cliente = '$nombre', apellidos_cliente = '$apellidos', correo = '$email' WHERE id_cliente = $id";
	$resultado_correo = mysqli_query($con_correo, $sql_correo);

	echo '<script>
	alert("Datos actalizados correctamente");
		window.history.go(-2);
		</script>
	';
	}

 if(isset($_POST['eliminar'])){
 	$sql="DELETE FROM clientes WHERE id_cliente = $id";
	$resultado = mysqli_query($con, $sql);
	$sql="DELETE FROM reservaciones WHERE id_cliente_reservacion = $id";
	$resultado = mysqli_query($con, $sql);
	$sql2 = "SELECT * FROM imagenes WHERE id_cliente = $id";
	$resultado2 = mysqli_query($con,$sql2);
	while ($fila = mysqli_fetch_array($resultado2)){
		if($fila){
			unlink($fila['path_imagen']);
		}
	}
	$sql3="DELETE FROM imagenes WHERE id_cliente = $id";
	$resultado3 = mysqli_query($con, $sql3);

	$sql_correo="DELETE FROM correo WHERE id_cliente = $id";
	$resultado_correo = mysqli_query($con_correo,$sql_correo); 

	echo '<script>
	alert("Datos eliminados correctamente");
		window.history.go(-2);
		</script>
	';
}

?>
</body>
</html>