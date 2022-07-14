<?php
include( '../recursos/funciones.php' );
include( '../recursos/config.php' );


var_dump($_FILES);

if ($_FILES['foto']['name'] == '') {

	if ($_FILES['foto']['size'] == 0){
		$foto = 'sin_img.jpg';
	}else{
		$foto = $_SESSION['AVATAR'];
	}


}else{

	$img = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	if ($_FILES['foto']['size'] == 0){
		$foto = 'sin_img.jpg';
	}else{
		echo $_FILES['foto']['name'];
		echo "<br/>";
		echo $_SESSION['EMAIL'];
		echo "<br/>";
		$foto = nombre_foto($_FILES['foto']['name'], $_SESSION['EMAIL']);
		guardar_img($img, $tmp, $_SESSION['EMAIL']);
	}
}

$_SESSION['AVATAR'] = $foto;
echo $foto;
echo "<br/>";
echo $_SESSION['ID'];
$id = $_SESSION['ID'];

$c = <<<SQL
UPDATE
	usuarios
SET 
	AVATAR='$foto'
WHERE
	ID='$id'
SQL;

mysqli_query($cnx, $c);

echo "</br>";

if (mysqli_error($cnx)) {
	echo "error";
	header("Location: ../index.php?sec=log&error=true");
}else{

	
	mysqli_error($cnx);

	header("Location: ../index.php?sec=edit");
}
?>