<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'ql_nhanvien';
$port = '3306';

$conn = mysqli_connect($host,$user,$password, $database, $port);
$conn->set_charset('utf8');

if(!$conn) die('Khong ket noi duoc DB. Vui long, thu lai sau');

?>