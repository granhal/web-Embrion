<!DOCTYPE html>
<html>
<head>
<body>

<?php
require_once('funciones.php');
	$datosPerfil = "SELECT * FROM ".$GLOBALS['nameTablaUsers']." WHERE user='".$_COOKIE["usuariologeado"]."'"; 
  	$resultadoDP = mysql_query($datosPerfil); 
  	$filaPerfil = mysql_fetch_assoc($resultadoDP); ?>

<div id="botoneraperfil">
<span id="cerrarPerfiljquery" class="ui-icon ui-icon-circle-close"></span>
</div>
<div id="botoneraperfil2">
<span id="maximizarPerfiljquery" class="ui-icon ui-icon-circle-plus"></span>
</div>

    <div id="perfilInterior" class="jspPane" style="padding: 0px; width: 100%; height:100%; top: 0px; overflow: hidden;"> 

        <div id="perfilIzquierda"><br>

        	<span style="font-size:18px">This is your profile in the EMBRION project</span><hr width="90%" size="1"><br>
            <nav alt="any data click to edit" class="tooltip2" style="margin-left:290px; position:absolute;">
            <img src="img/info.png" width="56px">
            </nav>
        	<p>Section: -<span style="color:#0CF"><?= $filaPerfil['status'] ?></span><br>
                Registered since: <span style="color:#0CF"><?= $filaPerfil['fecha'] ?></span>
                <br><hr width="90%" size="1"> <br>

        		User: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="usuarioPerfil"><?= $filaPerfil['user'] ?></span>
                <br>

                Email: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="mailPerfil"><?= $filaPerfil['mail'] ?></span>            
                <br>   
                  
                DNI: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="dniPerfil"><?= $filaPerfil['dni'] ?></span>
                <br>
               
                <hr width="90%" size="1"> <br>
                Name: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="nombrePerfil"><?= $filaPerfil['nombre'] ?></span>
                <br>

        		Surnames: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="apellidosPerfil"><?= $filaPerfil['apellidos'] ?></span>
                <br>

                Date of birth: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="fechanacimientoPerfil"><?= $filaPerfil['fechanacimiento'] ?></span>
                <br>
                <hr width="90%" size="1"> <br>

        		Address: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="direccionPerfil"><?= $filaPerfil['direccion'] ?></span>
                <br>

                City: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="ciudadPerfil"><?= $filaPerfil['ciudad'] ?></span>
                <br>

                Country: 
                <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="paisPerfil"><?= $filaPerfil['pais'] ?></span>
                <br><hr width="90%" size="1"> <br>

                Twitter: <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="twitterPerfil"><?= $filaPerfil['twitter'] ?></span><br>
                Facebook: <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="facebookPerfil"><?= $filaPerfil['facebook'] ?></span><br>
                Web o portfolio: <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="webPerfil"><?= $filaPerfil['web'] ?></span><br>
                Youtube: <span style="color:#0CF" id="<?= $filaPerfil['id'] ?>" class="youtubePerfil"><?= $filaPerfil['youtube'] ?></span><br>
                
                <br><hr width="90%" size="1"> <br>

                Agreements:<br>
                Here you will find your agreements with Embrion
                <!--<a href="#">Contrato de confidencialidad</a>  Estado: <span style="color:orange">PENDIENTE</span><br>
                <a href="#">Contrato mercantil</a>  Estado: <span style="color:orange">PENDIENTE</span><br>
                <a href="#">Contrato compromiso</a>  Estado: <span style="color:orange">PENDIENTE</span><br>-->

        		<!--<a href="#">Cambiar el password</a><br>-->

        	<p>
<br><br>
        </div>

        <div id="perfilCentro"><br>
        	<br><span style="font-size:18px">Biography</span><span style="font-size:10px" > (max. 1000 chr.)</span><hr width="90%" size="1">
            <span id="<?= $filaPerfil['id'] ?>" class="biografiaPerfil"><?= $filaPerfil['biografia'] ?></span>
            </span>
        </div>

        <div id="perfilDerecha" ><br>
            <span style="font-size:18px" >Accomplishment</span><hr width="80%" size="1"><br>
            Here you get your list of achievements in the Embrion Project<br><br>
        	<span style="font-size:18px" >Profile image </span><span style="font-size:10px" >(max. 100KB)</span><hr width="80%" size="1"><br>
            <div id="cambiarfoto" style="width:100%; height:100%;">

                    <form id="formulariosubir" enctype="multipart/form-data" class="formulario">
                    <input name="archivo" type="file" id="imagen" /><input type="button" value="Subir imagen" /><br />
                    </form>

                    <div class="messages"></div><br>

                    <div class="showImage" ></div>
                    <div id="recargarfoto" sytle="width:100px; height:100px; float:left; position:relative;">
                        <?php if($filaPerfil['foto'] != ""){ ?>
                        <center><img id="fotoPerfil" src="files/<?= $filaPerfil['foto'] ?>" width="60%"></center>
                        <?php }else{ ;?>
                        <center><img id="fotoNueva" src="img/perfil_1.jpg" width="65%"></center>
                        <? }; ?>
                    </div>
                    </div>
                        	<!--admin: editar fondos, ver usuarios y editarlos (cambiar a admin u otro) mandar mensajes y emails, poner los post del blog en algún lugar -->
			<!--<center><img id="fotoperfil" src="img/perfil_1.jpg" width="80%" ></center>-->
        </div>
        
    </div>

