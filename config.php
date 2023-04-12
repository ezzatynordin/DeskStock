<?php
$serverName = "F1-LAPTOP-MPC\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"URS");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    echo "Connection established.<br />";
}else{
     echo "Connection failed.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
