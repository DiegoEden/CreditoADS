<?php

include('../../app/helpers/users_page.php');

Users_page::SideBarTemplate('CreditoADS | Dashboard')
?>


<!-- Contenedor de la Pagina -->
<div class="page-content p-3  animate__animated animate__slideInLeft" id="content">


    <?php
    Users_page::welcomeMessage();
    ?>

    



</div>





<?php

Users_page::footerTemplate('dashboard.js');


?>