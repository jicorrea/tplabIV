<?php
	require_once('../clases/medico.php');
 session_start();
if(isset($_SESSION['registrado'])){
	
	

	$ArrayDePersonas = medico::TraerMedicos();
	echo "<div style='position: relative; color:#87CEFA;'>
  <div style='position: absolute; left: 0px; top: 50px;'> 

	<table class='table table-hover table-responsive'>
			<thead style='color:white;'>
				<tr>
					<th>  Correo   </th>				
					<th>  NomDoctor     </th>
					<th>  Especialidad   </th>
					<th>  Dia     </th>
					<th>  Estado  </th>
				</tr> 
			</thead>";   	
		foreach ($ArrayDePersonas as $personaAux){
			echo " 	<tr>
						<td>".$personaAux->correo."</td>
						
						<td>".$personaAux->nomDoctor."</td>
						<td>".$personaAux->especialidad."</td>
						<td>".$personaAux->dia."</td>
						<td>".$personaAux->estado."</td>
					</tr>";
		}	


	echo "</table></div></div>";		

 }else{ echo"<h3>Tiene que estar registrado para ver esta sección. </h3>";}  ?>