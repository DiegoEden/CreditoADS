const API_USUARIO = '../../app/api/system_users.php?action=';


//Método para manejador de eventos cuando la pagina haya cargado
document.addEventListener('DOMContentLoaded', function () {
    //Verificando si hay usuarios registrados 
    fetch(API_USUARIO + 'readAll')
        .then(request => {
            //Se verifica si la petición fue correcta
            if (request.ok) {
                request.json().then(response => {
                    //Se verifica si la respuesta no es correcta para redireccionar al primer uso
                    if (!response.status) {
                        sweetAlert(3, response.exception, 'first_time_register.php');
                    } else {
                        //Verificando si hay una sesión iniciada
                    }
                })
            } else {
                console.log(request.status + ' ' + request.statusText);
            }
        }).catch(error => console.log(error));



});



// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('login-form').addEventListener('submit', function (event) {
	// Se evita recargar la página web después de enviar el formulario.
	event.preventDefault();
	// Realizamos una peticion a la API indicando el caso a utilizar y enviando la direccion de la API como parametro
	fetch(API_USUARIO + 'logIn', {
		method: 'post',
		body: new FormData(document.getElementById('login-form'))
	}).then(function (request) {
		// Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
		if (request.ok) {
			request.json().then(function (response) {
				// Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
				if (response.status) {
					sweetAlert(1, response.message, 'dashboard.php');
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