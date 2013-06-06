<?php

include_once "conectar.php";
$v1=$_POST['user'];
$v2=$_POST['pass'];
$v3=$_POST['name'];
$v4=$_POST['curson'].$_POST['letra'].$POST_['nivel'];
$v5=0#Hay que hacer un sistema que le diga 0 o 1 a la base de datos. Además, si es TRUE, se tiene que subir el archivo
##$v6=#Fecha actual en formato MYSQL
$v7=$POST_['tipo'];
$v8=#Rutina con javascript para el centro educativo!!!


$query="INSERT jaup_users '(user, pass, name, curso, image, type) VALUES ('$v1','$v2','$v3','$v4','$v5','$v7','$v8')";

$result = mysql_query($query) or die(mysql_error());

function decidir(){
if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
imagen_si();
}

function imagen_si(){
  $ID = mysql_insert_id();
  $file_name = sprintf("%d-%s", $pti_id, $_FILES["image"]["name"]);
  
  $query_txt = "UPDATE jaup_users SET image='1'".
          " WHERE ID=".$ID.";";
  $result = mysql_query($query_txt) or die(mysql_error());

  $file_path = sprintf("%s%d-%s", UPLOAD_PATH, $pti_id, $_FILES["pti_archivo"]["name"]);
	$file_final_path = PRIVATE_LOCATION.$file_name;
  var_dump($_FILES);
	//sleep(10);
  $yeah=move_uploaded_file($_FILES["imagen"]["tmp_name"], $file_final_path);  
}
