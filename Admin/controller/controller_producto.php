
<?php 


require_once '../model/model_producto.php';

$model = new productos();

if(isset($_POST['opcion'])){

	$opcion = $_POST['opcion'];
}


switch ($opcion) {
	case 1:
		$resultado =$model->cargarproductos();
		if($resultado){	
			while($row = odbc_fetch_array($resultado)){
				$response['ID']=$row['idProducto'];
				$response['PROD']=$row['tipoProducto'];
				$response['PRES']=$row['tipoPresentacionProducto'];
				$response['TIPO']=$row['tipoTelaProducto'];
				$response['TELA']=$row['telaProducto'];
				$response['PRECIO']=$row['Precio'];
				$json[] =$response;
			}
			print json_encode($json);

		}
	break;
	case 2 :
		$prod = $_POST['prod'];
		$pres = $_POST['pres'];
		$tipo = $_POST['tipo'];
		$tela = $_POST['tela'];
		$precio = $_POST['precio'];
		$resultado = $model->NuevoProducto($prod, $pres, $tipo, $tela, $precio);
		if($resultado){
			$response='Producto creado con exito!';
		}else{$response ='Ocurrio un error creando el usuario intente mas tarde';}
		print $response;
	break;
	case 3 :
		$id = $_POST['id'];
		$resultado = $model->verproducto($id);
		if($resultado){	
			while($row = odbc_fetch_array($resultado)){
				$response['ID']=$row['idProducto'];
				$response['PROD']=$row['tipoProducto'];
				$response['PRES']=$row['tipoPresentacionProducto'];
				$response['TIPO']=$row['tipoTelaProducto'];
				$response['TELA']=$row['telaProducto'];
				$response['PRECIO']=$row['Precio'];
				$json[] =$response;
			}
		print json_encode($json);
		}
	break;
	case 4 :
		$id = $_POST['id'];
		$prod = $_POST['prod'];
		$pres = $_POST['pres'];
		$tipo = $_POST['tipo'];
		$tela = $_POST['tela'];
		$precio = $_POST['precio'];
		$resultado = $model->Actualizar($id, $prod, $pres, $tipo, $tela, $precio);
		if($resultado){
			$response='Producto Actualizado con exito!';
		}else{$response ='Ocurrio un error Actualizando el producto intente mas tarde';}
		print $response;
	break;
	case 5 :
		$id = $_POST['id'];
		$resultado = $model->Eliminar($id);
		if($resultado){
			$response='Producto Eliminado con exito!';
		}else{$response ='Ocurrio un error Eliminando el usuario intente mas tarde';}
		print $response;
	break;
	default:

	break;

}


 ?>