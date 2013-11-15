
<?php

header("Content-type: text/html; charset=utf-8");
function conectar(){

 	$servidorIP = "localhost";
	$userServer = "root";
	$passwordServer = "";
	$nameDBServer = "embrion";
	$conexion = mysql_connect($servidorIP, $userServer, $passwordServer) or die(mysql_error());
	mysql_select_db($nameDBServer , $conexion);
	mysql_set_charset('utf8');
}

conectar();
$nameTablaUsers = "embrionusuarios";

function validarCupones(){

	$cupon = $_POST['cupon'];
	$consultaCupon="SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE cupon='$cupon'";	
	$existeCupon = mysql_query($consultaCupon);

		while ($rowCupon = mysql_fetch_array($existeCupon)) {
				echo "El nombre del poseedor del cupón es: <b>"
				.$rowCupon["user"]."</b><br>El email es: <b>"
				.$rowCupon["mail"]."</b><br>El dirección es: <b>"
				.$rowCupon["direccion"]."</b><br>El teléfono es: <b>"
				.$rowCupon["telefono"]."</b><br><br>". 				
				(($rowCupon["cuponvalido"] == 0) ? "<center>Este cupón es <span style='color:green'><b>válido</b></span></center> <br><br>" : 
				"<center><span style='color:red'>Este cupón ya esta <b>usado</b></span></center> <br><br>");
			$queryCuponValido = "UPDATE ".$GLOBALS['nameTablaUsers']." SET cuponvalido='1' WHERE id='".$rowCupon["id"]."'";
			mysql_query($queryCuponValido);
		};

					

}

$_SESSION['usuario'] = $_POST["usuario"];

function login(){
		
		$user = $_POST['mail'];
		$pass = $_POST['password'];

		$user = stripslashes($user);
		$pass = stripslashes($pass);
		$user = mysql_real_escape_string($user);
		$pass = mysql_real_escape_string($pass);
		$pass = strip_tags ($pass);
		
		$consultaLogin = "SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE user='$user' AND password='$pass'";
		$existeUsuario = mysql_query($consultaLogin);
		$condicionLogin = mysql_num_rows($existeUsuario);
		
		$consultaValidarUser = "SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE user='$user' AND validado='1'";
		$existeValidado = mysql_query($consultaValidarUser);
		$condicionValidado = mysql_num_rows($existeValidado);

		$idPerfil = "SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE user='".$user."'"; 
  		$resultadoid = mysql_query($idPerfil); 
  		$id = mysql_fetch_assoc($resultadoid);
				
			if($condicionValidado == 0 ){
					echo "Usuario no validado";
			}else{

				if($condicionLogin == 1){
					session_start();
					$_SESSION["user"] = $user;
					$_SESSION["login"] = 1;

					echo "<span style='color:green'>ya estas identificado</span>";
					echo "
					<script>
					$('div#logininterior').hide('slow');
					$('span#menu1').hide('slow');
					$('span#menu2').show('slow');
					$.cookie('logeado','logeado', { expires: 7, path: '/' }); 
					$.cookie('usuariologeado','".$user."', { expires: 7, path: '/' });
					$.cookie('id','".$id['id']."', { expires: 7, path: '/' });
					</script>";

					
				}else {
					echo 'El usuario y/o pass son incorrectos.';
				};
			};
				//el usuario no esta validado
}



function guardar(){
	$id = $_POST["id"];
	$value = $_POST["value"];
	$tabla = $_POST["tabla"];
					
	$queryGuardar = "UPDATE ".$GLOBALS['nameTablaUsers']." SET ".$tabla."='".$value."' WHERE id='".$id."'";
	mysql_query($queryGuardar);
	
	$renderer = $_GET['renderer'] ?  $_GET['renderer'] : $_POST['renderer'];
	if ('textile' == $renderer) {
	    require_once 'Textile.php';
	    $t = new Textile();
	    print $t->TextileThis(stripslashes($_POST['value']));
	} else {
	    print $_POST['value']; 
	}
}

