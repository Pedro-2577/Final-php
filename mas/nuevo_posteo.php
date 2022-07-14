<?php
	if (isset($_SESSION['ID'])){
?>
<h2>Nuevo Posteo</h2>

<form method="post" action="mas_a/new_post.php" enctype="application/x-www-form-urlencoded">
	<div><span>Titulo</span><input type="text" name="titulo" required/></div>
	<input type="hidden" name="id" value='<?php echo $_SESSION['ID']; ?>'>
	<div><span>Categoria:</span></div>
			<div><input name="categoria" id="cat1"  value="1"  type="radio" /><label for="cat1">Cocina</label></div>
			<div><input name="categoria" id="cat2"  value="2"  type="radio" /><label for="cat2">Cine</label></div>
			<div><input name="categoria" id="cat3"  value="3"  type="radio" /><label for="cat3">Videojuegos</label></div>
			<div><input name="categoria" id="cat4"  value="4"  type="radio" /><label for="cat4">Anime</label></div>
			<div><input name="categoria" id="cat5"  value="5"  type="radio" /><label for="cat5">Literatura</label></div>
			<div><input name="categoria" id="cat6"  value="6"  type="radio" /><label for="cat6">Conspiraciones</label></div>
			<div><input name="categoria" id="cat7"  value="7"  type="radio" /><label for="cat7">Programacion</label></div>
			<div><input name="categoria" id="cat8"  value="8"  type="radio" /><label for="cat8">Turismo</label></div>
			<div><input name="categoria" id="cat9"  value="9"  type="radio" /><label for="cat9">Animales</label></div>
			<div><input name="categoria" id="cat10" value="10" type="radio" /><label for="cat10">Medicina</label></div>
			<div><input name="categoria" id="cat11" value="11" type="radio" checked /><label for="cat11">Otro</label></div>

	<div><span>Cuerpo: </span><textarea rows="10" cols="60" name="contenido" required></textarea></div>

	<div><input type="submit" value="Publicar" /></div>
</form>
<?php
}else{
?>
	<p>Para postar necesitas <a href="index.php?sec=log" style="color: blue;">iniciar sesion</a></p>
<?php
}
?>