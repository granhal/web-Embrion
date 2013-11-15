<?php 
session_start();
?>

<!-- Website designed and developed by www.cantelymedia.com Alberto Gutiérrez Romero @granhal (twitter) -->
<!-- Web diseñada y desarrollada por www.cantelymedia.com Alberto Gutiérrez Romero @granhal (twitter) -->
<!-- ######################################################## -->
<!-- embrion.es videogame, Embrion is a project of <a href="http://brainside.es">Brainside Studio.</a> -->
<!-- Todos los derechos reservados, 2013. -->
<!-- All rights reserved 2013. -->

<!DOCTYPE html>
<html>
<head>
<title><?php if($_GET["lang"] == "Embrion - web oficial de embrion.es"){ echo "CARAC."; }elseif($_GET["lang"] == "eng"){ echo "Embrion - website official embrion.es"; }else{ echo "Embrion - website official embrion.es"; }; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="embrion, videogame, videojuego, brainside, sevilla, españa, spain, horror, terror, game, juego, unity" />
	<meta name="description" content="El equipo “Brainside” formado por desarrolladores iniciados en el proyecto “Aula de Videojuegos” de la Universidad de Sevilla, trabaja desde hace tiempo en la creación de “Embrion”
Os presentamos un videojuego con temática “Survival Horror” de corte clásico, ambientado en un Universo Scifi con el estilo de antaño (Blade Runner, Alien, Dune).
Pretendemos recuperar la fuerza de este género, ofreciendo al jugador inmersión total, gracias al motor Unity 3D, tecnología de última generación en creación de Videojuegos. Con un aspecto visual muy cuidado, mecánicas innovadoras y un guión a la altura de series míticas como “Lost” o de supervivencia como “The Walking Dead”." />
	<meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=0" />

	<link rel="shortcut icon" href="img/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="rsc/jquery-ui-1.10.3.custom.css" />
    <link rel="stylesheet" href="rsc/style.css" >

    <script src="rsc/jquery-1.9.1.js"></script>
    <script src="rsc/jquery-ui-1.10.3.custom.js"></script>
	
	<script src="rsc/jquery.scrollTo-1.4.3.1-min.js"></script>	
    <script src="rsc/jquery.cookie.js"></script>
    <script src="rsc/jquery.jeditable.js"></script>	
    <script src="rsc/jquery.mousewheel.js"></script>

    
    <script src="rsc/spin.js"></script>
    <script src="rsc/parallax.js"></script>

    <script src="rsc/jquery.slimscroll.js"></script>
    <script src="rsc/funciones.js"></script>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
<![endif]-->
</head>
<body>

  <div id="ventanaPopup1">
    <a id="ventanaPopup1Cerrar"><img src="img/cerrar.png" onmouseover="this.src='img/cerrar2.png';" onmouseout="this.src='img/cerrar.png';"   ></a>
	<IFRAME height="100%" src="http://www.youtube.com/embed/yQsNBj9echY?feature=player_detailpage&autoplay=0" frameBorder=0 width="100%" allowfullscreen></IFRAME>
  </div>
  <div id="ventanaPopup1Fondo"></div>
<div id="cajamenu">
    <div class="menu">
		<div id="enlaces">
        &nbsp;&nbsp;&nbsp;<a  href="javascript:$.scrollTo('#destino',2600);">EMBRION</a>
        <a  href="javascript:$.scrollTo('#destino2',2600);">
<?php if($_GET["lang"] == "spa"){ echo "CARAC."; }elseif($_GET["lang"] == "eng"){ echo "FEATURES"; }else{ echo "FEATURES"; }; ?>
        </a>
        <a  id="irblog" alt="abrirblog" href="#">BLOG</a>
        <a  href="javascript:$.scrollTo('#destino3',2600);">MEDIA</a>
        <a  id="ircontacto" alt="abrircontacto" href="#">
