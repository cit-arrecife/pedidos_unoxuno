<?php
	
	require_once '../model/model_pedido.php';

	$m_pedido = new pedido();

	if(isset($_POST['codigo'])){
		$codigo =$_POST['codigo'];
		$bruto =$_POST['bruto'];
		$referenciaP = $_POST['referenciaP'];
		$observacionP = $_POST['observacionP'];
	$resultado = $m_pedido->realizarPedido($codigo, $bruto, $observacionP, $referenciaP);
	if ($resultado){
		echo $resultado;
		}
	
	}


?>