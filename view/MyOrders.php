<?php
	include('../utilities/db/db_session.php');
	//error_log(print_r($_SESSION));
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Uno x Uno</title>
	    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="../utilities/js/MyOrders.js" type="text/javascript"></script>


    <script  type="text/javascript" >
        $(document).ready(function (){
                var codigo ='<?php echo $_SESSION['usuario_codigo']; ?>';
                console.log(codigo);
                //$('#codusu').val(codigo);
                //CargarEncabezado(codigo);
                CargarPedidos(codigo);

            })
    </script>
	    
		<style type="text/css">
		    @media (min-width: 768px) {
				.navbar-collapse {
					height: auto;
					border-top: 0;
					box-shadow: none;
					max-height: none;
					padding-left:0;
					padding-right:0;
				}
				.navbar-collapse.collapse {
					display: block !important;
					width: auto !important;
					padding-bottom: 0;
					overflow: visible !important;
				}
				.navbar-collapse.in {
					overflow-x: visible;
				}
				.navbar {
				    max-width:300px;
				    margin-right: 0;
				    margin-left: 0;
				}   
				.navbar-nav,
				.navbar-nav > li,
				.navbar-left,
				.navbar-right,
				.navbar-header
				{float:none !important;}

				.navbar-right .dropdown-menu {left:0;right:auto;}
				.navbar-collapse .navbar-nav.navbar-right:last-child {
				    margin-right: 0;
				}
			}
		</style>
	</head>
 
	<body>
		
		<div class="col-sm-3">
			<!-- MENU_NAV -->
			<nav class="navbar navbar-default" role="navigation">
	      		<div class="navbar-header">
	        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	          		<span class="sr-only">Toggle navigation</span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span>
	        		</button>
	        		<a href="MyOrders.php"><img src="../utilities/images/logo.jpg" alt="UnoxUno" class="navbar-brand" align="top" style="width:100%; height:100%;"></a>
	      		</div>

	      		<div class="collapse navbar-collapse navbar-ex1-collapse">
	        		<ul class="nav navbar-nav">
			      		<li ><a href="AddProduct.php">Nuevo Pedido/Cotización</a></li>
			      		<li class="active"><a href="">Consulta de Pedidos</a></li>
			      		
			      		<!-- <a href="AdminPrices.php">Administrador de Precios</a> -->
			      			<li><a href="Order.php">Ver Cotizacion</a></li>
			      		
			      		<li>
			      		<!-- <a href="#">Consulta de Inventario</a> -->
			      		</li>
	        		</ul>
	        		<hr>
	        		<ul class="nav navbar-nav navbar-right">
	          			<li>
	          			<!-- <a href="#">Mis datos de acceso</a> -->
	          			</li>
	          			<li>
	          			<!-- <a href="#">Datos de Cotización</a> -->
	          			</li>
	          			<li><a href="../utilities/db/db_logout.php">Salir</a></li>
	        		</ul>
	      		</div>
    		</nav>
    		<!-- /MENU_NAV -->
		</div>
		

			<!-- /Modal ver detalle -->
			<div class="modal fade" id="modalVerDetalle" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Detalles</h4>
						</div>
						<div class="modal-body">
			                <div class="table-responsive">
			                    <table id="tableProductos" class="table table-condensed">
			                        <thead>
			                            <tr>
			                                <th style="text-align:center;" width="5%">Item</th>
			                                <th style="text-align:center;" width="20%">Nombre</th>
			                                <th style="text-align:center;" width="5%">Cantidad</th>
			                                <th style="text-align:center;" width="5%">Ancho</th>
			                                <th style="text-align:center;" width="5%">Alto</th>
			                                <th style="text-align:center;" width="9%">Precio</th>
			                                <th style="text-align:center;" width="25%">Características</th>
			                            </tr>
			                        </thead>
			                        <tbody id="detalleProducto">
			                        </tbody>
			                        <tfoot>
			                        </tfoot>
			                    </table>
			                </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal" >Cerrar</button>
						</div>
					</div>
				</div>
			</div>


		<div class="col-sm-9">

			<div id="notificacion"></div>

			<div class="panel panel-default">
			 	<div class="panel-heading">
			    	<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Mis pedidos y cotizaciones</strong></h4></div>
				</div>
				<div class="panel-body">

					<div class="panel panel-default">
						<div class="panel-heading">
			    			<div class="panel-title">Criterios de búsqueda</div>
						</div>
						<div class="panel-body">
							<form>

								<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Código Pedido</label>
							    		<input type="text" min="1" id="codigoPedido" name="incodigoPedido" onkeyup="BuscarProducto()" class="form-control" placeholder="Codigo del Pedido/Cotización"></input>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-2">
						    		<div class="input_container">
							    		<br>
						    			<button class="btn btn-danger" type="button" onclick="BuscarProducto()" style="background-color:#CA0707 !important;">Buscar</button>
						    		</div>
						    	</div>
						    	
						    </form>
						</div>
					</div>

				    <div class="table-responsive">
				  		<table id="tableProductos" class="table table-condensed table-bordered table-hover">
				            
							<thead>
								<tr>
									<th style="text-align:center; background-color:#CA0707; color:#FFF;" width="20%">Codigo</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="15%">Fecha</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="20%">Total</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="15%">Detalle</th>
								</tr>
							</thead>
							<tbody id="detallePedido">
							</tbody>
							<tfoot>
							</tfoot>
				        </table>
				    </div>

		    	</div>
		    </div>
		    
		</div>

		<script type="text/javascript">

		// 	function consultarVentaCliente(codigoVentaCliente) {

		// 		var rowVentaCodigo, rowVentaUsuario, rowVentaFecha, rowVentaTotal, rowVentaEstado;
		// 		var indiceCodigo, rowVentaOpciones, buttonOpcionDetallePedido, buttonOpcionEstadoPedido, buttonOpcionGuiaPedido, buttonOpcionMensajePedido, buttonOpcionImprimirCotizacion;
		// 		var detalleProducto;

	 //    		$.ajax({
	 //    			type: "POST",
	 //    			url: "../control/control_venta.php",
	 //    			data: { elegir: 7, codigoCliente: codigoVentaCliente },
	 //    			success: function(data) {
	 //    				var jsonVentas = JSON.parse(data);

		// 				for (var i = 0; i < jsonVentas.length; i++) {

		// 					rowVentaUsuario = '<td style="text-align:center">'+Object(jsonVentas[i].Venta_Usuario)+'</td>';
		// 					rowVentaFecha = '<td style="text-align:center">'+Object(jsonVentas[i].Venta_Fecha)+'</td>';
		// 					rowVentaTotal = '<td style="text-align:center">'+"$"+Object(jsonVentas[i].Venta_Total)+'</td>';
		// 					rowVentaEstado = '<td style="text-align:center">'+Object(jsonVentas[i].Venta_Estado)+'</td>';

		// 					if (Object(jsonVentas[i].Venta_Tipo) == "pd") {
		// 						indiceCodigo = "Ped";
		// 						buttonOpcionDetallePedido = '<a title="Ver Detalles"><form action="../control/exportarPDF.php" method="post"><input type="hidden" name="codigo" value="'+Object(jsonVentas[i].Venta_Codigo)+'"></input><button type="submit"><span class="glyphicon glyphicon-list-alt"></span></button></form></a>';
		// 						buttonOpcionEstadoPedido = '<button id="bEstadoPedido'+Object(jsonVentas[i].Venta_Codigo)+'" title="Ver Estado" data-toggle="modal" data-target="#modal_estado_pedido'+Object(jsonVentas[i].Venta_Codigo)+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
		// 						buttonOpcionGuiaPedido = '<button id="bGuiaPedido'+Object(jsonVentas[i].Venta_Codigo)+'" title="Ver Guia" data-toggle="modal" data-target="#modal_guia_pedido'+Object(jsonVentas[i].Venta_Codigo)+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
		// 						buttonOpcionMensajePedido = '<a title="Enviar Mensaje"><form action="../control/exportarPDF.php" method="post"><input type="hidden" name="codigo" value="'+Object(jsonVentas[i].Venta_Codigo)+'"></input><button type="submit"><span class="glyphicon glyphicon-print"></span></button></form></a>';
		// 						rowVentaOpciones = '<td style="text-align:center">'+buttonOpcionDetallePedido+buttonOpcionEstadoPedido+buttonOpcionGuiaPedido+buttonOpcionMensajePedido+'</td>';

		// 					} else if (Object(jsonVentas[i].Venta_Tipo) == "ct") {
		// 						indiceCodigo = "Cot";
		// 						buttonOpcionImprimirCotizacion = '<a title="Expotar PDF"><form action="../control/exportarPDF.php" method="post"><input type="hidden" name="codigo" value="'+Object(jsonVentas[i].Venta_Codigo)+'"></input><button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-print"></span></button></form></a>';
		// 						rowVentaOpciones = '<td style="text-align:center">'+buttonOpcionImprimirCotizacion+'</td>';
		// 					}

		// 					rowVentaCodigo = '<td style="text-align:center">'+indiceCodigo+"-"+Object(jsonVentas[i].Venta_Codigo)+'</td>';
		// 					detalleProducto = '<tr>'+rowVentaCodigo+rowVentaUsuario+rowVentaFecha+rowVentaTotal+rowVentaEstado+rowVentaOpciones+'</tr>';
		// 					$('#detalleProducto').append(detalleProducto);
		// 				}

	 //    			}
		//     	}).done(function(data) {    			
	 //    			//calcularValores();
	 //    			/*$('#producto_buscar').select2("val", "");
		//     		$("#producto_cantidad").val("");
		//     		$("#notificacion").html("");*/
	 //    		});

		// 	}
	 </script>

	</body>
</html>