<?php if($_GET["lang"] == "spa"){ echo "CONTACTA"; }elseif($_GET["lang"] == "eng"){ echo "CONTACT"; }else{ echo "CONTACT"; }; ?>        
        </a>
        </div>
        <div id="social">
        <a href="index.php?lang=eng"><img src="img/english.png" onmouseover="this.src='img/english_hover.png';" onmouseout="this.src='img/english.png';"   ></a>
        <a href="index.php?lang=spa"><img src="img/spain.png" onmouseover="this.src='img/spain_hover.png';" onmouseout="this.src='img/spain.png';"   ></a>
        <img src="img/separacion.png" />
        <a href="https://www.facebook.com/EmbrionTheGame" target="_blank">
        <img src="img/facebook.png" onmouseover="this.src='img/facebook_hover.png';" onmouseout="this.src='img/facebook.png';"   ></a>
        <a href="https://twitter.com/brainsidestudio" target="_blank">
        <img src="img/twitter.png" onmouseover="this.src='img/twitter_hover.png';" onmouseout="this.src='img/twitter.png';" ></a>
        <a href="http://www.youtube.com/channel/UCELtB1igT7xGtENrz1OMrsA" target="_blank">
        <img src="img/youtube.png" onmouseover="this.src='img/youtube_hover.png';" onmouseout="this.src='img/youtube.png';"></a>
        </div>
        <div id="separacionlarga"><img src="img/separacionlarga.png" width="60%" /> 

            <span style="font-size:14px">
                <?php 
                    if($_SESSION["login"] == 0){ ?>
                        <span id='menu1'>
                            <a id="create-user2" href="#" alt="register to support the project in Embrion" class="tooltip2">Register</a> |
                            <a id="login" href="#" alt="login for view your profile in Embrion" class="tooltip2">Login</a>
                        </span>
                        <span id='menu2'>
                            <a href='#' alt='profile'>your profile</a> | 
                            <a href='logout.php'>logout</a>
                        </span>
                <?php 
                    }else{ 
                        echo "<a href='#' alt='profile'>your profile</a> | <a href='logout.php'>logout</a> "; 
                    };
                ?>
            </span>

        </div>
    </div>
</div>
    <div class="fondo_uno" id="destino">
    	<div id="logo"><img src="img/<?php if($_GET["lang"] == "spa"){ echo "logo2.png"; }elseif($_GET["lang"] == "eng"){ echo "logo.png"; }else{ echo "logo.png"; }; ?>" alt="embrion" width="100%"/></div>
<?php if($_GET["lang"] == "spa"){ ?>
        <div id="hands">Sobrevivir es lo último que harás<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350" width="100%" /><br />Embrion: La Gran Pregunta es un videojuego <br />del género Survival Horror que ahondará en la sensación de soledad <br />y peligro constante de los jugadores.<br /> No hay truco: estás sólo contra el miedo</span>
        </div> 
<?php }elseif($_GET["lang"] == "eng"){ ?>
        <div id="hands">Surviving is the last thing that you will do <br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350" width="100%" /><br />Embrion: The Big Question is a Survival Horror videogame <br />which will make deeper the sensation of loneliness <br />and constant danger of the player in question. <br />There is no catch: you are alone against fear.</span>
        </div> 
<?php }else{ ?> 
        <div id="hands">Surviving is the last thing that you will do <br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350" width="100%" /><br />Embrion: The Big Question is a Survival Horror videogame <br />which will make deeper the sensation of loneliness <br />and constant danger of the player in question. <br />There is no catch: you are alone against fear.</span>
        </div>  
 <?php }; ?>        
    </div>
    </div>
    <div class="fondo_dos" ></div>
    <div class="fondo_tres" id="destino2">
        <div id="huecofeatures"></div>
        <div id="huecofeaturesizquierda"></div>
        <div id="features">
