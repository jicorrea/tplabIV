

<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
  require_once('../clases/medico.php');
session_start();

if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com"){
	
  //$var= new medico();


  if($_POST['id']!="null") 
  {
			$var = medico::TraerUnMedico($_POST['id']);
	}

   ?>

<div style="position: relative;">

  <div style="position: absolute; left: 30px; top: 50px;"> 

  <form id="formRegistro" class="form-ingreso" action ="javascript:GrabarMedico()" method="POST"  accept-charset="utf-8" enctype="multipart/form-data">

         <input type="hidden"  id="email" name="email" value="<?php echo isset($var) ?  $var->correo : "" ; ?>"/>

        <div class="form-group">
          <label class="sr-only" for="ejemplo_email_1" >Email</label>
          <input type="email" class="form-control" id="email" name="email"
                 placeholder="Introduce tu email" value="<?php echo isset($var) ? $var->correo: ""; ?>" required="" autofocus="" <?php echo isset($var) ? "disabled": ""; ?>/>
        </div>

        <div class="form-group">
          <label class="sr-only"  for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" 
                 placeholder="nombre" value="<?php echo isset($var) ?  $var->nomDoctor : "" ; ?>" required=""/>
        </div>

          <div class="form-group">
            <label class="sr-only" for="obra_soc">Especialidad</label>
             <select  class="form-control" name="especialidad" id="especialidad">
                   <option value="">---Especialidad---</option>
                  <option value="clinico" <?php echo isset($var) && $var->especialidad =="clinico" ?   "selected='selected'" : "" ; ?> >Clinico</option>
                  <option value="pediatra" <?php echo isset($var) && $var->especialidad =="pediatra" ?   "selected='selected'" : "" ; ?> >Pediatra</option>
                  <option value="neurologo" <?php echo isset($var) && $var->especialidad =="neurologo" ?   "selected='selected'" : "" ; ?> >Neurologo</option>
            </select> 
          </div> 
           
        <div class="form-group">
          <label class="sr-only" for="telefono" >Telefono</label>
          <input type="text" class="form-control" id="telefono" name="telefono"
                 placeholder="Introduce tu telefono" value="<?php echo isset($var) ?  $var->telefono : "" ; ?>" required=""/>
        </div>


          <div class="form-group">
            <label class="sr-only" for="obra_soc">Dia</label>
             <select  class="form-control" name="dia" id="dia">
                   <option value="">---Dia---</option>
                  <option value="lunes" <?php echo isset($var) && $var->dia =="lunes" ?   "selected='selected'" : "" ; ?> >Lunes</option>
                  <option value="martes" <?php echo isset($var) && $var->dia =="martes" ?   "selected='selected'" : "" ; ?> >Martes</option>
                  <option value="miercoles" <?php echo isset($var) && $var->dia =="miercoles" ?   "selected='selected'" : "" ; ?> >Miercoles</option>
                  <option value="jueves" <?php echo isset($var) && $var->dia =="jueves" ?   "selected='selected'" : "" ; ?> >Jueves</option>
                  <option value="viernes" <?php echo isset($var) && $var->dia =="viernes" ?   "selected='selected'" : "" ; ?> >Viernes</option>
                 
            </select> 
          </div>

          <div class="form-group">
            <label class="sr-only" for="obra_soc">Estado</label>
             <select  class="form-control" name="estado1" id="estado1">
                   <option value="">---Estado---</option>
                  <option value="Disponible" <?php echo isset($var) && $var->estado =="Disponible" ?   "selected='selected'" : "" ; ?> >Disponible</option>
                  <option value="Enfermo" <?php echo isset($var) && $var->estado =="Enfermo" ?   "selected='selected'" : "" ; ?> >Enfermo</option>
                  <option value="Vacaciones" <?php echo isset($var) && $var->estado =="Vacaciones" ?   "selected='selected'" : "" ; ?> >Vacaciones</option>
                 
            </select> 
          </div>  

 <input type="hidden"  id="estado" name="estado" value="<?php echo isset($var) ?  "modificar" : "guardar" ; ?>"/>


        <input type="submit" class="btn btn-default" name="boton" id="boton" value="enviar"/>

        <div id="informe">  </div>

</form>
</div>
</div>


<!-- /container -->

  <?php 

  }

  else{ echo"<h3>usted '".$_SESSION['registrado']."' No tiene Acceso a esta seccion. </h3>"; 

  }

  ?>         


    