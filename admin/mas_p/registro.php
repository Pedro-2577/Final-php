<?php
include( '../../recursos/funciones.php' );
include( '../../recursos/config.php' );

var_dump($_POST);
var_dump($_FILES);

$nombre = trim( $_POST['nombre'] );
$apellido = trim( $_POST['apellido'] );
$email = trim( $_POST['email'] );
$clave = trim( $_POST['clave'] );
$nivel = isset($_POST['nivel'] ) ? $_POST['nivel'] : 'user';

$img = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

if ($_FILES['foto']['size'] == 0){
	$foto = 'sin_img.jpg';
}else{
	$foto = nombre_foto($_FILES['foto']['name'], $email);
	guardar_img_p($img, $tmp, $email);
}
echo $foto;

$valid = isset($_POST['genero']) ? $_POST['genero'] : null;

if ($valid){

$genero = $_POST['genero'];

$c = <<<SQL
INSERT INTO 
	usuarios
SET 
	NOMBRE=NULLIF( '$nombre', '' ),
	APELLIDO=NULLIF( '$apellido', '' ),
	EMAIL='$email',
	CLAVE=SHA1('$clave'),
	FECHA_ALTA=NOW( ),
	NIVEL = '$nivel', 
	AVATAR = '$foto',
	FKSEXO = '$genero',
	BANEO='1'
SQL;

}else{

$c = <<<SQL
INSERT INTO 
	usuarios
SET 
	NOMBRE=NULLIF( '$nombre', '' ),
	APELLIDO=NULLIF( '$apellido', '' ),
	EMAIL='$email',
	CLAVE=SHA1('$clave'),
	FECHA_ALTA=NOW( ),
	NIVEL = '$nivel', 
	AVATAR = '$foto',
	FKSEXO = NULL,
	BANEO='1'
SQL;
}

mysqli_query($cnx, $c);
echo $c;
	
	mysqli_error($cnx);

	header("Location: ../index.php");

?>