<?php if($_GET["lang"] == "spa"){ ?>
        <p>ARGUMENTO<br /><span style="font-size:16px; line-height:5px;"><img src="img/separacionlarga.png" width="35%"/><br />En el año 2952, la rápida expansión de la humanidad por el espacio ha provocado que deban buscarse nuevas fuentes de energía, razón por la que Hans Stuart es uno de tantos mineros que vagan por el espacio, a bordo de la Providence, en busca de minerales en asteroides. <br />
Siguiendo la rutina, la inteligencia artificial de la nave, G.E.M. (Geologic Exploration Machine), recibe un encargo de una estación espacial cercana. Sin embargo, de camino sufre un accidente, llegando de forma aparatosa a un hangar solitario y tétrico.<br /><br />

Súbitamente, un ser extraño espanta a Hans, que en su huída se precipita por un conducto que lo lleva a las profundidades de unas instalaciones prácticamente en ruinas y con un duro desafío por delante para retornar al hangar…<br /><br />
Y es que los extraños sucesos que comienzan a ocurrir exigirán el máximo de una persona acostumbrada a vivir protegida en el cascarón que es su vida.<br />
<?php }elseif($_GET["lang"] == "eng"){ ?>
        <p>ARGUMENT<br /><span style="font-size:16px; line-height:5px;"><img src="img/separacionlarga.png" width="35%"/><br />
In the year 2952, the rapid expansion of the human race across space has dictated that new energy sources have to be sought out, it is for this reason that Hans Stuart is one of the many miners who wander about space on board the Providence in search of minerals in asteroids.<br />
Following a linear routine, the artificial intelligence of the spacecraft, G.E.M. (Geologic Exploration Machine), receives a communication from a nearby space station. However, he suffers an accident on his way, arriving in a dramatic way to a solitary and tetric hangar.<br /><br />
Suddenly, a strange being scares Hans, who in his escape descends a duct that brings him to the depths of building which are almost in ruins - resulting in a tough challenge ahead in order to return to the hangar...<br /><br />
And the strange events which are starting to happen will demand the zenith of a person who is used to living protected in his own shell which is his life.
<?php }else{ ?> 
        <p>ARGUMENT<br /><span style="font-size:16px; line-height:5px;"><img src="img/separacionlarga.png" width="35%"/><br />
In the year 2952, the rapid expansion of the human race across space has dictated that new energy sources have to be sought out, it is for this reason that Hans Stuart is one of the many miners who wander about space on board the Providence in search of minerals in asteroids.<br />
Following a linear routine, the artificial intelligence of the spacecraft, G.E.M. (Geologic Exploration Machine), receives a communication from a nearby space station. However, he suffers an accident on his way, arriving in a dramatic way to a solitary and tetric hangar.<br /><br />
Suddenly, a strange being scares Hans, who in his escape descends a duct that brings him to the depths of building which are almost in ruins - resulting in a tough challenge ahead in order to return to the hangar...<br /><br />
And the strange events which are starting to happen will demand the zenith of a person who is used to living protected in his own shell which is his life.
 <?php }; ?>       
        </div>
    </div>
    
    <div class="fondo_cuatro" >
        	<div id="huecofeatures"></div>
            <div id="huecofeaturesizquierda"></div>
 <?php if($_GET["lang"] == "spa"){ ?>
        <div id="textoestacion">La muerte no es un juego<span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />La vida real es frágil, como bien sabe Hans Stuart, que deberá escapar por todos los medios de enemigos que fácilmente acabarán con su vida, sin que pueda casi defenderse.</span></div>
<?php }elseif($_GET["lang"] == "eng"){ ?>
        <div id="textoestacion">Death is not a game<span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Real life is fragile, as Hans Stuart knows, who will have to escape by all means from enemies who will easily end up with his life being barely able to defend himself.</span></div>
<?php }else{ ?> 
        <div id="textoestacion">Death is not a game<span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Real life is fragile, as Hans Stuart knows, who will have to escape by all means from enemies who will easily end up with his life being barely able to defend himself.</span></div>
 <?php }; ?>  

    </div>
    <div class="fondo_cinco"  >
        	<div id="huecofeatures"></div>
            <div id="huecofeaturesizquierda"></div>
 <?php if($_GET["lang"] == "spa"){ ?>
        <div id="textopuerta">¡Controla tus instintos! <span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Ayuda a Hans Stuart a luchar contra sus miedos o perderá el control y se precipitará al abismo.</span><br /><br />
        Que no escuchen tus latidos…<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Embrion: La Gran Pregunta será el primer videojuego en contar con la <a href="http://embrion.es/blog/el-sensor-b-holder-sera-adaptado-para-su-uso-en-embrion/">tecnología B-Holder</a> para potenciar la experiencia de juego y convertir cada palpitación en un riesgo mortal</span></div>

<?php }elseif($_GET["lang"] == "eng"){ ?>
         <div id="textopuerta">Control your instincts!<span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Help Hans Stuart to fight againt his fears or he will lose control and will descend down into the abyss.</span><br /><br />
        Don't let them listen to your pain…<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Embrion: The Big Question will be the first videogame to be created with <a href="http://embrion.es/blog/el-sensor-b-holder-sera-adaptado-para-su-uso-en-embrion/">B-Holder technology</a> to enhance the game experience and convert every palpitation in a mortal risk.</span></div>

<?php }else{ ?> 
        <div id="textopuerta">Control your instincts!<span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Help Hans Stuart to fight againt his fears or he will lose control and will descend down into the abyss.</span><br /><br />
        Don't let them listen to your pain…<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Embrion: The Big Question will be the first videogame to be created with <a href="http://embrion.es/blog/el-sensor-b-holder-sera-adaptado-para-su-uso-en-embrion/">B-Holder technology</a> to enhance the game experience and convert every palpitation in a mortal risk.</span></div>

 <?php }; ?> 

