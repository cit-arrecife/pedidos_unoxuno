<?php


	class model_mostrar {

		private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		public function cargarEncabezado($idcliente){

			$sql="SELECT FECHA, NRODCTO FROM USUTRADE WHERE CODCLIENTE ='$idcliente' AND FACTURADO = 0";
			error_log($sql);
			$result = odbc_exec($this->db->connect(), $sql);
			$row = odbc_fetch_array($result);
			return $row;


		}

		public function cargarProductos($idcliente, $nrodcto){

			$sql="SELECT  IDPRODUCTO, DETALLE, CANTIDAD, ANCHO, ALTO, VALORUNIT
				  FROM USUMVTRADE WHERE  NRODCTO = '$nrodcto'";
			error_log($sql);
			$result = odbc_exec($this->db->connect(), $sql);

			return $result;
		}
		public function EliminarProductos($idProducto, $nrodcto){

			$sql ="DELETE USUMVTRADE WHERE IDPRODUCTO='$idProducto' AND NRODCTO='$nrodcto'";
			error_log($sql);
			$result = odbc_exec($this->db->connect(), $sql);
			if($result){
				return 'Susess';

			}
		}







	}
?>