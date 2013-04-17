<?php
include_once('../html/html.php');
encabezado();
?>
<form name="registro" method="POST" action="<? echo $destino; ?>"> 
<p>Nombre y Apellidos<input type="text" name="name" value="" maxlength=150 required></p>
<p>Nombre de usuario<input type="text" name="user" value="" maxlength=150 required></p>
<p>Contraseña <input type="password" name="pass" value="" maxlength=150 required</p>
<p>Numero de Curso <input type="text" name="curson" value="" maxlength=1 size=1 required> º <input type="text" name="letra" value="" maxlength=1 size=1></p>
<select name="nivel" maxlength=1>
  <option value="primaria">Primaria</option>
  <option value="secundaria">Secuandaria</option>
  <option value="bachilletaro">Bachillerato</option>
</select><br>
Imagen (opcional)<input type="file" name="imagen" accept="image/*.gif "> <br>
<select name="tipo" maxlength=1>
  <option value="alumno">Alumno</option>
  <option value="profesor">Profesor</option>
</select>
<p>Centro educativo <input type="text" name="centro_ID" value="" id="centro_ID" maxlength=150></p>
</form>

<?php
footer();
?>
