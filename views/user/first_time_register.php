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
    <link rel="icon" type="image/png" href="../../resources/img/system/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../resources/css/styles.css">

    <title>CréditoADS | Primer usuario </title>
</head>


<body>

    <section class="seccion animate__animated animate__fadeIn animate__slow">

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12">
                    <h5 id="titulos">¡Hola!, por favor, ingresa los datos solicitados</h5>
                </div>
            </div>
            <br>
        </div>

        <br>

        <div class="espacioForm">
            <div class="container contenedorForm" id="contenedorDatos">
                <div class="form-outer ">
                    <form method="post" id="register-form" autocomplete="off" class="formDatos">
                        <div class="page">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtNombre">Nombre</label>
                                        <input type="text" name="txtNombre" id="txtNombre" class="form-control input-forms" required maxlength="50">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="txtApellido">Apellido</label>
                                        <input type="text" name="txtApellido" id="txtApellido" class="form-control input-forms" required maxlength="50">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="txtNacimiento">Fecha de nacimiento</label>
                                        <input type="date" name="txtNacimiento" id="txtNacimiento" class="form-control input-forms" required>
                                    </div>
                                    <br>
                                   
                                    <div class="form-group">
                                        <label for="txtDui">DUI</label>
                                        <input type="text" name="txtDui" id="txtDui" class="form-control input-forms" required>
                                    </div>
                    
                                    <br>
                                    <div class="form-group">
                                        <label for="txtEmail">Correo electrónico</label>
                                        <input type="email" name="txtEmail" id="txtEmail" class="form-control input-forms" required maxlength="50">

                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                    
                                                                        <div class="form-group">
                                        <label for="txtDireccion">Dirección</label>
                                        <textarea type="text" name="txtDireccion" id="txtDireccion" class="form-control input-forms" required rows="1"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="username">Nombre de usuario</label>
                                        <input type="text" name="username" id="username" class="form-control input-forms" required maxlength="50">

                                    </div>

                                    <br>

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="color:black !important;">
                                        <strong class="alertaText">Advertencia</strong>
                                        <p class="alertaText">Tu contraseña debe contener al menos una letra mayúscula, una letra minúscula,
                                            un número y un carácter especial, y que tenga entre 8 y 16 caracteres.
                                            También asegúrate que la contraseña no contenga espacios en blanco</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <div style="position: relative;">
                                        <label for="password">Contraseña</label>
                                        <div style="position: relative;">
                                            <input id="password" name="password" type="password" class="form-control input-forms" required maxlength="16">
                                            <button type="button" style="padding-top: 10px !important;" class="btnPass " onclick="togglePassword('password', 'Pass1')"><span id="Pass1" class="material-symbols-outlined eye">
                                                    visibility
                                                </span></button>
                                        </div>
                                    </div>

                                    <br>

                                    <div style="position: relative;">
                                        <label for="password">Comprobar contraseña</label>
                                        <div style="position: relative;">
                                            <input id="passwordVerify" name="passwordVerify" type="password" class="form-control input-forms" required maxlength="16">
                                            <button type="button" style="padding-top: 10px !important;" class="btnPass " onclick="togglePassword('passwordVerify', 'Pass2')"><span id="Pass2" class="material-symbols-outlined eye">
                                                    visibility
                                                </span></button>
                                        </div>
                                    </div>


                                    <br>





                                </div>

                            </div>

                            <br>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn submit">Crear cuenta</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>




    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../../resources/js/sweetalert.min.js"></script>
    <script src="../../app/helpers/components.js"></script>
    <script src="../../app/controllers/user/register.js"></script>
    <script src="../../app/controllers/template.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


</body>

</html>