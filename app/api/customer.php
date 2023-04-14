<?php
require_once('../helpers/connection.php');
require_once('../helpers/validator.php');
require_once('../models/customer.php');


if (isset($_GET['action'])) {
    session_start();
    $customers = new Customers();
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    switch ($_GET['action']) {
        case 'checkAccount':
            $_POST = $customers->validateForm($_POST);
            if ($customers->set_numero_cuenta($_POST['txtCuenta'])) {
                if ($customers->cuentaExistente()) {
                    if ($customers->cuentaCliente()) {
                        $result['status'] = 1;
                    } else {

                        $result['exception'] = 'La cuenta ingresada ya posee un usuario registrado';
                    }
                } else {

                    $result['exception'] = 'La cuenta ingresada no existe en nuestros registros';
                }
            } else {
                $result['exception'] = 'Número de cuenta incorrecto';
            }


            break;
        case 'addAccount':
            $_POST = $customers->validateForm($_POST);
            if ($customers->set_nombres($_POST['txtNombre'])) {
                if ($customers->set_apellidos($_POST['txtApellido'])) {
                    if ($customers->set_fecha_nacimiento($_POST['txtNacimiento'])) {
                        if ($customers->set_ocupacion($_POST['txtOcupacion'])) {
                            if ($customers->set_dui($_POST['txtDui'])) {
                                if ($customers->set_telefono($_POST['txtNum'])) {
                                    if (isset($_POST['genero'])) {
                                        if ($customers->set_genero($_POST['genero'])) {
                                            if (isset($_POST['estadoCivil'])) {
                                                if ($customers->set_estado_civil($_POST['estadoCivil'])) {
                                                    if ($customers->set_correo_electronico($_POST['txtEmail'])) {
                                                        if ($customers->set_direccion($_POST['txtDireccion'])) {
                                                            if ($customers->set_username($_POST['username'])) {
                                                                if ($_POST['password'] == $_POST['passwordVerify']) {
                                                                    if ($customers->set_pass($_POST['passwordVerify'])) {
                                                                        if (!$customers->checkUsuarioCliente()) {
                                                                            if ($customers->set_numero_cuenta($_POST['txtCuenta2'])) {
                                                                                if ($customers->crearCliente()) {
                                                                                    if ($data = $customers->getLastId_cliente()) {
                                                                                        if ($customers->set_id_cliente($data['id_cliente'])) {
                                                                                            if ($customers->crearCliente_cuenta()) {
                                                                                                $result['status'] = 1;
                                                                                                $result['message'] = 'Cliente registrado correctamente.';
                                                                                            } else {
                                                                                                $result['exception'] = 'No se pudo crear la cuenta';
                                                                                            }
                                                                                        } else {
                                                                                            $result['exception'] = 'Cliente incorrecto';
                                                                                        }
                                                                                    } else {
                                                                                        $result['exception'] = 'Cliente no existe';
                                                                                    }
                                                                                } else {

                                                                                    $result['exception'] = 'Usuario no registrado';
                                                                                }
                                                                            } else {
                                                                            }
                                                                        } else {

                                                                            $result['exception'] = 'Este nombre de usuario ya existe';
                                                                        }
                                                                    } else {
                                                                        $result['exception'] = 'Contraseña incorrecta';
                                                                    }
                                                                } else {

                                                                    $result['exception'] = 'Las contraseñas no coinciden';
                                                                }
                                                            } else {

                                                                $result['exception'] = 'Usuario incorrecto';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Dirección inválida';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Formato de correo incorecto';
                                                    }
                                                } else {

                                                    $result['exception'] = 'Opción incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Selecciona un estado civil';
                                            }
                                        } else {

                                            $result['exception'] = 'Opción incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Selecciona un género';
                                    }
                                } else {

                                    $result['exception'] = 'Número telefónico incorrecto';
                                }
                            } else {

                                $result['exception'] = 'DUI incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Datos incorrectos';
                        }
                    } else {

                        $result['exception'] = 'Fecha de nacimiento incorrecta';
                    }
                } else {

                    $result['exception'] = 'Apellidos incorrectos';
                }
            } else {

                $result['exception'] = 'Nombres incorrectos';
            }
            break;
        case 'logIn':
            $_POST = $customers->validateForm($_POST);
            if ($customers->checkUser($_POST['txtCorreo'])) {
                if ($customers->checkEstado()) {
                    if ($customers->checkPassword($_POST['txtPassword'])) {
                        $_SESSION['id_cliente'] = $customers->get_id_cliente();
                        $_SESSION['estadoCivil'] = $customers->get_estado_civil();
                        $_SESSION['nombres'] = $customers->get_nombres();
                        $_SESSION['apellidos'] = $customers->get_apellidos();
                        $_SESSION['username'] =  $customers->get_username();
                        $_SESSION['correo'] = $customers->get_correo_electronico();
                        $_SESSION['numTel'] = $customers->get_telefono();
                        $result['status'] = 1;
                        $result['message'] = 'Acceso concedido, bienvenido '.$customers->get_username();

                    } else {
                        $result['exception'] = 'La contraseña ingresada es incorrecta';
                    }
                } else {
                    $result['exception'] = 'El usuario está inactivo o bloqueado';
                }
            } else {
                $result['exception'] = 'El correo ingresado es incorrecto.';
            }
            break;
        default:
            $result['exception'] = 'Acción no disponible dentro de la sesión';

            break;
    }


    header('content-type: application/json; charset=utf-8');
    print(json_encode($result, JSON_PRETTY_PRINT));
} else {

    print(json_encode('Recurso no disponible'));
}
