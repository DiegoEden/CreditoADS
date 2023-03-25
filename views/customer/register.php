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
                <div class="col-md-6">
                    <h5 id="titulos">Ahora, por favor, llena los campos solicitados en el formulario</h5>
                </div>
            </div>
            <br>
        </div>
        <div class="container contenedorForm ">

            <div class="form-outer ">

                <form action="" class="formDatos">
                    <div class="page">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="txtNombre">Nombre</label>
                                    <input type="text" name="txtNombre" id="txtNombre" class="form-control input-forms" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtApellido">Apellido</label>
                                    <input type="text" name="txtApellido" id="txtApellido" class="form-control input-forms" required>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="txtNacimiento">Fecha de nacimiento</label>
                                    <input type="date" name="txtNacimiento" id="txtNacimiento" class="form-control input-forms" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtOcupacion">Ocupación</label>
                                    <input type="text" name="txtOcupacion" id="txtOcupacion" class="form-control input-forms" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtNum">Número de teléfono</label>
                                    <input type="text" name="txtNum" id="txtNum" class="form-control input-forms" required>
                                </div>
                                <br>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="estadoCivil">Estado Civil</label>
                                    <select name="estadoCivil" id="estadoCivil" class="form-control input-forms" required>
                                        <option disabled selected>Seleccione</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Casado">Casado</option>

                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtEmail">Correo electrónico</label>
                                    <input type="email" name="txtEmail" id="txtEmail" class="form-control input-forms" required>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="username">Nombre de usuario</label>
                                    <input type="text" name="username" id="username" class="form-control input-forms" required>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="password-field">Contraseña</label>
                                    <input id="password-field" name="password-field" type="password" class="form-control input-forms" required="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="password-field">Contraseña</label>
                                    <input id="password-field" name="password-field" type="password" class="form-control input-forms" required="">
                                </div>
                                <br>


                            </div>

                        </div>

                    </div>



                    <a href="checkIn.php" class="btn submit">Volver</a>
                    <button type="submit" class="btn submit">Crear cuenta</button>





                </form>
            </div>
        </div>


    </section>




    <button onclick="modoOscuro()">osc</button>
    <button onclick="modoClaro()">claro</button>



    <script src="../../app/controllers/customer/signIn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../resources/js/sweetalert.min.js"></script>
    <script src="../../app/controllers/template.js"></script>
</body>

</html>