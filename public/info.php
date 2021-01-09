<?php
// phpinfo();

$mssql_servername = "113.160.206.149\SQLEXPRESS,1433";
$mssql_conn_info = array( "Database"=>"MITACOTEST", "UID"=>"LinkToSQL", "PWD"=>"Link@[To#SQL]");
$conn = sqlsrv_connect($mssql_servername, $mssql_conn_info);
if( $conn ) {
    echo "Đã kết nối.<br />";
}else{
     echo "Kết nối thất bại !<br/><pre>";
     die( print_r( sqlsrv_errors(), true));
}