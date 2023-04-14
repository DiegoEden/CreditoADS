<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../resources/css/customer_styles.css">
    <title>Registrarse | CréditoADS</title>

</head>

<body>

    <section class="seccion animate__animated animate__fadeIn animate__slow">

        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8">
                    <h5 id="titulos">¡Hola!, primero debemos comprobar que tu número de cuenta exista en nuestros registros</h5>
                </div>
            </div>
            <br>
        </div>
        <div class="container contenedorForm " id="contenedorCuenta">

            <br>
            <div class="form-outer ">
                <div class="page">
                    <form method="post" id="comprobar-form" autocomplete="off">
                        <div class="form-group">
                            <label for="txtCuenta">Ingresa tu número de cuenta</label>
                            <input type="text" name="txtCuenta" id="txtCuenta" class="form-control input-forms" required>
                        </div>
                        <br>
                        <a class="btn submit" href="../../index.php" id="btnInicio">Volver a inicio</a>
                        <button type="submit" class="btn submit" id="btnComprobar">Comprobar</button>

                    </form>
                </div>
                <br>

            </div>
        </div>
        <br>


        <div class="container contenedorForm d-none" id="contenedorDatos">
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
                                    <label for="txtOcupacion">Ocupación</label>
                                    <input type="text" name="txtOcupacion" id="txtOcupacion" class="form-control input-forms" required maxlength="100">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtDui">DUI</label>
                                    <input type="text" name="txtDui" id="txtDui" class="form-control input-forms" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtNum">Número de teléfono</label>
                                    <input type="text" name="txtNum" id="txtNum" class="form-control input-forms" required>
                                </div>
                                <br>
                                <label for="genero">Género</label>
                                <select name="genero" id="genero" class="form-control input-forms" required>
                                    <option value="">Seleccione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>


                                </select>
                                <br>


                                <input type="text" id="txtCuenta2" name="txtCuenta2" class="d-none">
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="estadoCivil">Estado civil</label>
                                    <select name="estadoCivil" id="estadoCivil" class="form-control input-forms" required>
                                        <option value="">Seleccione</option>
                                        <option value="Casado">Casado/a</option>
                                        <option value="Soltero">Soltero/a</option>
                                        <option value="Viudo">Viudo/a</option>


                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtEmail">Correo electrónico</label>
                                    <input type="email" name="txtEmail" id="txtEmail" class="form-control input-forms" required maxlength="50">

                                </div>
                                <br>
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

                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong class="alertaText">Advertencia</strong>
                                    <p class="alertaText">Tu contraseña debe contener al menos una letra mayúscula, una letra minúscula,
                                        un número y un carácter especial, y que tenga entre 8 y 16 caracteres.
                                        También asegúrate que la contraseña no contenga espacios en blanco</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div style="position: relative;">
                                    <label for="password">Contraseña</label>
                                    <div style="position: relative;">
                                        <input id="password" name="password" type="password" class="form-control input-forms"  required maxlength="16">
                                        <button type="button" class="btnPass" onclick="togglePassword('password', 'Pass1')"><span id="Pass1" class="material-symbols-outlined">
                                                visibility
                                            </span></button>
                                    </div>
                                </div>

                                <br>

                                <div style="position: relative;">
                                    <label for="password">Comprobar contraseña</label>
                                    <div style="position: relative;">
                                        <input id="passwordVerify" name="passwordVerify" type="password" class="form-control input-forms" required maxlength="16">
                                        <button type="button" class="btnPass" onclick="togglePassword('passwordVerify', 'Pass2')"><span id="Pass2" class="material-symbols-outlined">
                                                visibility
                                            </span></button>
                                    </div>
                                </div>


                                <br>





                            </div>

                        </div>

                    </div>
                    <a class="btn submit" id="btnVolver">Volver</a>
                    <button type="submit" class="btn submit">Crear cuenta</button>
                </form>
            </div>
        </div>



    </section>




<!--     <button onclick="modoOscuro()">osc</button>
    <button onclick="modoClaro()">claro</button> -->



    <script src="../../app/controllers/customer/signIn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../resources/js/sweetalert.min.js"></script>
    <script src="../../app/helpers/components.js"></script>
    <script src="../../app/controllers/template.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>

</html>