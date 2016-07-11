<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php
require_once 'connect.php';

$db   = new connect();
$conn = $db->connect();
$db->connect();

session_start();

	
if (empty($_POST['codigo']) || empty($_POST['password'])) {
	if (!isset($_SESSION['ADMINISTRADOR'])) {
		header("Location: ../index.php");
	}
} else {

	$codigo   = $_POST['codigo'];
	$password = $_POST['password'];
	 $password =md5($password);

	$sql    = "SELECT CODIGO, NOMBRE FROM USUAPPADMIN WHERE CODIGO='$codigo' AND PASSWOORD ='$password'";
	
	$result = odbc_exec($conn, $sql);

	$row = odbc_fetch_array($result);


	if ($row) {
		$_SESSION['_codigo'] = $row['CODIGO'];
		$_SESSION['_nombre'] = $row['NOMBRE'];
		$_SESSION['_login'] = date('Y-m-d H:i:s');
		$_SESSION['ADMINISTRADOR'] = 'Administrador';
		$response["Success"]        = 1;

		echo json_encode($response);

	} else {
		$response["Success"] = 0;
		$response["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Error!</strong>usuario y/o contraseña incorrecta.</div>';
		echo json_encode($response);
	}

}

?>