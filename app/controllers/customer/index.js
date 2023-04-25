
const API_CUSTOMER = 'app/api/customer.php?action=';


document.addEventListener('DOMContentLoaded', function (e) {

	fetch(API_CUSTOMER + 'checkSession')
		.then(request => {
			//Se verifica si la petición fue correcta
			if (request.ok) {
				request.json().then(response => {
					//Se verifica si la respuesta no es correcta para redireccionar al primer uso
					if (response.status) {
						window.location.href = 'views/customer/dashboard.php';
					} else {
					}
				})
			} else {
				console.log(request.status + ' ' + request.statusText);
			}
		}).catch(error => console.log(error))

});


//funcion para redimensionar la imagen de fondo del login
(function ($) {

	"use strict";

	var fullHeight = function () {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function () {
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();


})(jQuery);


// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('login-form').addEventListener('submit', function (event) {
	// Se evita recargar la página web después de enviar el formulario.
	event.preventDefault();
	// Realizamos una peticion a la API indicando el caso a utilizar y enviando la direccion de la API como parametro
	fetch(API_CUSTOMER + 'logIn', {
		method: 'post',
		body: new FormData(document.getElementById('login-form'))
	}).then(function (request) {
		// Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
		if (request.ok) {
			request.json().then(function (response) {
				// Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
				if (response.status) {
					sweetAlert(1, response.message, 'views/customer/dashboard.php');
				} else {

					sweetAlert(4, response.exception, null);

				}
			});
		} else {
			console.log(request.status + ' ' + request.statusText);
		}
	}).catch(function (error) {
		console.log(error);
	});
});

//Función para enviar el email
document.getElementById('checkMail-form').addEventListener('submit', function (event) {
	//Se evita que se recargue la pagina
	const boton = document.getElementById('btnVerificar');
	boton.disabled = true;
	event.preventDefault();
	fetch(API_CUSTOMER + 'sendMail', {
		method: 'post',
		body: new FormData(document.getElementById('checkMail-form'))
	}).then(function (request) {
		// Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
		if (request.ok) {
			request.json().then(function (response) {
				document.getElementById('txtCorreoRecu').disabled = true;

				// Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
				if (response.status) {
					// Mostramos mensaje de exito
					closeModal('modalPassword');
					openModal('verificarCodigoRecuperacion');
					const boton = document.getElementById('btnVerificar');
					boton.disabled = false;
					document.getElementById('txtCorreoRecu').disabled = false;



				} else {
					sweetAlert(4, response.exception, null);
					const boton = document.getElementById('btnVerificar');
					boton.disabled = false;
					document.getElementById('txtCorreoRecu').disabled = false;
				}
			});
		} else {
			console.log(request.status + ' ' + request.statusText);
		}
	}).catch(function (error) {
		console.log(error);
	});
});


document.getElementById('checkCode-form').addEventListener('submit', function (event) {
	//Se evita que se recargue la pagina
	var uno = document.getElementById('1').value;
	var dos = document.getElementById('2').value;
	var tres = document.getElementById('3').value;
	var cuatro = document.getElementById('4').value;
	var cinco = document.getElementById('5').value;
	var seis = document.getElementById('6').value;
	document.getElementById('codigo').value = uno + dos + tres + cuatro + cinco + seis;

	event.preventDefault();
	fetch(API_CUSTOMER + 'verifyCode', {
		method: 'post',
		body: new FormData(document.getElementById('checkCode-form'))
	}).then(function (request) {
		// Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
		if (request.ok) {
			request.json().then(function (response) {
				// Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
				if (response.status) {
					// Mostramos mensaje de exito

					closeModal('verificarCodigoRecuperacion');
					openModal('cambiarContraseña');



				} else {
					sweetAlert(4, response.exception, null);
				}
			});
		} else {
			console.log(request.status + ' ' + request.statusText);
		}
	}).catch(function (error) {
		console.log(error);
	});
});


//Función para cambiar clave
document.getElementById('update-form').addEventListener('submit', function (event) {
	//Se evita que se recargue la pagina
	const boton2 = document.getElementById('btnSubmit');
	boton2.disabled = true;

	event.preventDefault();

	// Realizamos peticion a la API de clientes con el caso changePass y method post para dar acceso al valor de los campos del form
	fetch(API_CUSTOMER + 'changePass', {
		method: 'post',
		body: new FormData(document.getElementById('update-form'))
	}).then(function (request) {
		// Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
		if (request.ok) {
			request.json().then(function (response) {
				// Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
				const input = document.getElementById('txtNewPass');
				input.disabled = true;
				if (response.status) {
					// En caso de iniciar sesion correctamente mostrar mensaje y redirigir al menu
					closeModal('cambiarContraseña');
					sweetAlert(1, response.message, null);
					boton2.disabled = false;
					input.disabled = false;
				} else {
					sweetAlert(3, response.exception, null);
					boton2.disabled = false;
					input.disabled = false;
				}
			});
		} else {
			console.log(request.status + ' ' + request.statusText);
		}
	}).catch(function (error) {
		console.log(error);
	});





});


