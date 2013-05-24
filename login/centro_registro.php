<?php
include_once "conectar.php";
#Esta función va invocada desde un javascript con un GET ?nombreparcial=x
$nombreparcial = $_GET['nombreparcial'].'*';
$query= 'SELECT ID, name FROM jaup_centros WHERE name = '. $nombreparcial;

$result = mysql_query($query) or die(mysql_error())

while ($registro = mysql_fetch_row($result)){ 
        
       # insertamos un salto de línea en la tabla HTML

       # establecemos el bucle de lectura del ARRAY 
       # con los resultados de cada LINEA 
       # y encerramos cada valor en etiquetas <td></td> 
       # para que aparezcan en celdas distintas de la tabla 

       foreach($registro  as $clave){ 
       echo "",$clave,","; 


?>
