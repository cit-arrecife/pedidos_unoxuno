<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php 
		class modelo_validar{

			private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

			public function validar_producto($tipoproducto){
				$sql = "SELECT tipoPresentacionProducto from PRODUCTOSUNO WHERE tipoProducto ='$tipoproducto' GROUP BY tipoPresentacionProducto ";
				$result = odbc_exec($this->db->connect(), $sql);
				return $result;
			}
			public function validar_presentacion($tipoproducto, $presentacionproducto){
				$sql = "SELECT tipoTelaProducto FROM PRODUCTOSUNO WHERE tipoProducto ='$tipoproducto' and tipoPresentacionProducto='$presentacionproducto' GROUP BY tipoTelaProducto";
				$result = odbc_exec($this->db->connect(), $sql);
				return $result;
			}
			public function validar_tela($tipoproducto, $presentacionproducto, $telaproducto){
				$sql = "SELECT telaProducto FROM PRODUCTOSUNO WHERE tipoProducto ='$tipoproducto' and tipoPresentacionProducto='$presentacionproducto' and tipoTelaProducto='$telaproducto'";
				$result = odbc_exec($this->db->connect(), $sql);
				return $result;
			}
			public function validar_color($tipotela, $tela){
				$sql = "SELECT colorTela from COLORESPRODUCTO WHERE tipoTela ='$tipotela' AND nombreTela ='$tela'";
				error_log($sql);
				$result = odbc_exec($this->db->connect(), $sql);
				return $result;
			}
			public function seleccionar_producto($tipoproducto, $presentacionproducto, $tipoTelaProducto,$telaproducto){
				$sql = "SELECT Precio FROM PRODUCTOSUNO
						WHERE tipoProducto='$tipoproducto' 
						and tipoPresentacionProducto='$presentacionproducto'
						and tipoTelaProducto='$tipoTelaProducto' 
						and telaProducto='$telaproducto'";
				//error_log($sql);
				$result = odbc_exec($this->db->connect(), $sql);
				$row = odbc_fetch_array($result);
				return $row;
			}
			public function Perfil($tipoproducto){
				$sql="SELECT DISTINCT(nombrePerfil) FROM PERFIL WHERE tipoPerfil='$tipoproducto'";
				//error_log($sql);
				$result = odbc_exec($this->db->connect(), $sql);
				return $result;
			}
			public function Perfil_Color($nombreperfil){
				$sql="select colorPerfil from PERFIL WHERE nombrePerfil='$nombreperfil'";
				error_log($sql);
				$result = odbc_exec($this->db->connect(), $sql);
				return $result;	
			}
			



		}//fin de la clase modelo_validar




 ?>