<script>
$("div#perfilInterior").slimScroll({
    height: '100%',
    width: '100%',
    size: '9px',
    position: 'right',
    color: '#72d5f2',
    alwaysVisible: false,
    distance: '5px',

    railVisible: true,
    railColor: '#ccc',
    railOpacity: 0.8,
    wheelStep: 10,
    allowPageScroll: true,
    disableFadeOut: true
});


$("span#cerrarPerfiljquery")
    .click(function(){ 
        $("div#perfil").slideUp();
});

var isVisible = true;
           $("span#maximizarPerfiljquery").click(function() {
                if(isVisible){
                    $("div#perfil").animate({
                    'height': "100%",
                    });
                    $("span#maximizarPerfiljquery").removeClass().addClass("ui-icon ui-icon-circle-minus" );

                    isVisible = false;
                } else {
                    $("div#perfil").animate({
                    'height': "63%",
                    });
                    $("span#maximizarPerfiljquery").removeClass().addClass("ui-icon ui-icon-circle-plus" );
                    isVisible = true;

                }
            });
       




$('span.mailPerfil').editable('guardar.php', { 
    type : 'text',
    submit    : 'editar',
    id   : 'id',
    submitdata: {tabla : 'mail'},
    cssclass : 'ui-widget',

});

$('span.nombrePerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'nombre'},
    cssclass : 'ui-widget',

});


$('span.apellidosPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'apellidos'},
    cssclass : 'ui-widget',

});
$('span.direccionPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'direccion'},
    cssclass : 'ui-widget',

});
$('span.fechanacimientoPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'fechanacimiento'},
    cssclass : 'ui-widget',

});
$('span.biografiaPerfil').editable('guardar.php', { 
    type : 'textarea',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'biografia'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});
$('span.dniPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'dni'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});
$('span.ciudadPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'ciudad'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});
$('span.paisPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'pais'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});
$('span.facebookPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'facebook'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});
$('span.webPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'web'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});
$('span.twitterPerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'twitter'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});
$('span.youtubePerfil').editable('guardar.php', { 
    type : 'text',
    submit : 'editar',
    id   : 'id',
    submitdata: {tabla : 'youtube'},
    cssclass : 'ui-widget',
    width : '100%',
    height : '100%',
});

$("form#formulariosubir").hide();



$("div#cambiarfoto")
    .click(function(){
    $("form#formulariosubir").show();
});

$(document).ready(function(){
  $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
    //función que observa los cambios del campo file y obtiene información
    $(':file').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#imagen")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo

    });

     $(':button').click(function(){
        //información del formulario
        var formData = new FormData($(".formulario")[0]);
        var message = "";    
        //hacemos la petición ajax  
        $.ajax({
            url: 'guardarimagen.php',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'><span>").spin({
                        lines: 9, // The number of lines to draw
                        length: 0, // The length of each line
                        width: 6, // The line thickness
                        radius: 8, // The radius of the inner circle
                        corners: 1, // Corner roundness (0..1)
                        rotate: 0, // The rotation offset
                        direction: 1, // 1: clockwise, -1: counterclockwise
                        color: 'white', // #rgb or #rrggbb or array of colors
                        speed: 1.0, // Rounds per second
                        trail: 45, // Afterglow percentage
                        shadow: false, // Whether to render a shadow
                        hwaccel: true, // Whether to use hardware acceleration
                        className: 'spinner', // The CSS class to assign to the spinner
                        zIndex: 2e9, // The z-index (defaults to 2000000000)
                        top: '-10', // Top position relative to parent in px
                        left: '1' // Left position relative to parent in px
                      });;
                showMessage(message)         
            },
            //una vez finalizado correctamente
            success: function (response){ 
            $(".messages").html("<center><label style='color:red'>"+response+"</label></center>");
                $("div#message").hide();
                $("form#formulariosubir").hide();
                $("img#fotoPerfil").hide();
                $("img#fotoNueva").show();
                $("div#recargarfoto").load("recargarfoto.php");

            },
            //si ha ocurrido un error
            error: function(response){
                message = $("<span class='error'>Ha ocurrido un error."+response+"</span>");
                showMessage(message);

            }
        });
        
    });
   
})
 
//como la utilizamos demasiadas veces, creamos una función para 
//evitar repetición de código
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
 
//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}
</script>
</body>
</html>