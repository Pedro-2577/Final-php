<?php
include( '../recursos/config.php' );

var_dump($_POST);

$titulo    = $_POST['titulo'];
$id        = $_POST['id'];
$categoria = $_POST['categoria'];
$contenido = $_POST['contenido'];

$c = <<<SQL
INSERT INTO 
	publicaciones
SET
	TITULO='$titulo',
	FECHA_ALTA=NOW(),
	CONTENIDO='$contenido',
	FKAUTOR='$id',
	FKCATEGORIA='$categoria'
SQL;

mysqli_query($cnx, $c);

$apa = 'SELECT ID FROM publicaciones ORDER BY FECHA_ALTA DESC LIMIT 1';
$f = mysqli_query($cnx, $apa);
$a = mysqli_fetch_assoc($f);
header("Location: ../index.php?sec=posteo&id=$a[ID]")
?>
