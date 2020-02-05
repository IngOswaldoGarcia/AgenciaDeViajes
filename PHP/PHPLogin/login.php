<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$con = new mysqli($host,$user,$pw,$db);


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	$con ->set_charset('utf8');

	$usuario = $con->real_escape_string($_POST['userlg']);
	$pass = $con->real_escape_string($_POST['passlg']); 

	if($nueva_consulta = $con->prepare("SELECT nombre_usuario, password FROM login WHERE nombre_usuario = ? AND password = ?")){

		$nueva_consulta->bind_param('ss', $usuario, $pass);

		$nueva_consulta->execute();

		$resultado = $nueva_consulta->get_result();

		if($resultado->num_rows == 1){
			$datos = $resultado->fetch_assoc();
			echo json_encode(array('error'=>false,'nombre'=>'correcto'));
		} else{
			echo json_encode(array('error'=>true));
		}
		$nueva_consulta->close();
	}
}

?>
