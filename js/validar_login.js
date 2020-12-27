function validarlogin(){

	var usuario = document.getElementById("user").value;
	var password = document.getElementById("password").value;
	
	if(usuario === '' || usuario === null){
		alertify.warning('El usuario no puede estar vacío');
		return false;
	}

	if(password === '' || password === null){
		alertify.warning('La contraseña no puede estar vacía');
		return false;
	}

	return true;


}