(async() => {	
	const {value: usuario} = await Swal.fire({
		title: 'Selecciona una opcion',
		text: 'Para poder registar tu usuario',
		// html:
		icon: 'question',
		confirmButtonText: 'confirmar',
		footer:'<span class="rojo"> Esta informacion es obligatoria</span>',
		// width:
		// padding:
		// background:
		// grow: 
		backdrop: true,
		// timer:
		// timerProgressBar:
		// toast:
		// position:
		allowOutsideClick: false, 
		allowEscapeKey: false,
		allowEnterKey: true,
		stopKeydownPropagation: true,
	
		input:'select', 
		inputPlaceholder:'seleciona un tipo de usuario',
		inputValue: '',
		inputOptions:{
			Postulante: 'Postulante',
			Empresa: 'Empresa',
		},
		
		//  customClass:
		// 	container:
		// 	popup:
		// 	header:
		// 	title:
		// 	closeButton:
		// 	icon:
		// 	image:
		// 	content:
		// 	input:
		// 	actions:
		// 	confirmButton:
		// 	cancelButton:
		// 	footer:	
	
		showConfirmButton: true,
		// confirmButtonColor:
		//confirmButtonAriaLabel:
		showCancelButton: false,
		cancelButtonText: 'cancelar',
		// cancelButtonColor:
		// cancelButtonAriaLabel:
		
		// buttonsStyling:
		// showCloseButton:
		// closeButtonAriaLabel:
	
	
		// imageUrl:
		// imageWidth:
		// imageHeight:
		// imageAlt:
	});

	if(usuario.length ==""){
		window.location.href="/cursoPHP/Empresa/login/index.php";
	}
	else if(usuario == "Empresa"){
		window.location.href="/Registro/registroE/index.php";
	}else{
		window.location.href="/Registro/registroP/index.php";
		}	
	}
)()
