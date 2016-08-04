
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(isset($_SESSION['registrado']) && $_SESSION['registrado']=="adm@correajuan.tuars.com")
  { ?>

 <div style="position: relative;">
  <div style="position: absolute; left: 0px; top: 60px;">   
 <ul class="list-unstyled">
 <li>
      <input class="form-control" type="button" href="#" value="Turnos Registrados"/>
  </li>  
   <li>
      <input class="form-control" type="button" href="#" onclick="MostarGrillaClientes()" value="Gestionar Clientes"/>
  </li> 
   <li>  
      <input class="form-control" type="button" href="#" onclick="MostarGrillaMedicos()" value="Gestionar Medicos"/>
  </li>
   <li>  
      <input class="form-control" type="button" href="#" onclick="MostarGrillaSlider()" value="Gestionar Slider"/>
  </li>  
</ul>     
</div>
</div> 


<!-- /container -->

  <?php }else{ echo"<h3>usted '".isset($_SESSION['registrado']) ? $_SESSION['registrado']:' '."' No tiene Acceso a esta seccion. </h3>";   ?>         

  <?php  }  ?>
    