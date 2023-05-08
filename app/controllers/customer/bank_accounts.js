


document.addEventListener('DOMContentLoaded', function(){
    //Función para verificar permiso 
    readRows(API);

})



//Llenado de tabla
function fillTable(dataset){
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr class="animate__animated animate__fadeIn">
                <!-- Fotografia-->
                <!-- Datos-->
                <td>${row.numero_cuenta}</td>
                <td>${row.tipo_cuenta}</td>
                <td>${row.fecha}</td>
                <td>$${row.saldo_actual}</td>
                <!-- Boton-->
                <th scope="row">
                    <div class="row paddingBotones">
                        <div class="col-12">
                            <a href="#" onclick="readDataOnModal(${row.id_cuenta}) "data-bs-toggle="modal" data-bs-target="#myTransac" class="btn btnTabla mx-2"><span class="material-symbols-outlined iconosBotones">
                            fact_check
                            </span></a>
                        </div>
                    </div>
                </th>
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



//Función para cargar los productos de una factura
function readDataOnModal(id) {
    document.getElementById('txtIdx').value = id;
    readRows2(API, 'transac-form', 'getAccTransac');
}



function fillTableParam(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.fecha_transac}</td>
                <td>$${row.cantidad_dinero}</td>
                <td>${row.descripcion}</td>
                <td>${row.tipo_transaccion}</td>
            </tr>
        `;
    });

    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows2').innerHTML = content;
   
}

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function DeleteTable() {
    let content = '';
    content += `
            <tr>
            </tr>
        `;
    document.getElementById('tbody-rows2').innerHTML = content;
   
}
