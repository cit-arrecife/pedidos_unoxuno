<?php

class pedido {

	private $db;

	function __construct() {
		require_once '../utilities/db/db_connect.php';
		$this->db = new db_connect();
		$this->db->connect();
	}

	public function realizarPedido($codigo, $bru, $observacionP, $referenciaP){
		$bruto = intval($bru);

	$sql = "SELECT NRODCTO FROM USUTRADE WHERE CODCLIENTE ='$codigo' AND FACTURADO ='0'";
//	error_log('primer query '.$sql);
	$resultado=odbc_exec($this->db->connect(), $sql);
	$row = odbc_fetch_array($resultado);
	$tnrodcto =$row['NRODCTO'];

	$sql2 ="SELECT IDPRODUCTO, DETALLE, PRODUCTO FROM USUMVTRADE WHERE NRODCTO='$tnrodcto'";
//	error_log('2do query '.$sql2);
	$resultado=odbc_exec($this->db->connect(), $sql2);
	while($row =odbc_fetch_array($resultado)){
		$cod = 'WEBAPP'.$row['IDPRODUCTO'];
		$detalle= $row['DETALLE'];
		$descripcion =$row['PRODUCTO'];
		$sql ="INSERT INTO MTMERCIA 
				(CLASIFICA1, CODIGO, CODTARIVA, DESCRIPCIO, DETALLE, ESPRODUCTO, 
				FECING, HABILITADO, PASSWORDIN, PRODTER, TIPOINV, UNIDADMED)
				VALUES
				('0','$cod','TAR1','$detalle','$descripcion',1,GETDATE(),1,'WEBAPPIN',1,'PT','UND')";
//				error_log($sql);
				odbc_exec($this->db->connect(), $sql);
	}

	//FASE MVTRADE
	
	$sql = "SELECT CONSECUT FROM CONSECUT WHERE ORIGEN ='FAC' AND TIPODCTO='PD'";
//	error_log($sql);
	$result= odbc_exec($this->db->connect(), $sql);
	$row = odbc_fetch_array($result);
	$tconsecut =$row['CONSECUT'];	
		$sql2="UPDATE CONSECUT SET CONSECUT=($tconsecut+1) WHERE ORIGEN ='FAC' AND TIPODCTO='PD'";
	//	error_log($sql2);
		odbc_exec($this->db->connect(), $sql2);

	$sql ="	INSERT INTO TRADE
		   	(BRUTO, FECHA, NIT, NOTA, NRODCTO, ORIGEN, PASSWORDIN, TIPODCTO, TIPOMVTO, REFERENCIAPEDIDO )
			VALUES
			('$bruto', GETDATE(),'$codigo', '$observacionP', ($tconsecut+1), 'FAC', 'WEBAPP', 'PD', '05', '$referenciaP')";
			error_log($sql);
	odbc_exec($this->db->connect(), $sql);

	
	$sql="SELECT IDPRODUCTO,CANTIDAD, DETALLE, PRODUCTO, VALORUNIT, ALTO, ANCHO FROM USUMVTRADE WHERE NRODCTO ='$tnrodcto'";
	//error_log($sql);
	//error_log('/////////////////////////////////////////////////////////////////////////////');
	$result = odbc_exec($this->db->connect(), $sql);	
	while($row =odbc_fetch_array($result)){
		$cod = 'WEBAPP'.$row['IDPRODUCTO'];
		$cantidad = $row['CANTIDAD'];
		$detalle =$row['DETALLE'];
		$producto = $row['PRODUCTO'];
		$valorunit = $row['VALORUNIT'];
		$alto = $row['ALTO'];
		$ancho = $row['ANCHO'];
		$sql="INSERT INTO MVTRADE
				(BODEGA, CANTIDAD, CANVENTA, FACTURADO, FECHA, INTEGRADO, NOMBRE, NOTA, NRODCTO, PASSWORDIN, PRODUCTO, TIPODCTO, TIPOMVTO, UNDVENTA, VALORUNIT,VLRVENTA, ALTO, ANCHO, TARIVA)
			VALUES
			('PTPERSIANA','$cantidad','$cantidad', 0, GETDATE(), 0,'$detalle', '$producto',($tconsecut+1), 'WEBAPPIN', '$cod', 'PD','05', 'UND', '$valorunit', '$valorunit', '$alto','$ancho','TAR1' )";
	//		error_log($sql);

		odbc_exec($this->db->connect(), $sql);

	}
	$sql2="UPDATE USUTRADE SET FACTURADO='1' WHERE CODCLIENTE='$codigo' AND NRODCTO='$tnrodcto'";
//	error_log($sql2);
		odbc_exec($this->db->connect(), $sql2);




		return ($tconsecut+1);













	}




}


?>