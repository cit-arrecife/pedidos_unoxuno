<?php

class registro{
	private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}


	public function registrarTrade($facturado, $idCliente, $origen, $tipodcto){

		$nrodcto =$this->validarcon($idCliente);
		//error_log($nrodcto);
		if($nrodcto==1){

			//LLMAR FUNCION REGISTRAR PORDUCTO
		}
		else{
			$sql ="INSERT INTO USUTRADE 
			VALUES (0, 0, '$facturado', getdate(), '$idCliente', ('$nrodcto'+1), '$origen', '$tipodcto')";
			//error_log('Ocurrio '.$sql);
			$result = odbc_exec($this->db->connect(), $sql) or die ('Ocurrio un error al registrar el produto');
			//LLMAR FUNCION REGISTRAR PORDUCTO
			return $result;
		}

	}

	public function validarcon($idCliente){
		$sqlA ="SELECT COUNT(CODCLIENTE) as 'cantidad' FROM USUTRADE WHERE FACTURADO = 0 AND CODCLIENTE='$idCliente'";
		$resultA = odbc_exec($this->db->connect(), $sqlA);
		$rowA=odbc_fetch_array($resultA);
		error_log('cantidad '.$rowA['cantidad']);
		if($rowA['cantidad'] == 0){
			$sql="SELECT MAX(NRODCTO) as Maximo FROM USUTRADE ";
			$result = odbc_exec($this->db->connect(), $sql);
			$row = odbc_fetch_array($result);
			return $row['Maximo'];
		}elseif($rowA['cantidad'] == 1){

			// $sql="SELECT NRODCTO FROM USUTRADE where CODCLIENTE='$idCliente' and FACTURADO =0";
			// $result = odbc_exec($this->db->connect(), $sql);
			// $row = odbc_fetch_array($result);
			// $response=$row['NRODCTO'];
			//LLMAR FUNCION PRODUCTO
			return $rowA['cantidad'];		
		}
	}

	public function Producto($cantidad, $descuentoDistri, $detalle, $iva, $valoruni, $alto, $ancho, $idCliente){

			$Nro = $this->validarCP($idCliente);

			$sql="INSERT INTO USUMVTRADE VALUES
				('MTPERSIANAS','$cantidad', '$Nro', 0, '$descuentoDistri', '$detalle', getdate(), '$iva','','','$Nro','','FR','FAC', '$valoruni', '$alto', '$ancho')";
				error_log($sql);
				$result=odbc_exec($this->db->connect(), $sql);

				return $result;
		}
	
	public function validarCP($idCliente){
		$sqlA ="SELECT COUNT(CODCLIENTE) as 'cantidad' FROM USUTRADE WHERE FACTURADO = 0 AND CODCLIENTE='$idCliente'";
		$resultA = odbc_exec($this->db->connect(), $sqlA);
		$rowA=odbc_fetch_array($resultA);
		error_log('cantidad '.$rowA['cantidad']);
		if($rowA['cantidad'] == 0){
			$sql="SELECT MAX(NRODCTO) as Maximo FROM USUTRADE ";
			$result = odbc_exec($this->db->connect(), $sql);
			$row = odbc_fetch_array($result);
			return $row['Maximo'];
		}elseif($rowA['cantidad'] == 1){

			$sql="SELECT NRODCTO FROM USUTRADE where CODCLIENTE='$idCliente' and FACTURADO =0";
			$result = odbc_exec($this->db->connect(), $sql);
			$row = odbc_fetch_array($result);
			$response=$row['NRODCTO'];
			return $response;		
		}
	}



		








}
?>