<?php session_start();
	$fil=$_SESSION["filas"];
	$col=$_SESSION["columnas"];
	$jugador= $_SESSION["turnos"];
	$contrario=$_SESSION["contrario"];
	global $fil, $col , $jugador, $contrario;
	
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Othello</title>


</head>
<body>
	<div align="center">


		<?php
			if(isset($_GET["fil"])&&isset($_GET["col"]))
			{
				//$_SESSION["matriz"][$_GET["fil"]][$_GET["col"]]=;

				// previsualizar si gano !

			 function borrar(){
					for ($i=0; $i < $_SESSION["filas"]; $i++) { 
											# code...
							for ($j=0; $j < $_SESSION["columnas"]; $j++) { 
												# code...
									if($_SESSION["matriz"][$i][$j]==3){
													$_SESSION["matriz"][$i][$j]=0;
									}
							}
					}


			 }
					
			

				function buscarfin( $x, $y, $jugador,  $contrario, $cadena){
					if($cadena=="derecha" && $y+1<$_GET["fil"]){
						do{	
							$y++;
							if($_SESSION["matriz"][$x][$y]==$jugador){
								return true;
							}
						
						}while($_SESSION["matriz"][$x][$y]==$contrario);
						return false;
					}else if($cadena=="izquierda" && $y-1>=0){

							do{	
								$y--;
								if($_SESSION["matriz"][$x][$y]==$jugador){
									return true;
								}
							
							}while($_SESSION["matriz"][$x][$y]==$contrario);
							return false;

					}
				}

							function cambiarderecha($x, $y, $jugador, $contrario){
								if($y+1<$_GET["fil"]){
										if($_SESSION["matriz"][$y+1]==$contrario){
											$_SESSION["matriz"][$y+1]=$jugador;
											cambiarderecha($x,$y+1,$jugador,$contrario);
										}
										
										
									}
							}

							function cambiarizq($x, $y,$jugador, $contrario){
								if($y-1>=0){
									if($_SESSION["matriz"][$x][$y-1]==$contrario){
										$_SESSION["matriz"][$x][$y-1]=$jugador;	
										cambiarizq($x,$y-1,$jugador,$contrario);
								
									}
								}
							}


					$x=$_GET["fil"];
					$y=$_GET["col"];
					if($_SESSION["matriz"][$x][$y]==3){

							$_SESSION["matriz"][$x][$y]=$_SESSION["turnos"];

							if(buscarfin( $x, $y, $_SESSION["turnos"],$_SESSION["contrario"],"derecha")){
								cambiarderecha($x, $y,$_SESSION["turnos"],$_SESSION["contrario"]);
							

							}else if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"izquierda")){
								cambiarizq($x,$y,$_SESSION["turnos"],$_SESSION["contrario"]);
							}

						borrar();
						if($jugador==1){
										$_SESSION["turnos"]=2;
										$_SESSION["contrario"]=1;
										//borrar();

									}else if($jugador==2){
										$_SESSION["turnos"]=1;
										$_SESSION["contrario"]=2;
									//	borrar();
									}	
					}
						
						/*if(buscarfin( $x, $y, $jugador,$contrario,"derecha")){
						//	cambiarderecha(matriz,x, y,jugador,contrario);

						}*/
				
			

			}
			
		?>

		<?php 

		
			

			for ($i=0; $i < $fil ; $i++) { 
						# code...
						for ($j=0; $j < $col; $j++) { 
							# code...
								if($_SESSION["matriz"][$i][$j]==$jugador){
										 $band=false;
									buscard( $i,$j, $_SESSION["turnos"] , $_SESSION["contrario"], $band);
									buscarizq( $i,$j, $_SESSION["turnos"] , $_SESSION["contrario"], $band);


								}

						}

					
				
			}


									function buscard($x, $y, $jugador, $contrario, $band){
										if($y+1<$_SESSION["filas"]){
											if($_SESSION["matriz"][$x][$y+1]==$contrario){
												$band=true;
											
														buscard( $x,$y+1, $jugador, $contrario, $band);
													
													}else if($_SESSION["matriz"][$x][$y+1]==0  && $band==true){
													
														opcionesdejugada($x,$y+1);
													//	echo "opciones";
													}
										}

									}

									function buscarizq($x, $y, $jugador, $contrario, $band){	

											if($y-1>=0){
											
											if($_SESSION["matriz"][$x][$y-1]==$contrario){
												$band=true;
											

												buscarizq( $x,$y-1, $jugador, $contrario, $band);
												
												}else if($_SESSION["matriz"][$x][$y-1]==0  && $band==true){
													opcionesdejugada($x,$y-1);
													
												}
													
											}
											
									}

					function opcionesdejugada($x, $y){
							$_SESSION["matriz"][$x][$y]=3;
						//	echo "hola";
					}

			
					

		 ?>
		<form action="" method="post" name="matriz">
		
		<table>  


			 <!-- funcion cargar las imagenes  -->

						<?php 	
							for($i=0;$i<$fil;$i++){
					                for($j=0;$j<$col;$j++){

					           

						                  echo "<td height='0' width='0'> <a onclick='cargar(".$i.",".$j.");'> <img src=".$_SESSION["matriz"][$i][$j].".jpg /></img></td>"; 

						            //echo $_SESSION["matriz"][$i][$j]. " " ; 
					                }
					                 echo "</tr>"; 
					              // echo "<br>";
					        }
			                for($i=0;$i<$fil;$i++){
					                for($j=0;$j<$col;$j++){

					           

						                //  echo "<td height='0' width='0'> <a onclick='cargar(".$i.",".$j.");'> <img src=".$_SESSION["matriz"][$i][$j].".jpg /></img></td>"; 

						            echo $_SESSION["matriz"][$i][$j]. " " ; 
					                }
					                // echo "</tr>"; 
					               echo "<br>";
					        }

			             ?>	 	
			  

			 
		</table>

		</form>
		

		<script type="text/javascript">
		function cargar(fila,col){
		//	alert("fil="+fila+" col:"+col);
			document.location="jugar.php?fil="+fila+"&col="+col;
		}
		</script>

	</div>
</body>

</html>