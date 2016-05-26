<?php 
require_once("../clases/imagen.php");
require_once("../clases/AccesoDatos.php");

 session_start();
  if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com") {  

    $var= new imagen();

    if($_POST['id'] != 0) {

      $var = imagen::TraerUnaImagen($_POST['id']);//verifica que exista  
    }

  //echo "<section class='widget'>";

 ?>

<div style="position: relative;">
  <div style= "position: absolute; left: 30px; top: 50px;"> 
<form id="formRegistro" name="formRegistro" class="form-ingreso"  action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

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
        <img  src="img2/<?php echo isset($var) ? $var->imagen: "porDefecto.jpg" ; ?>" class="image-bg-fluid-height" required=""/>
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
      $var->titulo =$_POST['titulo'];
      $var->titulo =$_POST['descr'];
      //var->imagen
      $var->dia=getdate();

   if($_FILES['imagen']['name'] !="")
        {
          $nombreArchivo = $_FILES['imagen']['name'];
          //Filtro anti-XSS
          $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/","@",".");
          $caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;","","");
          
          $titulo = $_POST['id'];
          //$titulo = str_replace($caracteres_malos, $caracteres_buenos, $titulo);
          //echo $nombreArchivo;

          $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
          $extension = strtolower(end(explode('.', $nombreArchivo)));
      
            if(!in_array($extension, $extensiones)) 
            {
              
              //die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
            } 
            else{
                //redimenciono la imagen
                        $ruta_imagen =$_FILES['imagen']['tmp_name'];

                                        $miniatura_ancho_maximo = 600;
                                        $miniatura_alto_maximo = 400;
                                        $info_imagen = getimagesize($ruta_imagen);
                                        $imagen_ancho = $info_imagen[0];
                                        $imagen_alto = $info_imagen[1];
                                        $imagen_tipo = $info_imagen['mime'];

                                        $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
                                         
                                             switch ( $extension){
                                                case "jpg":
                                                case "jpeg":
                                                    $imagen = imagecreatefromjpeg( $ruta_imagen ); 
                                                    break;
                                                case "png":
                                                    $imagen = imagecreatefrompng( $ruta_imagen );
                                                    break;
                                                case "gif":
                                                    $imagen = imagecreatefromgif( $ruta_imagen );
                                                    break;
                                            }

                            imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
                
                //Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
                //Y definimos el máximo que se puede subir
                //Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

                $tamañoArchivo = $lienzo; //Obtenemos el tamaño del archivo en Bytes
                $tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

                $tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
                $tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

                //Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
                if($tamañoArchivo > $tamañoMaximoBytes) 
                {
                  $error=1;
                } 
                else{
                    $var->imagen = $titulo.".".$extension;
                    
                    //Si el tamaño es correcto, subimos los datos
                    imagejpeg( $lienzo, 'img2/' . $titulo.".".$extension, 90 );
                  }
              }
        

        }

$var->GuardarImagen();

  }

}
?>