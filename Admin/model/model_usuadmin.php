<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
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
	public function NuevoUsuario($name, $user, $pass){
		$pass =md5($pass);
		$sql =" INSERT INTO USUAPPADMIN VALUES ('$name', '$user', '$pass')";
		error_log($sql);
		$result =odbc_exec($this->db->connect(), $sql);
		return $result;
	}
	public function verUsuario($id){
		$sql ="SELECT * FROM USUAPPADMIN WHERE id_USU ='$id'";
		error_log($sql);
		$result =odbc_exec($this->db->connect(), $sql);
		return $result;
	}
	public function ActualizarUsuario($id, $name, $user, $pass){
		$pass =md5($pass);
		$sql =" UPDATE USUAPPADMIN SET NOMBRE='$name', CODIGO='$user', PASSWOORD='$pass' WHERE ID_USU='$id'";
		error_log($sql);
		$result =odbc_exec($this->db->connect(), $sql);
		return $result;
	}
	public function EliminarUsuario($id){
		$sql =" DELETE FROM USUAPPADMIN WHERE ID_USU='$id'";
		error_log($sql);
		$result =odbc_exec($this->db->connect(), $sql);
		return $result;
	}






}


 ?>