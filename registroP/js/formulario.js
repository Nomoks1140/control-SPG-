const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	contraseña: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	n_documento: /^\d{7,14}$/, // 7 a 14 numeros.
	telefono: /^\d{7,10}$/, // 7 a 14 numeros.
	direccion: /^[a-zA-Z0-9\_\-]{4,16}$/
}

const campos = {
	usuario: false,
	nombre: false,
	apellido: false,
	correo: false,
	contraseña: false,
	n_documento: false,
	telefono: false,
	direccion: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "apellido":
			validarCampo(expresiones.apellido, e.target, 'apellido');
		break;
		case "contraseña":
			validarCampo(expresiones.contraseña, e.target, 'contraseña');
			validarcontraseña2();
		break;
		case "contraseña2":
			validarcontraseña2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "n_documento":
			validarCampo(expresiones.n_documento, e.target, 'n_documento');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarcontraseña2 = () => {
	const inputcontraseña1 = document.getElementById('contraseña');
	const inputcontraseña2 = document.getElementById('contraseña2');

	if(inputcontraseña1.value !== inputcontraseña2.value){
		document.getElementById(`grupo__contraseña2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__contraseña2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__contraseña2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__contraseña2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__contraseña2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['contraseña'] = false;
	} else {
		document.getElementById(`grupo__contraseña2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__contraseña2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__contraseña2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__contraseña2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__contraseña2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['contraseña'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});



