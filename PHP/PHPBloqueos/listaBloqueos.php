<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$consulta = '';

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");


function obtenerDatos(){
			global $con, $consulta;
			$sql= 'SELECT * FROM bloqueos';
			return $con->query($sql);
		}
?>