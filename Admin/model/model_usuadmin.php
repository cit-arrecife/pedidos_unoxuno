<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
?>
<?php 

class usuadmin{

	private $db;

	function __construct() {
		require_once '../db/connect.php';
		$this->db = new connect();
		$this->db->connect();
	}

	public function cargarusuarios(){
		$sql ="SELECT ID_USU, NOMBRE, CODIGO, PASSWOORD FROM USUAPPADMIN";
		//error_log($sql);
		$result =odbc_exec($this->db->connect(), $sql);
		return $result;
	}





}


 ?>