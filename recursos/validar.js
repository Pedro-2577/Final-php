	var d = document;
//	console.log(Nombre);
//	console.log(Apellido);
//	console.log(Email);
//	console.log(Clave);

function validar(){

	var nombre = d.getElementById('form_ini').getElementsByTagName('input')[0].value;
	var apellido = d.getElementById('form_ini').getElementsByTagName('input')[1].value;
	var email = d.getElementById('form_ini').getElementsByTagName('input')[2].value;
	var clave = d.getElementById('form_ini').getElementsByTagName('input')[3].value;
	var edad = d.getElementById('form_ini').getElementsByTagName('input')[4].value;
	var msj = d.getElementById('msj');
	var mensaje = '';

	var reNom = /^[a-znÑ]+$/;
	var reMail = /\w+@\w+\.{1}[a-z]/;
	var reClave = /\w{4}/;
	var reEdad = /(18|150)/;
	//nombre
	if (!nombre == ""){
		if (!reNom.test(nombre)){
		console.log(reNom.test(nombre));
		console.log('entro al if de la re del nombre');
		mensaje += 'El campo Nombre solo puede contener letras. <br/>';
		}
	}
	//apellido
	if (!apellido == ""){
		if (!reNom.test(apellido)){
		console.log(reNom.test(apellido));
		console.log('entro al if de la re del apellido');
		mensaje += 'El campo Apellido solo puede contener letras. <br/>';
		}
	}
	//email
	if (!reMail.test(email)){
		console.log(reMail.test(email));
		console.log('entro al if de la re del mail');
		mensaje += 'El campo Email debe ser valido. <br/>';
	}
	//clave
	if (!reClave.test(clave)){
		console.log(reClave.test(clave));
		console.log('entro al if de la re de la clave');
		mensaje += 'El campo Clave tiene que tener al menos 4 caracteres. <br/>';	}
	//edad
	if (!reEdad.test(edad)){
		console.log(reEdad.test(edad));
		console.log('entro al if de la re de la edad');
		mensaje += 'Para registrarte tenes que ser mayor de edad. <br/>';
	}

	console.log('todo ok');
	if (!mensaje == ''){
		msj.innerHTML = mensaje;
		msj.style.color = "red";
		return false;
	}
}