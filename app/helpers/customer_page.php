<?php

class Customer_page
{

    public static function SideBarTemplate($title)
    {

        session_start();

        print '
        
        <head onload="load()">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
            <link rel="icon" type="image/png" href="../../resources/img/system/logo.png">
            <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="../../resources/css/customer_styles.css">
            
            <title>' . $title . '</title>

        </head>
        <body>

        ';


        $filename = basename($_SERVER['PHP_SELF']);
        if (isset($_SESSION['id_cliente'])) {

            print '
            
            <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="../../resources/img/system/logo.png" alt="">
                    </span>
    
                    <div class="text logo-text">
                        <span class="name">'. $_SESSION['username'] .'</span>
                    </div>
                </div>
    
                <i class="bx bx-chevron-right toggle"></i>
            </header>
    
            <div class="menu-bar">
                <div class="menu">

                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="dashboard.php" class="buttonMenu">
                                <i class="bx bx-home-alt icon"></i>
                                <span class="text nav-text">Inicio</span>
                            </a>
                        </li>
    
                        <li class="nav-link">
                            <a href="accounts.php" class="buttonMenu">
                                <i class="bx bx-briefcase icon"></i>
                                <span class="text nav-text">Mis cuentas</span>
                            </a>
                        </li>
    
                        <li class="nav-link">
                            <a href="#" class="buttonMenu">
                                <i class="bx bx-transfer icon"></i>
                                <span class="text nav-text">Transferencias</span>
                            </a>
                        </li>
    
                        <li class="nav-link">
                            <a href="#" class="buttonMenu">
                                <i class="bx bx-wallet-alt icon" ></i>
                                <span class="text nav-text">Créditos</span>
                            </a>
                        </li>
    
                       
    
                        
    
                    </ul>
                </div>
    
                <div class="bottom-content">
                    <li class="">
                        <a onclick="logOut()" style="cursor:pointer">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Cerrar sesión</span>
                        </a>
                        
                    </li>

                    <li class="">
                        <a onclick="modoClaro()" id="modoClaro" style="cursor:pointer">
                            <i class="bx bx-sun icon"></i>
                            <span class="text nav-text">Modo claro</span>
                        </a>

                        <a onclick="modoOscuro()" id="modoOscuro" style="cursor:pointer">
                            <i class="bx bx-moon icon"></i>
                            <span class="text nav-text">Modo oscuro</span>
                        </a>
                        
                    </li>

                    <li class="">
                        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bx bx-cog icon"></i>
                            <span class="text nav-text">Configuración</span>
                        </a>
                        
                    </li>
    
                    
                    
                </div>
            </div>
    
        </nav>

    
            ';

            if ($filename != 'index.php') {
            } else {
                header('location: ../../index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'index.php') {
                header('location: ../../index.php');
            }
        }
    }




    public static function footerTemplate($controller)
    {
        print('
                        
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajustes de la cuenta</h1>
                        <button type="button" class="btn-close closeModalButton" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                
                </div>
            </div>
            </div>
               

                <script src="../../app/controllers/customer/' . $controller . '"></script>
                <script src="../../app/controllers/customer/account.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
                <script src="../../resources/js/sweetalert.min.js"></script>
                <script src="../../app/helpers/components.js"></script>
                <script src="../../app/controllers/template.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
            </body>
            </html> 
        ');
    }
}