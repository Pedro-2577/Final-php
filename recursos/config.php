<?php
session_start( );

	$bdd = 'dw3_mendez_pedro_final';
	$usuario = 'root'; 
	$clave = ''; 
	$host = 'localhost'; 

	$cnx = mysqli_connect( $host, $usuario, $clave, $bdd );
	mysqli_set_charset($cnx, 'utf8' );
?>