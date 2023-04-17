<?php

// SQL server configuration 
$serverName = "F1-LAPTOP-MPC\SQLEXPRESS"; 
$dbName     = "deskStock"; 
 
// Create database connection 
try {   
   $conn = new PDO( "sqlsrv:Server=$serverName;Database=$dbName", NULL, NULL);    
   $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );   
}   
   
catch( PDOException $e ) {   
   die( "Error connecting to SQL Server: ".$e->getMessage() );    
} 


// $serverName = "F1-LAPTOP-MPC\SQLEXPRESS";
// $connectionInfo = array( "Database"=>"deskStock");
// $conn = sqlsrv_connect( $serverName, $connectionInfo);

// if (!$conn) {
//     die('Connection failed: '.print_r( sqlsrv_errors(), true));
// }


?>
