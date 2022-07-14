<?php
include( '../../recursos/config.php' );

$id = $_GET['id'];
$nivel = $_GET['nivel'];

var_dump($_GET);

if ($nivel == 'admin'){
	$nivel = 'user';
}else{
	$nivel = 'admin';	
}

echo $nivel;

$c = "UPDATE usuarios SET NIVEL='$nivel' WHERE ID='$id' LIMIT 1";
mysqli_query($cnx, $c);
mysqli_error($cnx);
header("Location: ../index.php?sec=user");

?>