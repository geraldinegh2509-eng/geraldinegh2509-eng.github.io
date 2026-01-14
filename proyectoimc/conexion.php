<?php
$conexion = new mysqli("localhost", "root", "", "proyectoimc");

if ($conexion->connect_error) {
    die("Error de conexión");
}
?>