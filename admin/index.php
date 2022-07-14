<?php

include( '../recursos/arrays.php' );
include( '../recursos/funciones.php' );
include( '../recursos/config.php' );

$url = isset($_GET['sec']) ? $_GET['sec'] : 'home';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Forojoro</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/icono.ico" />
	<link rel="stylesheet" href="../recursos/estilos.css" />
</head>
<body>

<?php
	if (isset($_SESSION['ID'])){
	if ($_SESSION['NIVEL'] == 'admin'){
?>

	<header>
		<h1><a href='../index.php?sec=home'>Forojoro</a></h1>

		<nav>
			<ul>
				<li><a href='index.php?sec=user'>Usuarios</a></li>
				<li><a href='index.php?sec=post'>Publicaciones</a></li>
				<li><a href='../index.php?sec=perf'><?php echo $_SESSION['NOMBRE']; ?></a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<?php 

				switch($url){
					case 'home':
						include( 'mas_p/home.php' );
					break;
					case 'form':
						include( 'mas_p/agregar_user.php' );
					break;
					case 'user':
						include( 'mas_p/ver_user.php' );
					break;
					case 'post':
						include( 'mas_p/ver_post.php' );
					break;
					default:
						echo '<p>la url '.$url.' no es correcta, te rediccionamos a la home del panel.</p>';
						include( 'mas_p/home.php' );	
					
				}

			?>
		</section>
	</main>

<?php
}else{
?>
	<p>Esats logeado con una cuenta que no es de admin, porfavor <a href="../index.php?sec=log" style="color: blue;">inicia secion</a> con una caunta de administrador</p>
<?php	
}


}else{
?>
	<p>Para poder ver/usar el panel necesitas <a href="../index.php?sec=log" style="color: blue;">iniciar secion</a> con una caunta de administrador</p>
<?php
}
?>

</body>
</html>