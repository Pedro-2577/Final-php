<div id="ver_post">
<?php

$validador = isset($_GET['id']) ? $_GET['id'] : '0';

if (!is_numeric($validador)){
	$validador = '0';
}

$c4 = "SELECT ID FROM publicaciones WHERE ID = $validador";
$f4 = mysqli_query($cnx, $c4);
$a4 = mysqli_fetch_assoc($f4);
if($a4 != ''){

$id = $validador;

$c = <<<SQL
SELECT 
	p.ID,
	TITULO,
	p.FECHA_ALTA,
	CONTENIDO,
	u.ID AS URL2,
	CATEGORIA,
	IFNULL( CONCAT(APELLIDO,' ', NOMBRE), SUBSTRING_INDEX(EMAIL,'@', 1) ) AS USER
FROM 
	publicaciones AS p
	LEFT JOIN categorias AS c ON p.FKCATEGORIA = c.IDC 
	LEFT JOIN usuarios AS u ON p.FKAUTOR = u.ID
WHERE
	p.ID = $id
SQL;

$f = mysqli_query($cnx, $c);
$ap = mysqli_fetch_assoc($f);

		echo '<div id="div_post">';
			echo "<h2>$ap[TITULO]</h2>";
			echo '<div><p class="chico">Posteado por: <a href="index.php?sec=user&id='.$ap['URL2'].'"><strong>'.$ap['USER'].'</strong></a> el '.$ap['FECHA_ALTA'].'</p>';
			echo "<p class='mini'>$ap[CATEGORIA]</p></div>";	
			echo "<p>$ap[CONTENIDO]</p>";
		echo '</div>';

echo '<h3>Comentarios:</h3>';

$c_coments = <<<SQL
SELECT 
	IDREL,
	COMENTARIO,
	rel.FECHA_ALTA,
	u.ID AS URL,
	IFNULL( CONCAT(u.APELLIDO,' ', u.NOMBRE), SUBSTRING_INDEX(u.EMAIL,'@', 1) ) AS AUTOR
FROM 
	rel_pubg_user_comentario as rel
	LEFT JOIN publicaciones AS p ON rel.FKPUBLICAION = p.ID 
	LEFT JOIN usuarios AS u ON rel.FKUSUARIO = u.ID
WHERE
	rel.FKPUBLICAION = $id
SQL;
$f_coments = mysqli_query($cnx, $c_coments);
mysqli_error($cnx);
echo '<div id="coments">';
while ($a = mysqli_fetch_assoc($f_coments)){
echo "<article class='com'>";
	echo '<h4><a href="index.php?sec=user&id='.$a['URL'].'">'.$a['AUTOR'].'</a></h4>';
	echo "<p class='mini_com'>$a[FECHA_ALTA]</p>";
	echo "<p>$a[COMENTARIO]</p>";
echo "</article>";
}
echo '</div>';

if (isset($_SESSION['ID'])){
?>
	<form method="post" action="mas_a/new_comentario.php" enctype="application/x-www-form-urlencoded">

	<input type="hidden" name="id_publicacion" value='<?php echo $id; ?>'>
	<input type="hidden" name="id_usuario" value='<?php echo $_SESSION['ID']; ?>'>

	<div id="btn"><span>Comentar: </span><input type="submit" value="Comentar" /></div>
	<div><textarea rows="10" cols="60" name="comentario" required></textarea></div>

	</form>
<?php
}else{
	echo "<p>Si queres comentar tenes que <a href='index.php?sec=log' style='color: blue;'>iniciar secion</a></p>";
}

}else{
	header("Location: mas_a/error_post.php");
}
?>
</div>