function usuarios(){  
	$consultaUsuarios = "select * from ".$GLOBALS['nameTablaUsers']." ORDER BY id ASC";
	$datosUsuarios = mysql_query($consultaUsuarios); 
		  if($_GET['borrar'] == true){
			  mysql_query("delete from ".$GLOBALS['nameTablaUsers']." where id=".$_GET['id']);
			  header('Location: table.php');
		  };
	 

		while ($rowUsuarios = mysql_fetch_array($datosUsuarios)) {

		  echo '<tr class="tablaUsuarios" id="tablaUsuarios">
		  
								<td id="usuarioFormularioeditar" >
									<div id="'.$rowUsuarios['id'].'" class="usuarioFormularioEditar">'.$rowUsuarios['user'].'</div>
								</td>
								<td id="mailFormularioeditar" class="center">
									<div id="'.$rowUsuarios['id'].'" class="mailFormularioeditar">'.$rowUsuarios['mail'].'</div>
								</td>
								<td id="direccionFormularioeditar">
									<div id="'.$rowUsuarios['id'].'" class="direccionFormularioeditar">'.$rowUsuarios['direccion'].'</div>
								</td>								
								<td id="telefonoFormularioeditar" class="center">
									<div id="'.$rowUsuarios['id'].'" class="telefonoFormularioeditar">'.$rowUsuarios['telefono'].'</div>
								</td>
								<td class="Center">'. 
								(($rowUsuarios['cuponvalido'] == "0") ? 
								"<span data-rel='tooltip' data-original-title='Cupon sin usar'><span class='label label-success'>".$rowUsuarios['cupon']." sin usar</span></span>" :
								"<span data-rel='tooltip' data-original-title='Cupon usado'><span class='label label-important'>".$rowUsuarios['cupon']." usado</span></span>").'
								</td>
								<td class="center">
								<!--<a class="btn btn-success" href="#"><i class="icon-zoom-in icon-white"></i></a>
									<button id="openEditUsuarios" class="btn btn-info" value="'.$rowUsuarios['id'].'">&nbsp;<i class="icon-edit icon-white"></i>&nbsp;</button>
									<button id="editUsuarios" class="btn btn-success">&nbsp;<i class="icon-edit icon-white"></i>&nbsp;</button>-->
									<a class="btn btn-danger" href="?borrar=true&id='.$rowUsuarios['id'].'">&nbsp;<i class="icon-trash icon-white"></i>&nbsp;</a>
									
								</td>
								 
							</tr>';

		  }  

}


function registro(){
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['password']);
		//$cupon = substr(md5(microtime()), 1, 8);
		$fechadehoy = date("d-m-Y");
		$mail = strip_tags($_POST['mail']);
		//$telefono = strip_tags($_POST['telefono']);
		//$direccion = strip_tags($_POST['direccion']);
		$ip = $_SERVER['REMOTE_ADDR'];
		//$int_options = array("options"=>
		//array("min_range"=>600000000, "max_range"=>999999999));

		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			echo "eg. hi@embrion.es";
		}else{
				$queryRegistro = mysql_query('SELECT * FROM embrionusuarios WHERE mail="'.mysql_real_escape_string($mail).'" OR user="'.mysql_real_escape_string($user).'"');
				
				if($existe = mysql_fetch_object($queryRegistro)){			
					echo 'email or user already registered.';
				}else{
					$usuarioencriptado = sha1($user);	
					$meter = mysql_query('INSERT INTO embrionusuarios (user,password,mail,ip,fecha,validar) values
							("'.mysql_real_escape_string($user).'","'.mysql_real_escape_string($pass).'","'.mysql_real_escape_string($mail).'","'.$ip.'","'.$fechadehoy.'","'.sha1($user).'")');
					echo '<span style="color:#13cf00">registered, check your email</span>';

						
						$para = $mail;
						$titulo = 'Valida tu cuenta. Bienvenido a Embrion';
						$mensaje = '
											<html>
							<head>
							<title>Bienvenido al proyecto Embrion</title>
							</head>
							<style>
							a{
								color:#00d9e7;
							}
							</style>
							<body bgcolor="#000000" style="background-image: url(http://embrion.es/web/mail/fondo.jpg);">
							<center>
							<table width="750px">
								<tr>
									<td>
							<font size="1" color="#ccc">Este correo contiene imágenes, por favor, activa la opción "Mostrar imágenes" en tu gestor de correo electrónico.
¿No ves el correo correctamente? Mira la versión <a href="http://embrion.es/web/mail.html">Web Aquí.</a></font></center>
							<br>
							<img src="http://embrion.es/web/img/logo.png" width="50%">
							<br><br>
							<center>
					<table width="100%" border="0" bgcolor="#FFFFFF" style="background-color:rgba(0,0,0,0.7)" cellpadding="20">
						<tr>
							<td><br>
							<font face="Aldrich, sans-serif, Verdana, Helvetica" color="#fff" size="5">
							Bienvenido/a a Embrion, '.$user.'</font><br>
							<font face="Aldrich, sans-serif, Verdana, Helvetica" color="#fff">
							En <a href="http://brainside.es">Brainside</a> llevamos luchando por crear “<a href="http://embrion.es">Embrion</a>”
							más de un año. Nuestro sueño y objetivo es poder
							dedicarnos profesionalmente al desarrollo y producción 
							de videojuegos. <br><br>

							Nuestra filosofía de trabajo esta basada en el esfuerzo 
							cooperativo y la confianza en el equipo. Te damos las 
							gracias por el interés mostrado en nuestro proyecto.<br><br>

							 - Para <b>validar</b> tu cuenta tienes que seguir <a href="http://embrion.es/web/validar.php?valido='.$usuarioencriptado.'">este enlace.</a><br><br>

							En breve nos pondremos en contacto contigo.<br><br>
							<br><br>
								</font><font size="2" color="#fff" face="Aldrich, sans-serif, Verdana, Helvetica">Fernando Sierra, Director del proyecto, muchas gracias. 
								<br></font><font size="2" color="#fff" face="Aldrich, sans-serif, Verdana, Helvetica"><a href="http://www.embrion.es">Embrion.es</a> '.date(Y).'</font><br>	
							<td>
						<tr>
					</table></center>

					<br><center><font size="1" color="#ccc">De conformidad con lo establecido en la Ley Orgánica 15/99, de 13 de diciembre, de Protección de Datos Personales, te informamos que los datos que hemos tratado para realizar este envío están incluidos en una base de datos de Brainside,S.L. que tu nos proporcionaste. Tus datos personales nunca serán facilitados a ninguna otra empresa. Te recordamos que a través de Brainside.es, recibirás ofertas e información. Tienes derecho a conocer, rectificar, cancelar u oponerte al tratamiento de tus datos personales, solicitándolo a la dirección: Calle guipuzcoa, 2, 41700 Dos hermanas (Sevilla) o en la dirección de correo electrónico info@embrion.es

					Copyright © '.date(Y).' Embrion,S.L., All rights reserved.</font></center>
</td>
	</tr>
		</table>
							</body>
							</html>					
						
						';
						$cabeceras = 'MIME-Version: 1.0' . "\r\n";
						$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
						$cabeceras .= 'From: info@embrion.es <info@embrion.es>' . "\r\n";
						$cabeceras .= 'Cc: info@embrion.es' . "\r\n";
						$cabeceras .= 'Bcc: info@embrion.es' . "\r\n";
						/*$cabeceras = 'From: Suscripciones@lacroqueteria.com' . "\r\n" .
							'Reply-To: Suscripciones@lacroqueteria.com' . "\r\n" .
							'X-Mailer: PHP/' . 'Content-type: text/html\r\n' . phpversion();*/

						mail($para, $titulo, $mensaje, $cabeceras);	
				}

		}		
	
}	


