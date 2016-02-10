<?php 
 session_start();
if(isset($_SESSION['registrado'])) {  
$var = usuario::TraerUnUsuario($_SESSION['registrado']);//verifica que exista
  //echo "<section class='widget'>";
}
 ?>

<div style="position: relative;">
  <div style="position: absolute; left: 30px; top: 50px;"> 
<form id="formRegistro" class="form-ingreso"  onsubmit="GrabarUsuario();return false;" method="POST" cceptcharset="utf-8" enctype="multipart/form-data">

        <div class="form-group">
          <label class="sr-only" for="ejemplo_email_1" >Email</label>
          <input type="email" class="form-control" id="email" name="email"
                 placeholder="Introduce tu email" value="<?php echo isset($var) ?  $var->correo : "" ; ?>" <?php echo isset($var) ?  "readonly": "" ; ?> required="" autofocus="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="ejemplo_password_1">Contraseña</label>
          <input type="password" class="form-control" id="clave" name="clave" 
                 placeholder="Contraseña" value="<?php echo isset($var) ?  $var->contrasena : "" ; ?>" required="">
        </div>

        <div class="form-group">
          <label class="sr-only" for="apellido" >Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido"
                 placeholder="Introduce tu apellido" value="<?php echo isset($var) ?  $var->apellido : "" ; ?>" required="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" 
                 placeholder="nombre" value="<?php echo isset($var) ?  $var->nombre : "" ; ?>" required="">
        </div>

        <div class="form-group">
          <label class="sr-only" for="telefono" >Telefono</label>
          <input type="text" class="form-control" id="telefono" name="telefono"
                 placeholder="Introduce tu telefono" value="<?php echo isset($var) ?  $var->telefono : "" ; ?>" required="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="provincia">Provincia</label>
          <input type="text" class="form-control" id="provincia" name="provincia" 
                 placeholder="Provincia" value="<?php echo isset($var) ?  $var->provincia : "" ; ?>" required="">
        </div>

         <div class="form-group">
          <label class="sr-only" for="localidad" >Localidad</label>
          <input type="text" class="form-control" id="localidad" name="localidad"
                 placeholder="Introduce tu Localidad" value="<?php echo isset($var) ?  $var->localidad : "" ; ?>" required="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="direccion">Direccion</label>
          <input type="text" class="form-control" id="direccion" name="direccion" 
                 placeholder="Direccion" value="<?php echo isset($var) ?  $var->direccion : "" ; ?>" required="">
        </div>

        <div class="form-group">
          <label class="sr-only" for="foto">Foto de perfil</label>
          <input type="file" name="foto" id="foto">
        <img  src="imagenes/<?php echo isset($var) ? $var->foto: "porDefecto.jpg" ; ?>" class="fotoform"/>
      <p style="  color: black;">*La foto se actualiza al guardar.</p>
        </div>

        <div id="informe">  </div>

 <input type="hidden"  id="estado" name="estado" value="<?php echo isset($var) ?  "modificar" : "guardar" ; ?>">

        <button type="submit" class="btn btn-default" name="boton" id="boton">Enviar</button>

</form>
</div>
</div>