<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
	

	class model_propio {

		private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		public function Cargar_descuento_distri($Nombre){
			$sql="SELECT DESCCOMER FROM MTPROCLI WHERE NOMBRE ='$Nombre'";
			
			$result = odbc_exec($this->db->connect(), $sql);
			$row = odbc_fetch_array($result);
			return $row;
			
		}

		public function BuscarMotor($tipomotor, $tipoproducto){
		$sql="SELECT descripcionMotor FROM MOTOR WHERE carreraMotor ='$tipomotor' AND tipoProducto='$tipoproducto'";
			
			$result = odbc_exec($this->db->connect(), $sql);
			return $result;
		}
		public function precio_motor($tipomotor, $tipoproducto){
		$sql="SELECT precioMotor FROM MOTOR WHERE descripcionMotor ='$tipomotor' AND tipoProducto='$tipoproducto'";
			
			$result = odbc_exec($this->db->connect(), $sql);
			$row= odbc_fetch_array($result);
			return $row;
		}
		public function detalles_motor($tipomotor, $tipoproducto){
			$sql="SELECT activacion, voltaje, tubo, RPM, amperaje FROM MOTOR WHERE descripcionMotor ='$tipomotor' AND tipoProducto='$tipoproducto'";
			//error_log($sql);
			$result = odbc_exec($this->db->connect(), $sql);
			return $result;

		}


	}
	?>