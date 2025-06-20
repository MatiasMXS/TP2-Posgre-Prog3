<html lang="es">
<head>
      <meta charset="UTF-8"> 
    <title>Alumnos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="banner">
        <h1>Sistema de Consultas</h1>
    </div>
	    <br>
    <div>
<h2>Consulta de todos los Alumnos</h2>
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
		$sql = "SELECT * FROM alumnos order by nombre";
		$resultado = pg_query($sql);
		
		echo '<div class="container"><table border="1"><tr><th>ID</th><th>DNI</th><th>NOMBRE</th><th>mail</th></tr>';
		
		while($row = pg_fetch_array($resultado))
		{
			echo '<tr><td>'.$row['id'].'</td><td>'.$row['dni'].'</td><td>'.$row['nombre'].'</td><td>'.$row['mail'].'</td></tr>';
			
		}
		
		echo '</table></div>';
		
	}	
		pg_close($conectado);
	

	?>
	<a class="button2" href='http://localhost/programacion3/TP2-Posgre-Prog3/CONSULTAR1.PHP'>Volver a la página principal</a>

</body>

</html>