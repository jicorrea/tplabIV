<?php 
 session_start();
if(isset($_SESSION['registrado'])) {  
$var = usuario::TraerUnUsuario($_SESSION['registrado']);//verifica que exista
	//echo "<section class='widget'>";

 ?>

<img class="image-bg-fluid-height"  src="<?php echo "imagenes/".$var->foto?>" title="<?php echo $var->nombre.' '.$var->apellido?>">

<!--Barra de usuario-->
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#" onclick="SacarTurno()">Turnos<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <!--li><a href="{{URL::to('createusuario')}}">Crear</a></li-->
            <li><a href="#" onclick="MostarRegistro()">Modificar</a></li>
            <li class="divider"></li>
			<li><a href="#" onclick="MostarConsulta()">Reportar</a></li>
            <li class="divider" <?php echo $var->correo=="adm@correajuan.tuars.com" ?  "" : "hidden" ; ?>></li>
            <li <?php echo $var->correo=="adm@correajuan.tuars.com" ?  "" : "hidden" ; ?>><a href="#" onclick="MostarAcciones()">Gestionar</a></li>
          </ul>
        </li>          
        <li ><a href="#">Libros<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
        <li ><a href="#">Tags<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

 <div class="row">
<div class="col-sm-4" style="float:right;">
<ul class="nav nav-pills nav-stacked">

</ul>
</div>
</div>


	<?php 
	} 
	 //src="http://placehold.it/140x140&text=Foto"
	?>