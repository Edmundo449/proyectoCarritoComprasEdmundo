<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "carritoCompras";

$con = new mysqli($db_host,$db_user,$db_password,$db_name);

$cadenaConexion = 'mysql:dbname=carritoCompras;host=127.0.0.1';
$usuario = 'root';
$contraseña = '';
$objetoPDO = new PDO($cadenaConexion, $usuario, $contraseña);
?>