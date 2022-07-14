
<h2>Crear usuario</h2>

<form id="form_ini" method="post" action="mas_p/registro.php" enctype="multipart/form-data">
	<div><span>Nombre</span><input type="text" name="nombre" /></div>
	<div><span>Apellido</span><input type="text" name="apellido" /></div>
	<div><span>Email</span><input type="email" name="email" required /></div>
	<div><span>Clave</span><input type="password" name="clave" required /></div>
	<div><span>Avatar (opcional)</span><input name="foto" type="file" /></div>

	<div><span>Nivel:</span></div>
			<div><input name="nivel" id="u" value="user" type="radio" /><label for="u">User</label></div>
			<div><input name="nivel" id="a" value="admin" type="radio" /><label for="a">Admin</label></div>	
	<div><span>Sexo:</span></div>
			<div><input name="genero" id="m" value="1" type="radio" /><label for="m">Hombre</label></div>
			<div><input name="genero" id="h" value="2" type="radio" /><label for="h">Mujer</label></div>
			<div><input name="genero" id="t" value="3" type="radio" /><label for="t">Traba</label></div>
	<div><input type="submit" value="Registrarme" /></div>
</form>