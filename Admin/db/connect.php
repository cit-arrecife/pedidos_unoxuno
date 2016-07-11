<?php 


class connect
{
	
	function __construct()
	{}

		public function connect (){
			$conn_string ="Driver={SQL Server};Server=181.49.12.133,1433;Database=PERSIANAS;";
			
			$connect = odbc_pconnect($conn_string, "sa", "Colombia1")or die 
			('No se pudo conectar a la base de datos ');
			return $connect;
		}
}



 ?>