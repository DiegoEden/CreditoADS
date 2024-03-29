/*
*   Este archivo es de uso general en todas las páginas web. Se importa en las plantillas del pie del documento.
*/

/*
*   Función para obtener todos los registros disponibles en los mantenimientos de tablas (operación read).
*
*   Parámetros: api (ruta del servidor para obtener los datos).
*
*   Retorno: ninguno.
*/


function botonExaminar(idBoton, idInputExaminar) {
    document.getElementById(idBoton).addEventListener('click', function (event) {
        //Se evita recargar la pagina
        event.preventDefault();

        //Se hace click al input invisible
        document.getElementById(idInputExaminar).click();
    });
}

function previewPicture(idInputExaminar, idDivFoto) {
    document.getElementById(idInputExaminar).onchange = function (e) {

        //variable creada para obtener la URL del archivo a cargar
        let reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);

        //Se ejecuta al obtener una URL
        reader.onload = function () {
            //Parte de la pagina web en donde se incrustara la imagen
            let preview = document.getElementById(idDivFoto);

            //Se crea el elemento IMG que contendra la preview
            image = document.createElement('img');
            //Se le asigna la ruta al elemento creado
            image.src = reader.result;
            //Se aplican las respectivas clases para que la preview aparezca estilizada
            image.className = 'rounded-circle fotografiaPerfil';
            //Se quita lo que este dentro del div (en caso de que exista otra imagen)
            preview.innerHTML = ' ';
            //Se agrega el elemento recien creado
            preview.append(image);
        }
    }
}

function previewSavePicture(idDivFoto, name, foto) {
    let ruta;
    switch (foto) {
        case 1:
            ruta = '../../resources/img/dashboard_img/usuarios_fotos/';
            break;
        case 2:
            ruta = '../../resources/img/dashboard_img/empleados_fotos/'
            break;
        case 3:
            ruta = '../../resources/img/dashboard_img/residentes_fotos/';
            break;
        case 4:
            ruta = '../../resources/img/dashboard_img/materiales_fotos/';
            break;
        case 5:
            ruta = '../../resources/img/dashboard_img/espacios_fotos/';
            break;
        default:
            break;
    }
    if (foto == 0) {
        //Parte de la pagina web en donde se incrustara la imagen
        let preview = document.getElementById(idDivFoto);

        image = document.createElement('img');

        image.style.width = '130px';

        image.style.height = '130px';

        //Se aplican las respectivas clases para que la preview aparezca estilizada
        image.className = 'fit-images rounded-circle';

        //Se quita lo que este dentro del div (en caso de que exista otra imagen)
        preview.innerHTML = ' ';

        //Se agrega el elemento recien creado
        preview.append(image);
    } else {
        //Parte de la pagina web en donde se incrustara la imagen
        let preview = document.getElementById(idDivFoto);

        image = document.createElement('img');

        //Se le asigna la ruta al elemento creado
        image.src = ruta + name;

        //Se aplican las respectivas clases para que la preview aparezca estilizada
        image.className = 'fit-images rounded-circle fotoPrimerUso';

        //Se quita lo que este dentro del div (en caso de que exista otra imagen)
        preview.innerHTML = ' ';

        //Se agrega el elemento recien creado
        preview.append(image);
    } if (foto == 4) {

        let preview = document.getElementById(idDivFoto);

        image = document.createElement('img');

        //Se le asigna la ruta al elemento creado
        image.src = ruta + name;

        //Se aplican las respectivas clases para que la preview aparezca estilizada
        image.className = 'img-fluid fit-images fotoMaterial2';

        //Se quita lo que este dentro del div (en caso de que exista otra imagen)
        preview.innerHTML = ' ';

        //Se agrega el elemento recien creado
        preview.append(image);
    }

    if (foto == 5) {
        //Parte de la pagina web en donde se incrustara la imagen
        let preview = document.getElementById(idDivFoto);

        image = document.createElement('img');

        //Se le asigna la ruta al elemento creado
        image.src = ruta + name;

        //Se aplican las respectivas clases para que la preview aparezca estilizada
        image.className = 'fit-images fotoEspacioModal';

        //Se quita lo que este dentro del div (en caso de que exista otra imagen)
        preview.innerHTML = ' ';

        //Se agrega el elemento recien creado
        preview.append(image);
    }
}





