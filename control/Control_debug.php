<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
		require_once '../utilities/db/db_connect.php';
	$db = new db_connect();
	$conn = $db->connect();
	$db->connect();	

	$elegir = $_GET['elegir'];

$buscar_producto = $_GET['producto'];

	if($conn){
		$response["Mensaje"] ='Conexion se realizo bien';
		echo json_encode($response);
	}else{
		$response["Mensaje"] ='Conexion fallo '.odbc_error();
		echo json_encode($response);

	}


		$datos_productos = consultarProductoAutocomplete($buscar_producto);
		if ($datos_productos) {

			while ($row = odbc_fetch_array($datos_productos)) {
				$response["Codigo"] = $row["CODIGO"];
				$response["Nombre"] = $row["DESCRIPCIO"];
				$response["Iva"] = $row["IVA"];
				$json[] = $response;
			}
			echo json_encode($json);

		} else {

		}

		public function consultarProductoAutocomplete($buscar_producto) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia WHERE CODIGO LIKE '%$buscar_producto%' OR DESCRIPCIO LIKE '%$buscar_producto%' ORDER BY DESCRIPCIO DESC LIMIT 0, 5 ";

			$result = odbc_exec($conn, $sql);

			
			return $result;
		}

?>