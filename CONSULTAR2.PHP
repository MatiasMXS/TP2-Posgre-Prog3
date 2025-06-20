<html>
<head><title>Notas del Alumno</title></head>
<body>

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

echo "<h3>Notas del Alumno</h3>";
echo '<table border="1"><tr><th>Alumno</th><th>Materia</th><th>Nota</th><th>Observación</th></tr>';
while ($row = pg_fetch_array($resultado)) {
    echo "<tr><td>{$row['alumno']}</td><td>{$row['materia']}</td><td>{$row['nota']}</td><td>{$row['observacion']}</td></tr>";
}
echo '</table>';

pg_close($conectado);
?>

</body>
</html>
