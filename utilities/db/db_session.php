<?php

	require_once 'db_connect.php';
	$db = new db_connect();
	$conn = $db->connect();
	$db->connect();

	session_start();

	if (empty($_POST['codigo_usuario']) || empty($_POST['password_usuario']))
	{
		if(!isset($_SESSION['usuario_codigo']))
		{
			header("Location: ../index.php");
		}
	}
	
	else
	{

		$codigoUsuario = $_POST['codigo_usuario'];
		$passwordUsuario = $_POST['password_usuario'];

		$codigoUsuario = stripslashes($codigoUsuario);
		$passwordUsuario = stripslashes($passwordUsuario);
		$codigoUsuario = $codigoUsuario;
		$passwordUsuario = $passwordUsuario;
		// $codigoUsuario = mysql_real_escape_string($codigoUsuario);
		// $passwordUsuario = mysql_real_escape_string($passwordUsuario);

		$sql = " SELECT NIT, NOMBRE FROM MTPROCLI
		WHERE NIT = '$codigoUsuario' AND PASSWORDLOG = '$passwordUsuario' ";
		
		$result = odbc_exec($db->connect(), $sql);
		
		$row = odbc_fetch_array($result);
		
		
		if ($row) {
			$_SESSION['usuario_codigo'] = $row["NIT"];
			$_SESSION['usuario_nombre'] = $row["NOMBRE"];
			$response["Success"] = 1;
			echo json_encode($response);

		} else {
			$response["Success"] = 0;
			$response["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Error!</strong> Combinación de usuario y contraseña incorrecta.</div>';
			echo json_encode($response);
		}
	}

?>