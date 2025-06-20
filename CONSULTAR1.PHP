<html lang="es">
<head>
      <meta charset="UTF-8"> 
    <title>Sistema de Consultas</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

 <div class="banner">
        <h1>Sistema de Consultas</h1>
    </div>
	<div class="container">
        <p>Consultas Básicas</p>
		<form name="form1" method="post" action="CONSULTAR4.php">
	<input class="button" type="submit" value="Mostrar todos los Alumnos">
</form>

<form name="form1" method="post" action="CONSULTAR5.php">
	<input class="button" type="submit" value="Mostrar todas las Materias">
</form>

</body>
</html>
	</div>
<div class="container">
<form name="formi" method="post" action="CONSULTAR2.php">
    Consulta de Notas de Alumnos:
    <br><br>
    <?php
    include 'conexion.php';

    if (!$conectado) {
        echo 'Error Conectando';
    } else {
        $consulta = pg_query("SELECT * FROM alumnos");
        echo "Alumnos: <select name=\"id\">";
        while ($row = pg_fetch_array($consulta)) {
            echo "<option value=\"{$row['id']}\">{$row['nombre']}</option>";
        }
        echo "</select><br><br>";
    }
    ?>
    <input class="button" type="submit" value="Consulta por Alumno"><br><br>
</form>
</div>
<div class="container">
<form name="form1" method="post" action="CONSULTAR3.php">
    Consulta de Notas de Materias:
    <br><br>
    <?php
    $consulta1 = pg_query("SELECT * FROM materias");
    echo "Materias: <select name=\"id\">";
    while ($row1 = pg_fetch_array($consulta1)) {
        echo "<option value=\"{$row1['id']}\">{$row1['materia']}</option>";
    }
    echo "</select><br><br>";
    ?>
    <input class="button" type="submit" value="Consulta por Materia">
</form>
</div>
</body>
</html>
