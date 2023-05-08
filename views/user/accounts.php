<?php
include('../../app/helpers/users_page.php');

Users_page::SideBarTemplate('CreditoADS | Dashboard')
?>


<!-- Contenedor de la Pagina -->
<div class="page-content p-3  animate__animated animate__slideInLeft" id="content">
    <h3>Crear nuevo usuario</h3>
</div>

<?php

Users_page::footerTemplate('dashboard.js');

?>
<div class="row justify-content-center mt-3 px-5  ">
        <div class="col-xl-6  justify-content-center col-md-12 col-sm-12 col-xs-12">
<div class="row mt-4 justify-content-center table-responsive ">
<div id="save-modal" >
    <div class="modal-content">
        <!-- Título para la caja de dialogo -->
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <div class="row">
            <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="Usuario" type="text" name="Usuario" class="validate" required/>
                    <label for="Usuario">Usuario</label>
            </div>
            <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="Nombre" type="text" name="Nombre" class="validate" required/>
                    <label for="Nombre">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="Apellido" type="text" name="Apellido" class="validate" required/>
                    <label for="Apellido">Apellido</label>
            </div>
            <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="txtDui" type="text" name="txtDui" class="validate" required/>
                    <label for="txtDui">DUI</label>
            </div>
            <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="direccion" type="text" name="direccion" class="validate" required/>
                    <label for="direccion">direccion</label>
            </div>
            <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
            <input type="email" class="form-control login-input" placeholder="Correo electrónico" autocomplete="email" required id="txtCorreo" name="txtCorreo">
                    <label for="txtCorreo">Correo</label>
            </div>

            <div class="row center-align">
                <button  class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

    </div><br>
    <div class="row mt-4 justify-content-center table-responsive ">
        <div class="col-xl-10 col-md-12 col-sm-12 col-xs-12 justify-content-center align-items-center text-center">
            <table class="table table-borderless tablaResponsive adsTable" id="data-table">
    <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
    <thead>
        <tr>
        <th>ID</th>
                                    <th>usuario</th>
                                    <th>nombre</th>
                                    <th>apellido</th>
                                    <th>dui</th>
                                    <th>direccion</th>
                                    <th>Tipo usuario</th>
                                    <th>estado usuario</th>
                                    <th>correo</th>
        </tr>
    </thead>
    <!-- Cuerpo de la tabla para mostrar un registro por fila -->
    <tbody id="tbody-rowss">
    </tbody>
    </table>
        </div>
    </div><br>   



<?php

users_page::footerTemplate('New_users.js');


?>