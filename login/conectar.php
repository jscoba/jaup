<?php
include_once "../config.php";
  /* Conectar */
  mysql_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD) or die(mysql_error());
  mysql_select_db(MYSQL_DATABASE) or die(mysql_error());
  mysql_set_charset('utf8');

?>
