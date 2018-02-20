<?php session_start();
	 $filas = 6;
	$columnas= 6 ;
	global $filas, $columnas;

  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Color flood</title>

</head>
<body>
	<!-- <?php 
/*	echo "<td height='58.75' width='80'><div ><img src=2.jpg /></img></div></td>";*/
	
	?> -->

	<div align="center">
	<?php
	//proceso de llenado de matriz
	$turno=1;
	$_SESSION["matriz"]=array();
		
	$_SESSION["filas"]=$filas;
		
	$_SESSION["columnas"]=$columnas;
	$_SESSION["turnos"]=$turno;	
		for($i =0;$i<$filas;$i++){
			for ($j=0; $j <$columnas; $j++) { 
				# code...
				
				$_SESSION["matriz"][$i][$j]= 0;
		//		$_SESSION["matriz"][$i][$j]=2;
				//echo $_SESSION["matriz"][$i][$j]."  ";
			}
			//echo "<br>";
		}
		$_SESSION["matriz"][2][2]= 1;
		$_SESSION["matriz"][3][3]= 1;
		$_SESSION["matriz"][2][3]= 2;
		$_SESSION["matriz"][3][2]= 2;
		//cambio de ventana al juego despues de iniciada la sesion
		header("location:jugar.php");
	  ?>

	</div>

</body>
</html>