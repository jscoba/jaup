<?
function encabezado() { ?>
<html>
<head>
<title>JAUP: Just Another Uploading Platform</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<? 
}

function footer() { ?>

</body>
<html>
<?
}

function formulario($destino)
{
?>
<form name="altas" method="POST" action="<? echo $destino; ?>"> 
<?
}
