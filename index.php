<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="loginEstilos.css">
	<title></title>
</head>
<body>
<p>Para Registrarte ingresa tus datos personales</p>
<form action="index.php" method="POST">
	<input type="text" name="nom" placeholder="Nombre" id="nom" required><br>
	<input type="text" name="apePat" placeholder="Apellido Paterno" id="apePat" required><br>
	<input type="text" name="apeMat" placeholder="Apellido Materno" id="apeMat" required><br>
	<input type="text" name="dir" placeholder="Direccion"  required><br>
	<input type="text" name="tel" placeholder="Numero Telefonico" required><br>
	<input type="email" name="dirEmail" placeholder="Ej.;usuarioservidor.com"  required><br>

	<p>Finalmente captura el usuario y el password con el que accederas posteriormente</p>
	<input type="text" name="texto" placeholder="usuario" id="texto" required><br>
	<input type="text" name="pass" placeholder="password" id="pass" required><br><br>
	<input type="submit" name="Guardar valores">
	<input type="reset" name="restaurar">
	<div id="todolist">
		<?php
		$servidor="localhost";
		$nombreusuario="root";
		$password="";
		$db="logeo1";

		$conexion= new mysqli($servidor, $nombreusuario, $password, $db);
		if ($conexion->connect_error) {
			die("conexion fallida" .$conexion->connect_error);
		}
		if (isset($_POST['texto'])) {
			$texto=$_POST['texto'];
			$pass=$_POST['pass'];
			$nom=$_POST['nom'];
			$ape=$_POST['apePat'];
			$apeM=$_POST['apeMat'];
			$dir=$_POST['dir'];
			$tel=$_POST['tel'];
			$email=$_POST['dirEmail'];

			$sql = "INSERT INTO usuarios(usuario,contraseña,nombre,apellidosPat,apellidosMat,direccion,telefono,email) VALUES('$texto','$pass','$nom','$ape','$apeM','$dir','$tel','$email') ";

			if($conexion->query($sql)===true)
			{
			echo "<br>";
			echo "Bienvenido," .$nom . " " . $ape . " " . $apeM . " " . "Tus datos se han registrado correctamente";	

			}else{
				die("Error al intentar registrarse" . $conexion->error);
			}
			$conexion->close();
		}
		?>
		<br>
	
		<a href="../Logeo/index.html">Acceder</a>
	</div>
</form>
</body>
</html>