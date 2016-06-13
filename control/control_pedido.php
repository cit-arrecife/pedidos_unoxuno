<?php
	
	require_once '../model/model_pedido.php';

	$m_pedido = new pedido();

	if(isset($_POST['codigo'])){
		$codigo =$_POST['codigo'];
		$bruto =$_POST['bruto'];
	$resultado = $m_pedido->realizarPedido($codigo, $bruto);
	if ($resultado){
		echo $resultado;
		}
	
	}


?>