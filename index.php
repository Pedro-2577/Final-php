<?php

include( 'recursos/arrays.php' );
include( 'recursos/funciones.php' );
include( 'recursos/config.php' );

$url = isset($_GET['sec']) ? $_GET['sec'] : 'home';

$cUser = <<<SQL
SELECT 
	ID,
	FECHA_ALTA,
	IFNULL( CONCAT(APELLIDO,' ', NOMBRE), SUBSTRING_INDEX(EMAIL,'@', 1) ) AS USER
FROM 
	Usuarios
ORDER BY FECHA_ALTA DESC 
LIMIT 5;
SQL;
	
	$fUser = mysqli_query($cnx, $cUser);
	echo mysqli_error($cnx);


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Forojoro</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/icono.ico" />
	<link rel="stylesheet" href="recursos/estilos.css" />
</head>
<body>
	<header>
		<h1><a href='index.php?sec=home'>Forojoro</a></h1>

		<nav>
			<ul>
				<li><a href='index.php?sec=home'>Home</a></li>
				<li><a href='index.php?sec=trend'>Popular</a></li>
				<li><a href='index.php?sec=new_p'>Postear</a></li>
				<li><a href='mas/nosotros.html'>Acerca del sitio</a></li>
				<?php
				if (isset( $_SESSION['ID']) ) {
				?>
				<li><a href='index.php?sec=perf'><?php echo $_SESSION['NOMBRE']; ?></a></li>
				<?php }else{ ?>
				<li><a href='index.php?sec=log'>Iniciar sesion</a></li>
				<?php } 
				?>
			</ul>
		</nav>
	</header>
	<main>
		<section id="izquierda">
			<?php 

				switch($url){
					case 'home':
						include( 'mas/home.php' );
					break;
					case 'posteo':
						include( 'mas/ver_post.php' );
					break;					
					case 'perf':
						include( 'mas/ver_perfil.php' );
					break;
					case 'log':	 
						include( 'mas/user_logear.php' );
					break;
					case 'crear':	 
						include( 'mas/user_crear.php' );
					break;
					case 'new_p': 	 
						include( 'mas/nuevo_posteo.php' );
					break;
					case 'trend':
						include( 'mas/populares.php' );
					break;
					case 'user': 	 
						include('mas/ver_user.php');
					break;
					case 'edit':
						include( 'mas/editar_perfil.php' );
					break;
					default:
						echo '<p>la url '.$url.' no es correcta, te rediccionamos a la home.</p>';
						include( 'mas/home.php' ); 	// Temporal		
					
				}

			?>
		</section>
		<section id="derecha">
			<article>
				<?php
				if (!isset( $_SESSION['ERROR']) == '' ) {
					echo "<p class='error'>$_SESSION[ERROR]</p>";
					unset( $_SESSION['ERROR'] );
				}

					$cPost = 'SELECT * FROM categorias ORDER BY IDC';
					$fPost = mysqli_query($cnx, $cPost);

				?>
				<div>
					<h2>Categorias</h2>
					<ul>
						<?php
							while ($aPost = mysqli_fetch_assoc($fPost)){
								echo '<li><a href="index.php?sec=home&filtro='.$aPost['IDC'].'">'.$aPost['CATEGORIA'].'</a></li>';	
							}
						?>
					</ul>
				</div>
				<!--<div class="add">
					<img src="img/publicidad2" alt="cablevion flow">
				</div>-->
			</article>
			<article>
 				<div>
					<h2>Usuarios recientes</h2>
					<ol>
						<?php
							while ($aUser = mysqli_fetch_assoc($fUser)){
								echo '<li><a href="index.php?sec=user&id='.$aUser['ID'].'">'.$aUser['USER'].'</a></li>';	
							}
						?>
					</ol>
				</div>
				<!--<div class="add">
					<img src="img/publicidad1" alt="silkchain.io">
				</div>-->
			</article>
		</section>
	</main>

</body>
</html>