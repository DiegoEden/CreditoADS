const API = '../../app/api/system_users.php?action=';


document.addEventListener('DOMContentLoaded', function (e) {

   
    fetch(API + 'checkBlockedUsers')
        .then(request => {
            //Se verifica si la petición fue correcta
            if (request.ok) {
                request.json().then(response => {
                    //Se verifica si la respuesta no es correcta para redireccionar al primer uso
                    if (response.status) {
                        sweetAlert(3, response.message, 'index.php');
                    } else {
                    }
                })
            } else {
                console.log(request.status + ' ' + request.statusText);
            }
        }).catch(error => console.log(error));

});

//Funcion para cerrar sesion en la tienda
function logOut() {
    swal({
        title: 'Advertencia',
        text: '¿Desea cerrar la sesión?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de cerrar sesión, de lo contrario se muestra un mensaje.
        if (value) {
            fetch(API + 'logOut', {
                method: 'get'
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            sweetAlert(1, response.message, 'index.php');
                        } else {
                            sweetAlert(2, response.exception, null);
                        }
                    });
                } else {
                    console.log(request.status + ' ' + request.statusText);
                }
            }).catch(function (error) {
                console.log(error);
            });
        } else {
            sweetAlert(4, 'Puede continuar con la sesión', null);
        }
    });
}