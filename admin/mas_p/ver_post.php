<?php
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
SQL;
$f = mysqli_query($cnx, $c);
?>

<h2>Lista de posteos</h2>

<table border="1">
	<thead>
		<tr>
			<th>TITULO</th>
			<th>FECHA DE PUBLICACION</th>
			<th>CATEGORIA</th>
			<th>AUTOR</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	while( $a = mysqli_fetch_assoc($f) ){
	?>
		<tr>
			<td><?php echo $a['TITULO']; ?></td>
			<td><?php echo $a['FECHA_ALTA']; ?></td>
			<td><?php echo $a['CATEGORIA']; ?></td>
			<td><?php echo $a['USER']; ?></td>
			<td><a style="color: #f51616;" href="mas_p/borrar_post?id=<?php echo $a['ID']; ?>">BORRAR</a></td>
		</tr>
	<?php
		}
	?>
	</tbody>
</table>