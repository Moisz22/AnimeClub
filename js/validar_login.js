function validarlogin(){

	let usuario = document.getElementById("user").value;
	let password = document.getElementById("password").value;
	
	if(usuario === '' || usuario === null){

		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 2000,
			timerProgressBar: false,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})
		  
		  Toast.fire({
			icon: 'error',
			title: 'El usuario no puede estar vacío'
		  })
		return false;
	}

	if(password === '' || password === null){
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 2000,
			timerProgressBar: false,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})
		  
		  Toast.fire({
			icon: 'error',
			title: 'La contraseña no puede estar vacío'
		  })
		return false;
	}

	return true;


}