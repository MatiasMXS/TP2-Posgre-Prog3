<html lang="es">
<head>
      <meta charset="UTF-8"> 
    <title>Notas por Materia</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include 'conexion.php';

if (!$conectado) {
    echo 'Error en la Conexión';
    exit;
}

$id = $_POST['id'];
$sql = "SELECT m.materia, a.nombre AS alumno, n.nota, n.observacion
        FROM notas n
        JOIN alumnos a ON n.idalumno = a.id
        JOIN materias m ON n.idmateria = m.id
        WHERE m.id = $id";

$resultado = pg_query($sql);

echo "<h3>Notas por Materia</h3>";
echo '<table border="1"><tr><th>Materia</th><th>Alumno</th><th>Nota</th><th>Observación</th></tr>';
while ($row = pg_fetch_array($resultado)) {
    echo "<tr><td>{$row['materia']}</td><td>{$row['alumno']}</td><td>{$row['nota']}</td><td>{$row['observacion']}</td></tr>";
}
echo '</table>';

pg_close($conectado);
?>

</body>
</html>
