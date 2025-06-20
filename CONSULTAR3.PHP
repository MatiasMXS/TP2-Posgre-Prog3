<html>
<head><title>Notas por Materia</title></head>
<body>

<?php
include 'conexion.php';

if (!$conectado) {
    echo 'Error en la Conexión';
    exit;
}

$id = $_POST['id'];
$sql = "SELECT m.materia, a.nombre AS alumno, n.nota
        FROM notas n
        JOIN alumnos a ON n.idalumno = a.id
        JOIN materias m ON n.idmateria = m.id
        WHERE m.id = $id";

$resultado = pg_query($sql);

echo "<h3>Notas por Materia</h3>";
echo '<table border="1"><tr><th>Materia</th><th>Alumno</th><th>Nota</th></tr>';
while ($row = pg_fetch_array($resultado)) {
    echo "<tr><td>{$row['materia']}</td><td>{$row['alumno']}</td><td>{$row['nota']}</td></tr>";
}
echo '</table>';

pg_close($conectado);
?>

</body>
</html>
