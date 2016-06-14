<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php


	class model_myorders {

		private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		public function cargarPedidos($idcliente){

			//$sql="SELECT  IDPRODUCTO, DETALLE, CANTIDAD, ANCHO, ALTO, VALORUNIT, PRODUCTO
			//	  FROM USUMVTRADE WHERE  NRODCTO = '$nrodcto'";

			$sql="SELECT DISTINCT(T.NRODCTO), T.FECHA, T.BRUTO FROM TRADE T
				  JOIN MVTRADE M
				  ON T.NRODCTO = M.NRODCTO
				  AND M.FACTURADO ='0'
				  AND M.ORIGEN ='FAC'
				  AND M.TIPODCTO='PD'
				  AND T.NIT ='$idcliente'";

			error_log($sql);
			$result = odbc_exec($this->db->connect(), $sql);

			return $result;
		}

		public function cargarProductos($nrodcto){

			$sql="SELECT  NOTA, CANTIDAD, ANCHO, ALTO, VALORUNIT, PRODUCTO
				  FROM MVTRADE WHERE  NRODCTO = '$nrodcto'
				  AND FACTURADO='0'
				  AND ORIGEN ='FAC'
				  AND TIPODCTO='PD'";
			error_log($sql);
			$result = odbc_exec($this->db->connect(), $sql);

			return $result;
		}
	}
?>