<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title>Menu Generado</title> 
<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=utf-8"/>
<script type="text/javascript" src="hMenu.js"></script>
<style type="text/css">
body{font-family: sans-serif; font-size:12px; margin: 0px; padding 0px; background: #fff}
</style>
<link rel="stylesheet" type="text/css" href="hMenu.css" />

</head>
<body onload="hMenu.init('menu1')">

<?php
	require_once("hMenu.php");
	$hMenuHandler = new hMenu("menu1.txt", true);
	echo $hMenuHandler->getMenu("menu1");
?>

</body>
</html>