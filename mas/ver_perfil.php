<?php

?>
	<h2 class="center">Tus datos</h2>
<article id="ver_user">
		<div>
<?php

			$er = "/^.+\.(jpg|jpeg|png)$/i";
			$rta = preg_match($er, $_SESSION['AVATAR']);
	if($rta){


?>
		<img src="img_p/<?php echo $_SESSION['AVATAR'] ?>" alt="<?php echo $_SESSION['NOMBRE'] ?> ">
<?php
 	}
 	else{
?>
 		<video 	width="300" height="300" src="img_p/<?php echo $_SESSION['AVATAR'] ?>"></video>
				
<?php
 	}
?>
		</div>
		<div>
			<p>Nombre: <?php echo $_SESSION['NOMBRE'] ?></p>
			<p>Fecha de creacion: <?php echo $_SESSION['FECHA_ALTA'] ?></p>
			<a style=" border: black solid 2px; padding: 3px; background: lightgray;" href='mas_a/deslogearse.php'>Cerrar sesion</a>

			<a style=" border: black solid 2px; padding: 3px; background: lightgray;" href='index.php?sec=edit'>Editar perfil</a>
			<div>
				<h3>Tus posteos</h3>
				<ul>
				<?php 

				$c2 = "SELECT * FROM publicaciones WHERE FKAUTOR = $_SESSION[ID]"; 
				$f2 = mysqli_query($cnx, $c2);
				$a2 = mysqli_fetch_assoc($f2);

				if ($a2['ID']) {
				$c3 = "SELECT * FROM publicaciones WHERE FKAUTOR = $_SESSION[ID]"; 
				$f3 = mysqli_query($cnx, $c3);
				while ($a3 = mysqli_fetch_assoc($f3)) {
					echo '<li style=" border: black solid 2px; padding: 3px; background: lightgray; margin: 7px 0;" ><a href="index.php?sec=posteo&id='.$a3['ID'].'">'.$a3['TITULO'].'</a></li>';
					}
				}else{
					echo "<p>Este usuario no tiene posteos</p>";
				}
				?>
				</ul>
			</div>
		</div>
</article>
