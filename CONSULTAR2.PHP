<html lang="es">
<head>
      <meta charset="UTF-8"> 
    <title>Notas por Alumno</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <h1>Sistema de Consultas</h1>
    </div>
    <br>
    <div>
<h2>Consulta de Notas por Alumno</h2>
</div>
<br>

<?php
include 'conexion.php';

if (!$conectado) {
    echo 'Error en la Conexión';
    exit;
}

$id = $_POST['id'];
$sql = "SELECT a.nombre AS alumno, m.materia, n.nota, n.observacion
        FROM notas n
        JOIN alumnos a ON n.idalumno = a.id
        JOIN materias m ON n.idmateria = m.id
        WHERE a.id = $id";

$resultado = pg_query($sql);

echo '<div class="container"><table border="1"><tr><th>Alumno</th><th>Materia</th><th>Nota</th><th>Observación</th></tr>';
while ($row = pg_fetch_array($resultado)) {
    echo "<tr><td>{$row['alumno']}</td><td>{$row['materia']}</td><td>{$row['nota']}</td><td>{$row['observacion']}</td></tr>";
}
echo '</table></div>';

pg_close($conectado);
?>
<a class="button2" href='http://localhost/programacion3/TP2-Posgre-Prog3/CONSULTAR1.PHP'>Volver a la página principal</a>

</body>
</html>
