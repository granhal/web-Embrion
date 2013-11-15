<?php
include('funciones.php');
session_start();

		$mailrecordar = $_POST["mail"];

		$mailout = stripslashes($mailrecordar);
		$mailout = mysql_real_escape_string($mailrecordar);
		
		$consultamail = "SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE mail='$mailout'";
		$existemail = mysql_query($consultamail);
		$condicionmail = mysql_num_rows($existemail);
		$filaPerfilrecordar = mysql_fetch_assoc($existemail);
		
		if ($condicionmail == 1){
			$idr = $filaPerfilrecordar['id'];
			function generaPass(){
				$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
				$longitudCadena=strlen($cadena);
				$pass = "";
				$longitudPass=10;
				for($i=1 ; $i<=$longitudPass ; $i++){
					$pos=rand(0,$longitudCadena-1);
					$pass .= substr($cadena,$pos,1);
				}
				return $pass;
			}
			$newpassword = generaPass();
			$user = $filaPerfilrecordar['user'];

				$queryGuardar = "UPDATE ".$GLOBALS['nameTablaUsers']." SET password='".$newpassword."' WHERE id='".$idr."'";
				mysql_query($queryGuardar);

			echo "<span style='color:#0CF'>we have sent you an email with your data!</span>";


						$para = $mail;
						$titulo = 'Recuerda tu mail en Embrion';
						$mensaje = '
											<html>
							<head>
							<title>Recuerda tu mail en Embrion</title>
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
							Hola de nuevo,</font><br>
							<font face="Aldrich, sans-serif, Verdana, Helvetica" color="#fff">
							Estas recibiendo este correo porque has recordado tu login.<br><br>

							Tus datos son los siguientes:<br><br>

							User: '.$user.'<br>
							Password: '.$newpassword.'<br><br>

							Nuestra filosofía de trabajo esta basada en el esfuerzo 
							cooperativo y la confianza en el equipo. Te damos las 
							gracias por el interés mostrado en nuestro proyecto.<br><br>
								
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

						mail($mailrecordar, $titulo, $mensaje, $cabeceras);	





		}else{
			echo "no such mail!";
		};

?>