<?php
	 include('../db/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Productos UnoxUno</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../public/font-awesome/css/font-awesome.css">
	<script src="../public/js/producto.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		cargarproductos();
	});
</script>
<style type="text/css">
					.lista td{
						vertical-align: middle;
						text-align:center;
					}

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
					.Scroller{
						height:380px;
						overflow-y: scroll;
					}

		</style>
<body>
<div class="modal fade bd-example-modal-sm" tabindex="-2" role="dialog" id="modalok" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center">
      <h4 id="oktitle"></h4>
      <div class="modal-footer" id="okbtn" style="text-align:center">
      	
      </div>
    </div>
  </div>
</div>

			<div class="modal fade " id="modalusuario" tabindex="-1" role="dialog">
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header" style="background-color:#CA0707;">
							<button type="button" class="close" data-dismiss="modal"  style="color:black;" onclick="block()">Cerrar</button>
						<h4 id="titulomodal" style="color:white;"></h4>
						
						</div>
						<div class="modal-body ">
							<div class="col-sm-2">
								<i class="fa fa-shopping-cart" style="font-size:120px; color:#CA0707; text-align:center;"></i>
							</div>
								<div class="col-sm-9">
									<input type="text" name="id" id="Uid" class="col-sm-offset-1 form-control" placeholder="Nombre" disabled style="display:none;">
								</div>
								<div class="col-sm-9">
									<input type="text" id="Uprod" class="col-sm-offset-1 form-control" placeholder="Producto (Ej: Enrollable, Panel Japones, Sheer)" disabled>
								</div>
								<div class="col-sm-9">
									<input type="text" name="User" id="Upres" class="col-sm-offset-1 form-control" placeholder="Presentacion" disabled>
								</div>
								<div class="col-sm-9">
									<input type="text"  id="Utipo" class="col-sm-offset-1 form-control" placeholder="Tipo" disabled>
								</div>
								<div class="col-sm-9">
									<input type="text" id="Utela" class="col-sm-offset-1 form-control" placeholder="Tela" disabled>
								</div>
								<div class="col-sm-9 col-sm-offset-2">
									<input type="text" id="Uprecio" class="col-sm-offset-1 form-control" placeholder="Precio" disabled>
								</div>
								<div class="col-sm-9 col-sm-offset-3">
									<label id="validacion" style="font-size:10px; color:#CA0707; "></label>
								</div>
						</div>
						<div class="modal-footer ">
						<div class="col-sm-10" id="modalbtn"><br>
							
							
						</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade " id="nuevoproducto" tabindex="-1" role="dialog">
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header" style="background-color:#CA0707;">
							<button type="button" class="close" data-dismiss="modal"  style="color:black;">Cerrar</button>
							<h4 id="titulomodal" style="color:white;">Nuevo Producto</h4>
						</div>
						<div class="modal-body " >
							<div class="col-sm-2">
								<i class="fa fa-shopping-cart" style="font-size:120px; color:#CA0707; text-align:center;"></i>
							</div>
								<div class="col-sm-9">
									<input type="text" name="prod" id="Nprod" class="col-sm-offset-1 form-control" placeholder="Producto (Ej: Enrollable, Panel Japones, Sheer)" >
								</div>
						
								<div class="col-sm-9" >
									<input type="text" name="pres" id="Npres" class="col-sm-offset-1 form-control" placeholder="Presentacion" >
								</div>
								<div class="col-sm-9">
									<input type="text" name="tipo" id="Ntipo" class="col-sm-offset-1 form-control" placeholder="Tipo  " >
								</div>
								<div class="col-sm-9">
									<input type="text" name="tela" id="Ntela" class="col-sm-offset-1 form-control" placeholder="Tela" >
								</div>
								<div class="col-sm-9 col-sm-offset-2">
									<input type="text" name="precio" id="Nprecio" class="col-sm-offset-1 form-control" placeholder="Precio" >
								</div>
								<div class="col-sm-9 col-sm-offset-3">
									<label id="validacionA" style="font-size:10px; color:#CA0707; "></label>
								</div>
						</div>
						<div class="modal-footer ">
						<div class="col-sm-10 "><br>
							<button type="button" class="btn" onclick="GuardarNuevoproducto()" >Guardar</button>
							<button type="button" class="btn" data-dismiss="modal">Cancelar</button>
						</div>
							
						</div>
					</div>
				</div>
			</div>



