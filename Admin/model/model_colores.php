
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 

class colores{

	private $db;

	function __construct() {
		require_once '../db/connect.php';
		$this->db = new connect();
		$this->db->connect();
	}

	public function cargartipo(){
		$sql="SELECT DISTINCT(tipoTela) FROM COLORESPRODUCTO ";
		$result = odbc_exec($this->db->connect(), $sql);
		return $result;

	}
	public function cargartela($tipo){
		$sql="SELECT DISTINCT(nombreTela) FROM COLORESPRODUCTO where tipoTela='$tipo'";
		$result = odbc_exec($this->db->connect(), $sql);
		return $result;		
	}
	public function cargarcolor($tipo, $tela){
		$sql="SELECT tipoTela, nombreTela, colorTela FROM COLORESPRODUCTO where tipoTela='$tipo' AND nombreTela='$tela'";
		//error_log($sql);
		$result = odbc_exec($this->db->connect(), $sql);
		return $result;			
	}

}