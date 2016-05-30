<?php
	 include('../utilities/db/db_session.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Uno x Uno </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Uno x Uno</title>
	    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="../utilities/js/Select.js" type="text/javascript"></script>
		<script src="../utilities/js/Adicionales.js" type="text/javascript"></script>
		<script src="../utilities/js/agregarProducto.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function (){
				var codigo ='<?php echo $_SESSION['usuario_codigo']; ?>';
			//	console.log(codigo);
				$('#codusu').val(codigo);
			//	console.log('Usuario Logueado como "<?php echo $_SESSION['usuario_nombre']; ?>"');
				llamar_descu("<?php echo $_SESSION['usuario_nombre']; ?>"); 

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
					.bor{
						border: solid 1px black;
						text-align: center;
					}
					.bor h4, p {
						font-style: italic;
						font-weight: bold;

					}
		</style>

</head>
<body>
<input type="text" id="codusu" style="display:none;"></input>
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
	        			<li class="active"><a href="">Nuevo Pedido/Cotización</a></li>
			      		<li><a href="MyOrders.php">Consulta de Pedidos</a></li>
			      	
			      	<li><a href="Order.php">Ver Cotizacion</a></li>
			      		<!-- <li><a href="#">Consulta de Inventario</a></li>  -->
	        		</ul>
	        		<hr>
	        		<ul class="nav navbar-nav navbar-right">
	          			<!-- <li><a href="#">Mis datos de acceso</a></li>
	          			<li><a href="#">Datos de Cotización</a></li> -->
	          			<li><a href="../utilities/db/db_logout.php">Salir</a></li>
	        		</ul>
	      		</div>
    		</nav>
    		<!-- /MENU_NAV -->
		</div>

		<div class="col-sm-9">

		<div id="notificacion"></div>

		<div class="modal fade" id="modalRegistroVenta" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Resultado</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-success" role="alert">
							<p>Se agregó el Producto correctamente al <strong>Pedido/Cotización</strong>.</p>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Continuar Agregando</button>
						<button type="button" class="btn btn-danger" onclick="window.location ='Order.php'">Finalizar Pedido/Cotización</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modalError" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Ha ocurrido un error!</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning" role="alert" id="modal_error_mensaje">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Entendido</button>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			 	<div class="panel-heading">
			    	<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Seleccionar Producto</strong></h4></div>
				</div>
				<div class="panel-body">
						<div class="col-sm-12">
					    	<label>Nombre del Espacio</label>
				    	</div>
				    	<div class="col-sm-6">
					    	<input type="text" id="producto_nombre_espacio" class="form-control" placeholder="Espacio donde se instalará el producto">
				    	</div>
				    	<div class="form-group col-sm-6">
				    		<p style="font-size:85%;">Ejemplo: Habitación, Sala, Corredor. Este nombre saldrá en el sticker del empaque para facilitar la distribución de la mercancia.</p>
			    		</div>
		    		<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Tipo de Producto</label>
				    		<select id="producto_tipo" class="form-control" onchange="validar_tipo_producto(this.value)">
				    		<!-- seleccionarTipoProducto(this.value) -->
				    			<option selected value="SELECCIONE" >-- Seleccione --</option>
				    			<option value="ENROLLABLE">ENROLLABLE</option>
				    			<option value="PANEL JAPONES">PANEL JAPONES</option>
				    			<option value="SHEER">SHEER</option>
				    		</select>
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Tipo de Presentación</label>
				    		<select id="producto_tipo_presentacion" class="form-control" onchange="validar_tipo_presentacion(this.value)">
				    		<option value="SELECCIONE">-- Seleccione --</option>
				    		
				    		</select>
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Tipo de Tela</label>
				    		<select id="producto_tipo_tela" class="form-control" onchange="validar_tipo_tela(this.value)">
				    			<option value="SELECCIONE">-- Seleccione --</option>
					    		</select>
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-8">
				    	<div class="input_container">
				    		<label>Tela</label>
				    		<select id="producto_tela" class="form-control" onchange="validar_color_tela(this.value)">
				    			<option value="SELECCIONE">-- Seleccione --</option>
				    		</select>
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Color</label>
				    		<select id="producto_tela_color" class="form-control" onchange="seleccionar_producto(this.value)">
				    			<option value="SELECCIONE">-- Seleccione --</option>
				    		</select>
				    	</div>
			    	</div>

				    	
			    	 <div class="form-group col-sm-6" align="center" >

			    	 		    	 	<br>
			    	 
			    	 	<SPAN>Solicitador por: <?php echo $_SESSION['usuario_nombre']; ?></SPAN>
			    	
			    	</div> 

			    
				</div>
			</div>
			<div class="panel panel-default" id="datos_iniciales" style="display:none;">
				<div class="panel-heading">
	    			<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Datos Iniciales</strong></h4></div>
				</div>
				<div class="panel-body">
					<form>

						<div class="form-group col-sm-12">
							<div class="form-group col-sm-3">
						    	<label>Cantidad</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="1" id="producto_cantidad" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" value="1" placeholder="Cantidad">
					    	</div>

					    	<div class="form-group col-sm-6">
					    		<p style="font-size:85%;">Ingrese la cantidad de productos deseada.<br>Por ejemplo: 1</p>
				    		</div>

					    	<div class="form-group col-sm-3">
						    	<label>Ancho</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" id="producto_ancho" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" value="1.00" placeholder="Ancho">
					    	</div>

					    	<div class="form-group col-sm-6">
					    		<p style="font-size:85%;">Ingrese el ancho en Metros con 2 decimales.<br>Por ejemplo: 1,25</p>
				    		</div>

					    	<div class="form-group col-sm-3">
						    	<label>Alto</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" id="producto_alto" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" value="1.00" placeholder="Alto">
					    	</div>

					    	<div class="form-group col-sm-6">
					    		<p style="font-size:85%;">Ingrese el ancho en Metros con 2 decimales.<br>Por ejemplo: 1,25</p>
					    	</div>
				    	</div>

				    	<div class="form-group col-sm-12">
				    		<div class="form-group col-sm-6"></div>

				    		<div class="form-group col-sm-3">
						    	<p style="font-size:85%;">Ingrese el descuento adicional en caso de que aplique</p>
					    	</div>
					    	
					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label style="color:#CA0707;">Total</label>
					    	</div>

				    		<div class="form-group col-sm-9">
						    	<label>Precio Unitario</label>
					    	</div>
					    	
					    	<div class="form-group col-sm-3" style="text-align:right;">
					    		<label id="producto_precio_db" style="display:none">0.00</label>
						    	<label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="producto_precio_lista">0.00</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<label>Precio con Descuento</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" max="100" id="producto_descuento_distribuidor" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento Distribuidor" disabled>
						    	<p style="font-size:85%;">% (Dto. Distribuidor.)</p>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" max="100" id="producto_descuento_adicional" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento Adicional">
						    	<p style="font-size:85%;">% (Dto. Adicional.)</p>
					    	</div>

					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="producto_precio_descuento">0.00</label>
					    	</div>

					    	<div class="form-group col-sm-12">
					    	<div class="bor">
						    	<p style="align:right;">Importante: Todos los productos estan listados sin iva</p>
						    	</div>
						   	</div>
					    </div>
				    	
				    </form>
				</div>
			</div>

			<div class="panel panel-default" id="datos_adicionales" style="display:none;">
				<div class="panel-heading">
	    			<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Datos Adicionales</strong></h4></div>
				</div>
				<div class="panel-body">

					<div class="panel panel-default">
						<div class="panel-heading">
			    			<div class="panel-title">Principales</div>
						</div>
						<div class="panel-body">

							<div class="form-group col-sm-12" id="dap_mando" style="display:none;">
							    <div class="col-sm-3">
								    <label>Mando</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_mando" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_mando_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="IZQUIERDO">IZQUIERDO</option>
				    					<option value="DERECHO">DERECHO</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_mando_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_mando_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_mando_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_perfil" style="display:none;">
							    <div class="col-sm-3">
								    <label>Perfil</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_perfil" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_perfil_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="ESTANDAR">ESTANDAR</option>
				    					<option value="ELITE">ELITE</option>
				    					<option value="PREMIUM">PREMIUM</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_perfil_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_perfil_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_perfil_precio">0</label>
							    </div>
							</div>
							    
							<div class="form-group col-sm-12" id="dap_direccion_tela" style="display:none;">
								<div class="col-sm-3">
								    <label>Dirección de la Tela</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_direccion_tela" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_direccion_tela_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="NORMAL">NORMAL</option>
				    					<option value="ATRAVESADA">ATRAVESADA</option>
				    					<option value="ATRAVESADA Y ANADIDA">ATRAVESADA Y AÑADIDA</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_direccion_tela_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_direccion_tela_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_direccion_tela_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_sentido" style="display:none;">
								<div class="col-sm-3">
								    <label>Sentido</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_sentido" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_sentido_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="NORMAL">NORMAL</option>
							    		<option value="CONTRARIO-NVR">CONTRARIO-NVR</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_sentido_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_sentido_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_sentido_precio">0</label>
							    </div>
							</div>
							    
							<div class="form-group col-sm-12" id="dap_soporte_intermedio" style="display:none;">
							    <div class="col-sm-3">
								    <label>Soporte Intermedio</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_soporte_intermedio" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_soporte_intermedio_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="DEPENDIENTE">DEPENDIENTE</option>
							    		<option value="INDEPENDIENTE">INDEPENDIENTE</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_soporte_intermedio_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label id="h_soporte_intermedio_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_soporte_intermedio_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_cover_light" style="display:none;">
							    <div class="col-sm-3">
								    <label>Cover Light</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_cover_light" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_cover_light_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="SI">SI</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_cover_light_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_cover_light_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_cover_light_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_junto_item" style="display:none;">
							    <div class="col-sm-3">
								    <label>Junto Item</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_junto_item" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_junto_item_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="AL SIGUIENTE ITEM">AL SIGUIENTE ITEM</option>
							    		<option value="AL ANTERIOR ITEM">AL ANTERIOR ITEM</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_junto_item_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_junto_item_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_junto_item_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_mismo_cabezal" style="display:none;">
							    <div class="col-sm-3">
								    <label>Mismo Cabezal</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_mismo_cabezal" class="form-control" onchange="consultarPrecio(this.id)" onblur ="sumarAdicionales('#da_mismo_cabezal_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="JUNTO AL SIGUIENTE">JUNTO AL SIGUIENTE</option>
							    		<option value="JUNTO AL ANTERIOR">JUNTO AL ANTERIOR</option>
							    		<option value="JUNTO CON EL ANTERIOR Y SIGUIENTE">JUNTO CON EL ANTERIOR Y SIGUIENTE</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_mismo_cabezal_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_mismo_cabezal_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_mismo_cabezal_precio">0</label>
							    </div>
							</div>

						</div>
					</div>

					<div class="panel panel-default" id="panel_cassetera" style="display:none;">
						<div class="panel-heading">
			    			<div class="panel-title">Cassetera</div>
						</div>
						<div class="panel-body">

							<div class="form-group col-sm-3">
						    	<div class="input_container">
						    		<label>Referencia</label>
						    		<select id="da_cassetera_referencia" class="form-control" onchange="cargarNombreCassetera(this.value)">
						    			<option value="PLANA">PLANA</option>
						    			<option value="NORMAL">NORMAL</option>
						    		</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-6">
						    	<div class="input_container">
						    		<label>Nombre</label>
						    		<select id="da_cassetera_nombre" class="form-control" onchange="cargarTipoCassetera(this.value)">
						    			<option value="CASSETERA 100MM PLANA NEGRO">CASSETERA 100MM PLANA NEGRO</option>
						    			<option value="CASSETERA 100MM PLANA BRONCE">CASSETERA 100MM PLANA BRONCE</option>
						    			<option value="CASSETERA 100MM PLANA IVORY">CASSETERA 100MM PLANA IVORY</option>
						    			<option value="CASSETERA 100MM PLANA SATIN">CASSETERA 100MM PLANA SATIN</option>
						    			<option value="CASSETERA 100MM PLANA BLANCO">CASSETERA 100MM PLANA BLANCO</option>
						    		</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label>Precio</label><br>
						    	<label style="color:#CA0707;">$0.00</label>
					    	</div>
						
						</div>
					</div>

					<div class="panel panel-default" id="panel_sistema">
						<div class="panel-heading">
			    			<div class="panel-title">Sistema</div>
						</div>
						<div class="panel-body">
						<div class="form-group col-sm-12">
							    <div class="col-sm-3">
								    <label>Tipo Motor</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_motor_tipo" class="form-control" onchange=" Llenar_motor(this.value)">
							    		<option selected value="SELECCIONE" >-- Seleccione --</option>
							    		<option value="ELECTRONICO">ELECTRONICO</option>
							    		<option value="MECANICO">MECANICO</option>
							    	</select>
						    	</div>

							</div>

							<div class="form-group col-sm-12">
							    <div class="col-sm-3">
								    <label>Motor</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_motor" class="form-control" onchange="precio_motor(this.value)" onblur ="sumarAdicionales('#Motor_valor')">
							    		<option selected value="SELECCIONE" >-- Seleccione --</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								 <input type="number" min="0" max="100" id="da_motor_desc" onkeyup="motorDescuento(this.value)" onchange="motorDescuento(this.value)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    	<label id="Motor_valor_db" style="display:none;">0.00</label>
								<label id="Motor_valor" style="color:#CA0707;">$0.00</label>
							    </div>
							</div>
							<div class="form-" id="Datos" style="display:none;">
							   <div class="col-sm">
								    <label style="color:#CA0707;">Activacion: 
								    </label><label id="Activacion">---/---</label><br>
								    <label style="color:#CA0707;">Voltaje: </label><label id="Voltaje">---/---</label><br>
								    <label style="color:#CA0707;">Tubo: </label><label id="Tubo">---/---</label><br>
								    <label style="color:#CA0707;">RPM: </label><label id="RPM">---/---</label><br>
								    <label style="color:#CA0707;">Amperaje: </label><label id="Amperaje">---/---</label>
							    </div>
							</div>
						
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
			    			<div class="panel-title">Cotización</div>
						</div>
						<div class="panel-body">

							<div class="form-group col-sm-12">
							    <div class="col-sm-9">
								    <label>SubTotal</label>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_subtotal">0.00</label>
							    </div>

							    <div class="col-sm-9">
								    <label>IVA</label>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_iva">0.00</label>
							    </div>

							    <div class="col-sm-9">
								    <label>Total</label>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_total">0.00</label>
							    </div>
							</div>

						</div>
					</div>
				    
				</div>
			</div>
			<div class="panel panel-default" id="datos_complementarios" style="display:none;">
				<div class="panel-heading">
	    			<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Datos Complementarios</strong></h4></div>
				</div>
				<div class="panel-body">
					<div class="form-group col-sm-12">
						<div class="col-sm-3">
							<label>Observaciones</label>
						</div>

						<div class="col-sm-9">
							<textarea class="form-control" id="dc_producto_observaciones" rows="3" maxlength="200"></textarea>
				            <p style="font-size:85%;">Ingrese las consideraciones adicionales a tener en cuenta para el producto.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group col-sm-12">
	    		<button class="btn btn-danger" type="button" onclick="agregarProducto()" style="background-color:#CA0707 !important;">Confirmar Producto</button>
	    	</div>
	    	<script type="text/javascript" charset="utf-8" async defer>
	    	var dateGrupoVenta, random, guardarCodigoVenta, guardarGrupoVenta;
			var nombreEspacio, tipoProducto, tipoPresentacion, tipoTela, telaProducto, colorTela;
			var productoCodigo, productoNombre, productoCantidad, productoAncho, productoAlto, productoDescuentoDistribuidor, productoDescuentoAdicional, productoObservaciones;
			var clienteCodigo, clienteNombre, clienteDireccion, clienteFinal;
			var ventaProductoSubtotal, ventaProductoIva, ventaProductoTotal;
			var objectDatosProducto, arrayObjectProducto = [];
	    	function registrarVenta()
			{
				
				// if (validacionesRegistrar() != true)
				// {
					//$('#cliente_buscar').prop("disabled", true);

					dateGrupoVenta = new Date();
					random = Math.floor((Math.random() * 1000) + 1);
					guardarCodigoVenta = "vent-" + dateGrupoVenta.getDate() + "" + (dateGrupoVenta.getMonth()+1) + "" + dateGrupoVenta.getFullYear() + "" + random + dateGrupoVenta.getHours() + "" + dateGrupoVenta.getMinutes() + "" + dateGrupoVenta.getSeconds() + "" + dateGrupoVenta.getMilliseconds();
					if (guardarGrupoVenta == null)
	    			{ guardarGrupoVenta = "grup-" + dateGrupoVenta.getDate() + "" + (dateGrupoVenta.getMonth()+1) + "" + dateGrupoVenta.getFullYear() + "" + dateGrupoVenta.getHours() + "" + dateGrupoVenta.getMinutes() + "" + dateGrupoVenta.getSeconds() + "" + dateGrupoVenta.getMilliseconds();
	    			}

	    			/* Seleccionar Producto */
		    		nombreEspacio = $('#producto_nombre_espacio').val();
		    		tipoProducto = $('#producto_tipo').val();
		    		tipoPresentacion = $('#producto_tipo_presentacion').val();
		    		tipoTela = $('#producto_tipo_tela').val();
		    		telaProducto = $('#producto_tela').val();
		    		colorTela = $('#producto_tela_color').val();
		    		//productoCodigo = $('#producto_buscar').val();
		    		//productoNombre = $('#producto_buscar :selected').text();
		    		clienteCodigo = "<?php echo $_SESSION['usuario_codigo']; ?>";
		    		clienteNombre = "<?php echo $_SESSION['usuario_nombre']; ?>";
		    		//clienteDireccion = $('#direccion_envio_final').val();
		    		//clienteFinal = $('#nombre_cliente_final').val();
		    		/* /Seleccionar Producto */

		    		/* Datos Iniciales */
		    		productoCantidad = $('#producto_cantidad').val();
		    		productoAncho = $('#producto_ancho').val();
		    		productoAlto = $('#producto_alto').val();
		    		productoDescuentoDistribuidor = $('#producto_descuento_distribuidor').val();
		    		productoDescuentoAdicional = $('#producto_descuento_adicional').val();
		    		/* /Datos Iniciales */

		    		/* Cotización */
		    		ventaProductoSubtotal = $('#da_producto_subtotal').text();
		    		ventaProductoIva = $('#da_producto_iva').text();
		    		ventaProductoTotal = $('#da_producto_total').text();
		    		/* /Cotización */

		    		/* Datos Complementarios */
		    		productoObservaciones = $('#dc_producto_observaciones').val();
		    		/* /Datos Complementarios */

		    		objectDatosProducto = { 
		    			venta_codigo:guardarCodigoVenta, 
		    			venta_grupo:guardarGrupoVenta, 
		    			espacio_nombre:nombreEspacio, 
		    			producto_tipo:tipoProducto, 
		    			//producto_codigo:productoCodigo, 
		    			//producto_nombre:productoNombre, 
		    			cliente_codigo:clienteCodigo, 
		    			cliente_nombre:clienteNombre, 
		    			/*cliente_direccion:clienteDireccion, *//*cliente_final:clienteFinal,*/
		    			producto_cantidad:productoCantidad, 
		    			producto_ancho:productoAncho, 
		    			producto_alto:productoAlto, 
		    			producto_descuento_distribuidor:productoDescuentoDistribuidor, 
		    			producto_descuento_adicional:productoDescuentoAdicional, 
		    			venta_producto_subtotal:ventaProductoSubtotal, 
		    			venta_producto_iva:ventaProductoIva, 
		    			venta_producto_total:ventaProductoTotal, 
		    			producto_observaciones:productoObservaciones };
		    		arrayObjectProducto.push(objectDatosProducto);

		    		$('#modalRegistroVenta').modal({backdrop: 'static', keyboard: false});

		    		//alert(guardarCodigoVenta + "\n" + guardarGrupoVenta);
				//}
			}

			function finalizarRegistro()
			{
				
				var stringArrayObjectProducto = "'"+JSON.stringify(arrayObjectProducto, null, "")+"'";
			
				var form = '<form action="RegisterOrder.php" method="POST">'+'<input type="hidden" name="arrayDatosProductos" value='+stringArrayObjectProducto+'></input>'+'</form>';
				$(form).submit();
				
			}	

	    	</script>
</body>
</html>