</div>
	<div id="wowslider-container1">
    <div class="posicion"  id="destino3"></div>

	<div class="ws_images">    <ul>
<li><img src="img/slide1.jpg" alt="slide1" title="" id="wows1_0"/></li>
<li><img src="img/slide2.jpg" alt="slide2" title="" id="wows1_1"/></li>
<li><img src="img/slide3.jpg" alt="slide3" title="" id="wows1_2"/></li>
<li><img src="img/slide4.jpg" alt="slide4" title="" id="wows1_3"/></li>
<li><img src="img/slide5.jpg" alt="slide5" title="" id="wows1_4"/></li>
</ul></div>

 <?php if($_GET["lang"] == "spa"){ ?>
      	<div id="textogaleria">Lo artístico del horror<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />
Cada criatura del universo Embrion tiene detrás un arduo trabajo de diseño y localización,<br /> creando una fauna tan impactante como terrible.</span>
        </div>
<?php }elseif($_GET["lang"] == "eng"){ ?>
        <div id="textogaleria">The artistic inspiration of the horror<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Each creature of the Embrion universe has a production backstory detailing arduous work of design and localisation,<br /> resulting in the creation of impressive visuals as well as striking fear into the player.</span>
        </div> 
<?php }else{ ?> 
        <div id="textogaleria">The artistic inspiration of the horror<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />Each creature of the Embrion universe has a production backstory detailing arduous work of design and localisation,<br /> resulting in the creation of impressive visuals as well as striking fear into the player.</span>
        </div> 
 <?php }; ?>  
<div class="ws_bullets"><div>
<a href="#" title="slide1">1</a>
<a href="#" title="slide2">2</a>
<a href="#" title="slide3">3</a>
<a href="#" title="slide4">4</a>
<a href="#" title="slide5">5</a>
</div></div>
	<div class="ws_shadow"></div>
</div>

	<script type="text/javascript" src="rsc/wowslider.js"></script>
	<script type="text/javascript" src="rsc/script.js"></script>
    <div class="fondo_seis">
     <div id="huecomision1"></div>
<?php if($_GET["lang"] == "spa"){ ?>
        <div id="textomision">Revive antiguos terrores<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />
El terror Sci-Fi alcanzó su punto óptimo, hace años, con obras como Alien o The Thing. Embrion: The Big Question se inspira en esas fórmulas y añade un intenso trabajo de guión, que apuesta por una historia intensa y madura.<br /><br /></span>
        </div>
<?php }elseif($_GET["lang"] == "eng"){ ?>
        <div id="textomision">Revive old fears<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />
  Sci-Fi terror reached its pinnacle years ago with works such as Alien and The Thing. Embrion: The Big Question is inspired by all of these previous works - as well as adding an intense script of its own which takes on both an intense and mature story.</span>
        </div> 
<?php }else{ ?> 
        <div id="textomision">Revive old fears<br /><span style="font-size:18px; line-height:5px;"><img src="img/separacionlarga.png" width="350"/><br />
  Sci-Fi terror reached its pinnacle years ago with works such as Alien and The Thing. Embrion: The Big Question is inspired by all of these previous works - as well as adding an intense script of its own which takes on both an intense and mature story.</span>
        </div> 
 <?php }; ?>   
     <div id="huecomision"></div>
