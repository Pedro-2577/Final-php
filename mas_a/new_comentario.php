<?php
include( '../recursos/config.php' );

var_dump($_POST);

$id_publicacion = $_POST['id_publicacion'];
$id_usuario     = $_POST['id_usuario'];
$comentario     = $_POST['comentario'];

$c = <<<SQL
INSERT INTO 
	rel_pubg_user_comentario
SET
	FKPUBLICAION ='$id_publicacion',
	FKUSUARIO    ='$id_usuario',
	COMENTARIO   ='$comentario',
	FECHA_ALTA   =NOW()
SQL;

mysqli_query($cnx, $c);

$apa = 'SELECT FKPUBLICAION FROM rel_pubg_user_comentario ORDER BY FECHA_ALTA DESC LIMIT 1';
$f = mysqli_query($cnx, $apa);
$a = mysqli_fetch_assoc($f);
header("Location: ../index.php?sec=posteo&id=$a[FKPUBLICAION]")
?>