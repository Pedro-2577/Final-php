<?php 
session_start( );
session_destroy( );
include( '../recursos/config.php' );


$mail = trim( $_POST['email'] );
$clave = trim( $_POST['clave'] );

$c = <<<SQL
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
	EMAIL='$mail' AND
	CLAVE=SHA1('$clave')
LIMIT 1
SQL;

$f = mysqli_query($cnx, $c);
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

?>