<?php

$serverName = "F1-LAPTOP-MPC\SQLEXPRESS";
$connectionInfo = array("Database" => "deskStock");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
   die('Connection failed: ' . print_r(sqlsrv_errors(), true));
}

?>