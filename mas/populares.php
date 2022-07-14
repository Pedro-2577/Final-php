<div id="home">

<?php

$c = 'SELECT * fROM publicaciones';

$num_actual = isset($_GET['n']) ? $_GET['n'] : 1;

$c = <<<SQL
SELECT 
	p.ID,
	count(1),
	TITULO,
	p.FECHA_ALTA,
	CONTENIDO,
	CATEGORIA,
	IFNULL( CONCAT(APELLIDO,' ', NOMBRE), SUBSTRING_INDEX(EMAIL,'@', 1) ) AS USER
FROM 
	publicaciones AS p
	LEFT JOIN categorias AS c ON p.FKCATEGORIA = c.IDC 
	LEFT JOIN usuarios AS u ON p.FKAUTOR = u.ID,
	rel_pubg_user_comentario as rel
Where 
	rel.FKPUBLICAION = p.id
Group by p.id
Order by 2 desc
SQL;
$f = mysqli_query($cnx, $c);
$cant = mysqli_num_rows($f);

while ($a = mysqli_fetch_assoc($f)){
	echo '<a href="index.php?sec=posteo&id='.$a['ID'].'">';
		echo '<article>';
			echo "<h2>$a[TITULO]</h2>";
			echo "<div><p class='chico'>Posteado por: <strong>$a[USER]</strong> el $a[FECHA_ALTA]</p>";
			echo "<p class='mini'>$a[CATEGORIA]</p></div>";
			echo "<p>$a[CONTENIDO]</p>";
		echo '</article>';
	echo "</a>";
	echo "<br>";
}
?>
</div>