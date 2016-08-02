<?php 
require_once("../clases/imagen.php");
require_once("../clases/AccesoDatos.php");

 session_start();
  if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com") {  

    //$var= new imagen();

    if($_POST['id'] != 0) {

      $var = imagen::TraerUnaImagen($_POST['id']);//verifica que exista  
    }

  //echo "<section class='widget'>";

 ?>

<div style="position: relative;">
  <div style= "position: absolute; left: 30px; top: 50px;"> 
<form id="formRegistro" name="formRegistro" class="form-ingreso"  action ="javascript:GrabarSlider()" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

        <div class="form-group">
          <label class="sr-only" for="titulo" >Titulo</label>
          <input type="text" class="form-control" id="titulo" name="titulo"
                 placeholder="Introduce un titulo" value="<?php echo isset($var) ?  $var->titulo : "" ; ?>" required="" autofocus="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="descr">Descripcion</label>
          <input type="text" class="form-control" id="descr" name="descr" 
                 placeholder="Descripcion" value="<?php echo isset($var) ?  $var->descr : "" ; ?>" required="">
        </div>


        <div class="form-group">
          <label class="sr-only" for="imagen">Imagen</label>
          <input type="file" name="imagen" id="imagen">
        <img  src="<?php echo isset($var) ? "img2/".$var->imagen: "img/porDefecto.jpg" ; ?>" class="image-bg-fluid-height" required=""/>
      <p style="  color: black;">*La foto se actualiza al guardar.</p>
        </div>

        <div id="informe">  </div>

 <input type="hidden"  id="id" name="id" value="<?php echo isset($var) ?  $var->id : "" ; ?>">

 <input type="hidden"  id="estado" name="estado" value="<?php echo isset($var) ?  "modificar" : "guardar" ; ?>"/>


        <input type="submit" class="btn btn-default" name="boton" id="boton" value="enviar"/>

</form>
</div>
</div>

  <?php 

  }

  else{ echo"<h3>usted '".$_SESSION['registrado']."' No tiene Acceso a esta seccion. </h3>"; 

  }

  ?>         
