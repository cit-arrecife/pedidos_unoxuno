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
					.bor{border: solid 1px black;text-align: center;}
					.bor h4, p {font-style: italic;font-weight: bold;}
					.Datos{font-size: 11px; text-align:center;}


					.alerta {
						border: solid 2px red;
						font-style:italic;
						font-weight: bold;
						text-align: center;
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
						<button type="button" class="btn btn-success" data-dismiss="modal" onclick="limpiarCampos()">Continuar Agregando</button>
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
						<strong>Por favor verifica la informacion ingresada.</strong>
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
			    	<div class="form-group col-sm-12" id="alert" style="display:none;">
			    		<div class="alerta">
			    			<p>Los campos no pueden quedar vacios</p>
			    		</div>
			    	</div>
		    		<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Tipo de Producto</label>
				    		<select id="producto_tipo" class="form-control" onchange="validar_tipo_producto(this.value);coloraccesorio(this.value)">
				    		<!-- seleccionarTipoProducto(this.value) -->
				    			<option selected value="SELECCIONE" >-- Seleccione --</option>
				    			<option value="ENROLLABLE">ENROLLABLE</option>
				    			<option value="PANEL JAPONES">PANEL JAPONES</option>
				    			<option value="SHEER">SHEER</option>
				    			<option value="TELOS">SOLO TELOS</option>
				    		</select>
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Tipo de Presentación</label>
				    		<select id="producto_tipo_presentacion" class="form-control" onchange="validar_tipo_presentacion(this.value);Perfil(this.value);casetera()">
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
				    		<label>Referencia</label>
				    		<select id="producto_tela" class="form-control" onchange="validar_color_tela(this.value);seleccionar_producto()">
				    			<option value="SELECCIONE">-- Seleccione --</option>
				    		</select>
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Color</label>
				    		<select id="producto_tela_color" class="form-control" onchange="seleccionar_producto()">
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
						<div class="form-group col-sm-12" id="alert2" style="display:none;">
			    			<div class="alerta">
			    				<p>Verifica los valores ingresados</p>
			    			</div>
			    		</div>
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
						    	<input type="number" min="0" id="producto_ancho" onkeyup="calcularValores()" onchange="calcularValores();perfil_telos()" class="form-control" value="1.00" placeholder="Ancho">
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
				    		<div class="col-sm-3">
				    		<label>Color Accesorios</label>
				    		</div>
							<div class="col-sm-3">
						    	<select id="da_color_acceso" class="form-control" onchange="adicional('Color Acesorio', this.value, '')" >
						    		<option value="SELECCIONE">-- Seleccione --</option>
						    	</select>
					    	</div>
				    	</div>
				    	<div class="form-group col-sm-12" id="instalacion">
				    		<div class="col-sm-3">
				    		<label>Tipo Instalacion</label>
				    		</div>
							<div class="col-sm-3">
						    	<select id="da_instalacion" class="form-control" onchange="adicional('Mando Instal', this.value, '')" >
						    		<option value="SELECCIONE">-- Seleccione --</option>
						    		<option value="TECHO">PARED</option>
			    					<option value="PARED">TECHO</option>
						    	</select>
					    	</div>
				    	</div>
				    	<div class="form-group col-sm-12" id="sistema_motor" >
				    		<div class="form-group col-sm-3"><label>Sistema</label></div>
				    		<div class="form-group col-sm-3">
						    	<select id="da_sistema" class="form-control" onchange="sistema(this.value);adicional('Sistema', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="MANUAL">MANUAL</option>
							    		<option value="MOTORIZADO">MOTORIZADO</option>
							    	</select>
					    	</div>
					    </div>

				    	<div class="form-group col-sm-12">
					    	<div class="form-group col-sm-6"></div>
					    						    	
				    		<div class="form-group col-sm-1 col-sm-offset-11">
						    	<label style="color:#CA0707;">Total</label>
					    	</div><div class="form-group col-sm-9">
						    	<label>Precio Publico</label>
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
						    	<input type="number" min="0" max="100" id="producto_descuento_adicional" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento Adicional" disabled>
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
							<div class="form-group col-sm-12" id="alert3" style="display:none;">
					    		<div class="alerta">
					    			<p>Verifica las opciones</p>
					    	</div>
					    	</div>
							<div class="form-group col-sm-12" id="dap_mando" style="display:none;">
					    	<div class="form-group col-sm-12">
					    	<div class="col-sm-3 col-sm-offset-6" style="text-align: center;">
					    	   <label></label>	
					    	</div>
							<div class="col-sm-1 col-sm-offset-1" style="color:#CA0707; text-align: center;">
							   <label>Distri</label>
							</div>
							<div class="col-sm-1" style="text-align: center;">
							   <label>Cliente</label>
							</div>
							</div>
							    <div class="col-sm-3">
								    <label>Mando</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_mando" class="form-control" onchange="adicional('Mando', this.value, '')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="IZQUIERDO">IZQUIERDO</option>
				    					<option value="DERECHO">DERECHO</option>
							    	</select>
						    	</div>
						    	
						
<!-- 
						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_mando_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_mando_precio">0</label>
							    </div> -->
							</div>

							<div class="form-group col-sm-12" id="dap_perfil" style="display:none;">
							    <div class="col-sm-3">
								    <label>Perfil</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_perfil" class="form-control" onchange="adicional('Perfil', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    	</select>
						    	</div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<!-- <label id="h_perfil_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_perfil_precio">0</label> -->
							    </div>
							</div>
							<div class="form-group col-sm-12" id="dap_bolsillo" style="display:none;">
							<div class="form-group col-sm-12">
					    	<div class="col-sm-3 col-sm-offset-6" style="text-align: center;">
					    	   <label></label>	
					    	</div>
							<div class="col-sm-1 col-sm-offset-1" style="color:#CA0707; text-align: center;">
							   <label>Distri</label>
							</div>
							<div class="col-sm-1" style="text-align: center;">
							   <label>Cliente</label>
							</div>
							</div>
							    <div class="col-sm-3">
								    <label>Bolsillo</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_bolsillo" class="form-control" onchange="adicional('Bolsillo', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    	</select>
						    	</div>

						    	<div class="col-sm-6" style="text-align:right;">
						    	
							    </div>
							</div>
							<div class="form-group col-sm-12" id="dap_bolsillo2" style="display:none;">
							    <div class="col-sm-3">
								    <label>Perfil</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_bolsillo_perfil" class="form-control" onchange="perfil_telos(); adicional('Perfil Telo', this.value, 'da_perf_bol_precio')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="SI">SI</option>
							    		<option value="NO">NO</option>
							    	</select>
						    	</div>

								<div class="col-sm-4">
								   	<input type="number" min="0" max="100" id="da_cenefa_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled style="display:none;">
							    </div>
							  
						    	<div class="col-sm-1" style="text-align:right;">
							    	<label style="color:#CA0707;" id="da_perf_bol_precio" >0.00</label>
							    </div>
							    <div class="col-sm-1" style="text-align:right;">
								    <label id="h_perf_bol_precio" style="display:non;">0.00</label>
							    </div>
							</div>
							    
							<div class="form-group col-sm-12" id="dap_direccion_tela" style="display:none;">
								<div class="col-sm-3">
								    <label>Sentido de la Tela</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_direccion_tela" class="form-control" onchange="adicional('Dir Tela', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="NORMAL">NORMAL</option>
				    					<option value="ATRAVESADA">ATRAVESADA</option>
				    					<option value="ATRAVESADA Y ANADIDA">ATRAVESADA Y AÑADIDA</option>
							    	</select>
						    	</div>
						    	
							   <!--  <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_direccion_tela_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled style="display:none;">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_direccion_tela_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_direccion_tela_precio">0</label>
							    </div> -->
							</div>

							<div class="form-group col-sm-12" id="dap_sentido" style="display:none;">
								<div class="col-sm-3">
								    <label>Tipo de Enrollado</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_sentido" class="form-control" onchange="adicional('Sentido', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="NORMAL">NORMAL</option>
							    		<option value="CONTRARIO-NVR">CONTRARIO-NVR</option>
							    	</select>
						    	</div>
						    	
							</div>
							<div class="form-group col-sm-12" id="dap_telos" style="display:none;">
								<div class="col-sm-3">
								    <label>Numero de Telos</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_telos" class="form-control" onchange="adicional('Nro Telos', this.value,'');perfil_telos()" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="2">2</option><option value="3">3</option>
							    		<option value="4">4</option><option value="5">5</option>
							    		<option value="6">6</option><option value="7">7</option>
							    		<option value="8">8</option><option value="9">9</option>
							    		<option value="10">10</option>
							    		
							    	</select>
						    	</div>
						    	
							</div>
							<div class="form-group col-sm-12" id="dap_apertura" style="display:none;">
								<div class="col-sm-3">
								    <label>Tipo Apertura</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_apertura" class="form-control" onchange="adicional('Apertura', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="DERECHA">DERECHA</option>
							    		<option value="IZQUIERDA">IZQUIERDA</option>
							    		<option value="EXTREMOS">EXTREMOS</option>
							    		<option value="CENTROS">CENTROS</option>
							    	</select>
						    	</div>
						    	
							</div>        
							<div class="form-group col-sm-12" id="dap_cenefa" style="display:none;">
								<div class="col-sm-3">
								    <label>Cenefa</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_cenefa" class="form-control" onchange="cenefa(); adicional('Cenefa', this.value,'da_cenefa_precio')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="ALUMINIO">ALUMINIO</option>
							    		<option value="TELA">TELA</option>
							    	</select>
						    	</div>
						    	
						    	<div class="col-sm-4">
								   	<input type="number" min="0" max="100" id="da_cenefa_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled style="display:none;">
							    </div>
							  
						    	<div class="col-sm-1" style="text-align:right;">
							    	<label style="color:#CA0707;" id="da_cenefa_precio" >0.00</label>
							    </div>
							    <div class="col-sm-1" style="text-align:right;">
								    <label id="h_cenefa_precio" style="display:non;">0.00</label>
							    </div>
							</div>    
							<div class="form-group col-sm-12" id="dap_mismo_cabezal" style="display:none;">
							    <div class="col-sm-3">
								    <label>Mismo Cabezal</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_mismo_cabezal" class="form-control" onchange="adicional('Cabezal', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="JUNTO AL SIGUIENTE">JUNTO AL SIGUIENTE</option>
							    		<option value="JUNTO AL ANTERIOR">JUNTO AL ANTERIOR</option>
							    		<option value="JUNTO CON EL ANTERIOR Y SIGUIENTE">JUNTO CON EL ANTERIOR Y SIGUIENTE</option>
							    		<option value="NO APLICA">NO APLICA</option>
							    	</select>
						    	</div>
						    
							</div>    
							<div class="form-group col-sm-12" id="dap_soporte_intermedio" style="display:none;">
							    <div class="col-sm-3">
								    <label>Soporte Intermedio</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_soporte_intermedio" class="form-control" onchange="adicional('Soporte', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="DEPENDIENTE">DEPENDIENTE</option>
							    		<option value="INDEPENDIENTE">INDEPENDIENTE</option>
							    	</select>
						    	</div>
						    	

							</div>

							<div class="form-group col-sm-12" id="dap_cover_light" style="display:none;">
							    <div class="col-sm-3">
								    <label>Cover Light</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_cover_light" class="form-control" onchange="cover_light();adicional('Cover', this.value, 'da_cover_light_precio')">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="SI">SI</option>
							    	</select>
						    	</div>
						    	
							    <div class="col-sm-4">
								    <input type="number" min="0" max="100" id="da_cover_light_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento" disabled style="display:none;">
							    </div>
							  
						    	<div class="col-sm-1" style="text-align:right;">
						    		<label style="color:#CA0707;" id="da_cover_light_precio" >0.00</label>
							    </div>
							    <div class="col-sm-1" style="text-align:right;">
							    	<label id="h_cover_light_precio" style="display:non;">0.00</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_junto_item" style="display:none;">
							    <div class="col-sm-3">
								    <label>Junto Item</label>
							    </div>

							    <div class="col-sm-3">
							    	<select id="da_junto_item" class="form-control" onchange="adicional('Junto Item', this.value,'')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="AL SIGUIENTE ITEM">AL SIGUIENTE ITEM</option>
							    		<option value="AL ANTERIOR ITEM">AL ANTERIOR ITEM</option>
							    		<option value="NO APLICA">NO APLICA</option>
							    	</select>
						    	</div>
				    							   
							</div>
							<div class="form-group col-sm-12" id="dap_casetera" style="display:none;">
								 <div class="col-sm-3">
								    <label>Cassetera</label>
							    </div>
							    <div class="col-sm-3">
							    	<select id="da_cassetera_referencia" class="form-control" onchange="adicional('Casetera', this.value)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
						    			<option value="PLANA">PLANA</option>
						    			<option value="NORMAL">NORMAL</option>
						    		</select>
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
						    	<!-- 	<label>Referencia</label> -->
						    		<select id="da_cassetera_referencia" class="form-control" onchange="adicional('Casetera', this.value)">
						    			<option value="PLANA">PLANA</option>
						    			<option value="NORMAL">NORMAL</option>
						    		</select>
						    	</div>
					    	</div>

					    	<!-- <div class="form-group col-sm-6">
						    	<div class="input_container">
						    		<label>Nombre</label>
						    		<select id="da_cassetera_nombre" class="form-control" onchange="cargarTipoCassetera(this.value)">
						    			<option value="PLANO">PLANO</option>
						    			<option value="CURVO">CURVO</option>
		
						    		</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label>Precio</label><br>
						    	<label style="color:#CA0707;">$0.00</label>
					    	</div>
						 -->
						</div>
					</div>

					<div class="panel panel-default" id="panel_sistema" style="display:none;">
						<div class="panel-heading">
			    			<div class="panel-title">Sistema</div>
						</div>
						<div class="panel-body">
						<div class="form-group col-sm-12">
							<div class="col-sm-2 col-sm-offset-8" style="color:#CA0707; text-align: center;">
							   <label>Distribuidor</label>
							</div>
							<div class="col-sm-2" style="text-align: center;">
							   <label>Cliente</label>
							</div>
						</div>
							<div class="form-group col-sm-12">
							    <div class="col-sm-3">
								    <label>Tipo Motor</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_motor_tipo" class="form-control" onchange="Llenar_motor(this.value)">
							    		<option selected value="SELECCIONE" >-- Seleccione --</option>
							    		<option value="INALAMBRICO">INALAMBRICO</option>
							    		<option value="RADIOFRECUENCIA">RADIOFRECUENCIA</option>
							    	</select>
						    	</div>

							</div>

							<div class="form-group col-sm-12">
							    <div class="col-sm-3">
								    <label>Motor</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_motor" class="form-control" onchange="precio_motor(this.value); adicional('Motor', this.value, 'Motor_valor')">
							    		<option selected value="SELECCIONE" >-- Seleccione --</option>
							    	</select>
						    	</div>
						    	

							    <div class="col-sm-2" style="display:none;">
								 <input type="number" min="0" max="100" id="da_motor_desc" onkeyup="motorDescuento(this.value)" onchange="motorDescuento(this.value)" class="form-control" value="0" placeholder="Descuento" disabled>
							    </div>

						    	<div class="col-sm-2 col-sm-offset-1" style="text-align:center;">
						    		<label id="Motor_valor" style="color:#CA0707;">0.00</label>
							    </div>
							    <div class="col-sm-2" style="text-align:center;">
							   		<label id="Motor_valor_db">0.00</label>
							    </div>
							</div>
							<!-- <div class="form-group col-sm-12">
							    <div class="col-sm-3">
								    <label>Instalacion</label>
							    </div>
							    <div class="col-sm-4">
							    	<select id="da_insta_motor" class="form-control" onchange="adicional('Motor Instal', this.value, '')" >
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="TECHO">PARED</option>
				    					<option value="PARED">TECHO</option>
							    	</select>
						    	</div>
							</div> -->
							<div  id="Datos" style="display:none;">
							   <div class="Datos">
								    <label style="color:#CA0707;">Activacion:</label>
								    	<label id="Activacion">---/---</label>
								    <label style="color:#CA0707;">Voltaje: </label>
								    	<label id="Voltaje">---/---</label>
								    <label style="color:#CA0707;">Tubo: </label>
								    	<label id="Tubo">---/---</label>
								    <label style="color:#CA0707;">RPM: </label>
								    	<label id="RPM">---/---</label>
								    <label style="color:#CA0707;">Amperaje: </label>
								    	<label id="Amperaje">---/---</label> 
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
								<div class="col-sm-4 col-sm-offset-4" style="text-align:right;">
								    <label style="color:#CA0707;">Distribuidor<label>
							    </div>
							    <div class="col-sm-4" style="text-align:right;">
								    <label style="color:#000;">Cliente<label>
							    </div>




							    <div class="col-sm-4">
								    <label>SubTotal</label>
							    </div>

						    	<div class="col-sm-4" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_subtotal">0.00</label>
							    </div>
							    <div class="col-sm-4" style="text-align:right;">
								    <label style="color:#000;">$<label><label style="color:#000;" id="da_cli_subtotal">0.00</label>
							    </div>

							    <div class="col-sm-4">
								    <label>IVA</label>
							    </div>

						    	<div class="col-sm-4" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_iva">0.00</label>
							    </div>
							    <div class="col-sm-4" style="text-align:right;">
								    <label style="color:#000;">$<label><label style="color:#000;" id="da_cli_iva">0.00</label>
							    </div>

							    <div class="col-sm-4">
								    <label>Total</label>
							    </div>

						    	<div class="col-sm-4" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_total">0.00</label>
							    </div>
							    <div class="col-sm-4" style="text-align:right;">
								    <label style="color:#000;">$<label><label style="color:#000;" id="da_cli_total">0.00</label>
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
	<script>

</body>
</html>