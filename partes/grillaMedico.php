<?php
	require_once('../clases/medico.php');
 session_start();
if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com"){
	
	if (isset($_POST['idBorrar'])) { 
			//echo "<script>alert(".$_POST['idBorrar'].")</script>";
			medico::eliminarMedico($_POST['idBorrar']); //borro el registro
		}
		
?>

    <script type="text/javascript">
    	function BorrarMedico(id)
		{
			MostarGrillaMedicos(id);
		}
    </script>

?>


<?php

	$ArrayDePersonas = medico::TraerMedicos();
	echo "<div style='position: relative; color:#87CEFA;'>
  <div style='position: absolute; left: 0px; top: 50px;'> 
	<input class='form-control' type='button' onclick='MostarFormMedico(\"null\")' value='Ingresar Medico'/>
	<table class='table table-hover table-responsive'>
			<thead style='color:white;'>
				<tr>
					<th>  Correo   </th>				
					<th>  NomDoctor     </th>
					<th>  Especialidad   </th>
					<th>  Telefono        </th>
					<th>  Dia     </th>
					<th>  Estado  </th>
				</tr> 
			</thead>";   	
		foreach ($ArrayDePersonas as $personaAux){
			echo " 	<tr>
						<td>".$personaAux->correo."</td>
						
						<td>".$personaAux->nomDoctor."</td>
						<td>".$personaAux->especialidad."</td>
						<td>".$personaAux->telefono."</td>
						<td>".$personaAux->dia."</td>
						<td>".$personaAux->estado."</td>
						<td><button class='btn btn-danger' name='Borrar' onclick='BorrarMedico(\"".$personaAux->correo."\")'>   <span class='glyphicon glyphicon-remove-circle'>&nbsp;</span>Borrar</button></td>
						<td><button class='btn btn-warning' name='Modificar' onclick='MostarFormMedico(\"".$personaAux->correo."\")'><span class='glyphicon glyphicon-edit'>&nbsp;</span>Modificar</button></td>
					</tr>";
		}	


	echo "</table></div></div>";		

 }else{ echo"<h3>usted '".$_SESSION['registrado']."' No tiene Acceso a esta seccion. </h3>";}  ?>