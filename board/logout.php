<?php 
	session_start();
	session_destroy();
	
	$prevPage = $_SERVER['HTTP_REFERER'];
 	header('Location:'.$prevPage);
 ?>
