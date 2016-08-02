<?php
 session_start();
if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com"){
	
	if (isset($_POST['idBorrar'])) { 
			echo "<script>alert('algo')</script>";
			imagen::eliminarImagen($_POST['idBorrar']);
		}
		

?>

    <script type="text/javascript">
    	function BorrarImagen(id)
		{
			alert(id);
			document.getElementById('idBorrar').value = id;
			document.frmBorrar.submit();
		}
    </script>


	<form name="frmBorrar" method="POST" action="javascript:MostarGrillaSlider()">
		<input type="hidden" name="idBorrar" id="idBorrar" />
	</form>


<?php
	require_once('clases/imagen.php');
	$ArrayDeImagenes = imagen::TraerImagenes();
	echo "<div style='position: relative; color:#87CEFA;'>
  <div style='position: absolute; left: 0px; top: 50px;'> 
	<input class='form-control' type='button' onclick='MostarformCargarImg(0)' value='Ingresar Imagen'/>
	<table style='color:black;' class='table table-hover table-responsive'>
			<thead>
				<tr>
					<th>  Titulo   </th>				
					<th>  Descripcion     </th>
					<th>  Imagen   </th>
					<th>  Dia        </th>
				</tr> 
			</thead>";   	
		foreach ($ArrayDeImagenes as $imagenAux){
			echo " 	<tr>
						<td>".$imagenAux->titulo."</td>
						
						<td>".$imagenAux->descr."</td>
						<td><img class='zoom image-bg-fluid-height' src='img2/".$imagenAux->imagen."'></td>
						<td>".$imagenAux->dia."</td>

						<td><button class='btn btn-danger' name='Borrar' onclick='BorrarImagen(".$imagenAux->id.")'>   <span class='glyphicon glyphicon-remove-circle'>&nbsp;</span>Borrar</button></td>
						<td><button class='btn btn-warning' name='Modificar' onclick='MostarformCargarImg(".$imagenAux->id.")'><span class='glyphicon glyphicon-edit'>&nbsp;</span>Modificar</button></td>
					</tr>";
		}	


	echo "</table></div></div>";		

 }else{ echo"<h3>usted '".$_SESSION['registrado']."' No tiene Acceso a esta seccion. </h3>";}  ?>