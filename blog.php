<!DOCTYPE html>
<html>
<head>
	<script>
$("span#cerrarPerfiljquery")
    .click(function(){ 
        $("div#blog").slideUp();
});

</script>
</head>
<body>

<?php
// Include Wordpress 
define('WP_USE_THEMES', false);
include('../blog/wp-blog-header.php');

?>
<div id="cerrarPerfil"><span id="cerrarPerfiljquery" class="ui-icon ui-icon-circle-close"></span></div>
<div id="blogIzquierda" style="width:60%; height:100%; float:left; margin-left:50px;">
<br>Latest blog posts:
	<?php query_posts('showposts=3'); ?>
	<?php while (have_posts()): the_post(); ?>
	<div style="background-color:rgba(204,204,204,0.25)">
		<a href="<?php the_permalink() ?>" target="_blank" rel="bookmark" class="titulopost"><h1><?php the_title(); ?></a></h1>
		<article style="font-size: 11px">
		<div style="float:left; width:7%;margin-left:5px;"><?php if ( has_post_thumbnail() ) {
	the_post_thumbnail(array(50,50)); }  ?></div>
	<div style="float:left; width:91%;margin-right:5px;"><?php the_excerpt(); ?></div></article>
		<p align="right" style="font-size: 10px"><?php comments_popup_link('no comments', '1 comments', '% comments'); ?> | <a href="<?php the_permalink(); ?>">Read more...</a></p>
	</div>
	<?php endwhile; ?>
	
</div>
<div id="blogderecha"style="width:30%; height:100%; float:right;">
	<br>Archive:<br>
		<span face="" style="font-size: 12px">
			<p align="right"> 
				<?php wp_list_categories('title_li=0&orderby=name&show_count=1'); ?>
			</p>
		</span>
		<br><span style="font-size:16px text-align:center"><a href="http://embrion.es/blog">to blog</a></span>
</div>

</body>
</html>
