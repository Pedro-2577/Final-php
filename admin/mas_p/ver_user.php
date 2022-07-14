<?php

$c = <<<SQL
SELECT
	ID,
	IFNULL(NOMBRE, '------') AS NOMBRE,
	IFNULL(APELLIDO, '------') AS APELLIDO,
	EMAIL,
	NIVEL,
	IFNULL(SEXO, '------') AS SEXO,
	BANEO
FROM 
	Usuarios AS u
	LEFT JOIN sexos AS s ON u.FKSEXO = s.IDS
SQL;

$f = mysqli_query($cnx, $c);
?>

<h2>Lista de usuarios</h2>

<p>* clickea en NIVEL o en BANEO para cambiar su valor</p>

<a href="index.php?sec=form">+ Agregar usuario</a>

<table border="1">
	<thead>
		<tr>
			<th>NOMBRE</th>
			<th>APELLIDO</th>
			<th>EMAIL</th>
			<th>NIVEL</th>
			<th>SEXO</th>
			<th>BANEO</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	while( $a = mysqli_fetch_assoc($f) ){
	?>
		<tr>
			<td><?php echo $a['NOMBRE']; ?></td>
			<td><?php echo $a['APELLIDO']; ?></td>
			<td><?php echo $a['EMAIL']; ?></td>
			<td><a href="mas_p/cambiar_lvl?id=<?php echo $a['ID']; ?>&nivel=<?php echo $a['NIVEL']; ?>"><?php echo $a['NIVEL']; ?></a></td>
			<td><?php echo $a['SEXO']; ?></td>
			<td><a href="mas_p/cambiar_ban?id=<?php echo $a['ID']; ?>&baneo=<?php echo $a['BANEO']; ?>"><?php echo $a['BANEO']; ?></a></td>
			<td><a style="color: #f51616;" href="mas_p/borrar?id=<?php echo $a['ID']; ?>">BORRAR</a></td>
		</tr>
	<?php
		}
	?>
	</tbody>
</table>