function readRows(api) {
    fetch(api + 'readAll', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    data = response.dataset;
                } else {
                    sweetAlert(4, response.exception, null);
                }
                // Se envían los datos a la función del controlador para que llene la tabla en la vista.
                fillTable(data);
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function readRows3(api, method) {
    fetch(api + method, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    data = response.dataset;
                } else {
                    sweetAlert(4, response.exception, null);
                }
                // Se envían los datos a la función del controlador para que llene la tabla en la vista.
                fillTable(data);
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}





function searchRows(api, form) {
    fetch(api + 'search', {
        method: 'post',
        body: new FormData(document.getElementById(form))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se envían los datos a la función del controlador para que llene la tabla en la vista.
                    fillTable(response.dataset);
                    sweetAlert(1, response.message, null);
                } else {
                    sweetAlert(2, response.exception, null);
                    console.log("error");
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}



/*
*   Función para crear o actualizar un registro en los mantenimientos de tablas (operación create y update).
*
*   Parámetros: api (ruta del servidor para enviar los datos), form (identificador del formulario) y modal (identificador de la caja de dialogo).
*
*   Retorno: ninguno.
*/
function saveRow(api, action, form, route) {
    fetch(api + action, {
        method: 'post',
        body: new FormData(document.getElementById(form))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de agregar o modificar un registro.
                    sweetAlert(1, response.message, route);
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
}

function checkCode(api, action, form, closemodal, openmodal) {
    var uno = document.getElementById('1').value;
    var dos = document.getElementById('2').value;
    var tres = document.getElementById('3').value;
    var cuatro = document.getElementById('4').value;
    var cinco = document.getElementById('5').value;
    var seis = document.getElementById('6').value;
    document.getElementById('codigo').value = uno + dos + tres + cuatro + cinco + seis;

    fetch(api + action, {
        method: 'post',
        body: new FormData(document.getElementById(form))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    closeModal(closemodal);
                    openModal(openmodal);
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
}

//Función para redireccionar según permisos
function checkPermissions(pagina) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('txtPagina', pagina);
    //Verificando las credenciales del usuario
    fetch('../../app/api/dashboard/usuarios.php?action=checkPermissionsPerPage', {
        method: 'post',
        body: data
    }).then(request => {
        //Verificando si la petición fue correcta
        if (request.ok) {
            request.json().then(response => {
                //Verificando si la respuesta es satisfactoria de lo contrario se muestra la excepción
                if (!response.status) {
                    window.location.href = '../../resources/error/403.html';
                } else {
                    return true;
                }
            })
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(error => console.log(error));
}



function savePhoto(api, action, form) {
    fetch(api + action, {
        method: 'post',
        body: new FormData(document.getElementById(form))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                    readRows(api);
                    sweetAlert(1, response.message, null);
                    previewSavePicture('divFotografia', 'default.png', 5);
                } else {
                    sweetAlert(2, response.exception, null);
                    console.log(response.status + ' ' + response.statusText);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

/*
*   Función para eliminar un registro seleccionado en los mantenimientos de tablas (operación delete). Requiere el archivo sweetalert.min.js para funcionar.
*
*   Parámetros: api (ruta del servidor para enviar los datos) y data (objeto con los datos del registro a eliminar).
*
*   Retorno: ninguno.
*/
function confirmDelete(api, data) {
    swal({
        title: 'Advertencia',
        text: '¿Desea eliminar el registro?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de borrado, de lo contrario no se hace nada.
        if (value) {
            fetch(api + 'delete', {
                method: 'post',
                body: data
            }).then(function (request) {
                // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                if (request.ok) {
                    request.json().then(function (response) {
                        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                        if (response.status) {
                            // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                            readRows(api);
                            sweetAlert(1, response.message, null);
                        } else {
                            sweetAlert(2, response.exception, null);
                            console.log(response.status + ' ' + response.statusText);
                        }
                    });
                } else {
                    console.log(request.status + ' ' + request.statusText);
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    });
}

/*
*   Función para manejar los mensajes de notificación al usuario. Requiere el archivo sweetalert.min.js para funcionar.
*
*   Parámetros: type (tipo de mensaje), text (texto a mostrar) y url (ubicación a direccionar al cerrar el mensaje).
*
*   Retorno: ninguno.
*/

function sweetAlert(type, text, url) {
    // Se compara el tipo de mensaje a mostrar.
    switch (type) {
        case 1:
            title = 'Éxito';
            icon = 'success';
            break;
        case 2:
            title = 'Error';
            icon = 'error';
            break;
        case 3:
            title = 'Advertencia';
            icon = 'warning';
            break;
        case 4:
            title = 'Aviso';
            icon = 'info';
    }
    // Si existe una ruta definida, se muestra el mensaje y se direcciona a dicha ubicación, de lo contrario solo se muestra el mensaje.
    if (url) {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        }).then(function () {
            location.href = url
        });
    } else {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        });
    }
}

/*
*   Función para cargar las opciones en un select de formulario.
*
*   Parámetros: endpoint (ruta del servidor para obtener los datos), select (identificador del select en el formulario) y selected (valor seleccionado).
*
*   Retorno: ninguno.
*/
function fillSelect(endpoint, select, selected) {
    fetch(endpoint, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let content = '';
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Si no existe un valor para seleccionar, se muestra una opción para indicarlo.
                    if (!selected) {
                        content += '<option disabled selected>Seleccionar...</option>';
                    }
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se obtiene el dato del primer campo de la sentencia SQL (valor para cada opción).
                        value = Object.values(row)[0];
                        // Se obtiene el dato del segundo campo de la sentencia SQL (texto para cada opción).
                        text = Object.values(row)[1];
                        // Se verifica si el valor de la API es diferente al valor seleccionado para enlistar una opción, de lo contrario se establece la opción como seleccionada.
                        if (value != selected) {
                            content += `<option value="${value}">${text}</option>`;
                        } else {
                            content += `<option value="${value}" selected>${text}</option>`;
                        }
                    });
                } else {
                    content += '<option>Sin opciones.</option>';
                }
                // Se agregan las opciones a la etiqueta select mediante su id.
                document.getElementById(select).innerHTML = content;
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function fillSelect2(endpoint, select, selected) {
    fetch(endpoint, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let content = '';
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Si no existe un valor para seleccionar, se muestra una opción para indicarlo.
                    if (!selected) {
                        content += '<option disabled selected>Seleccionar...</option>';
                    }
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se obtiene el dato del primer campo de la sentencia SQL (valor para cada opción).
                        value = Object.values(row)[0];
                        // Se obtiene el dato del segundo campo de la sentencia SQL (texto para cada opción).
                        text = Object.values(row)[0];
                        // Se verifica si el valor de la API es diferente al valor seleccionado para enlistar una opción, de lo contrario se establece la opción como seleccionada.
                        if (value != selected) {
                            content += `<option value="${value}">${text}</option>`;
                        } else {
                            content += `<option value="${value}" selected>${text}</option>`;
                        }
                    });
                } else {
                    content += '<option>Sin opciones.</option>';
                }
                // Se agregan las opciones a la etiqueta select mediante su id.
                document.getElementById(select).innerHTML = content;
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}





// Función para mostrar un mensaje de confirmación al momento de cerrar sesión del residente.
function checkInputLetras(input) {
    var field = document.getElementById(input);
    if (field.value.trim() === "") {
        field.classList.remove("success");
        field.classList.add("error");
    } else {
        field.classList.remove("error");
        field.classList.add("success");

        if (/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]+$/.test(field.value)) {
            field.classList.remove("error");
            field.classList.add("success");

        } else {
            field.classList.remove("success");
            field.classList.add("error");
        }
    }

}

function checkContrasena(i) {
    document.getElementById(i).classList.remove("success");
    document.getElementById(i).classList.add("error");
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;

    if (document.getElementById(i).value.match(regex)) {
        document.getElementById(i).classList.remove("error");
        document.getElementById(i).classList.add("success");
    } else {
        document.getElementById(i).classList.remove("sucess");
        document.getElementById(i).classList.add("error");
    }
}

function checkCorreo(input) {
    var field = document.getElementById(input);
    if (field.value.trim() === "") {
        field.classList.remove("success");
        field.classList.add("error");
    } else {
        field.classList.remove("error");
        field.classList.add("success");

        if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(field.value)) {
            field.classList.remove("error");
            field.classList.add("success");
        } else {
            field.classList.remove("success");
            field.classList.add("error");
        }
    }
}

//Función para mostrar contraseña
function showHidePassword(checkbox, pass) {
    var check = document.getElementById(checkbox);
    var password = document.getElementById(pass);
    //Verificando el estado del check
    if (check.checked == true) {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
}


function checkCb(input) {
    var field = document.getElementById(input);
    field.classList.add("success");
}

function checkInput(input) {
    var field = document.getElementById(input);
    if (field.value.trim() === "") {
        field.classList.remove("success");
        field.classList.add("error");
    } else {
        field.classList.remove("error");
        field.classList.add("success");
    }

}

function checkInputHora(inicio, fin) {
    //Obteniendo el valor de los input
    var start1 = document.getElementById(inicio);
    var end1 = document.getElementById(fin);
    if (document.getElementById(inicio).value >= document.getElementById(fin).value) {
        end1.classList.remove("success");
        end1.classList.add("error");
        start1.classList.remove("success");
        start1.classList.add("error");
    } else {
        end1.classList.remove("error");
        end1.classList.add("success");
        start1.classList.remove("error");
        start1.classList.add("success");
    }
}
//Método para verificar telefono
function checkTelefono(input) {
    var field = document.getElementById(input);
    if (field.value.trim() === "") {
        field.classList.remove("success");
        field.classList.add("error");
    } else {
        field.classList.remove("error");
        field.classList.add("success");

        if (/^([0-9]{4})+(-)+([0-9]{4})$/i.test(field.value)) {
            field.classList.remove("error");
            field.classList.add("success");
        } else {
            field.classList.remove("success");
            field.classList.add("error");
        }
    }

}

function checkAlfanumerico(i) {
    document.getElementById(i).classList.remove("success");
    document.getElementById(i).classList.add("error");
    var regex = /^[A-Za-z0-9\s.]+$/g;

    if (document.getElementById(i).value.match(regex)) {
        document.getElementById(i).classList.remove("error");
        document.getElementById(i).classList.add("success");
    } else {
        document.getElementById(i).classList.remove("sucess");
        document.getElementById(i).classList.add("error");
    }
}

//Método para verificar el dui
function checkDui(input) {
    var field = document.getElementById(input);
    if (field.value.trim() === "") {
        field.classList.remove("success");
        field.classList.add("error");
    } else {
        field.classList.remove("error");
        field.classList.add("success");

        if (/(^\d{8})-(\d$)/.test(field.value)) {
            field.classList.remove("error");
            field.classList.add("success");
        } else {
            field.classList.remove("success");
            field.classList.add("error");
        }
    }
}

//Función para limpiar contraseña
function clearPassword(clave) {
    var contra = document.getElementById(clave);
    contra.value = '';
    contra.classList.remove("error");
    contra.classList.remove("success");
}



function togglePassword(input, icon) {
    var passwordInput = document.getElementById(input);
    var iconButton = document.getElementById(icon);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        iconButton.textContent = "visibility_off"

    } else {
        passwordInput.type = "password";
        iconButton.textContent = "visibility"

    }
}


$(document).ready(function () {
    $("#txtDui").mask("00000000-0");
    $("#txtNum").mask("0000-0000");
});



//Función para abrir cualquier modal
function openModal(form) {
    $(document.getElementById(form)).modal('show');
}

//Función para cerrar cualquier modal
function closeModal(form) {
    $(document.getElementById(form)).modal('hide');
}


//funcion para inputs de codigos
function autotab(current, to, prev) {
    if (current.getAttribute &&
        current.value.length == current.getAttribute("maxlength")) {
        to.focus()

    } else {
        prev.focus()


    }


}


function readRows2(api, form, method) {
    fetch(api + method, {
        method: 'post',
        body: new FormData(document.getElementById(form))
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    fillTableParam(response.dataset);
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
}
