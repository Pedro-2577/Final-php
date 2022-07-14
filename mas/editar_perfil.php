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

		<form id="form_ini" method="post" action="mas_a/edit_foto.php" enctype="multipart/form-data">
			<div><span style="width: 200px;">Modificar Avatar</span><input style="display: block;" name="foto" type="file" /></div>
			<div><input type="submit" value="Editar avatar" /></div>
		</form>
<?php
 	}
 	else{
?>
 		<video 	width="300" height="300" src="img_p/<?php echo $_SESSION['AVATAR'] ?>"></video>
		
		<form id="form_ini" method="post" action="mas_a/edit_foto.php" enctype="multipart/form-data">
			<div><span style="width: 200px;">Modificar Avatar</span><input style="display: block;" name="foto" type="file" /></div>
			<div><input type="submit" value="Editar avatar" /></div>
		</form>				
<?php
 	}
?>
		</div>
		<div>
			<form id="form_ini" method="post" action="mas_a/edit.php" enctype="multipart/form-data">
				<div><span>Nombre</span><input type="text" name="nombre" value="<?php echo $_SESSION['NOMBRE_REAL'] ?>"/></div>
				<div><span>Apellido</span><input type="text" name="apellido" value="<?php echo $_SESSION['APELLIDO_REAL'] ?>"/></div>
				<div><span>Email</span><input type="email" name="email" required value="<?php echo $_SESSION['EMAIL'] ?>"/></div>
				<div><span>Clave</span><input type="password" name="clave" placeholder="Clave nueva" /></div>
				<div><input type="submit" value="Editar perfil" /></div>
			</form>

			
		</div>

</article>
