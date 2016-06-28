<?php 


class connect
{
	
	function __construct()
	{}

	public function connect (){
			$conn_string ="Driver={SQL Server};Server=KIUBY-PC\SQLEXPRESS;Database=PERSIANAS;";
			
			$connect = odbc_pconnect($conn_string, "Conecta", "123456")or die 
			('No se pudo conectar a la base de datos ');
			return $connect;
		}
}



 ?>