<?php if($_GET["lang"] == "spa"){ ?>
        <div id="textomision"><span style="font-size:18px; line-height:5px;">Embrion es el primer gran proyecto del estudio español <a href="http://www.brainside.es">Brainside</a>, un grupo de desarrolladores<br /> multidisciplinares que busca competir en la industria creando obras de calidad, pero sobre todo, que contenten a sus creadores.</span>
        </div>
<?php }elseif($_GET["lang"] == "eng"){ ?>
        <div id="textomision"><span style="font-size:18px; line-height:5px;">Embrion is the first big project of the Spanish studio <a href="http://www.brainside.es">Brainside</a>, a group of multidisciplinary developers<br /> who are seeking a route to compete in the industry by creating works of quality, but above all - works which satisfy its creators.</span>
        </div> 
<?php }else{ ?> 
        <div id="textomision"><span style="font-size:18px; line-height:5px;">Embrion is the first big project of the Spanish studio <a href="http://www.brainside.es">Brainside</a>, a group of multidisciplinary developers<br /> who are seeking a route to compete in the industry by creating works of quality, but above all - works which satisfy its creators.</span>
        </div> 
 <?php }; ?>       
    </div>
    <div class="footer">
    <div id="logos">

    <a alt="Brainside presenta Embrion, un survival horror made in Spain" class="tooltip" href="http://www.hardgame2.com/pc/noticia/73324/brainside-presenta-embrion-un-survival-horror-made-in-spain.html" target="_blank">
    <img src="img/hardgame2.jpg" width="10%"/></a>&nbsp;&nbsp;
    <a alt="Embrion, lo más ambicioso del crowdfunding español" class="tooltip" href="http://www.hobbyconsolas.com/videos/embrion-mas-ambicioso-crowdfunding-espanol-47857" target="_blank">
    <img src="img/hobbyconsolas.png" width="10%"/></a>&nbsp;&nbsp;
    <a alt="La ciencia ficción tiene un nuevo nombre: Embrión" class="tooltip" href="http://es.ign.com/news/4676/ciencia-ficcion-tiene-nuevo-nombre-embrion" target="_blank">
    <img src="img/ign.png" width="7%"/></a>&nbsp;&nbsp;
    <a alt="Anunciado Embrion: The Big Question, una aventura de terror espacial para PC" class="tooltip" href="http://www.3djuegos.com/noticia/130886/0/embrion-the-big-question/juego-survival-espacial/estudio-espanol-brainside/" target="_blank">
    <img src="img/3djuegos.png" width="10%"/></a>&nbsp;&nbsp;
    <a alt="Desde el Aula de Videojuegos, nace Embrion: The Big Question" class="tooltip" href="http://www.mundogamers.com/noticia-desde-el-aula-de-videojuegos-nace-embrion-the-big-question.1695.html" target="_blank">
    <img src="img/gamers.png" width="10%"/></a>&nbsp;&nbsp;
    <a alt="Nace el proyecto de crowdfunding más ambicioso en España" class="tooltip" href="http://www.guiltybit.com/articulos/nace-el-proyecto-de-crowdfunding-mas-ambicioso-en-espana/" target="_blank">
    <img src="img/guiltibit.png" width="7%"/></a>
    </div>
    <div id="copy">
<?php if($_GET["lang"] == "spa"){ ?><br />
Los logos y marcas utilizadas son propiedad de sus respectivos dueños.<br />
Todo el contenido de este sitio y sus diferentes directorios están protegidos.<br />
Logotipos, iconos y patentes concepto pendiente.<br />
Embrion es un proyecto de <a href="http://brainside.es">Brainside Studio.</a> - <a href="politica.php">Politica de privacidad.</a>
<?php }elseif($_GET["lang"] == "eng"){ ?><br />
The logos and trademarks used are properties of their respective owners.<br />
All content of this site and its different directories are protected.<br />
Logos, icons and patent pending concept.<br />
Embrion is a project of <a href="http://brainside.es">Brainside Studio.</a> - <a href="politica.php">Privacy Policy</a>
<?php }else{ ?><br />
The logos and trademarks used are properties of their respective owners.<br />
All content of this site and its different directories are protected.<br />
Logos, icons and patent pending concept.<br />
Embrion is a project of <a href="http://brainside.es">Brainside Studio.</a> - <a href="politica.php">Privacy Policy</a>
 <?php }; ?>    - v0.7 beta
    </div>
    <div id="creditos" align="right">
    <a href="http://cantelymedia.com" target="_blank">
    <img src="img/cantelymedia.jpg" width="27%"/></a>&nbsp;&nbsp;&nbsp;
    <a href="http://brainside.es" target="_blank">
    <img src="img/brainside.jpg" width="27%"/></a></div>
    </div>
			<nav id="primary"></nav>
            	<article id="manned-flight">
					<nav class="next-prev"></nav>
				</article>
                <article id="frameless-parachute">
					<nav class="next-prev"></nav>
				</article>
				<article id="english-channel">
					<nav class="next-prev"></nav>
				</article>
				<article id="about">
					<nav class="next-prev"></nav>
				</article>
			<!-- Parallax foreground -->
			<div id="parallax-bg3">
				<!--<img id="bg3-1" src="img/balloon.png"  alt="niebla"/>-->
				<img id="bg3-2" src="img/balloon2.png"  width="400" alt="niebla"/>
				<img id="bg3-3" src="img/balloon3.png"  width="600" alt="niebla"/>
				<img id="bg3-4" src="img/balloon3.png"  width="400" height="400" alt="niebla"/>
			</div>
			<!-- Parallax  midground  -->
			<div id="parallax-bg2">
				<!--<img id="bg2-1" src="img/cloud-lg1.png" alt="cloud"/>-->
				<!--<img id="bg2-2" src="img/balloon2.png" width="600" alt="niebla"/>-->
				<img id="bg2-3" src="img/balloon2.png" width="800" alt="niebla"/>-->
				<img id="bg2-4" src="img/balloon2.png" width="600" alt="niebla"/>
				<!--<img id="bg2-5" src="img/balloon2.png" width="800" alt="niebla"/>-->
			</div>
			<!-- Parallax  background -->
			<div id="parallax-bg1">
				<!--<img id="bg1-1" src="img/balloon.png" alt="cloud"/>-->
				<!--<img id="bg1-2" src="img/balloon.png" alt="cloud"/>-->
				<!--<img id="bg1-3" src="img/balloon.png" alt="cloud"/>-->
				<!--<img id="bg1-4" src="img/balloon.png" alt="cloud"/>-->
			</div>

