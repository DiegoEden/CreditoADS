
const ENDPOINT_CUENTAS = '../../app/api/customer.php?action=readCustomAcc';
const ENDPOINT_TIPOS = '../../app/api/customer.php?action=getTransacType';



document.addEventListener('DOMContentLoaded', function () {
    //Función para verificar permiso 
    readRows3(API, 'readTransfer');
    fillSelect(ENDPOINT_CUENTAS, 'Cuenta', null);
    fillSelect(ENDPOINT_TIPOS, 'tipoTransf', null);



})



//Llenado de tabla
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr class="animate__animated animate__fadeIn">
                <!-- Fotografia-->
                <!-- Datos-->
                <td>${row.fecha_transac}</td>
                <td>$${row.cantidad_dinero}</td>
                <td>${row.descripcion}</td>
                <td>${row.tipo_transaccion}</td>
                <!-- Boton-->
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;


}


(function (document) {
    'use strict';

    var TableFilter = (function (myArray) {
        var search_input;

        function _onInputSearch(e) {
            search_input = e.target;
            var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
            myArray.forEach.call(tables, function (table) {
                myArray.forEach.call(table.tBodies, function (tbody) {
                    myArray.forEach.call(tbody.rows, function (row) {
                        var text_content = row.textContent.toLowerCase();
                        var search_val = search_input.value.toLowerCase();
                        row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                    });
                });
            });
        }

        return {
            init: function () {
                var inputs = document.getElementsByClassName('busqueda');
                myArray.forEach.call(inputs, function (input) {
                    input.oninput = _onInputSearch;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function () {
        if (document.readyState === 'complete') {
            TableFilter.init();
        }
    });

})(document);



// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('register-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Realizamos una peticion a la API indicando el caso a utilizar y enviando la direccion de la API como parametro
    fetch(API + 'addTransfer', {
        method: 'post',
        body: new FormData(document.getElementById('register-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, closeModal('myTransac')
                    );
                    readRows3(API, 'readTransfer');


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


