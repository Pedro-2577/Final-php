<?php
include( '../recursos/funciones.php' );
include( '../recursos/config.php' );

var_dump($_POST);
var_dump($_FILES);

$nombre = trim( $_POST['nombre'] );
$apellido = trim( $_POST['apellido'] );
$email = trim( $_POST['email'] );
$clave = trim( $_POST['clave'] );

$img = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];



	$reNom = "/^[a-znÑ]+$/";
	$reMail = "/\w+@\w+\.{1}[a-z]/";
	$reClave = "/\w{4}/";
	$reEdad = "/(18|150)/";
	//nombre
	if (!$nombre == ""){
		if (!preg_match($reNom, $nombre)){
			echo "error nombre ";
			echo preg_match($reNom, $nombre);
			header("Location: ../index.php?sec=crear&error=true");
			echo "</br>";		
		}
	}
	//apellido
	if (!$apellido == ""){
		if (!preg_match($reNom, $apellido)){
			echo "error apellido ";
			echo preg_match($reNom, $apellido);
			header("Location: ../index.php?sec=crear&error=true");
			echo "</br>";		
		}
	}
	//email
	if (!preg_match($reMail, $email)){
			echo "error mail ";
			echo preg_match($reMail, $email);
			header("Location: ../index.php?sec=crear&error=true");
			echo "</br>";	
	}
	//clave
	if (!preg_match($reClave, $clave)){
			echo "error clave ";
			echo preg_match($reClave, $clave);
			header("Location: ../index.php?sec=crear&error=true");
			echo "</br>";	
	}


if ($_FILES['foto']['size'] == 0){
	$foto = 'sin_img.jpg';
}else{
	$foto = nombre_foto($_FILES['foto']['name'], $email);
	guardar_img($img, $tmp, $email);
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
	AVATAR = '$foto',
	FKSEXO = '$genero',
	BANEO='1',
	NIVEL='user'
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
	AVATAR = '$foto',
	FKSEXO = NULL,
	BANEO='1',
	NIVEL='user'
SQL;
}


echo "</br>";
mysqli_query($cnx, $c);

if (mysqli_error($cnx)) {
	echo "error";
	header("Location: ../index.php?sec=crear&error=true");
}else{

$c2 = <<<SQL
SELECT
	ID,
	IFNULL( CONCAT(APELLIDO,' ', NOMBRE), SUBSTRING_INDEX(EMAIL,'@', 1) ) AS NOMBRE,
	NOMBRE AS NOMBRE_REAL,
	EMAIL,
	FECHA_ALTA,
	NIVEL,
	BANEO,
	AVATAR
FROM
	usuarios
WHERE 
	EMAIL='$email' AND
	CLAVE=SHA1('$clave')
LIMIT 1
SQL;

$f = mysqli_query($cnx, $c2);
$a = mysqli_fetch_assoc($f);
if($a){
	if( $a['BANEO'] == 0 ){
		$_SESSION['ERROR'] = 'Cuenta desactivada';
	}else{
		$_SESSION = $a;
	}
}else{
	$_SESSION['ERROR'] = 'Mal usuario o clave';
}	
	

	header("Location: ../index.php");
}
?>