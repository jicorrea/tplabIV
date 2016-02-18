
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com"){
	
	if(isset($_POST['correo']))
	{
			$var = medico::TraerUnMedico($_POST['correo']);
	}

   ?>
<div style="position: relative;">
  <div style="position: absolute; left: 30px; top: 50px;"> 
<form id="formRegistro" class="form-ingreso"  onsubmit="GrabarMedico();return false;" method="POST" cceptcharset="utf-8" enctype="multipart/form-data">

        <div class="form-group">
          <label class="sr-only" for="ejemplo_email_1" >Email</label>
          <input type="email" class="form-control" id="email" name="email"
                 placeholder="Introduce tu email" value="<?php echo isset($var) ? $var->correo: ""; ?>" required="" autofocus="">
        </div>

        <div class="form-group">
          <label class="sr-only"  for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" 
                 placeholder="nombre" value="<?php echo isset($var) ?  $var->nomDoctor : "" ; ?>" required="">
        </div>

          <div class="form-group">
            <label class="sr-only" for="obra_soc">Especialidad</label>
             <select  class="form-control" name="especialidad" id="especialidad">
                   <option value="">---Especialidad---</option>
                  <option value="Particular" <?php echo isset($var) && $var->especialidad =="Clinico" ?   "selected='selected'" : "" ; ?> >Clinico</option>
                  <option value="Pami" <?php echo isset($var) && $var->especialidad =="Pediatra" ?   "selected='selected'" : "" ; ?> >Pediatra</option>
                  <option value="Galeno" <?php echo isset($var) && $var->especialidad =="Neurologo" ?   "selected='selected'" : "" ; ?> >Neurologo</option>
            </select> 

        <div class="form-group">
          <label class="sr-only" for="telefono" >Telefono</label>
          <input type="text" class="form-control" id="telefono" name="telefono"
                 placeholder="Introduce tu telefono" value="<?php echo isset($var) ?  $var->telefono : "" ; ?>" required="">
        </div>


          <div class="form-group">
            <label class="sr-only" for="obra_soc">Dia</label>
             <select  class="form-control" name="dia" id="dia">
                   <option value="">---Dia---</option>
                  <option value="Particular" <?php echo isset($var) && $var->dia =="Lunes" ?   "selected='selected'" : "" ; ?> >Lunes</option>
                  <option value="Pami" <?php echo isset($var) && $var->dia =="Martes" ?   "selected='selected'" : "" ; ?> >Martes</option>
                  <option value="Galeno" <?php echo isset($var) && $var->dia =="Miercoles" ?   "selected='selected'" : "" ; ?> >Miercoles</option>
                  <option value="Particular" <?php echo isset($var) && $var->dia =="Jueves" ?   "selected='selected'" : "" ; ?> >Jueves</option>
                  <option value="Pami" <?php echo isset($var) && $var->dia =="Viernes" ?   "selected='selected'" : "" ; ?> >Viernes</option>
                 
            </select> 



        </div>
          <div class="form-group">
            <label class="sr-only" for="obra_soc">Estado</label>
             <select  class="form-control" name="estado" id="estado">
                   <option value="">---Estado---</option>
                  <option value="Particular" <?php echo isset($var) && $var->estado =="Disponible" ?   "selected='selected'" : "" ; ?> >Disponible</option>
                  <option value="Pami" <?php echo isset($var) && $var->estado =="Enfermo" ?   "selected='selected'" : "" ; ?> >Enfermo</option>
                  <option value="Galeno" <?php echo isset($var) && $var->estado =="Vacaciones" ?   "selected='selected'" : "" ; ?> >Vacaciones</option>
                 
            </select> 

 <input type="hidden"  id="estado" name="estado" value="<?php echo isset($var) ?  "modificar" : "guardar" ; ?>">

        <button type="submit" class="btn btn-default" name="boton" id="boton">Enviar</button>

</form>
</div>
</div>


<!-- /container -->

  <?php }else{ echo"<h3>usted '".$_SESSION['registrado']."' No tiene Acceso a esta seccion. </h3>";   ?>         

  <?php  }  ?>
    