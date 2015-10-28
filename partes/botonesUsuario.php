<?php 
session_start();




if(isset($_SESSION['registrado']))
{
	//echo "<section class='widget'><center><h2> Bienvenido: ". $_SESSION['registrado']."</h2></center>";
	$usuario=$_SESSION['registrado'];

 ?>
		
                    <li>
                        <a href="#" onclick="deslogear()" class="glyphicon glyphicon-remove-sign btn btn-lg">Salir</a>
                    </li>


	<?php 
	}else
	{
		
	}

	 ?>