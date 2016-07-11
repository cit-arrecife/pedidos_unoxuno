<?php
	 include('../db/session.php');
	 //error_log(print_r($_SESSION));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administrador UnoxUno</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../public/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../public/jquery/jquery-ui.css">
	<script src="../public/js/adicionales.js" type="text/javascript"></script>
    <script src="../public/jquery/jquery-ui.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
            lemotore();
    });
  $(document).ready(function (){
      $('#solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });
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
						border: solid 1px red;
						font-style:italic;
                        	}
                    .Scroller{
                        height:300px;
                        overflow-y: scroll;
                    }
                    .center{
                        text-align: center;
                        justify-content: center;
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

<div class="modal fade bd-example-modal-sm" tabindex="-2" role="dialog" id="modalp" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="text-align:center">
      <h4 id="titlep"></h4>
      <div class="modal-footer" id="btnp" style="text-align:center">
      </div>
    </div>
  </div>
</div>


<div class="modal fade " id="modalMotor" tabindex="-1" role="dialog">
    <div class="modal-dialog" >
    <div class="modal-content">
        <div class="modal-header" style="background-color:#CA0707;">
            <button type="button" class="close" data-dismiss="modal"  style="color:black;" onclick="limpiar()">Cerrar</button>
            <h4 id="titulomotor" style="color:white;"></h4>
        </div>
        <div class="modal-body ">
            <div class="col-sm-8 col-sm-offset-2" style="text-align:center;">
                <input type="text" class="form-control" id="Producto" placeholder="Producto">
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre">
                <input type="text" class="form-control" id="Tipo" placeholder="Tipo">
                <input type="text" class="form-control" id="Precio" placeholder="Precio">
                <input type="text" class="form-control" id="Activacion" placeholder="Activacion">
                <input type="text" class="form-control" id="Voltaje" placeholder="Voltaje">
                <input type="text" class="form-control" id="Tubo" placeholder="Tubo">
                <input type="text" class="form-control" id="RPM" placeholder="RPM">
                <input type="text" class="form-control" id="Amperaje" placeholder="Amperaje">
            </div>
        </div>
        <div class="modal-footer ">
            <div class="col-sm-10" id="modalbtnM"><br>
       </div>
       </div>
    </div>
   </div>
</div>

<div class="modal fade " id="modalPerfil" tabindex="-1" role="dialog">
    <div class="modal-dialog" >
    <div class="modal-content">
        <div class="modal-header" style="background-color:#CA0707;">
            <button type="button" class="close" data-dismiss="modal"  style="color:black;" onclick="limpiar()">Cerrar</button>
            <h4 id="tituloperfil" style="color:white;"></h4>
        </div>
        <div class="modal-body ">
            <div class="col-sm-8 col-sm-offset-2" style="text-align:center;">
                <input type="text" class="form-control" id="TipoP" placeholder="Tipo">
                <input type="text" class="form-control" id="NombreP" placeholder="Nombre">
                <input type="text" class="form-control" id="ColorP" placeholder="Color">
            </div>
        </div>
        <div class="modal-footer ">
            <div class="col-sm-10" id="modalbtnP"><br>
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
				<li><a href="Productos.php" style="font-size:17px;">
					<i class="fa fa-briefcase" style="font-size:25px;"></i>
					PRODUCTOS
					</a>
				</li>
				<li class="active"><a href="Adicionales.php" style="font-size:17px;">
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

<div class="col-sm-9" style="text-align:center;">
	<div class="form-group col-sm-4">
	    	<button type="button" class="btn btn-danger"  onclick="tablas('Motor')" style="font-size:18px; background-color:#CA0707 !important;">
			Motores
	        </button>
	</div>
	<div class="form-group col-sm-4">
	    	<button type="button" class="btn btn-danger"  onclick="tablas('Cover');loadCover()" style="font-size:18px; background-color:#CA0707 !important;">
			Cover Light
	        </button>
	</div>
	<div class="form-group col-sm-4">
	    	<button type="button" class="btn btn-danger"  onclick="tablas('Perfil');loadPerfil()" style="font-size:18px; background-color:#CA0707 !important;">
			Perfiles
	        </button>
	</div>
	
</div>

<div class="form-group col-sm-9" id="tmotor">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Motores</strong>
            <button type="Button" class="btn btn-danger" onclick="nuevousuario()" style="text-align:right;"> <i class="fa fa-plus" style="font-size:15px;"></i></button>

            </h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="tableusers" class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="text-align:center; display:none" width="1%">id</th>
                            <th style="text-align:center;" width="20%">Producto</th>
                            <th style="text-align:center;" width="20%">Nombre</th>
                            <th style="text-align:center;" width="20%">Tipo</th>
                            <th style="text-align:center;" width="20%">Precio</th>
                            <th style="text-align:center;" width="20%">Seleccione</th>
                        </tr>
                    </thead>
                </table>
            </div>
             <div class="table-responsive" id="motorContent">
                <table id="tablemotor" class="table table-condensed" >
                  <tbody id="detallemotor">
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-9" id="tcover" style="display:none;">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Cover Light</strong> </h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div class="col-sm-12">
                    <div class="col-sm-3">
                        <label>Cover Light M2</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="solo-numero" class="form-control" placeholder="Precio">
                    </div>
                    <div class="col-sm-3">
                        <input type="button"  class="btn btn-danger" onclick="Update()" value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-9" id="tperfil" style="display:none;">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Perfil</strong>
            <button type="Button" class="btn btn-danger" onclick="NuevoP()" style="text-align:right;"> <i class="fa fa-plus" style="font-size:15px;"></i></button>
            </h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="tableusers" class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="text-align:center; display:none" width="1%">id</th>
                            <th style="text-align:center;" width="20%">Tipo</th>
                            <th style="text-align:center;" width="20%">Nombre</th>
                            <th style="text-align:center;" width="20%">Color</th>
                            <th style="text-align:center;" width="20%">Seleccione</th>
                        </tr>
                    </thead>
                </table>
            </div>
             <div class="table-responsive" id="perfilContent">
                <table id="tableperfil" class="table table-condensed" >
                  <tbody id="detalleperfil">
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="form-group col-sm-9" id="tcenefa" style="display:none;">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Cenefa</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="tableusers" class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="text-align:center; display:none" width="1%">id</th>
                            <th style="text-align:center;" width="20%">Nombre</th>
                            <th style="text-align:center;" width="20%">Codigo</th>
                            <th style="text-align:center;" width="20%">Contraseña</th>
                            <th style="text-align:center;" width="20%">Seleccione</th>
                        </tr>
                    </thead>
                </table>
            </div>
             <div class="table-responsive" id="cenefaContent">
                <table id="tablecenefa" class="table table-condensed" >
                  <tbody id="detallecenefa">
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>





</body></html>