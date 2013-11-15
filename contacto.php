<!DOCTYPE html>
<html>
  <body>
    <div id="cerrarPerfil"><span id="cerrarPerfiljquery" class="ui-icon ui-icon-circle-close"></span></div>
  	<div style="width:30%; height:90%; float:center; margin:auto; padding:15px; background-color:rgba(204,204,204,0.25)">
      <div class="widget"><span class="label">Issue *</span><input id="namecontacto" type="text" name="name" class="text ui-widget-content ui-corner-all" /></div>
      <div class="widget"><span class="label">E-Mail *</span><input id="mailcontacto" type="text" name="email" class="text ui-widget-content ui-corner-all"/></div>
      <div class="widget"><span class="label">Your comment *</span><br><textarea id="textocontacto" name="comment" class="text ui-widget-content ui-corner-all" rows="5" cols="30"></textarea></div>
      <div class="widget">
        <br>
      	<span id="send" type="submit" value="Submit" class="ui-button-text">
      		<div class="ui-button-text" id="send">
      			send!
      		</div>
      		<div id="mensaje3"></div>
      	</span>

	</div>

  </body>
</html>

  <script>

      $("div#send")
      	.button()
      	.click(function() {
        var namecontacto = $( "input#namecontacto" ).val();
        var mailcontacto = $( "input#mailcontacto" ).val();
        var textocontacto = $( "textarea#textocontacto" ).val();
            $.ajax({
                  data:  {  nombre: namecontacto, mail: mailcontacto, texto: textocontacto },
                  url:   'enviarcontacto.php',
                  type:  'POST',
                  beforeSend: function () {
                      $("div#mensaje3").spin({
                        lines: 13, // The number of lines to draw
                        length: 0, // The length of each line
                        width: 12, // The line thickness
                        radius: 27, // The radius of the inner circle
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
                        top: '1', // Top position relative to parent in px
                        left: '150' // Left position relative to parent in px
                      });
                  },
                success: function (response){ 
                    $("div#mensaje3").html("<center>"+response+"</center>").slideUp(100).delay(10).slideDown(300);

                  }

              });
		
      });
	
  $("span#cerrarPerfiljquery")
    .click(function(){ 
        $("div#contacto").slideUp();
});

  </script>
