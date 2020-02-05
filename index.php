
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Interfaz/css/main.css">
	<title>Login</title>
</head>
<body>	
			<div class="error">
				<span>Datos ingresados no validos, intentalo de nuevo</span>
			</div>

			<div class="main">
				<form action="" id="formlg">
					<input type="text" name="userlg" placeholder="Usuario" required pattern="[A-Za-z0-9_-]{1,15}" />
					<input type="password" name="passlg" placeholder="Contraseña" required pattern="[A-Za-z0-9_-]{1,15}"/>
					<input type="submit" class="botonlg" value="Iniciar Sesion"/>
				</form>
			</div>
		<script src="JS/JSLogin/jquery-3.3.1.min.js"></script>
		<script src="JS/JSLogin/login.js"></script>

</body>
</html>
