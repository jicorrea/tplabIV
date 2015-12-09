
<form class="form-ingreso" onsubmit="validarLogin();return false;">

  <div class="form-group">
    <label class="sr-only" for="ejemplo_email_1" >Email</label>
    <input type="email" class="form-control" id="mail"
           placeholder="Introduce tu email">
  </div>
  <div class="form-group">
    <label class="sr-only"  for="ejemplo_password_1">Contraseña</label>
    <input type="password" class="form-control" id="clave" 
           placeholder="Contraseña">
  </div>
  <div class="form-group">
    <label class="sr-only" for="apellido" >Apellido</label>
    <input type="text" class="form-control" id="apellido"
           placeholder="Introduce tu apellido">
  </div>
  <div class="form-group">
    <label class="sr-only"  for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" 
           placeholder="nombre">
  </div>  
  <div class="form-group">
    <label class="sr-only" for="telefono" >Telefono</label>
    <input type="text" class="form-control" id="telefono"
           placeholder="Introduce tu telefono">
  </div>
  <div class="form-group">
    <label class="sr-only"  for="provincia">Provincia</label>
    <input type="text" class="form-control" id="provincia" 
           placeholder="Provincia">
  </div> 
   <div class="form-group">
    <label class="sr-only" for="localidad" >Localidad</label>
    <input type="text" class="form-control" id="localidad"
           placeholder="Introduce tu Localidad">
  </div>
  <div class="form-group">
    <label class="sr-only"  for="direccion">Direccion</label>
    <input type="text" class="form-control" id="direccion" 
           placeholder="Direccion">
  </div>  
  <div class="form-group">
    <label class="sr-only" for="ejemplo_archivo_1">Foto de perfil</label>
    <input type="file" id="foto">
    </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Activa esta casilla
    </label>
  </div>
  <button type="submit" class="btn btn-default">Enviar</button>
</form>

