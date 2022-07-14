<?php 
include( '../../recursos/config.php' );
$id = $_GET['id'];

$c_img="SELECT AVATAR FROM usuarios WHERE ID = '$id'";
$f = mysqli_query($cnx, $c_img);
$a = mysqli_fetch_assoc($f);
var_dump($a);
echo "<br>";
echo $a['AVATAR'];


		if ($a['AVATAR'] != 'sin_img.jpg'){
		echo "<br>";
		echo "ecntro";
		unlink("../../img_p/$a[AVATAR]");

}


$c = "DELETE FROM usuarios WHERE ID='$id' LIMIT 1";
mysqli_query($cnx, $c);
header("Location: ../index.php?sec=user");
?>