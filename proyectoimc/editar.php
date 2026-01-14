<?php
include("conexion.php");

if (!isset($_GET['id'])) {
    header("Location: consultas.php");
    exit;
}

$id = $_GET['id'];

$consulta = $conexion->query("SELECT * FROM personas WHERE id = $id");

if ($consulta->num_rows == 0) {
    echo "Registro no encontrado";
    exit;
}

$persona = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Registro</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #e1f5fe, #fce4ec);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.formulario {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

h2 {
    text-align: center;
    color: #6a1b9a;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

button {
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background: #81c784;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
}

button:hover {
    background: #66bb6a;
}

.volver {
    text-align: center;
    margin-top: 10px;
}

.volver a {
    text-decoration: none;
    color: #6a1b9a;
    font-weight: bold;
}
</style>
</head>

<body>

<div class="formulario">
<h2>Editar Registro</h2>

<form action="actualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">

    <input type="text" name="nombre" value="<?php echo $persona['nombre']; ?>" required>

    <input type="number" name="edad" value="<?php echo $persona['edad']; ?>" required>

    <input type="number" step="0.1" name="peso" value="<?php echo $persona['peso']; ?>" required>

    <input type="number" step="0.01" name="altura" value="<?php echo $persona['altura']; ?>" required>

    <button type="submit">Guardar Cambios</button>
</form>

<div class="volver">
    <a href="consultas.php">← Volver</a>
</div>
</div>

</body>
</html>
