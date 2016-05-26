<?php 
 session_start();
if(isset($_SESSION['registrado'])) {  
$var = usuario::TraerUnUsuario($_SESSION['registrado']);//verifica que exista
  //echo "<section class='widget'>";
}
 ?>

<div style="position: relative;">
  <div style="position: absolute; left: 30px; top: 50px;"> 

<form id="frmContacto" class="form-ingreso" method="post" onsubmit="sendMail();return false;">
<table width="450px">
<tr>
<td>
<label for="first_name">Nombre: *</label>
</td>
<td>
<input class="form-control" type="<?php echo isset($var) ?  "hidden" : "text" ; ?>" name="first_name" maxlength="50" size="25" value="<?php echo isset($var) ?  $var->nombre : "" ; ?>"  required="">
</td>
</tr>
<tr>
<td valign="top">
<label for="last_name">Apellido: *</label>
</td>
<td>
<input class="form-control" type="<?php echo isset($var) ?  "hidden" : "text" ; ?>" value="<?php echo isset($var) ?  $var->apellido : "" ; ?>" name="last_name" maxlength="50" size="25"  required="">
</td>
</tr>
<tr>
<td>
<label for="email">Dirección de E-mail: *</label>
</td>
<td>
<input class="form-control" type="<?php echo isset($var) ?  "hidden" : "text" ; ?>" value="<?php echo isset($var) ?  $var->correo : "" ; ?>" name="email" maxlength="80" size="35"  required="">
</td>
</tr>
<tr>
<td>
<label  for="telephone">Número de teléfono:</label>
</td>
<td>
<input class="form-control" style="resize: none;" type="<?php echo isset($var) ?  "hidden" : "text" ; ?>" value="<?php echo isset($var) ?  $var->telefono : "" ; ?>" name="telephone" maxlength="25" size="15">
</td>
</tr>
<tr>
<td>
<label for="comments">Comentarios: *</label>
</td>
<td>
<textarea class="form-control" style="resize:inherit;" name="comments" id="comments" maxlength="500" cols="30" rows="5"  required=""></textarea>
</td>
</tr>
<tr>
<td colspan="2" style="text-align:center">
<input type="submit" value="Enviar">
</td>
</tr>
</table>
</form>
</div>
</div>