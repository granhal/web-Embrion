<?php
require_once('funciones.php');
	$datosPerfil = "SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE user='".$_COOKIE["usuariologeado"]."'"; 
  	$resultadoDP = mysql_query($datosPerfil); 
  	$filaPerfil = mysql_fetch_assoc($resultadoDP); ?>


    <center><img id="fotoPerfil" src="files/<?= $filaPerfil['foto'] ?>" width="60%"></center>                    