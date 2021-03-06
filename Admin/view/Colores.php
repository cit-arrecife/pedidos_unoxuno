<?php
	 include('../db/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Colores x Producto</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   	<link rel="stylesheet" href="../public/font-awesome/css/font-awesome.css">
	<script src="../public/js/colores.js" type="text/javascript"></script>


</head>
<script type="text/javascript">
	$(document).ready(function(){
		cargartipo();
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
						height:170px;
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

<div class="modal fade bd-example-modal-sm" tabindex="-2" role="dialog" id="coloradd" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center">
      <h4 id="colortittle"></h4>
      <div class="modal-body " style="text-align:center">
    	<div >
    		<label id="validacionC" style="font-size:10px; color:#CA0707; "></label>
			<input type="text" name="prod" id="Ncolor" class="form-control" placeholder="Color" >
		</div>
      </div>
      <div class="modal-footer" id="colorbtn" style="text-align:center">
      	<button type="button" class="btn" onclick="Agregar()" >Guardar</button>
		<button type="button" class="btn" data-dismiss="modal">Cancelar</button>
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

<!-- <div class="form-group col-sm-2">
  <div>
    <div>
    	<button type="button" class="btn btn-danger"  onclick="nuevoproducto()" style="font-size:18px; background-color:#CA0707 !important;">
        <i class="fa fa-plus" aria-hidden="true" style="font-size:18px; "></i>
		Nuevo Producto
        </button>
        
    </div>
  </div>
</div> -->
<div class="form-group col-sm-2">
  <div>
    <div>
    	<button type="button" class="btn btn-danger"  onclick="window.location='Productos.php'" style="font-size:18px; background-color:#CA0707 !important;">
        <i class="fa" aria-hidden="true" style="font-size:18px; "></i>
		Productos
        </button>
        
    </div>
  </div>
</div>

 <div class="form-group col-sm-9">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Colores por Producto</strong></h3>
        </div>
        <div class="panel-body">
        	<div class="panel-heading" style="background-color:#E8E8E8 !important; ">
        	    <h3 class="panel-title" style="color:#000 !important; "><strong>Producto</strong></h3>
		    </div>
		   
		    <div class="col-sm-12 panel-body">
			    <div class="col-sm-3 col-sm-offset-1">
			    	<label style="font-size:12px;">Tipo de Tela: </label>
			    </div>
			    <div class="col-sm-3">
			    	<select id="da_tipo_tela_col" class="form-control" standard title="Tipo de Tela..." onchange="nombretela(this.value)">
			    	</select>	
			    </div> 	
		    </div>
		    <div class="col-sm-12">
		    	<div class="col-sm-3 col-sm-offset-1">
		    		<label style="font-size:12px;">Nombre de la Tela: </label>
		    	</div>
			    <div class="col-sm-3">
			    	<select id="da_tela_color" class="form-control" standard title="Nombre de la Tela..." onchange="colores()">
			    	<option value="SELECCIONE">-- Seleccione --</option>}
			    	option
			    	</select>	
			    </div>
		    </div>
        </div>
        <div class="panel-body " id="colores" style="display:none;">
        	<div class="panel-heading" style="background-color:#E8E8E8 !important; ">
        	    <h3 class="panel-title" style="color:#000 !important; "><strong>Colores</strong></h3>
		    </div>

		    <div class="table-responsive">
                <table id="tablecolores" class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="text-align:center; display:none" width="1%">id</th>
                            <th style="text-align:center;" width="60%">Color</th>
                            <th style="text-align:center;" width="40%">Seleccione</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="table-responsive" id="colorContent">
            <table id="tableusers" class="table table-condensed" >
            		<tbody id="detallecolores" >
                    </tbody>
             </table>
			</div>

        </div>
    </div>
</div>


	
</body>
</html>


<!-- <table id="tableusers" class="table table-condensed" >
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
        
            <div class="table-responsive" style="height:380px; overflow-y: scroll;">
                <table id="tableusers" class="table table-condensed" >
                  <tbody id="detalleUsuario">
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div> -->
