<h2>Crear cuenta</h2>

<form id="form_ini" method="post" action="mas_a/registro.php" enctype="multipart/form-data" onsubmit="return validar();">
	<div><span>Nombre</span><input type="text" name="nombre" /></div>
	<div><span>Apellido</span><input type="text" name="apellido" /></div>
	<div><span>Email</span><input type="email" name="email"  /></div>
	<div><span>Clave</span><input type="password" name="clave" /></div>
	<div><span>edad</span><input type="text" name="edad" /></div>
	<div><span>Avatar (opcional)</span><input name="foto" type="file" /></div>

	<div><span>Sexo:</span></div>
			<div><input name="genero" id="m" value="1" type="radio" /><label for="m"> Hombre</label></div>
			<div><input name="genero" id="h" value="2" type="radio" /><label for="h"> Mujer</label></div>
			<div><input name="genero" id="t" value="3" type="radio" /><label for="t"> Otros</label></div>
	<div><input type="submit" value="Registrarme" /></div>
</form>
<div><p id="msj"></p></div>
<script src="recursos/validar.js"></script>
