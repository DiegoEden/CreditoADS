
const API_CUSTOMER = 'app/api/customer.php?action=';


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