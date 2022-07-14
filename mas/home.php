<div id="home">

<?php

$c = 'SELECT * fROM publicaciones';

$id_f = isset($_GET['filtro']) ? $_GET['filtro'] : 0;

if($id_f <= 0 || $id_f >= 12){	
	$filtro1 = '';
}else{
	$filtro1 = 'WHERE FKCATEGORIA = '.$id_f.'';
}

$c = <<<SQL
SELECT 
	p.ID,
	TITULO,
	p.FECHA_ALTA,
	CONTENIDO,
	CATEGORIA,
	IFNULL( CONCAT(APELLIDO,' ', NOMBRE), SUBSTRING_INDEX(EMAIL,'@', 1) ) AS USER
FROM 
	publicaciones AS p
	LEFT JOIN categorias AS c ON p.FKCATEGORIA = c.IDC 
	LEFT JOIN usuarios AS u ON p.FKAUTOR = u.ID
 $filtro1
ORDER BY
	p.FECHA_ALTA DESC
SQL;
$f = mysqli_query($cnx, $c);
$cant = mysqli_num_rows($f);

while ($a = mysqli_fetch_assoc($f)){
	echo '<a href="index.php?sec=posteo&id='.$a['ID'].'">';
		echo '<article>';
			echo '<div>';
				echo "<h2>$a[TITULO]</h2>";
				echo "<div><p class='chico'>Posteado por: <strong>$a[USER]</strong> el $a[FECHA_ALTA]</p>";
				echo "<p class='mini'>$a[CATEGORIA]</p></div>";
				echo "<p>$a[CONTENIDO]</p>";
			echo '</div>';
		echo '</article>';
	echo "</a>";
	echo "<br>";
}
?>
</div>