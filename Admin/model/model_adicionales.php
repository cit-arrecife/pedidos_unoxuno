<?php 


class adicionales {
	
	private $db;

	function __construct() {
		require_once '../db/connect.php';
		$this->db = new connect();
		$this->db->connect();
	}

	public function cargarMotores(){
		$sql="SELECT * FROM MOTOR ";
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;
	}
	public function verMotores($id){
		$sql="SELECT * FROM MOTOR where idMotor='$id'";
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;	
	}
	public function quitarMotores($id){
		$sql="DELETE MOTOR where idMotor='$id'";
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;		
	}
	public function AddMotores($Producto, $Nombre, $Tipo, $Precion, $Activacion, $Voltaje, $Tubo, $RPM, $Amperaje){
		$sql="INSERT INTO  MOTOR 
			  (tipoProducto,descripcionMotor,carreraMotor,precioMotor,activacion,voltaje,tubo,RPM, amperaje)
			  VALUES
			  ('$Producto', '$Nombre', '$Tipo', '$Precion', '$Activacion', '$Voltaje', '$Tubo', '$RPM', '$Amperaje')";
		
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;		
	}
	public function Cover_light($precio){
		$sql="UPDATE Cover_light SET precioCover_Light = '$precio'";
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;	
	}
	public function loadCover(){
		$sql="SELECT precioCover_Light FROM Cover_Light";
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;	

	}
	public function loadPerfil(){
		$sql="SELECT * FROM Perfil";
		//error_log($sql);
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;	

	}
	public function quitarPerfil($tipo, $nombre, $color){
		$sql="DELETE Perfil where tipoPerfil='$tipo' AND nombrePerfil='$nombre' AND colorPerfil='$color'";
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;			
	}
	public function crearPerfil($tpo, $nombre, $color){
		$sql="INSERT INTO Perfil VALUES ('$tpo', '$nombre', '$color')";
		$result = odbc_exec($this->db->connect(),$sql);
		return $result;				
	}


}

 ?>