<?php

include('../../app/helpers/customer_page.php');

Customer_page::SideBarTemplate('CreditoADS | Dashboard')
?>


<!-- Contenedor de la Pagina -->
<div class="page-content p-3  animate__animated animate__slideInLeft" id="content">


    <?php
    Customer_page::welcomeMessage();
    ?>



</div>





<?php

Customer_page::footerTemplate('dashboard.js');


?>