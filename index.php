<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="image/png" href="resources/img/system/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="resources/css/login_styles.css">
    <title>Iniciar sesión | CréditoADS</title>
</head>

<body class="js-fullheight imgfondo" style="background-image: url(resources/img/system/bg.jpg);">

    <section class="seccion animate__animated animate__backInDown animate__slow">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Bienvenido a CréditoADS</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h5 class="mb-4 text-center">¿Tienes una cuenta con nosotros?</h5>
                        <form method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <input type="email" class="form-control login-input" placeholder="Correo electrónico" autocomplete="email" required id="txtCorreo" name="txtCorreo">
                            </div>


                            <div class="form-group">
                                <div style="position: relative;">
                                    <div style="position: relative;">
                                        <input id="txtPassword" name="txtPassword" type="password" class="form-control login-input" placeholder="Contraseña" autocomplete="current-password" required>
                                        <button type="button" class="btnPass" onclick="togglePassword('txtPassword', 'Pass1')"><span id="Pass1" class="material-symbols-outlined">
                                                visibility
                                            </span></button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="form-control btn submit px-3">Ingresar</button>
                            </div>
                        </form>
                        <p class="w-100 text-center">— ¿No tienes una cuenta? <a class="registrarme" href="views/customer/register.php">Regístrate</a> — </p>
                        <div class="form-group">
                            <a data-bs-toggle="modal" data-bs-target="#modalPassword" class="form-control btn forgotPassword px-3">He olvidado mi contraseña</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="modalPassword" aria-hidden="true">
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
                        <div class="col-xl-6 col-md-12 col-sm-12 col-xs-12">
                            <img src="resources/img/system/recover.png" class="img-fluid">
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center flex-column">
                            <form autocomplete="off" action="/form" id="checkMail-form">
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 14px;">
                                        <strong>Importante.</strong> Ingresa tu correo electrónico para poder restaurar
                                        tu contraseña. <br>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <!-- Input Correo -->
                                    <div class="form-group mb-4" style="width: 300px;">
                                        <h6 class="fs-6">Correo Electrónico:</h6>
                                        <input type="email" autocomplete="off" class="form-control inputRecovery" id="txtCorreoRecu" name="txtCorreoRecu" aria-describedby="emailHelp" Required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" id="btnVerificar" name="btnVerificar" class="btn btnVerify mr-2"></span>Verificar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal para verificar el codigo de verificación en la recuperación de contraseña -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="verificarCodigoRecuperacion" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
            <div class="modal-content justify-content-center px-3 py-2">
                <!-- Cabecera del Modal -->
                <div class="modal-header" style="justify-content: flex-end; flex-direction: row-reverse;">

                    <h1 style="margin-left: 10px;" class="modal-title fs-5">Restaurar contraseña</h1>
                    <span class="material-symbols-rounded">
                        info
                    </span>
                </div>

                <!-- Contenido del Modal -->
                <div class="modal-body textoModal px-3 pb-4 mt-2">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12 col-xs-12">
                            <img src="resources/img/system/verify.png" class="img-fluid">
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center flex-column">
                            <form autocomplete="off" action="/form" id="checkCode-form">
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 14px;">
                                        <strong>Importante.</strong> Ingresa el código de verificación enviado a tu
                                        correo.<br>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <!-- Input Correo -->
                                    <div class="form-group mb-4" style="width: 300px;">
                                        <h6 class="fs-6">Código de verificación:</h6>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input type="text" id="1" name="1" onKeyup="autotab(this, document.getElementById('2'),document.getElementById('1'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
                                            <input type="text" id="2" name="2" onKeyup="autotab(this, document.getElementById('3'),document.getElementById('1'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
                                            <input type="text" id="3" name="3" onKeyup="autotab(this, document.getElementById('4'),document.getElementById('2'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
                                            <input type="text" id="4" name="4" onKeyup="autotab(this, document.getElementById('5'),document.getElementById('3'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
                                            <input type="text" id="5" name="5" onKeyup="autotab(this, document.getElementById('6'),document.getElementById('4'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
                                            <input type="text" id="6" name="6" onKeyup="autotab(this, document.getElementById('6'),document.getElementById('5'))" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" Required maxlength="1" class="form-control cajaCodigo" Required>
                                            <input type="text" class="d-none" id="codigo" name="codigo">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btnVerify mr-2">Verificar
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
                        <div class="col-xl-6 col-md-12 col-sm-12 col-xs-12">
                            <img src="resources/img/system/newPass.png" class="img-fluid">
                        </div>
                        <div class="col-xl-6 col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center flex-column">
                            <form autocomplete="off" action="/form" id="update-form">
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 14px;">
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
                                    <div class="form-group mb-4" style="width: 300px;">
                                        <h6 class="fs-6">Ingresa tu nueva contraseña:</h6>
                                        <div style="position: relative;">
                                            <input type="password" autocomplete="off" class="form-control inputRecovery" id="txtNewPass" name="txtNewPass" Required>
                                            <button type="button" class="btnPass" style="color:black !important;" onclick="togglePassword('txtNewPass', 'Pass3')"><span id="Pass3" class="material-symbols-outlined">
                                                    visibility
                                                </span></button>

                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btnVerify mr-2"></span>Finalizar
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="resources/js/sweetalert.min.js"></script>
    <script src="app/controllers/customer/index.js"></script>
    <script src="app/helpers/components.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>

</html>