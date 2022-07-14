<?php 
include( '../../recursos/config.php' );
$id = $_GET['id'];

$c = "DELETE FROM publicaciones WHERE ID='$id' LIMIT 1";
mysqli_query($cnx, $c);
header("Location: ../index.php?sec=post");
?>