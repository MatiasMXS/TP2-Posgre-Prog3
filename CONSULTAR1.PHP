<html>
<head><title>PROGRAMACION3</title></head>
<body>

<form name="formi" method="post" action="CONSULTAR2.php">
    FORMULARIO DE CONSULTA DE NOTAS DE ALUMNOS:
    <br><br>
    <?php
    include 'conexion.php';

    if (!$conectado) {
        echo 'Error Conectando';
    } else {
        $consulta = pg_query("SELECT * FROM alumnos");
        echo "ALUMNOS: <select name=\"id\">";
        while ($row = pg_fetch_array($consulta)) {
            echo "<option value=\"{$row['id']}\">{$row['nombre']}</option>";
        }
        echo "</select><br><br>";
    }
    ?>
    <input type="submit" value="Consulta por Alumno"><br><br>
</form>

<form name="form1" method="post" action="CONSULTAR3.php">
    FORMULARIO DE CONSULTA DE NOTAS DE MATERIAS:
    <br><br>
    <?php
    $consulta1 = pg_query("SELECT * FROM materias");
    echo "MATERIAS: <select name=\"id\">";
    while ($row1 = pg_fetch_array($consulta1)) {
        echo "<option value=\"{$row1['id']}\">{$row1['materia']}</option>";
    }
    echo "</select><br><br>";
    ?>
    <input type="submit" value="Consulta por Materia">
</form>

</body>
</html>
