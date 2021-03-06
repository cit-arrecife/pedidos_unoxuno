<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
    session_start();
    if(isset($_SESSION['ADMINISTRADOR']))
    {
        header("location: view/Administrador.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uno x Uno</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
        @import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700");
        *{margin:0; padding:0}
        body{background:#E0E0E0; font-family: 'Source Sans Pro', sans-serif}
        .form{width:400px !important; margin:0 auto !important; background:#fff !important; margin-top:150px !important}
        .header{height:44px; background:#CA0707;}
        .header h2{height:44px; line-height:44px; color:#fff; text-align:center}
        .login{padding:0 20px}
        .login span.un{width:10%; text-align:center; color:#0C6; border-radius:3px 0 0 3px}
        .text{background:#12192C; width:90%; border-radius:0 3px 3px 0; border:none; outline:none; color:#999; font-family: 'Source Sans Pro', sans-serif} 
        .text,.login span.un{display:inline-block; vertical-align:top; height:40px; line-height:40px; background:#fff;}

        .btn{height:40px; border:none; background:#CA0707; width:100%; outline:none; font-family: 'Source Sans Pro', sans-serif; font-size:20px; font-weight:bold; color:#fff; border-bottom:solid 3px #000; border-radius:3px; cursor:pointer}
        ul li{height:40px; margin:15px 0; list-style:none}
        .span{display:table; width:100%; font-size:14px;}
        .ch{display:inline-block; width:50%; color:#CCC}
        .ch a{color:#CCC; text-decoration:none}
        .ch:nth-child(2){text-align:right}
        /*social*/
        .social{height:30px; line-height:30px; display:table; width:100%}
        .social div{display:inline-block; width:42%; color:#eee; font-size:12px; text-align:center; border-radius:3px}
        .social div i.fa{font-size:16px; line-height:30px}
        .fb{background:#3B5A9A; border-bottom:solid 3px #036} .tw{background:#2CA8D2; margin-left:16%; border-bottom:solid 3px #3399CC}
        /*bottom*/
        .sign{width:100%; padding:0 5%; height:50px; display:table; background:#17233B}
        .sign div{display:inline-block !important; width:50% !important; line-height:50px !important; color:#ccc !important; font-size:14px !important}
        .up{text-align:right}
        .up a{display:block; background:#096; text-align:center; height:35px; line-height:35px; width:50%; font-size:16px; text-decoration:none; color:#eee; border-bottom:solid 3px #006633; border-radius:3px; font-weight:bold; margin-left:50%}
        @media(max-width:480px){ .form{width:100%}}
        .notificacion{
			position:absolute;
			z-index:1;
			top: 0px;
			right: 0px;
        }
        .Vacio{
        	border: solid red 1px;
        	background-color: pink;
        }
    </style>
    <!--
        Code By: Brandon David Chavez Noguera
        Email:   DeveloperAndroid.App94@gmail.com
    -->
  </head>
  <body style="">
    <div id="notificacion" class="notificacion" ></div>

    <div class="form">
        <div class="header"><h2>Iniciar Sesión</h2></div>
        <div class="login">
            <br>
            <form role="form">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                        <input type="text" id="codigo_usuario" class="form-control text" placeholder="Usuario" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                        <input type="password" id="password_usuario" class="form-control text" placeholder="Contraseña" required>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" class="btn" onclick="login()">Iniciar Sesion</button>
                </div>

                <div class="form-group">
                    <div class="span"><span class="ch"><label for="r"></label> </span> <span class="ch"><a href="#"></a></span></div>
                </div>

            </form>
    <script type="text/javascript">

    	function login()
        {
            var codigo = $('#codigo_usuario').val();
            var password = $('#password_usuario').val();

            if (codigo == "" || password == "") {
              	if (codigo == "" && password == "") {
						$('#codigo_usuario').addClass('Vacio');
            			$('#password_usuario').addClass('Vacio');              		

               	}else if (codigo != "" && password == "") {
						$('#codigo_usuario').removeClass('Vacio');
            			$('#password_usuario').addClass('Vacio');              		               		
               	}else if (codigo == "" && password != "") {
						$('#codigo_usuario').addClass('Vacio');
            			$('#password_usuario').removeClass('Vacio');              		               		
               	}
            } else {
            		$('#codigo_usuario').removeClass('Vacio');
           			$('#password_usuario').removeClass('Vacio');  
           			console.log(codigo);            		
           			console.log(password);            		
                    $.ajax({	
                    	type: 'post',
                    	data: {codigo: codigo, password:password},
                    	url: './db/session.php',
	                    success: function(data){
	                    	var jsonResponse = JSON.parse(data);
	                        if (jsonResponse.Success == 0) {
	                            $('#notificacion').html(jsonResponse.Mensaje);
	                        } else if (jsonResponse.Success == 1) {
	                      	    window.location.href = 'view/Administrador.php';
	                        }


	                    }
                    })

            }
            
        }

    </script>
    
  </body>
</html>



