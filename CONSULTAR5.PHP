<html lang="es">
<head>
      <meta charset="UTF-8"> 
    <title>Materias</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="banner">
        <h1>Sistema de Consultas</h1>
    </div>
	    <br>
    <div>
<h2>Consulta de todas las Materias</h2>
</div>
<br>
<?php

include 'conexion.php';

if (!$conectado)
	{
		echo 'Error en la Conexion';
	}
	else
	{
		$sql = "SELECT * FROM materias order by materias";
		$resultado = pg_query($sql);
		
		echo '<div class="container"><table border=1><tr><th>ID</th><th>Materia</th><th>Año</th></tr>';
		
		while($row = pg_fetch_array($resultado))
		{
			echo '<tr><td>'.$row['id'].'</td><td>'.$row['materia'].'</td><td>'.$row['anio'].'</td></tr>';
			
		}
		
		echo '</table></div>';
		
	}	
		pg_close($conectado);
	

	?>
	<a class="button2" href='http://localhost/programacion3/TP2-Posgre-Prog3/CONSULTAR1.PHP'>Volver a la página principal</a>

</body>

</html>