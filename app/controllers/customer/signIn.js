
const btnCuenta = document.getElementById('btnComprobar');
const btnVolver = document.getElementById('btnVolver');
const divCuenta = document.getElementById('contenedorCuenta');
const divDatos = document.getElementById('contenedorDatos');
const Title = document.getElementById('titulos');

const API_CUSTOMER = '../../app/api/customer.php?action=';


/* window.onbeforeunload = function() {
    return "¿Estás seguro de que deseas salir de esta página?";
  }
 */

/* btnCuenta.addEventListener('click', () => {
    
    divDatos.className = 'animate__animated animate__fadeInUp container contenedorForm';
    divCuenta.className = 'animate__animated animate__fadeOutUp container contenedorForm d-none';
    Title.textContent='Finalmente, es momento que nos proveas de tus datos para crear tu cuenta';

}); */
document.addEventListener('DOMContentLoaded', function () {
    // Se declara e inicializa un objeto para obtener la fecha y hora actual.
    let today = new Date();
    // Se declara e inicializa una variable para guardar el día en formato de 2 dígitos.
    let day = ('0' + today.getDate()).slice(-2);
    // Se declara e inicializa una variable para guardar el mes en formato de 2 dígitos.
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    // Se declara e inicializa una variable para guardar el año con la mayoría de edad.
    let year = today.getFullYear() - 18;
    // Se declara e inicializa una variable para establecer el formato de la fecha.
    let date = `${year}-${month}-${day}`;
    // Se asigna la fecha como valor máximo en el campo del formulario.
    document.getElementById('txtNacimiento').setAttribute('max', date);
    document.getElementById('txtNacimiento').setAttribute('value', date);



})


$(document).ready(function () {
    $("#txtDui").mask("00000000-0");
    $("#txtNum").mask("0000-0000");
});


var alerta = document.querySelector('.alert');

alerta.addEventListener('closed.bs.alert', function () {
    var myTextarea = document.getElementById("txtDireccion");
    myTextarea.rows = 5;
});


btnVolver.addEventListener('click', () => {

    divDatos.className = 'animate__animated animate__fadeOutUp  container contenedorForm d-none';
    divCuenta.className = 'animate__animated  animate__fadeInUp container contenedorForm ';
    Title.textContent = '¡Hola!, primero debemos comprobar que tu número de cuenta exista en nuestros registros';

});


// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('comprobar-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Realizamos una peticion a la API indicando el caso a utilizar y enviando la direccion de la API como parametro
    fetch(API_CUSTOMER + 'checkAccount', {
        method: 'post',
        body: new FormData(document.getElementById('comprobar-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    divDatos.className = 'animate__animated animate__fadeInUp container contenedorForm';
                    divCuenta.className = 'animate__animated animate__fadeOutUp container contenedorForm d-none';
                    Title.textContent = 'Finalmente, es momento que nos proveas de tus datos para crear tu cuenta';

                    document.getElementById('txtCuenta2').value = document.getElementById('txtCuenta').value;

                } else {

                    sweetAlert(3, response.exception, null);

                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});


// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('register-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Realizamos una peticion a la API indicando el caso a utilizar y enviando la direccion de la API como parametro
    fetch(API_CUSTOMER + 'addAccount', {
        method: 'post',
        body: new FormData(document.getElementById('register-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, '../../index.php');

                } else {

                    sweetAlert(3, response.exception, null);

                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});


