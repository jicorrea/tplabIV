<?php 
require_once("../clases/imagen.php");
require_once("../clases/AccesoDatos.php");

 session_start();
if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com") {  



if(isset($_POST['id'])) {

$var = imagen::TraerUnaImagen($_POST['id']);//verifica que exista  
}



  //echo "<section class='widget'>";

 ?>

<div style="position: relative;">
  <div style= "position: absolute; left: 30px; top: 50px;"> 
<form id="formRegistro" name="formRegistro" class="form-ingreso"  onsubmit="" method="POST" cceptcharset="utf-8" enctype="multipart/form-data">

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
        <img  src="img2/<?php echo isset($var) ? $var->imagen: "porDefecto.jpg" ; ?>" class="fotoform" required=""/>
      <p style="  color: black;">*La foto se actualiza al guardar.</p>
        </div>

        <div id="informe">  </div>

 <input type="hidden"  id="id" name="id" value="<?php echo isset($var) ?  $var->id : "" ; ?>">

        <button type="submit" class="btn btn-default" name="boton" id="boton">Enviar</button>

</form>
</div>
</div>

<?php


if(isset($_POST["boton"]))
{
if(isset($_POST["id"]))
  {
      $var->titulo =$_POST['titulo'];
      $var->titulo =$_POST['descr'];
      //var->imagen
      $var->ModificarImagen();

  }
    else
  {

  }
 } 

}
?>