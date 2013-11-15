<?php
$titulo = $_POST["nombre"];
						$cabeceras = 'MIME-Version: 1.0' . "\r\n";
						$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
						$cabeceras .= 'From: '.$_POST["mail"].' <'.$_POST["mail"].'>' . "\r\n";
$mensaje = "El usuario con el correo ".$_POST["mail"]. " acaba de mandar un formulario desde la web."."\r\n";
$mensaje .= "<br>";
$mensaje .= nl2br($_POST["texto"]);

						$cabeceras = 'MIME-Version: 1.0' . "\r\n";
						$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
						$cabeceras .= 'From: info@embrion.es <info@embrion.es>' . "\r\n";
						$cabeceras .= 'Cc: info@embrion.es' . "\r\n";
						$cabeceras .= 'Bcc: info@embrion.es' . "\r\n";


if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
    mail("info@brainside.com", $titulo, $mensaje, $cabeceras);
    echo "<label style='color:#0CF; font-size:10px;'>mail send! thanks! :)</label>";
}elseif($_POST["nombre"] == "" or $_POST["texto"] == ""){

	echo "<label style='color:red; font-size:10px;'>empty fields!</label>";
}else{
	echo "<label style='color:red; font-size:10px;'>verify the email, thanks!</label>";

};

?>