function validarUsuario(){

		$valido = $_GET['valido'];
		$consultaValidar = "SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE validar='$valido'";
		$existeNumero = mysql_query($consultaValidar);	
		$condicionValidar = mysql_num_rows($existeNumero);
		echo $condicionValidar;
				if($condicionValidar==1){
					echo "<br>usuario validado";
					$queryGuardar = "UPDATE ".$GLOBALS['nameTablaUsers']." SET validado='1' WHERE validar='$valido'";
					mysql_query($queryGuardar);
					echo "<script> location.href='index.php?validar=true'; </script>";
					header('Location: index.php?validar=true');
	
				} else {
					echo "no existe esa clave";	
					header('Location: index.php');
					//ENVIARLE OTRO CORREO AL COLEGA DESPUES DE UN TIEMPO Y SI NO VUELVE DENTRO DE UN TIEMPO BORRAR LA TABLA COMO FALSA.
				}
	
}


function guardarimagen(){
	$id = $_COOKIE["id"];
	$imagen = $_POST["imagen"];
	echo "tu id ".$id;
					
	$queryGuardar = "UPDATE ".$GLOBALS['nameTablaUsers']." SET foto='".$imagen."' WHERE id='".$id."'";
	mysql_query($queryGuardar);
	
	$renderer = $_GET['renderer'] ?  $_GET['renderer'] : $_POST['renderer'];
	if ('textile' == $renderer) {
	    require_once 'Textile.php';
	    $t = new Textile();
	    print $t->TextileThis(stripslashes($_POST['value']));
	} else {
	    print $_POST['value']; 
	}
}

                    $fechadehoy = date("d-m-Y");
					
					$contarUsuarios = "SELECT * FROM ".$nameTablaUsers."";
					$resultContarUsuarios = mysql_query($contarUsuarios);
					$numeroContarUsuarios = mysql_num_rows($resultContarUsuarios);
					
					$contarUsuariosh = "SELECT * FROM ".$nameTablaUsers." WHERE fecha = '$fechadehoy'";
					$resultContarUsuariosh = mysql_query($contarUsuariosh);
					$numeroContarUsuariosh = mysql_num_rows($resultContarUsuariosh);	
	

?>