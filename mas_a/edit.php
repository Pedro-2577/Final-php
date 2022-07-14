<?php
include( '../recursos/funciones.php' );
include( '../recursos/config.php' );

var_dump($_POST);

$nombre = trim( $_POST['nombre'] );
$apellido = trim( $_POST['apellido'] );
$email = trim( $_POST['email'] );
$clave = trim( $_POST['clave'] );
$id = $_SESSION['ID'];

if ($clave == ''){
	$clave = $_SESSION['CLAVE'];
}


$c = <<<SQL
UPDATE 
	usuarios
SET 
	NOMBRE=NULLIF( '$nombre', '' ),
	APELLIDO=NULLIF( '$apellido', '' ),
	EMAIL='$email',
	CLAVE=SHA1('$clave')
WHERE
	ID='$id'
SQL;


echo "</br>";
mysqli_query($cnx, $c);

if (mysqli_error($cnx)) {
	echo "error </br>";
	echo mysqli_error($cnx);
	header("Location: ../index.php?sec=log&error=true");
}
	
	mysqli_error($cnx);

	header("Location: ../index.php?sec=edit");

////////////////////////////////////////////////////////////////////// relog ///////////////////
session_destroy( );
session_start( );

$c2 = <<<SQL
SELECT
	ID,
	IFNULL( CONCAT(APELLIDO,' ', NOMBRE), SUBSTRING_INDEX(EMAIL,'@', 1) ) AS NOMBRE,
	NOMBRE AS NOMBRE_REAL,
	APELLIDO AS APELLIDO_REAL,
	EMAIL,
	FECHA_ALTA,
	NIVEL,
	CLAVE,
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


?>