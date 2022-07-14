<?php
$validador = isset($_GET['id']) ? $_GET['id'] : '0';

if (!is_numeric($validador)){
	$validador = '0';
}

$c4 = "SELECT ID FROM usuarios WHERE ID = $validador";
$f4 = mysqli_query($cnx, $c4);
$a4 = mysqli_fetch_assoc($f4);
if($a4 != ''){

$id = $validador;
$c = <<<SQL
SELECT 
	ID,
	IFNULL( CONCAT(APELLIDO,' ', NOMBRE), SUBSTRING_INDEX(EMAIL,'@', 1) ) AS USER,
	EMAIL,
	FECHA_ALTA,
	AVATAR
FROM 
	usuarios
WHERE 
	ID='$id'
LIMIT 1;
SQL;

$f = mysqli_query($cnx, $c);
$a = mysqli_fetch_assoc($f);
?>
	<h2 class="center">Datos del usuario</h2>
<article id="ver_user">
		<div>
 <?php

			$er = "/^.+\.(jpg|jpeg|png)$/i";
			$rta = preg_match($er, $a['AVATAR']);
	if($rta){


	?>
		<img src="img_p/<?php echo $a['AVATAR'] ?>" alt="<?php echo $a['USER'] ?> ">
 <?php
 	}
 	else{
 ?>
 		<video 	width="300" height="300" src="img_p/<?php echo $a['AVATAR'] ?>"></video>
				
 <?php
 	}
 ?>
		</div>
		<div>
			<p>Nombre: <?php echo $a['USER'] ?></p>
			<p>Fecha de creacion: <?php echo $a['FECHA_ALTA'] ?></p>
			<div>
				<h3>Posteos del usuario</h3>
				<?php 

				$c2 = "SELECT * FROM publicaciones WHERE FKAUTOR = $id"; 
				$f2 = mysqli_query($cnx, $c2);
				$a2 = mysqli_fetch_assoc($f2);

				if ($a2['ID']) {
					?> <ul> <?php
				$c3 = "SELECT * FROM publicaciones WHERE FKAUTOR = $id"; 
				$f3 = mysqli_query($cnx, $c3);
				while ($a3 = mysqli_fetch_assoc($f3)) {	
					echo '<li style=" border: black solid 2px; padding: 3px; background: lightgray; margin: 7px 0;" ><a href="index.php?sec=posteo&id='.$a3['ID'].'">'.$a3['TITULO'].'</a></li>';
					}
					?> </ul> <?php 
				}else{
					echo "<p>Este usuario no tiene posteos</p>";
				}
				?>
			</div>
		</div>
<?php
}else{
	header("Location: mas_a/error.php");
}


?>
</article>