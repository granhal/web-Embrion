<?php include('index.php'); ?>


<?php 

session_start(); 
$_SESSION = array(); 
session_destroy(); 

//header('Location: index.php');

?>

<script>
$.removeCookie('logeado', { path: '/' });
$.removecookie('usuariologeado', { path: '/' });
$.removecookie('id', { path: '/' });

location.href = "index.php"; 
</script>