<?php
include( '../../recursos/config.php' );

$id = $_GET['id'];
$baneo = $_GET['baneo'];

var_dump($_GET);

if ($baneo == 0){
	$baneo = 1;
}else{
	$baneo = 0;	
}

echo $baneo;

$c = "UPDATE usuarios SET BANEO='$baneo' WHERE ID='$id' LIMIT 1";
mysqli_query($cnx, $c);
mysqli_error($cnx);
header("Location: ../index.php?sec=user");

?>