<?php

	class db_connect
	{
		
		function __construct(){}

		function __destruct(){}
		// PDO:: __construct(){}

		// PDO:: __destruct(){}

		// public function connect()
		// {
		// 	require_once 'db_config.php';
		// 	$connect = mysqli_connect(db_host, db_user, db_password, db_database) or die (
		// 	 'No se pudo conectar a la Base de Datos '.mysqli_error($connect).'-'.db_database 
		// 			);
		// 	mysqli_select_db(db_database);
		// 	return $connect;
		// }

		// public function disconnect()
		// {
		// 	mysql_close();
		// }
		// 

		public function connect (){
			$conn_string ="Driver={SQL Server};Server=181.49.12.133,1433;Database=PERSIANAS;";
			
			$connect = odbc_pconnect($conn_string, "sa", "Colombia1")or die 
			('No se pudo conectar a la base de datos ');
			return $connect;
		}
	}
		
?>