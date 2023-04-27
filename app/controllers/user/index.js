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