<div class="navbar navbar-default col-sm-3 ">
	<div class="navbar-header">
		<img src="../public/images/logo.jpg" class="col-sm-12">
	</div>
	<div class="container col-sm-12 col-sm-offset-1" >
		<nav class="col-sm-12 ">
			<ul class="nav navbar-nav">
				<li class="active"><a href="Productos.php" style="font-size:17px;">
					<i class="fa fa-briefcase" style="font-size:25px;"></i>
					PRODUCTOS
					</a>
				</li>
				<li><a href="Adicionales.php" style="font-size:17px;">
					<i class="fa fa-wrench" aria-hidden="true" style="font-size:25px;"></i>
					ADICIONALES
					</a>
				</li>
				<li ><a href="Administrador.php" style="font-size:17px;">
					<i class="fa fa-cog " aria-hidden="true" style="font-size:25px;"></i>
					ADMINISTRAR</a></li>
				<li><a href="../db/logout.php"  class="active" style="font-size:17px;">
					<i class="fa fa-sign-out" aria-hidden="true" style="font-size:25px;"></i>
					SALIR</a></li>
			</ul>
		</nav>
	</div>
</div>

<div class="form-group col-sm-9">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Panel de Administracion </strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
              <div class="panel-heading" style="background-color:#CA0707 !important;">
              <h3 class="panel-title" style="color:#FFF !important;"><strong>
              	Datos de la session
              </strong></h3>
        	  </div>
    	  		<div class="container col-sm-12">
    	  	   	  <div class="datos  ">
            	  	<div class="col-sm-4">
            	  		<label class="label label-default">Codigo de Usuario: <?php print $_SESSION['_codigo']; ?></label>
            	  	</div>
            	  </div>
            	  <div class="datos ">
            	  	<div class="col-sm-4">
            	  		<label class="label label-default">Nombre de Usuario: <?php echo $_SESSION['_nombre']; ?></label>
            	  	</div>
            	  </div>
            	  <div class="datos ">
            	  	<div class="col-sm-3">
            	  		<label class="label label-default">Inicion de sesion: <?php echo $_SESSION['_login']; ?></label>
            	  	</div>
            	  </div>
    	  		</div>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-2">
  <div>
    <div>
    	<button type="button" class="btn btn-danger"  onclick="nuevoproducto()" style="font-size:18px; background-color:#CA0707 !important;">
        <i class="fa fa-plus" aria-hidden="true" style="font-size:18px; "></i>
		Nuevo Producto
        </button>
        
    </div>
  </div>
</div>
<div class="form-group col-sm-2">
  <div>
    <div>
    	<button type="button" class="btn btn-danger"  onclick="window.location='Colores.php'" style="font-size:18px; background-color:#CA0707 !important;">
        <i class="fa" aria-hidden="true" style="font-size:18px; "></i>
		Colores
        </button>
        
    </div>
  </div>
</div>

 <div class="form-group col-sm-9">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Productos</strong></h3>
        </div>
        <div class="panel-body">

        	<table id="tableusers" class="table table-condensed" >
                    <thead>
                        <tr>
                            <th style="text-align:center; display:none" width="1%">id</th>
                            <th style="text-align:center;" width="20%">Producto</th>
                            <th style="text-align:center;" width="20%">Presentacion</th>
                            <th style="text-align:center;" width="20%">Tipo</th>
                            <th style="text-align:center;" width="20%">Tela</th>
                            <th style="text-align:center;" width="20%">Precio</th>
                            <th style="text-align:center;" width="20%">Seleccione</th>
                        </tr>
                    </thead>
             </table>
        
            <div class="table-responsive" id="productoContent">
                <table id="tableusers" class="table table-condensed" >
                  <tbody id="detalleUsuario">
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>


	
</body>
</html>