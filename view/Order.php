<?php
	include('../utilities/db/db_session.php');
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
    <script src="../utilities/js/Order.js" ></script>
    <script src="../utilities/js/realizarpedido.js" ></script>
    <script  type="text/javascript" >
        $(document).ready(function (){
                var codigo ='<?php echo $_SESSION['usuario_codigo']; ?>';
               // console.log(codigo);
                $('#codusu').val(codigo);
                CargarEncabezado(codigo);
               // CargarProductos(codigo);

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
            .txt{
                font-size: 12px;
            }
        }
    </style>
    <input type="text" id="codusu" style="display:none;"></input>
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
                       <li ><a href="addProduct.php">Nuevo Pedido/Cotización</a></li>
                        <li><a href="MyOrders.php">Consulta de Pedidos</a></li>
                        <!-- <li><a href="AdminPrices.php">Administrador de Precios</a></li>
                        <li><a href="#">Consulta de Inventario</a></li> -->
                            <li class="active"><a href="">Ver Cotizacion</a></li>
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
       


        <div class="modal fade" id="modalError" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pedido Realizado Con Exito!</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert" id="modal_error_mensaje">
                        <strong id="nrodcto"></strong>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="window.location ='MyOrders.php'">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-9">

            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color:#0088CC !important;">
                    <h3 class="panel-title" style="color:#FFF !important;"><strong>Detalles</strong></h3>
                </div>
                <div class="panel-body">

                    <div class="form-group col-sm-12">
                        <div class="col-sm-4">
                            <label>Distribuidor:</label>
                        </div>

                        <div class="col-sm-8">
                            <label id="ro_detalle_distribuidor"><?php echo $_SESSION['usuario_nombre']; ?></label>
                        </div>

                        <div class="col-sm-4">
                            <label>Fecha:</label>
                        </div>

                        <div class="col-sm-8">
                            <label id="ro_detalle_fecha"></label>
                        </div>

                       <!--  <div class="col-sm-4">
                            <label>Hora:</label>
                        </div>

                        <div class="col-sm-8">
                            <label id="ro_detalle_hora"></label>
                        </div> -->

                        <div class="col-sm-4">
                            <label>Codigo:</label>
                        </div>

                        <div class="col-sm-8">
                            <label id="ro_detalle_codigo"><?php echo $_SESSION['usuario_codigo']; ?></label>
                        </div>

                        <!-- <div class="col-sm-4">
                            <label>Cliente:</label>
                        </div>

                        <div class="col-sm-8">
                            <label id="ro_detalle_cliente"></label>
                        </div> -->

                        <div class="col-sm-12">
                            <label id="nro_documento" style="display:none"></label>
                        </div>
                    </div>
                    <div id="notificacion"></div>

                    <div class="form-group col-sm-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading" style="background-color:#CA0707 !important;">
                                <h3 class="panel-title" style="color:#FFF !important;"><strong>Lista de Productos</strong></h3>
                            </div>
                            <div class="panel-body">
                            
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
                                                <!-- <th style="text-align:center;" width="15%">Disponibilidad</th> -->
                                                <th style="text-align:center;" width="8%">Seleccione</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detalleProducto">
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">

                        <div class="col-sm-4"></div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#CA0707;">Total Distribuidor</label>
                        </div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#ffffff;">Total Cliente</label>
                        </div>

                        <div class="col-sm-4">
                            <label style="color:#CA0707;">SubTotal</label>
                        </div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_subtotal_distribuidor">0.00</label>
                        </div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#ffffff;">$ <label><label style="color:#ffffff;" id="ro_subtotal_cliente">0.00</label>
                        </div>

                        <div class="col-sm-4">
                            <label style="color:#CA0707;">IVA</label>
                        </div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_iva_distribuidor">0.00</label>
                        </div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#ffffff;">$ <label><label style="color:#ffffff;" id="ro_iva_cliente">0.00</label>
                        </div>

                        <div class="col-sm-12">
                            <hr>
                        </div>

                        <div class="col-sm-4">
                            <label style="color:#CA0707;">Total Pedido</label>
                        </div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_total_distribuidor">0.00</label>
                        </div>

                        <div class="col-sm-4" style="text-align:right;">
                            <label style="color:#ffffff;">$ <label><label style="color:#ffffff;" id="ro_total_cliente">0.00</label>
                        </div>

                    </div>
                    <div class="form-group col-sm-12">
                        <hr>
                    </div>

                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-4">
                            <label>Referencias</label>
                        </div>

                        <div class="form-group col-sm-8">
                            <input id="referencias_order" class="form-control" type="text"></input>
                            <p style="font-size:85%;">Ingrese aquí el nombre de su cliente o palabras claves para encontrar su pedido</p>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Observaciones Generales</label>
                        </div>

                        <div class="form-group col-sm-8">
                            <textarea class="form-control" id="observaciones_order" rows="3" maxlength="200"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <!--  <button class="btn btn-danger" type="button" onclick="realizarCotizacion()" style="background-color:#CA0707 !important;">Guardar como Cotización</button> -->
                        <button class="btn btn-danger" type="button" onclick="realizarPedido()" style="background-color:#CA0707 !important;">Realizar Pedido</button>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>


                    </body>
                    </html>