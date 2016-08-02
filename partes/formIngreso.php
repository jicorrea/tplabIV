
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php

  session_start();

  if(!isset($_SESSION['registrado'])) //si no estoy registrado pide logeo
  {

?>
    <div style="position: relative;">

      <div style="position: absolute; left: 0px; top: 20px;"> 

        <!--Formulario de ingreso-->  

        <form  class="form-ingreso"  onsubmit="validarLogin();return false;">      
          
          <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
            
          <div class="form-group">

            <label for="ejemplo_email_3" class="col-lg-3 control-label">Email:</label>
                
              <div class="col-lg-10">
              
                <input type="email" id="correo" class="form-control" placeholder="Correo electrónico" required="" autofocus="" value="<?php  if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>">
              
              </div>

          </div>

          <div class="form-group">
            
            <label for="ejemplo_password_3" class="col-lg-3 control-label">Contraseña:</label>
            
            <div class="col-lg-10">
              
              <input type="password" id="contrasena" minlength="4" class="form-control" placeholder="clave" required="">
            
            </div>
          
          </div>
        
          <div class="form-group">
        
            <div class="col-lg-offset-2 col-lg-5">
          
              <div class="checkbox">
          
                <label>
            
                  <input type="checkbox" id="recordarme" checked> Recordame
            
                </label>
          
             </div>
        
            </div>
      
          </div>  

          <div class="form-group">
        
            <div class="col-lg-offset-2 col-lg-10">
        
              <button id="ingresar" class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button><br>
          
              <div  id="informe">  
          
              </div>
        
            </div>
        
          </div>

          <label>
            
            <br><a href="#" onclick="MostarRegistro()">Registrarse</a> 
          
          </label>

        </form> 

        <!--FIN del Formulario de ingreso--> 

      </div>

    </div>


<!-- /container -->

<?php 
  
  } //FIN if

  else // Si estoy logeado
  
    { //echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";   
  
  ?>         
      <!--button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button-->
  
  <script type="text/javascript">
  
     MostarBotones();
  
     MostarImagen();
  
  </script>

<?php  
  
    } //FIN else 
  
  ?>
    
  
