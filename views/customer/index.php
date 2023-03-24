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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="image/png" href="../../resources/img/system/logo.png">
    <link rel="stylesheet" type="text/css" href="../../resources/css/login_styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Iniciar sesión | CréditoADS</title>
</head>

<body class="js-fullheight imgfondo" style="background-image: url(../../resources/img/system/bg.jpg);">

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
                        <form action="#" class="signin-form">
                            <div class="form-group">
                                <input type="email" class="form-control login-input" placeholder="Correo electrónico" required="">
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control login-input" placeholder="Contraseña" required="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn submit px-3">Ingresar</button>
                            </div>
                        </form>
                        <p class="w-100 text-center">— ¿No tienes una cuenta? <a class="registrarme" href="">Regístrate</a> — </p>
                        <div class="form-group">
                            <button type="submit" class="form-control btn forgotPassword px-3">He olvidado mi contraseña</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../../resources/js/sweetalert.min.js"></script>
    <script src="../../app/controllers/customer/index.js"></script>


</body>

</html>