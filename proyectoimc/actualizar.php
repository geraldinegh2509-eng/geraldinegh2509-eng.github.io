<?php
include("conexion.php");

if (!isset($_POST['id'])) {
    header("Location: consultas.php");
    exit;
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$imc = $peso / ($altura * $altura);

$conexion->query("
    UPDATE personas SET
    nombre = '$nombre',
    edad = $edad,
    peso = $peso,
    altura = $altura,
    imc = $imc
    WHERE id = $id
");

header("Location: consultas.php");
