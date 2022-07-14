<?php 
	include( '../recursos/config.php' );
	$_SESSION['ERROR'] = 'Ese usuario no existe';
	header("Location: ../index.php");
?>