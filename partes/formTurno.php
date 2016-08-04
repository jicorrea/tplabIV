

<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
  require_once('../clases/medico.php');
  require_once('../clases/usuario.php');
  require_once('../clases/turno.php');

session_start();

if(isset($_SESSION['registrado'])){

if($_POST['turno']!="null") 
{
  $turno = turno::TraerUnTurno($_POST['turno']);
}	

  if($_POST['id']!="null") 
  {
			$var = usuario::TraerUnUsuario($_POST['id']);
      $ArrayDoctores = medico::TraerMedicos();
	}

   ?>

<div style="position: relative;">

  <div style="position: absolute; left: 30px; top: 50px;"> 

  <form id="formRegistro" class="form-ingreso" action ="javascript:GrabarTurno()" method="POST"  accept-charset="utf-8" enctype="multipart/form-data">

         <input type="hidden"  id="uCorreo" name="uCorreo" value="<?php echo isset($var) ?  $var->correo : "" ; ?>"/>

        <div class="form-group">
          <label class="sr-only" for="ejemplo_email_1" >Email</label>
          <input type="email" class="form-control" id="uCorreo" name="uCorreo"
                 placeholder="Introduce tu email" value="<?php echo isset($var) ? $var->correo: ""; ?>" required="" autofocus="" <?php echo isset($var) ? "disabled": ""; ?>/>
        </div>

        <div class="form-group">
            <label class="sr-only" for="obra_soc">noDoctor</label>
             <select  class="form-control" name="nomDoctor" id="nomDoctor" >         
              <option value="">---Doctor---</option>
                <?php
                foreach ($ArrayDoctores as $personaAux){
                      if($personaAux->estado=="Disponible")
                      {
                        echo "<option value='".$personaAux->correo."'>".$personaAux->nomDoctor."</option> ";
                      }
                    } 
                 ?>
              </select>
        </div>
          <!--fecha--> 
        <div class="form-group">
          <label class="sr-only" for="ejemplo_email_1" >Fecha</label>
            <input class="form-control" type="date" name="fecha" id="fecha" step="1" min="2016-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" autocomplete="on" required="required">
          </div>
          <!--horario--> 

 <input type="hidden"  id="estado" name="estado" value="<?php echo isset($turno) ?  "modificar" : "guardar" ; ?>"/>


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



