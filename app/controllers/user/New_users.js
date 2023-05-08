const APINEW = '../../app/api/system_users.php?action=';
document.addEventListener('DOMContentLoaded', function(){
    //Función para verificar permiso 
    readRows(APINEW);

});
function fillTable(dataset){
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr >
                <td>${row.id_usuario}</td>
                <td>${row.usuario}</td>
                <td>${row.nombres}</td>
                <td>${row.apellidos}</td>
                <td>${row.dui}</td>
                <td>${row.direccion}</td>
                <td>${row.tipo_usuario}</td>
                <td>${row.estadio_usuario}</td>
                <td>${row.correo}</td>
            
            </tr>
        `; 
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rowss').innerHTML = content;
}

document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
   
        action = 'create';
    
    saveRow(APINEW, action, 'save-form', 'accounts.php');
});
