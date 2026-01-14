<?php
include("conexion.php");

/* Verificar que el formulario fue enviado */
if (!isset($_POST['nombre'], $_POST['edad'], $_POST['peso'], $_POST['altura'])) {
    header("Location: formulario.html");
    exit();
}

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

/* Validar altura */
if ($altura <= 0) {
    echo "Error: la altura no puede ser 0";
    exit();
}

$imc = $peso / ($altura * $altura);

$sql = "INSERT INTO personas (nombre, edad, peso, altura, imc)
        VALUES ('$nombre', '$edad', '$peso', '$altura', '$imc')";
$conexion->query($sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados IMC</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #fce4ec);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 18px;
            width: 400px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.12);
        }

        h2 {
            text-align: center;
            color: #6a1b9a;
            margin-bottom: 20px;
        }

        .dato {
            font-size: 15px;
            margin-bottom: 10px;
            color: #444;
        }

        .estado {
            margin-top: 15px;
            padding: 12px;
            border-radius: 10px;
            background-color: #f3e5f5;
            color: #4a148c;
        }

        ul {
            margin-top: 10px;
            padding-left: 20px;
        }

        li {
            margin-bottom: 6px;
        }

        .motivacion {
            background-color: #e8f5e9;
            padding: 12px;
            border-radius: 10px;
            color: #2e7d32;
            margin-top: 10px;
            text-align: center;
        }

        .volver {
            margin-top: 20px;
            text-align: center;
        }

        .volver a {
            text-decoration: none;
            background-color: #ba68c8;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: bold;
        }

        .volver a:hover {
            background-color: #ab47bc;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Resultados del IMC</h2>

    <div class="dato"><b>Nombre:</b> <?php echo $nombre; ?></div>
    <div class="dato"><b>IMC:</b> <?php echo round($imc, 2); ?></div>

    <?php if ($imc < 18.5) { ?>
        <div class="estado">
            <b>Estado:</b> Bajo peso
            <ul>
                <li>Aumentar el consumo de alimentos nutritivos.</li>
                <li>Consumir más proteínas (huevo, pollo, pescado).</li>
                <li>Mantener horarios regulares de comida.</li>
                <li>Consultar a un profesional de la salud.</li>
            </ul>
        </div>

    <?php } elseif ($imc >= 18.5 && $imc < 25) { ?>
        <div class="motivacion">
            <b>Estado:</b> Peso normal <br><br>
            ✨ ¡Excelente trabajo! Continúa con hábitos saludables y actividad física para cuidar tu cuerpo. ✨
        </div>

    <?php } elseif ($imc >= 25 && $imc < 30) { ?>
        <div class="estado">
            <b>Estado:</b> Sobrepeso
            <ul>
                <li>Reducir el consumo de azúcares y comida chatarra.</li>
                <li>Hacer actividad física al menos 30 minutos diarios.</li>
                <li>Beber suficiente agua.</li>
                <li>Mantener una dieta balanceada.</li>
            </ul>
        </div>

    <?php } else { ?>
        <div class="estado">
            <b>Estado:</b> Obesidad
            <ul>
                <li>Seguir una dieta saludable baja en grasas y azúcares.</li>
                <li>Realizar ejercicio de forma constante.</li>
                <li>Evitar refrescos y ultraprocesados.</li>
                <li>Buscar orientación médica o nutricional.</li>
            </ul>
        </div>
    <?php } ?>

    <div class="volver">
        <a href="formulario.html">Volver al formulario</a>
        <a href="consultas.php">Ver consultas</a>
    </div>
</div>

</body>
</html>