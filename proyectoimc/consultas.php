<?php
include("conexion.php");
$resultado = $conexion->query("SELECT * FROM personas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registros IMC</title>

<style>
body{
    font-family: Arial;
    background: linear-gradient(135deg,#fce4ec,#e3f2fd);
    padding:20px;
}
h2{
    text-align:center;
    color:#6a1b9a;
}
.tabla{
    background:#fff;
    max-width:1100px;
    margin:auto;
    border-radius:15px;
    padding:20px;
    box-shadow:0 8px 20px rgba(0,0,0,.12);
}
table{
    width:100%;
    border-collapse:collapse;
}
th{
    background:#ba68c8;
    color:white;
    padding:10px;
}
td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #eee;
}
tr:hover{
    background:#f3e5f5;
}

/* BOTONES */
.accion{
    text-decoration:none;
    color:white;
    padding:7px 12px;
    border-radius:10px;
    font-size:13px;
    margin:2px;
    display:inline-block;
}
.editar{ background:#81c784; }
.actualizar{ background:#64b5f6; }
.eliminar{ background:#ef5350; }

.editar:hover{ background:#66bb6a; }
.actualizar:hover{ background:#42a5f5; }
.eliminar:hover{ background:#e53935; }

.volver{
    text-align:center;
    margin-top:20px;
}
.volver a{
    background:#9575cd;
    color:white;
    padding:10px 18px;
    border-radius:12px;
    text-decoration:none;
}
</style>
</head>

<body>

<h2>📊 Registros IMC</h2>

<div class="tabla">
<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Edad</th>
<th>IMC</th>
<th>Estado</th>
<th>Acciones</th>
</tr>

<?php while($fila=$resultado->fetch_assoc()){
    $imc=$fila['imc'];
    if($imc<18.5) $estado="Bajo peso";
    elseif($imc<25) $estado="Peso normal";
    elseif($imc<30) $estado="Sobrepeso";
    else $estado="Obesidad";
?>
<tr>
<td><?= $fila['id'] ?></td>
<td><?= $fila['nombre'] ?></td>
<td><?= $fila['edad'] ?></td>
<td><?= round($imc,2) ?></td>
<td><?= $estado ?></td>
<td>
<a class="accion editar" href="editar.php?id=<?= $fila['id'] ?>">Editar</a>
<a class="accion actualizar" href="editar.php?id=<?= $fila['id'] ?>">Actualizar</a>
<a class="accion eliminar" href="eliminar.php?id=<?= $fila['id'] ?>">Eliminar</a>
</td>
</tr>
<?php } ?>

</table>
</div>

<div class="volver">
<a href="formulario.html">Volver al formulario</a>
</div>

</body>
</html>
