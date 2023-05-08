<?php

include('../../app/helpers/customer_page.php');

Customer_page::SideBarTemplate('CreditoADS | Mis cuentas')
?>





<!-- Contenedor de la Pagina -->
<div class="page-content p-3   animate__animated animate__slideInLeft" id="content">




    <!-- Desde aqui comienza el contenido -->
    <div class="row justify-content-center mb-3 mt-5  ">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h3 class="tituloPagina">Mis cuentas</h3>
        </div>
    </div>

    <!-- Controles del Inicio -->
    <div class="row justify-content-center mt-3 px-5  ">
        <div class="col-xl-6  justify-content-center col-md-12 col-sm-12 col-xs-12">
            <h5 class="tituloCajaTextoFormulario">Búsqueda:</h5>
            <input type="text" class="form-control busqueda input-forms" data-table="adsTable" id="search" name="search">
        </div>

    </div><br>
    <!-- Desde aqui comienza la tabla -->
    <div class="row mt-4 justify-content-center table-responsive ">
        <div class="col-xl-10 col-md-12 col-sm-12 col-xs-12 justify-content-center align-items-center text-center">
            <table class="table table-borderless tablaResponsive adsTable" id="data-table">
                <thead>
                    <!-- Columnas-->
                    <tr>
                        <th scope="col">Número de cuenta</th>
                        <th scope="col">Tipo de cuenta bancaria</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Saldo actual</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="tbody-rows">

                </tbody>
            </table>
        </div>
    </div><br>
    <!-- Desde aqui termina la tabla -->
    <!-- Desde aqui finaliza el contenido -->


</div>

<!-- Modal -->
<div class="modal fade" id="myTransac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <span class="material-symbols-rounded">
                    info
                </span>
                <h1 style="margin-left:10px;" class="modal-title fs-5">Historial de Transacciones</h1>
                <button type="button" class="btn-close closeModalButton" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" id="transac-form">
                    <input type="text" class="d-none" id="txtIdx" name="txtIdx" />

                </form>
                <div class="row justify-content-center table-responsive tablaResponsive">
                    <div class="col-12 justify-content-center align-items-center text-center">
                        <table class="table table-borderless adsTable" id="data-table2">
                            <thead>
                                <!-- Columnas-->
                                <tr>
                                    <th scope="col">Fecha de creación</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Tipo de transacción</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-rows2">
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>



        </div>

    </div>
</div>




<?php

Customer_page::footerTemplate('bank_accounts.js');


?>