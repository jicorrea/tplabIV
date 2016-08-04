<?php
	require_once('../clases/usuario.php');
 session_start();
if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com"){
	
	if (isset($_POST['idBorrar'])) { 
			//echo "<script>alert(".$_POST['idBorrar'].")</script>";
			//usuario::eliminarUsuario($_POST['idBorrar']); //borro el registro
		$var = usuario::TraerUnUsuario($_POST['idBorrar']);
		$var->eliminarUsuario();
		}
		
?>

    <script type="text/javascript">
    	function BorrarUsuario(id)
		{
			MostarGrillaClientes(id);
		}
    </script>

?>


<?php

	$ArrayDePersonas = usuario::TraerUsuarios();
	echo "<div style='position: relative; color:#87CEFA;'>
  <div style='position: absolute; left: 0px; top: 50px;'> 
	<input class='form-control' type='button' onclick='MostarFormRegistro(\"null\")' value='Ingresar Cliente'/>
	<table class='table table-hover table-responsive'>
			<thead style='color:white;'>
				<tr>
					<th>  Correo   </th>				
					<th>  Apellido     </th>
					<th>  Nombre   </th>
					<th>  Telefono        </th>
					<th>  Obra Soc     </th>
					<th>  Provincia  </th>
					<th>  Localidad  </th>
					<th>  direccion  </th>
					<th>  foto  </th>
				</tr> 
			</thead>";   	
		foreach ($ArrayDePersonas as $personaAux){
			echo " 	<tr>
						<td>".$personaAux->correo."</td>
						
						<td>".$personaAux->apellido."</td>
						<td>".$personaAux->nombre."</td>
						<td>".$personaAux->telefono."</td>
						<td>".$personaAux->obra_soc."</td>
						<td>".$personaAux->provincia."</td>
						<td>".$personaAux->localidad."</td>
						<td>".$personaAux->direccion."</td>
						<td><img class='zoom image-bg-fluid-height' src='imagenes/".$personaAux->foto."'></td>
						<td><button class='btn btn-danger' name='Borrar' onclick='BorrarUsuario(\"".$personaAux->correo."\")'>   <span class='glyphicon glyphicon-remove-circle'>&nbsp;</span>Borrar</button></td>
						<td><button class='btn btn-warning' name='Modificar' onclick='MostarFormRegistro(\"".$personaAux->correo."\")'><span class='glyphicon glyphicon-edit'>&nbsp;</span>Modificar</button></td>
					</tr>";
		}	


	echo "</table></div></div>";		

 }else{ echo"<h3>usted '".$_SESSION['registrado']."' No tiene Acceso a esta seccion. </h3>";}  ?>