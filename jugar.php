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

	<style type="text/css">
		h1{
			padding: 20px;
			background-color:#21C999;
			color:white;
			text-align:center;
		}
	</style>

</head>
<body>
	<h1>Othello</h1>
	

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
					if($cadena=="derecha" && $y+1<$_SESSION["filas"]){
						do{	
							$y++;
							if($y<$_SESSION["filas"]){
								if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"] ){
								return true;
									}
								}else{ break;}
							
						
						}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $y<$_SESSION["filas"]);
						return false;
					}else if($cadena=="izquierda" && $y-1>=0){

							do{	
								$y--;
								if($y>=0){
										if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"] ){
											return true;
										}	
								}else{
									break;
								}
								
							
							}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $y>=0);
							return false;

					}else if($cadena=="arriba" && $x-1>=0){

							do{	
								$x--;
								if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"] && $x>=0){
									return true;
								}
							
							}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $x>=0);
							return false;

					}else if($cadena=="abajo" && $x+1<$_SESSION["filas"]){

							do{	
								$x++;
								 if( $x<$_SESSION["filas"]){
									if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"]){
												return true;
											}
								 }else{
								 		break;
								 }
								
							
							}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $x<$_SESSION["filas"]);
							return false;

					}else if($cadena=="diagonal arriba1" && $x-1>=0 && $y-1>=0){
										do{
										$x--;
										$y--;
										if($x>=0 && $y>=0){
											if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"] && $x>=0 && $y>=0){
												return true;
											}
										}else{
											break;
										}
									
									
									}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $x>=0 && $y>=0);
									return false;
					}else if($cadena=="diagonal abajo1" && $x+1<$_SESSION["filas"]&& $y-1>=0){
									do{
									$x++;
									$y--;
									if($x+1<$_SESSION["filas"]&& $y-1>=0){
										if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"] ){
										
											return true;
										}
									}
									
									
									}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $x+1<$_SESSION["filas"]&& $y-1>=0 );
								
									return false;
					}else if($cadena=="diagonal arriba2" && $x-1>=0 && $y+1<$_SESSION["filas"]){
								do{
									$x--;
									$y++;
									if($x>=0 && $y<$_SESSION["columnas"]){
									if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"] ){
											return true;
										}	
									}else{
										break;
									}
									
									
									}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $x>=0 && $y<$_SESSION["columnas"]);
									return false;
						}else if($cadena=="diagonal abajo2" && $x+1<$_SESSION["filas"] && $y+1<$_SESSION["columnas"]){
									do{	
									$x++;
									$y++;
										if($x<$_SESSION["filas"] && $y<$_SESSION["columnas"]){
											if($_SESSION["matriz"][$x][$y]==$_SESSION["turnos"] ){
												return true;
											}	
										}else{
											break;
										}

										
									
									}while($_SESSION["matriz"][$x][$y]==$_SESSION["contrario"] && $x<$_SESSION["filas"] && $y<$_SESSION["columnas"]);
									return false;
							}
						}

							function cambiarderecha($x, $y, $jugador, $contrario){
								if($y+1<$_SESSION["columnas"]){
										if($_SESSION["matriz"][$x][$y+1]==$_SESSION["contrario"]){
											$_SESSION["matriz"][$x][$y+1]=$_SESSION["turnos"];
											cambiarderecha($x,$y+1,$_SESSION["turnos"],$_SESSION["contrario"]);
										}
										
										
									}
							}

							function cambiarizq($x, $y,$jugador, $contrario){
								if($y-1>=0){
									if($_SESSION["matriz"][$x][$y-1]==$_SESSION["contrario"]){
										$_SESSION["matriz"][$x][$y-1]=$_SESSION["turnos"];	
										cambiarizq($x,$y-1,$_SESSION["turnos"],$_SESSION["contrario"]);
								
									}
								}
							}
							function cambiarabajo($x, $y,$jugador, $contrario){
								if($x+1<$_SESSION["filas"] ){
									if($_SESSION["matriz"][$x+1][$y]==$_SESSION["contrario"]){
										$_SESSION["matriz"][$x+1][$y]=$_SESSION["turnos"];	
										cambiarabajo($x+1,$y,$_SESSION["turnos"],$_SESSION["contrario"]);
								
									}
								}
							}
							function cambiararriba($x, $y,$jugador, $contrario){
								if($x-1>=0){
									if($_SESSION["matriz"][$x-1][$y]==$_SESSION["contrario"]){
										$_SESSION["matriz"][$x-1][$y]=$_SESSION["turnos"];	
										cambiararriba($x-1,$y,$_SESSION["turnos"],$_SESSION["contrario"]);
								
									}
								}
							}
							function cambiardiagonales($x, $y,$jugador, $contrario,  $cadena){
									if($x-1>=0 && $y-1>=0 && $cadena=="diagonal arriba1"){
									if($_SESSION["matriz"][$x-1][$y-1]==$_SESSION["contrario"]){
										$_SESSION["matriz"][$x-1][$y-1]=$_SESSION["turnos"];	
										cambiardiagonales( $x-1,$y-1,$_SESSION["turnos"],$_SESSION["contrario"], "diagonal arriba1");
										}
									}else if($x+1<$_SESSION["filas"]&& $y-1>=0 && $cadena=="diagonal abajo1"){ 
											if($_SESSION["matriz"][$x+1][$y-1]==$_SESSION["contrario"]){
												$_SESSION["matriz"][$x+1][$y-1]=$_SESSION["turnos"];	
												cambiardiagonales($x+1,$y-1,$_SESSION["turnos"],$_SESSION["contrario"], "diagonal abajo1");
											}
												
									}else if($x-1>=0 && $y+1<$_SESSION["columnas"] && $cadena=="diagonal arriba2"){
										
										if($_SESSION["matriz"][$x-1][$y+1]==$_SESSION["contrario"]){
												$_SESSION["matriz"][$x-1][$y+1]=$_SESSION["turnos"];	
												cambiardiagonales( $x-1,$y+1,$_SESSION["turnos"],$_SESSION["contrario"], "diagonal arriba2");
											}
											
										
									}else if($x+1<$_SESSION["filas"] && $y+1<$_SESSION["columnas"] && $cadena=="diagonal abajo2"){
										if($_SESSION["matriz"][$x+1][$y+1]==$_SESSION["contrario"]){
												$_SESSION["matriz"][$x+1][$y+1]=$_SESSION["turnos"];;	
												cambiardiagonales( $x+1,$y+1,$_SESSION["turnos"],$_SESSION["contrario"], "diagonal abajo2");
											}
									}	
							}
						
					$x=$_GET["fil"];
					$y=$_GET["col"];
					if($_SESSION["matriz"][$x][$y]==3){

							$_SESSION["matriz"][$x][$y]=$_SESSION["turnos"];
						//	echo $x." ".$y."<br>";
							if(buscarfin( $x, $y, $_SESSION["turnos"],$_SESSION["contrario"],"derecha")){
								
								cambiarderecha($x, $y,$_SESSION["turnos"],$_SESSION["contrario"]);
							}
							if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"izquierda")){
							
								cambiarizq($x,$y,$_SESSION["turnos"],$_SESSION["contrario"]);
							}
							 if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"arriba")){
								
									cambiararriba($x,$y,$_SESSION["turnos"], $_SESSION["contrario"]);
							}
							 if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"abajo")){
								
								cambiarabajo($x,$y,$_SESSION["turnos"], $_SESSION["contrario"]);
							}
							 if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"diagonal arriba1")){
								
								cambiardiagonales($x,$y,$_SESSION["turnos"], $_SESSION["contrario"], "diagonal arriba1");
							}
							 if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"diagonal abajo1")){
								echo "buscar fin true <br>";
								cambiardiagonales($x,$y,$_SESSION["turnos"], $_SESSION["contrario"], "diagonal abajo1");
							}
							 if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"diagonal arriba2")){
										echo "buscar fin true arriba2<br>";
							cambiardiagonales($x,$y,$_SESSION["turnos"], $_SESSION["contrario"],"diagonal arriba2");
							}
							 if(buscarfin( $x, $y, $_SESSION["turnos"] ,$_SESSION["contrario"],"diagonal abajo2")){
							
								cambiardiagonales($x,$y,$_SESSION["turnos"], $_SESSION["contrario"],"diagonal abajo2");
							}

						//borrar();
						if($_SESSION["turnos"]==1){
										$_SESSION["turnos"]=2;
										$_SESSION["contrario"]=1;
										//borrar();

						}else if($_SESSION["turnos"]==2){
									$_SESSION["turnos"]=1;
										$_SESSION["contrario"]=2;
									//	borrar();
									}	
						}
						borrar();
						
			

					}
			
		?>

		<?php
			

			for ($i=0; $i < $fil ; $i++) { 
						# code...
						for ($j=0; $j < $col; $j++) { 
							# code...
								if($_SESSION["matriz"][$i][$j]==$_SESSION["turnos"] ){
										 $band=false;
									buscard( $i,$j, $_SESSION["turnos"] , $_SESSION["contrario"], $band);
									 $band=false;
									buscarizq( $i,$j, $_SESSION["turnos"] , $_SESSION["contrario"], $band);
									 $band=false;
									buscararriba( $i,$j, $_SESSION["turnos"] , $_SESSION["contrario"], $band);
									 $band=false;
									buscarabajo($i,$j,$_SESSION["turnos"] , $_SESSION["contrario"], $band);
									buscardiagonales($i,$j,$_SESSION["turnos"] , $_SESSION["contrario"], $band, 1);
										buscardiagonales($i,$j,$_SESSION["turnos"] , $_SESSION["contrario"], $band, 2);
											buscardiagonales($i,$j,$_SESSION["turnos"] , $_SESSION["contrario"], $band, 3);
												buscardiagonales($i,$j,$_SESSION["turnos"] , $_SESSION["contrario"], $band, 4);
								}

						}

					
				
			}

			
					if($_SESSION["bandera_fin"]==0 || $_SESSION["bandera_fin"]==1){
									if(!jugadas_disponibles()){
										$_SESSION["bandera_fin"]++;
									
									}else{
										if($_SESSION["bandera_fin"]>0) $_SESSION["bandera_fin"]--;
										
										
									}
					}else if($_SESSION["bandera_fin"]==2){
						// se termina 
						echo "Juego terminado <br>";
					}
				


									function buscard($x, $y, $jugador, $contrario, $band){
										if($y+1<$_SESSION["filas"]){
											if($_SESSION["matriz"][$x][$y+1]==$_SESSION["contrario"] ){
												$band=true;
											
														buscard( $x,$y+1, $_SESSION["turnos"] , $_SESSION["contrario"] , $band);
													
													}else if($_SESSION["matriz"][$x][$y+1]==0  && $band==true){
													
														opcionesdejugada($x,$y+1);
													//	echo "opciones";
													}
										}

									}

									function buscarizq($x, $y, $jugador, $contrario, $band){	

											if($y-1>=0){
											
											if($_SESSION["matriz"][$x][$y-1]==$_SESSION["contrario"] ){
												$band=true;
											

												buscarizq( $x,$y-1,$_SESSION["turnos"] , $_SESSION["contrario"] , $band);
												
												}else if($_SESSION["matriz"][$x][$y-1]==0  && $band==true){
													opcionesdejugada($x,$y-1);
													
												}
													
											}
											
									}

									function buscararriba($x, $y, $jugador, $contrario, $band){

											if($x-1>=0){
											
											if($_SESSION["matriz"][$x-1][$y]==$_SESSION["contrario"] ){
												$band=true;
											

												buscararriba( $x-1,$y,$_SESSION["turnos"] , $_SESSION["contrario"] , $band);
												
												}else if($_SESSION["matriz"][$x-1][$y]==0  && $band==true){
													opcionesdejugada($x-1,$y);
													
												}
													
											}
									}

									function buscarabajo($x, $y, $jugador, $contrario, $band){
										if($x+1<$_SESSION["columnas"]){
											
											if($_SESSION["matriz"][$x+1][$y]==$_SESSION["contrario"] ){
												$band=true;
											

												buscarabajo( $x+1,$y,$_SESSION["turnos"] , $_SESSION["contrario"] , $band);
												
												}else if($_SESSION["matriz"][$x+1][$y]==0  && $band==true){
													opcionesdejugada($x+1,$y);
													
												}
													
											}


									}

								function buscardiagonales( $x,  $y, $jugador, $contrario, $band, $tipo){


								if($tipo==1){
								if($x-1>=0 && $y-1>=0){
									if($_SESSION["matriz"][$x-1][$y-1]==$_SESSION["contrario"]){
										$band=true;
										buscardiagonales( $x-1,$y-1, $jugador, $_SESSION["contrario"], $band,  1);
										
										}else if($_SESSION["matriz"][$x-1][$y-1]==0  && $band==true){
											opcionesdejugada($x-1,$y-1);
										}
										
									}	
								}else if($tipo==2){
									if($x+1<$_SESSION["filas"] && $y-1>=0){
										if($_SESSION["matriz"][$x+1][$y-1]==$_SESSION["contrario"]){
											$band=true;
										buscardiagonales( $x+1,$y-1, $jugador,$_SESSION["contrario"], $band,  2);
										}else if($_SESSION["matriz"][$x+1][$y-1]==0  && $band==true){
											opcionesdejugada($x+1,$y-1);
										}
									}
								}else if($tipo==3){
									if($x-1>=0 && $y+1<$_SESSION["contrario"]){
										if($_SESSION["matriz"][$x-1][$y+1]==$_SESSION["contrario"]){
											$band=true;
											buscardiagonales( $x-1,$y+1, $jugador, $_SESSION["contrario"], $band, 3);
										}else if($_SESSION["matriz"][$x-1][$y+1]==0  && $band==true){
											opcionesdejugada($x-1,$y+1);
										}
									}
								}else if($tipo==4){
									if($x+1<$_SESSION["filas"] && $y+1<$_SESSION["columnas"]){
										if($_SESSION["matriz"][$x+1][$y+1]==$_SESSION["contrario"]){
											$band=true;
											buscardiagonales( $x+1,$y+1, $jugador, $contrario, $band, 4);
										}else if($_SESSION["matriz"][$x+1][$y+1]==0  && $band==true){
											opcionesdejugada($x+1,$y+1);
										}
									}
								}
								
							}


					function opcionesdejugada($x, $y){
							$_SESSION["matriz"][$x][$y]=3;
						//	echo "hola";
					}

				function jugadas_disponibles(){
					$band=false;
					for($i=0;$i<$_SESSION["filas"];$i++){
						for($j=0;$j<$_SESSION["columnas"];$j++){
							if($_SESSION["matriz"][$i][$j]==3){
								$band=true;
							}
						}
					}
					if($band=false){
						return false;
					}else{

						return true;
					}
								
										
									
										
									
					
					
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