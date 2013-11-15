
    $(document).ready(function(){
        $("body").css({"overflow-y":"hidden"});
        var alto=$(window).height();
        $("body").append("<div id='pre-load-web'><div id='imagen-load'><img src='img/circles.gif'  /><br />Cargando...</div>");
        $("#pre-load-web").css({height:alto+"px"});
        $("#imagen-load").css({"margin-top":(alto/2)-30+"px"});
    });

    $(window).load(function(){
        $("#pre-load-web").fadeOut(700,function(){ 
            $(this).remove();
            $("body").css({"overflow-y":"auto"}); 
        });        
    });

	$(document).ready(function(){
		centraVentana();
		$("#ventanaPopup1Cerrar").click(function(){
			ocultaVentana();
            $.cookie('video','ocultar', { expires: 7, path: '/' });

		});
		$("#ventanaPopup1Fondo").click(function(){
			ocultaVentana();
		});
        $("#cookieCerrar").click(function(){
            $.cookie('aviso','ocultar', { expires: 7, path: '/' });
            $("div#cookie").fadeOut();
            
        });

        $(function() {
            $( "#dialog" ).dialog({
              autoOpen: false,
              show: {
                effect: "",
                duration: 200
              },
              hide: {
                effect: "",
                duration: 200
              },
        });

  });


	});
    
	function centraVentana() {
        var windowWidth = document.documentElement.clientWidth;
        var windowHeight = document.documentElement.clientHeight;
        var popupHeight = $("#ventanaPopup1").height();
        var popupWidth = $("#ventanaPopup1").width();
		$("#ventanaPopup1").css({
            "position": "absolute",
            "top": windowHeight/2-popupHeight/2,
            "left": windowWidth/2-popupWidth/2
		});
		$("#ventanaPopup1Fondo").css({
            "height": windowHeight
		});
	};
 
	function ocultaVentana() {
		$("#ventanaPopup1Fondo").fadeOut("slow");
		$("#ventanaPopup1").fadeOut("slow");
        

	};
 
	function muestraVentana() {
		$("#ventanaPopup1Fondo").css({
        "opacity": "0.7"
	   });
	   $("#ventanaPopup1Fondo").fadeIn("slow");
        $("#ventanaPopup1").fadeIn("slow");
    };

  $(function() {
    var user = $( "input#user" ),
      mail = $( "input#mail" ),
      password = $( "input#password" ),
      allFields = $( [] ).add( user ).add( mail ).add( password ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }

    $( "#dialog-form" ).dialog({

      autoOpen: false,

      height: 500,
      width: 440,
      modal: true,
      position: [400,120],
      create: function (event) { $(event.target).parent().css({
        "position": "fixed",
        "zIndex": "999999999999",
        }) ;},
      buttons: {
        "Create an account": function() {
          var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkLength( user, "username", 3, 16 );
          bValid = bValid && checkLength( mail, "email", 6, 80 );
          bValid = bValid && checkLength( password, "password", 5, 16 );
 
          bValid = bValid && checkRegexp( user, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
          // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
          bValid = bValid && checkRegexp( mail, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. hi@embrion.es" );
          bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
          if ( bValid ) {
            $.ajax({
                  data:  allFields,
                  url:   'registro.php',
                  type:  'post',
                  beforeSend: function () {
                      $("div#mensaje").spin({
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
                    $("div#mensaje").html("<center><label style='color:red'>"+response+"</label></center>");
                    
                  }
              });
          }
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    }).slimScroll({
    height: '',
    width: '',
    size: '9px',
    position: 'right',
    color: '#72d5f2',
    alwaysVisible: true,
    distance: '5px',

    railVisible: false,
    railColor: '#ccc',
    railOpacity: 0.4,
    wheelStep: 10,
    allowPageScroll: false,
    disableFadeOut: true
});
 
    $( "#create-user2" )
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });
          var spin = $.fn.spin = function(opts) {
            this.each(function() {
              var $this = $(this),
                  data = $this.data();
        
              if (data.spinner) {
                data.spinner.stop();
                delete data.spinner;
              }
              if (opts !== false) {
                data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
              }
            });
            return this;
          };

  $(function() {
    $("div#logininterior").hide();
    $("#login").click(function (){
      $("div#logininterior").toggle(100, function() {
                  $( "div#logininterior" )
                    .animate({ width: "175px" }, 1000 )
                    .animate({ padding: "50px" }, 800 );
                  });

    });

$("a#cerrarValido")
    .click(function(){
        $("div#usuarioValidado").hide();
});

$("div#perfil").hide();
$("div#blog").hide();
$("div#contacto").hide();

$("a[alt=profile]")
    .click(function(){
        $("div#perfil").toggle(100);
        $("div#perfil").spin({
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
                        top: '50', // Top position relative to parent in px
                        left: '50' // Left position relative to parent in px
                      });
        $("div#perfil").load("profile.php");
});


$("a[alt=abrirblog]")
    .click(function(){
        $("div#blog").toggle(100);
        $("div#blog").spin({
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
                        top: '50', // Top position relative to parent in px
                        left: '50' // Left position relative to parent in px
                      });
        $("div#blog").load("blog.php");

});

$("a[alt=abrircontacto]")
    .click(function(){
        $("div#contacto").toggle(100);
        $("div#contacto").spin({
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
                        top: '50', // Top position relative to parent in px
                        left: '50' // Left position relative to parent in px
                      });
        $("div#contacto").load("contacto.php");
});

$("span#cerrarPerfiljquery")
    .click(function(){
        $("div#perfil").hide();
        $("div#blog").hide();
        $("div#contacto").hide();
});

$("span#cerrarBlogjquery")
    .click(function(){
        $("div#perfil").hide();
        $("div#blog").hide();
        $("div#contacto").hide();
});

$("span#cerrarContactojquery")
    .click(function(){
        $("div#perfil").hide();
        $("div#blog").hide();
        $("div#contacto").hide();
});

$(function() {
   $( "div#login2" )
      .button()
      .click(function() {
        var maillogin = $( "input#maillogin" ).val();
        var passwordlogin = $( "input#passwordlogin" ).val();
            $.ajax({
                  data:  {  mail: maillogin, password: passwordlogin },
                  url:   'login.php',
                  type:  'POST',
                  beforeSend: function () {
                      $("div#mensaje2").spin({
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
                    $("div#mensaje2").html("<center><label style='color:red; font-size:9px;'>"+response+"</label></center>");
                  }

              });
      });
  });

});

$(function() {
   $( "div#recordarlogin" )
      .button()
      .click(function() {
        var maillogin = $( "input#recordarlogin" ).val();
            $.ajax({
                  data:  {  mail: maillogin },
                  url:   'recordarlogin.php',
                  type:  'POST',
                  beforeSend: function () {
                      $("div#mensaje3").spin({
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
                        top: '-38', // Top position relative to parent in px
                        left: '150' // Left position relative to parent in px
                      });
                  },
                success: function (response){ 
                    $("div#mensaje3").html("<br><center><label style='color:red; font-size:9px;'>"+response+"</label></center>");
                  }

              });
      });
  });