<?php

include('../../app/helpers/customer_page.php');

Customer_page::SideBarTemplate('CreditoADS | Dashboard')
?>


<!-- Contenedor de la Pagina -->
<div class="page-content p-3  animate__animated animate__slideInLeft" id="content">


    <div style="padding-top:50px;">

        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-start align-items-center">
                <div class="row mb-3">
                    <div class="col-12">
                        <h3 class="text-center" style=" letter-spacing: 4px;" id="nombreCliente">Nombre cliente</h3>
                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center align-items-center">

                <div class="row mt-4">
                    <div class="col-12">
                        <h4 class="titulosAjustes">Información Personal</h4>

                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <!-- Div especializado para cada sección -->
                <div class="informacionPersonal">
                    <div class="row justify-content-center ml-4">
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <!-- Titulo -->
                                <h1 class="tituloInformacion">Nombres</h1>
                                <!-- Información -->
                                <h2 class="informacion" id="lblNombres"></h2>
                            </form>
                        </div>
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <h1 class="tituloInformacion">Apellidos</h1>
                                <h2 class="informacion" id="lblApellidos"></h2>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center ml-4">
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <h1 class="tituloInformacion">DUI</h1>
                                <h2 class="informacion" id="lblDUI"></h2>
                            </form>
                        </div>
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <h1 class="tituloInformacion">Genéro</h1>
                                <h2 class="informacion" id="lblGenero"></h2>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center ml-4">
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <h1 class="tituloInformacion">Teléfono Fijo</h1>
                                <h2 class="informacion" id="lblTelFijo"></h2>
                            </form>
                        </div>
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <h1 class="tituloInformacion">Teléfono Celular</h1>
                                <h2 class="informacion" id="lblTelCelular"></h2>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center ml-4">
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <h1 class="tituloInformacion">Fecha de Nacimiento</h1>
                                <h2 class="informacion" id="lblFechaNac"></h2>
                            </form>
                        </div>
                        <div class="col-6 divColumnasAjustes">
                            <form>
                                <a href="#" id="btnEditarAjustes"  class="btn botonesAjustes">Editar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>




</div>





<?php

Customer_page::footerTemplate('settings.js');


?>