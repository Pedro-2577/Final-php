<?php 
	include( '../recursos/config.php' );
	$_SESSION['ERROR'] = 'Ese posteo no existe';
	header("Location: ../index.php");
?>