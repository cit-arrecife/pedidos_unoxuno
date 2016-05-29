<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
	

	class model_adicionales {

		private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function consultarAdicional($nombreAdicional, $tipoProducto, $tablaAdicional) {
			$sql = " SELECT nombre$tablaAdicional, precio$tablaAdicional, tipoProducto$tablaAdicional FROM $tablaAdicional WHERE nombre$tablaAdicional = '$nombreAdicional' AND tipoProducto$tablaAdicional = '$tipoProducto' ";
			
			$result = odbc_exec($this->db->connect(), $sql);
			$row = odbc_fetch_array($result);
			
			return $row;
		}

		public function actualizarAdicional($nombreAdicional, $precioAdicional, $tipoProducto, $tablaAdicional) {
			$sql = " UPDATE $tablaAdicional SET precio$tablaAdicional = '$precioAdicional' WHERE nombre$tablaAdicional = '$nombreAdicional' AND tipoProducto$tablaAdicional = '$tipoProducto' ";
			$result = odbc_exec($this->db->connect(), $sql);
			if ($result) {
				$sql = " SELECT nombre$tablaAdicional, precio$tablaAdicional, tipoProducto$tablaAdicional FROM $tablaAdicional WHERE nombre$tablaAdicional = '$nombreAdicional' AND tipoProducto$tablaAdicional = '$tipoProducto' ";
				$result = odbc_exec($this->db->connect(), $sql);
				$row = odbc_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function consultarProducto($codigo) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA, PRECIO FROM mtmercia INNER JOIN mvprecio ON CODIGO = CODPRODUC WHERE CODIGO = '$codigo' ";
			$result = odbc_exec($this->db->connect(), $sql);
			$row = odbc_fetch_array($result);
			return $row;
		}

		public function consultarProductoAutocomplete($buscar_producto) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia WHERE CODIGO LIKE '%$buscar_producto%' OR DESCRIPCIO LIKE '%$buscar_producto%' ORDER BY DESCRIPCIO DESC LIMIT 0, 5 ";
			$result = odbc_exec($this->db->connect(), $sql);
			return $result;
		}

		public function listarProductos() {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia ORDER BY DESCRIPCIO DESC LIMIT 0, 50 ";
			$result = odbc_exec($this->db->connect(), $sql);
			return $result;
		}

	}

?>