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
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="../../resources/css/customer_styles.css">
            
            <title>' . $title . '</title>

        </head>
        <body>

        ';


        $filename = basename($_SERVER['PHP_SELF']);
        if (isset($_SESSION['id_cliente'])) {

            print '
            
            <nav class="sidebar close  animate__animated animate__slideInLeft">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="../../resources/img/system/logo.png" alt="">
                    </span>
    
                    <div class="text logo-text">
                        <span class="name">' . $_SESSION['username'] . '</span>
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
                        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalProfile">
                            <i class="bx bx-cog icon"></i>
                            <span class="text nav-text">Configuración</span>
                        </a>
                        
                    </li>
    
                    
                    
                </div>
            </div>
    
        </nav>

        <nav class="navbar animate__animated animate__slideInUp fixed-bottom navbar-expand-sm mobileNav">
            <div class="d-flex justify-content-center justify-content-center w-100">

            <div class="dropup-center dropup">
                <a class="mobileButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bx bx-user-circle icon" ></i>

                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" onclick="logOut()">Cerrar sesión</a></li>
                    <li><a class="dropdown-item" id="modoClaro2" onclick="modoClaro()">Modo Claro</a></li>
                    <li><a class="dropdown-item" id="modoOscuro2" onclick="modoOscuro()">Modo Oscuro</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalProfile">Configuración</a></li>
                </ul>
            </div>
                <a href="dashboard.php" class="mobileButton">
                <i class="bx bx-home-alt icon"></i>
                </a>     
                <a href="accounts.php" class="mobileButton">
                <i class="bx bx-briefcase icon"></i>
                </a>           
                <a href="#" class="mobileButton">
                <i class="bx bx-transfer icon"></i>
                </a>                
                <a href="#" class="mobileButton">
                <i class="bx bx-wallet-alt icon" ></i>
                </a>     
                
                
                   
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


    public static function welcomeMessage()
    {
        print('
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="titulo-dashboard">¡Bienvenido ' . $_SESSION['nombres'] . '!</h2>
                </div>
            </div>
        '
        );
    }

    public static function footerTemplate($controller)
    {
        print('
        
        <!-- Modal para verificar el codigo de verificación -->
        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="verificarCodigo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
                <div class="modal-content justify-content-center px-3 py-2">
                    <!-- Cabecera del Modal -->
                    <div class="modal-header" style="justify-content: flex-end; flex-direction: row-reverse;">
    
                        <h1 style="margin-left: 10px;" class="modal-title fs-5" id="titleModal" name="titleModal"></h1>
                        <span class="material-symbols-rounded">
                            info
                        </span>
                    </div>
    
                    <!-- Contenido del Modal -->
                    <div class="modal-body textoModal px-3 pb-4 mt-2">
                        <div class="row">
                            
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center flex-column">
                            <input type="text" class="d-none" id="accion" name="accion">

                                <form autocomplete="off" action="/form" id="checkCode">
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 14px; color:black !important" 
                                        id="alertModal" name="alertModal">
                                           
    
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <!-- Input Correo -->
                                        <div class="form-group mb-4" style="width: 300px;">
                                            <h6 class="fs-6">Código de verificación:</h6>
                                            <div class="d-flex justify-content-center align-items-center" id="divCodigo">
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button onclick="optionSelected()" type="submit" id="btnVerify" class="btn btnVerify mr-2">Verificar
                                            Código</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Fin del Contenido del Modal -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del Modal -->


        <!-- Modal -->
        <div class="modal fade" id="cambiarContraseña" tabindex="-1" aria-labelledby="cambiarContraseña" aria-hidden="true">
            <div class="modal-dialog  modal-xl modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="material-symbols-rounded">
                            info
                        </span>
                        <h1 style="margin-left: 10px;" class="modal-title fs-5">Restaurar contraseña</h1>
                        <button type="button" class="btn-close closeModalButton" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center flex-column">
                                <form autocomplete="off" action="/form" id="update-pass">
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 14px; color:black !important">
                                            <strong>Importante.</strong> Tu contraseña debe de cumplir con los siguientes
                                            requisitos: <br>
                                            <br>
                                            - Mínimo 8 caracteres <br>
                                            - Máximo 50 caracteres<br>
                                            - Al menos una letra mayúscula <br>
                                            - Al menos una letra minúscula <br>
                                            - Al menos un dígito <br>
                                            - No espacios en blanco <br>
                                            - Al menos 1 carácter especial
    
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <!-- Input Correo -->
                                        <div class="form-group mb-4" style="width: 300px;" id="divPass">
                                            
    
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="submit" id="btnChangePass"  name="btnChangePass" class="btn btnVerify mr-2"></span>Cambiar contraseña
                                        </button>
    
                                    </div>
                                </form>
                            </div>
                        </div>
    
                    </div>
    
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="bloquearUsuario" tabindex="-1" aria-labelledby="bloquearUsuario" aria-hidden="true">
            <div class="modal-dialog  modal-xl modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="material-symbols-rounded">
                            info
                        </span>
                        <h1 style="margin-left: 10px;" class="modal-title fs-5">Bloquear cuenta</h1>
                        <button type="button" class="btn-close closeModalButton" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center flex-column">
                                <form autocomplete="off" action="/form" id="block-account">
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 14px; color:black !important">
                                            <strong>Importante.</strong> Si bloqueas tu cuenta, nadie tendrá acceso a la misma.
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mb-2">
                                        <!-- Input Correo -->
                                        <div class="form-group mb-4" style="width: 300px;" id="divPass2">
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="submit" id="btnBlockUser"  name="btnBlockUser" class="btn btnVerify mr-2"></span>Bloquear mi cuenta
                                        </button>
    
                                    </div>
                                </form>
                            </div>
                        </div>
    
                    </div>
    
                </div>
            </div>
        </div>
    

        ');

        print('
                        
        <!-- Modal -->
            <div class="modal fade" id="modalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <span class="material-symbols-rounded">
                    settings
                    </span>
                    <h1 style="margin-left:10px;" class="modal-title fs-5" >Ajustes de la cuenta</h1>
                    <button type="button" class="btn-close closeModalButton" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                    <div class="row justify-content-center">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h3 class="text-center" style=" letter-spacing: 4px;" id="nombreCliente">' . $_SESSION['nombres'] . ' ' . $_SESSION['apellidos'] . '</h3>
                                </div>
                            </div>
            
                        </div>
                    </div>
            
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex justify-content-center align-items-center">
            
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4 class="titulosAjustes">Seguridad e inicio de sesión</h4>
            
                                </div>
                            </div>
            
                        </div>
                    </div>
                    <br>

            
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <!-- Div especializado para cada sección -->
                            <button class=" btn informacionPersonal" id="btnPass">
                                
                            <h4 class="titulosAjustes">Cambiar contraseña</h4>

                            </button>
                            
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center">
                        <!-- Div especializado para cada sección -->
                        <button class=" btn informacionPersonal" id="btnBlock">
                            
                        <h4 class="titulosAjustes">Bloquear mi cuenta</h4>

                        </button>

                        <br>

                        
                    </div>
                    </div>
            
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
