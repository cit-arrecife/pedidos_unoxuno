<?php
	 include('../db/session.php');



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
	<<script src="../public/js/usuadmin.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type :'post',
			url : '../controller/controller_usuadmin.php',
			data :{opcion: 1},
			success: function(data){
				console.log(data);
				Json = JSON.parse(data);
				$.each(Json, function(index, val){
					var id = '<td style="text-align:center; display:none" width="1%">'+val.ID+'</td>';
					var nom ='<td style="text-align:center;" width="20%">'+val.NOMBRE+'</td>';
	                var cod  ='<td style="text-align:center;" width="20%">'+val.CODIGO+'</td>';
	                var pass = '<td style="text-align:center;" width="20%">'+val.PASSWORD+'</td>';
	                var boton ='<button id="btnVer'+val.ID+'" class="btn btn-danger" title="Ver" onclick="verdetalle('+val.ID+')">Ver</button>';
	                var addBtn = '<td style="text-align:center">'+boton+'</td>';
	                var total = '<tr class="lista" id="tr_'+val.ID+'">'+id+nom+cod+pass+addBtn+'</tr>';
	                $('#detalleUsuario').append(total);
				});
				
    			

			}	
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
						border: solid 2px red;
						font-style:italic;
						font-weight: bold;
						text-align: center;
					}

		</style>
<body>

			<div class="modal fade " id="modalusuario" tabindex="-1" role="dialog">
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header" style="background-color:#CA0707;">
							<button type="button" class="close" data-dismiss="modal"  style="color:black;">Cerrar</button>
						<h4 id="titulomodal" style="color:white;"></h4>
						
						</div>
						<div class="modal-body ">
							<div class="col-sm-2">
								<i class="fa fa-user" style="font-size:120px; color:#CA0707; "></i>
							</div>
								<div class="col-sm-9">
									<input type="text" name="Name" id="Uname" class="col-sm-offset-1 form-control" placeholder="Nombre" disabled>
								</div>
								<div class="col-sm-9">
									<input type="text" name="User" id="Uuser"class="col-sm-offset-1 form-control" placeholder="Usuario" disabled>
								</div>
								<div class="col-sm-9">
									<input type="password" name="Pass" id="Upass"class="col-sm-offset-1 form-control" placeholder="Contraseña" disabled>
								</div>
								<div class="col-sm-9">
									<input type="password" name="Pass2" id="Upass2"class="col-sm-offset-1 form-control" placeholder="Repetir Contraseña" disabled>
								</div>
						</div>
						<div class="modal-footer ">
						<div class="col-sm-10 "><br>
							<button type="button" class="btn" onclick="editarusuario();" >Editar</button>
							<button type="button" class="btn" >Guardar</button>
							<button type="button" class="btn" >Eliminar</button>
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
				<li><a href="" style="font-size:17px;">
					<i class="fa fa-briefcase" style="font-size:25px;"></i>
					PRODUCTOS
					</a>
				</li>
				<li><a href="#" style="font-size:17px;">
					<i class="fa fa-wrench" aria-hidden="true" style="font-size:25px;"></i>
					ADICIONALES
					</a>
				</li>
				<li class="active"><a href="Administrador.php" style="font-size:17px;">
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
    	  		<div class="container col-sm-9">
    	  	   	  <div class="datos col-sm-offset-1">
            	  	<div>
            	  		<label>Codigo de Usuario: <?php print $_SESSION['usuario_codigo']; ?></label>
            	  	</div>
            	  </div>
            	  <div class="datos col-sm-offset-1">
            	  	<div>
            	  		<label>Nombre de Usurio: <?php echo $_SESSION['usuario_nombre']; ?></label>
            	  	</div>
            	  </div>
            	  <div class="datos col-sm-offset-1">
            	  	<div>
            	  		<label>Inicion de sesion: <?php echo $_SESSION['usuario_login']; ?></label>
            	  	</div>
            	  </div>
    	  		</div>
            </div>
        </div>
    </div>
</div>



 <div class="form-group col-sm-9">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background-color:#CA0707 !important;">
            <h3 class="panel-title" style="color:#FFF !important;"><strong>Usuarios</strong></h3>
        </div>
        <div class="panel-body">
        
            <div class="table-responsive">
                <table id="tableProductos" class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="text-align:center; display:none" width="1%">id</th>
                            <th style="text-align:center;" width="20%">Nombre</th>
                            <th style="text-align:center;" width="20%">Codigo</th>
                            <th style="text-align:center;" width="20%">Contraseña</th>
                            <th style="text-align:center;" width="20%">Seleccione</th>
                        </tr>
                    </thead>
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