<div id="dialog-form" title="Register" style="z-index:9999999999;" >
      <form>
        <fieldset>
            <label for="name">User name:</label>
            <input type="text" name="user" id="user" class="text ui-widget-content ui-corner-all" />
            <label for="email">Email:</label>
            <input type="text" name="mail" id="mail" value="" class="text ui-widget-content ui-corner-all" />
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
            <spam style="font-size:10px">By registering, you are accepting the <a target="_blank" href="politica.php">privacy policy</a>.</spam>
         </fieldset>
      </form>
      <div id="mensaje"></div>
      <p class="validateTips" style="font-size:10px; color:red">All form fields are required.</p>
</div>

      <div id="cookie"><br>
        <p>
        Este sitio usa cookies para mejorar la experiencia de navegación y uso de la web.  
         <a id="cookieCerrar" href="#"> Aceptar</a></p>
      </div>
<?php if($_GET["validar"] == "true"){ ?>
      <div id="usuarioValidado"><br>
        <p>
        Acabas de validar tu cuenta, muchas gracias ya puedes hacer login.
         <a id="cerrarValido" href="#"> Cerrar</a>.</p>
      </div>
<?php } ?>
      <div id="logininterior">
        <div id="mensaje2"></div>
            <form method="POST">
                
                User name:<input type="text" name="maillogin" id="maillogin" value="" class="text ui-widget-content ui-corner-all" style="width:150px;">
                Password:<input type="password" name="passwordlogin" id="passwordlogin" value="" class="text ui-widget-content ui-corner-all" style="width:150px">
                <div id="login2" value="Login" />log in</div><br>
                <a id="recuerdapass" href="#" style="font-size:9px">remember password or user?</a>
                 
            </form>
            
      </div> 
<div id="recordarpass" title="remember password or user?">
    Email:<input type="text" name="recordarlogin" id="recordarlogin" value="" class="text ui-widget-content ui-corner-all" style="width:150px">
    <div id="recordarlogin" value="remember" />remember</div><br>
    <div id="mensaje3"></div>
</div>
    <div id="perfil" ></div>     
    <div id="blog" ></div>   
    <div id="contacto" ></div>   
</body>
</html>
        <script type="text/javascript">

var recuerdapassword = $(function() {
    $( "div#recordarpass" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 80
      },
      hide: {
        effect: "blind",
        duration: 80
      }
    });
 
    $( "a#recuerdapass" ).click(function() {
      $( "div#recordarpass" ).dialog( "open" );
    });
  });





            var video = $.cookie('video');
            var aviso = $.cookie('aviso');
            var logeado = $.cookie('logeado');
            
           if( logeado == 'logeado' ){
                $('span#menu1').hide();
                $('span#menu2').show();

            }else{
                $("span#menu2").hide();
            };


            if (video == 'ocultar'){
                $("#ventanaPopup1Fondo").hide();
                $("#ventanaPopup1").hide();
            }else{
                muestraVentana();
                };

            if (aviso == 'ocultar'){
                $("div#cookie").hide();
            }else{
                $("div#cookie").show();
            };


        </script>