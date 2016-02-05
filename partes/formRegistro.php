

<form id="formRegistro" class="form-ingreso"  onsubmit="GrabarUsuario();return false;" method="POST" cceptcharset="utf-8" enctype="multipart/form-data">

        <div class="form-group">
          <label class="sr-only" for="ejemplo_email_1" >Email</label>
          <input type="email" class="form-control" id="email" name="email"
                 placeholder="Introduce tu email" required="" autofocus="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="ejemplo_password_1">Contraseña</label>
          <input type="password" class="form-control" id="clave" name="clave" 
                 placeholder="Contraseña" required="">
        </div>

        <div class="form-group">
          <label class="sr-only" for="apellido" >Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido"
                 placeholder="Introduce tu apellido" required="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" 
                 placeholder="nombre" required="">
        </div>

        <div class="form-group">
          <label class="sr-only" for="telefono" >Telefono</label>
          <input type="text" class="form-control" id="telefono" name="telefono"
                 placeholder="Introduce tu telefono" required="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="provincia">Provincia</label>
          <input type="text" class="form-control" id="provincia" name="provincia" 
                 placeholder="Provincia" required="">
        </div>

         <div class="form-group">
          <label class="sr-only" for="localidad" >Localidad</label>
          <input type="text" class="form-control" id="localidad" name="localidad"
                 placeholder="Introduce tu Localidad" required="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="direccion">Direccion</label>
          <input type="text" class="form-control" id="direccion" name="direccion" 
                 placeholder="Direccion" required="">
        </div>

        <div class="form-group">
          <label class="sr-only" for="foto">Foto de perfil</label>
          <input type="file" name="foto" id="foto">
        <img  src="imagenes/<?php echo isset($unaPersona) ? $unaPersona->GetFoto() : "porDefecto.jpg" ; ?>" class="fotoform"/>
      <p style="  color: black;">*La foto se actualiza al guardar.</p>
        </div>

        <div id="informe">  </div>

 <input type="hidden"  id="estado" name="estado" value="cargar">

        <button type="submit" class="btn btn-default" name="boton" id="boton">Enviar</button>

</form>

