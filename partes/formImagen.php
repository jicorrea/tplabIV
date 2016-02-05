<?php 
 session_start();
if(isset($_SESSION['registrado'])) {  
$var = usuario::TraerUnUsuario($_SESSION['registrado']);//verifica que exista
	//echo "<section class='widget'>";

 ?>

<img class="image-bg-fluid-height"  src="<?php echo "imagenes/".$var->foto?>" alt="">



	<?php 
	} 
	 //src="http://placehold.it/140x140&text=Foto"
	?>