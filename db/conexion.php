<?php
$host = 'localhost';
$usuario = 'root';         // Cambiado de $user a $usuario
$contraseña = '';          // Cambiado de $password a $contraseña
$base_de_datos = 'CodeCraftDB'; // Cambiado de $db a $base_de_datos

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
  die("Conexión fallida: " . mysqli_connect_error());
}
?>