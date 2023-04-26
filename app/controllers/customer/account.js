// Constante para realizar la comunicacion con la API
const API = '../../app/api/customer.php?action=';

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
                            sweetAlert(1, response.message, '../../index.php');
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


document.getElementById('btnBlock').addEventListener('click', function (event) {
    //Evento para evitar que recargue la pagina
    event.preventDefault();


    const button = document.getElementById('btnBlock');
    const title = document.getElementById('titleModal');
    const alert = document.getElementById('alertModal')
    const action = document.getElementById('accion');

    title.textContent = 'Bloquear cuenta';
    alert.innerHTML = `<strong>Importante.</strong> Ingresa el código de verificación enviado a tu
    correo. Usa esta acción en caso de robo, o si crees que alguien ingresa a tu cuenta sin
    tu consentimiento. <br>`;
    action.value = 'bloquear';

    button.disabled = true;


    //Se envia correo con codigo
    fetch(API + 'sendBlockMail')
        .then(request => {
            //Se verifica si la petición fue correcta
            if (request.ok) {
                request.json().then(response => {

                    //Se verifica si la respuesta no es correcta para redireccionar al primer uso
                    if (response.status) {
                        button.disabled = false;
                        openModal("verificarCodigo");
                        closeModal("modalProfile");

                    } else {
                    }
                })
            } else {
                console.log(request.status + ' ' + request.statusText);
            }
        }).catch(error => console.log(error))



});


document.getElementById('btnPass').addEventListener('click', function (event) {
    //Evento para evitar que recargue la pagina
    event.preventDefault();


    const button = document.getElementById('btnPass');
    const title = document.getElementById('titleModal');
    const alert = document.getElementById('alertModal')
    const action = document.getElementById('accion');

    title.textContent = 'Restaurar contraseña';
    alert.innerHTML = `<strong>Importante.</strong> Ingresa el código de verificación enviado a tu
    correo.<br>`;
    action.value = 'restaurar';

    button.disabled = true;

    //Se envia correo con codigo
    fetch(API + 'sendMailPass')
        .then(request => {
            //Se verifica si la petición fue correcta
            if (request.ok) {
                request.json().then(response => {

                    //Se verifica si la respuesta no es correcta para redireccionar al primer uso
                    if (response.status) {
                        button.disabled = false;
                        openModal("verificarCodigo");
                        closeModal("modalProfile");

                    } else {
                    }
                })
            } else {
                console.log(request.status + ' ' + request.statusText);
            }
        }).catch(error => console.log(error))



});

function cargarInputs() {
    content = `

    <input type="text" id="1" name="1" onKeyup="autotab(this, document.getElementById('2'),document.getElementById('1'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
    <input type="text" id="2" name="2" onKeyup="autotab(this, document.getElementById('3'),document.getElementById('1'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
    <input type="text" id="3" name="3" onKeyup="autotab(this, document.getElementById('4'),document.getElementById('2'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
    <input type="text" id="4" name="4" onKeyup="autotab(this, document.getElementById('5'),document.getElementById('3'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
    <input type="text" id="5" name="5" onKeyup="autotab(this, document.getElementById('6'),document.getElementById('4'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
    <input type="text" id="6" name="6" onKeyup="autotab(this, document.getElementById('6'),document.getElementById('5'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
    
    <input type="text" class="d-none" id="codigo" name="codigo">
    `;


    document.getElementById('divCodigo').innerHTML = content;
}

document.addEventListener('DOMContentLoaded', function (e) {


    cargarInputs();


});






