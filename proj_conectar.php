<?php
$servidor = 'localhost';
$usuario = 'lidia';
$senha = 'senha123';
$banco = 'projetoLBD';
$con = mysql_connect($servidor,$usuario,$senha);
$db = mysql_select_db($banco);
?>
