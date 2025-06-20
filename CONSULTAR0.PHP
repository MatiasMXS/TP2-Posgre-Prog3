<html>

<head>

<title>CONSULTAR</title>

</head>

<body>

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
		
		echo '<table border=2><tr style="border-color:#000000; border-style:solid; border-with:2px;" align="center" bgcolor="#FF9000"><td>ID</td><td>DNI</td><td>NOMBRE</td></tr>';
		
		while($row = pg_fetch_array($resultado))
		{
			echo '<tr style="border-color:#000000; border-style:solid; border-with:2px;"><td>'.$row['id'].'</td><td>'.$row['dni'].'</td><td>'.$row['nombre'].'</td></tr>';
			
		}
		
		echo '</table>';
		
	}	
		pg_close($conectado);
	

	?>
	
</body>

</html>