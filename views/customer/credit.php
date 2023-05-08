<?php

include('../../app/helpers/customer_page.php');

Customer_page::SideBarTemplate('CreditoADS | Créditos')
?>





<!-- Contenedor de la Pagina -->
<div class="page-content p-3   animate__animated animate__slideInLeft" id="content">




    <!-- Desde aqui comienza el contenido -->
    <div class="row justify-content-center mb-3 mt-5  ">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h3 class="tituloPagina">Mis Créditos</h3>
        </div>
    </div>

    <!-- Controles del Inicio -->
    <div class="row justify-content-center mt-3 px-5  ">
        <div class="col-xl-6  justify-content-center col-md-12 col-sm-12 col-xs-12">
            <h5 class="tituloCajaTextoFormulario">Búsqueda:</h5>
            <input type="text" class="form-control busqueda input-forms" data-table="adsTable" id="search" name="search">
        </div>


        <div class="d-flex  mt-3 justify-content-center align-items-center">
            <button type="submit" class="btn submit" data-bs-toggle="modal" data-bs-target="#myTransac">Solicitar crédito</button>
        </div>

    </div><br>
    <!-- Desde aqui comienza la tabla -->
    <div class="row mt-4 justify-content-center table-responsive ">
        <div class="col-xl-10 col-md-12 col-sm-12 col-xs-12 justify-content-center align-items-center text-center">
            <table class="table table-borderless tablaResponsive adsTable" id="data-table">
                <thead>
                    <!-- Columnas-->
                    <tr>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Tipo de transacción</th>
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
                <h1 style="margin-left:10px;" class="modal-title fs-5">Nueva transferencia</h1>
                <button type="button" class="btn-close closeModalButton" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" id="register-form" autocomplete="off" class="formDatos">
                    <div class="page">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="txtMonto">Monto</label>
                                    <input type="text" name="cantidad_dinero" id="cantidad_dinero" class="form-control input-forms" required maxlength="50">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtDesc">Descripción</label>
                                    <input type="text" name="txtDesc" id="txtDesc" class="form-control input-forms" required maxlength="250">
                                </div>

                                <br>


                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">



                                <div class="form-group">
                                    <label for="Cuenta">Cuenta</label>
                                    <select name="Cuenta" id="Cuenta" class="form-control input-forms" required>



                                    </select>
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="tipoTransf">Tipo de transferencia</label>
                                    <select name="tipoTransf" id="tipoTransf" class="form-control input-forms" required>



                                    </select>
                                </div>




                            </div>

                        </div>

                        <br>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn submit">Crear transferencia</button>
                        </div>

                    </div>

                </form>


            </div>



        </div>

    </div>
</div>



<?php

Customer_page::footerTemplate('transfer.js');


?>