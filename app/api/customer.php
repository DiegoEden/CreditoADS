<?php
require_once('../helpers/connection.php');
require_once('../helpers/validator.php');
require_once('../models/customer.php');
require_once('../models/account.php');
require_once('../models/transfer.php');
require_once('../helpers/mailformat.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




require '../../libraries/phpmailer65/src/Exception.php';
require '../../libraries/phpmailer65/src/PHPMailer.php';
require '../../libraries/phpmailer65/src/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_GET['action'])) {
    session_start();
    $customers = new Customers();
    $mailFormat = new Mailformat();
    $transfer =  new Transfer();
    $account =  new Account();
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_cliente'])) {

        switch ($_GET['action']) {

            case 'logOut':
                unset($_SESSION['id_cliente']);
                $result['status'] = 1;
                // Mostramos mensaje de confirmacion
                $result['message'] = 'Sesión eliminada correctamente';
                break;

            case 'checkSession':
                $result['status'] = 1;
                $result['message'] = 'Posee una sesión activa.';
                break;

            case 'checkBlockedUsers':

                if ($customers->set_id_cliente($_SESSION['id_cliente'])) {
                    if ($customers->checkBlockedUsers()) {
                        $result['status'] = 1;
                        $result['message'] = 'El usuario se encuentra bloqueado.';

                        unset($_SESSION['id_cliente']);
                    }
                }

                break;

            case 'getAccTransac':

                if (isset($_POST['txtIdx'])) {
                    $valor = $_POST['txtIdx'];
                    // Ejecutamos la funcion del modelo
                    if ($result['dataset'] = $account->getAccTrans($valor)) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existen registros';
                        }
                    }
                } else {
                    // El campo no ha sido enviado
                }


                break;
            case 'readAll':

                $account->set_id_cliente($_SESSION['id_cliente']);
                if ($result['dataset'] = $account->getAccounts()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['error'] = 1;
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No se han encontrado registros de cuentas.';
                    }
                }

                break;

            case 'readTransfer':
                $transfer->set_id_cliente($_SESSION['id_cliente']);
                if ($result['dataset'] = $transfer->getTrans()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['error'] = 1;
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No se han encontrado registros de cuentas.';
                    }
                }

                break;


            case 'readCustomAcc':
                if ($result['dataset'] = $transfer->getCustomerAccounts()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                    }
                }
                break;

            case 'getTransacType':
                if ($result['dataset'] = $transfer->getTransacType()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                    }
                }
                break;

            case 'addTransfer':
                $_POST = $transfer->validateForm($_POST);
                if ($transfer->set_cantidad_dinero($_POST['cantidad_dinero'])) {
                    if ($transfer->set_descripcion($_POST['txtDesc'])) {
                        if (isset($_POST['Cuenta'])) {
                            if (isset($_POST['tipoTransf'])) {
                                if ($transfer->set_id_cuenta($_POST['Cuenta'])) {
                                    if ($transfer->set_id_tipo_transaccion($_POST['tipoTransf'])) {
                                        if ($transfer->addTransfer()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Transferencia creada correctamente.';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Dato incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Cuenta incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Ingrese el tipo de transferencia';
                            }
                        } else {
                            $result['exception'] = 'Ingrese su cuenta';
                        }
                    } else {
                        $result['exception'] = 'Descripción incorrecta';
                    }
                } else {
                    $result['exception'] = 'Monto incorrecto';
                }

                break;

            case 'verifyCode':
                $_POST = $customers->validateForm($_POST);
                // Validmos el formato del mensaje que se enviara en el correo
                if ($customers->set_codigo($_POST['codigo'])) {
                    // Ejecutamos la funcion para validar el codigo de seguridad
                    if ($customers->validarCodigo($_POST['codigo'], $_SESSION['id_cliente'])) {
                        $result['status'] = 1;
                        // Colocamos el mensaje de exito 
                        $result['message'] = 'El código ingresado es correcto';
                    } else {
                        // En caso que el correo no se envie mostramos el error
                        $result['exception'] = 'El código ingresado no es correcto';
                    }
                } else {
                    $result['exception'] = 'Mensaje incorrecto';
                }
                break;

            case 'changePassword':
                $_POST = $customers->validateForm($_POST);
                if ($customers->set_id_cliente($_SESSION['id_cliente'])) {
                    if ($customers->checkPassword($_POST['txtOldPass'])) {
                        if ($customers->set_pass($_POST['txtNewPass'])) {
                            if ($customers->changePassword()) {
                                try {

                                    $body = $mailFormat->printMailFormatNotification('notificationPasswordChange', $_SESSION['nombres'], 'cliente');

                                    //Ajustes del servidor
                                    $mail->SMTPDebug = 0;
                                    $mail->isSMTP();
                                    $mail->Host       = 'smtp.gmail.com';
                                    $mail->SMTPAuth   = true;
                                    $mail->Username   = 'asistenciacreditoads@gmail.com';
                                    $mail->Password   = 'lraikofhngsxoyaf';
                                    $mail->SMTPSecure = 'tls';
                                    $mail->Port       = 587;
                                    $mail->CharSet = 'UTF-8';


                                    //Receptores
                                    $mail->setFrom('asistenciacreditoads@gmail.com', 'Servicios al Cliente CreditoADS');
                                    $mail->addAddress($_SESSION['correo']);

                                    //Contenido
                                    $mail->isHTML(true);
                                    $mail->Subject = 'Alerta de seguridad | CreditoADS';
                                    $mail->Body    = $body;

                                    $mail->send();
                                } catch (Exception $e) {
                                    $result['exception'] = $mail->ErrorInfo;
                                }


                                $customers->cleanCode($_SESSION['id_cliente']);
                                $result['status'] = 1;
                                $result['message'] = 'Contraseña actualizada correctamente.';

                                unset($_SESSION['id_cliente']);
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'El formato de la contraseña es incorrecto';
                        }
                    } else {
                        $result['exception'] = 'La contraseña ingresada es incorrecta';
                    }
                } else {
                    $result['exception'] = 'Usted no ha iniciado sesión';
                }

                break;


            case 'blockMyAccount':

                $_POST = $customers->validateForm($_POST);
                if ($customers->set_id_cliente($_SESSION['id_cliente'])) {
                    if ($customers->checkPassword($_POST['txtPass'])) {
                        if ($customers->blockAccount()) {
                            try {

                                $body = $mailFormat->printMailFormatNotification('notificationBlockedAccount', $_SESSION['nombres'], 'cliente');

                                //Ajustes del servidor
                                $mail->SMTPDebug = 0;
                                $mail->isSMTP();
                                $mail->Host       = 'smtp.gmail.com';
                                $mail->SMTPAuth   = true;
                                $mail->Username   = 'asistenciacreditoads@gmail.com';
                                $mail->Password   = 'lraikofhngsxoyaf';
                                $mail->SMTPSecure = 'tls';
                                $mail->Port       = 587;
                                $mail->CharSet = 'UTF-8';


                                //Receptores
                                $mail->setFrom('asistenciacreditoads@gmail.com', 'Servicios al Cliente CreditoADS');
                                $mail->addAddress($_SESSION['correo']);

                                //Contenido
                                $mail->isHTML(true);
                                $mail->Subject = 'Alerta de seguridad | CreditoADS';
                                $mail->Body = $body;

                                $mail->send();
                            } catch (Exception $e) {
                                $result['exception'] = $mail->ErrorInfo;
                            }


                            $customers->cleanCode($_SESSION['id_cliente']);
                            $result['status'] = 1;
                            $result['message'] = 'Se ha bloqueado su cuenta.';

                            unset($_SESSION['id_cliente']);
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'La contraseña ingresada es incorrecta';
                    }
                } else {
                    $result['exception'] = 'Usted no ha iniciado sesión';
                }

                break;

            case 'sendMailPass':
                // Generamos el codigo de seguridad 
                $code = rand(999999, 111111);
                if ($customers->set_correo_electronico($_SESSION['correo'])) {
                    if ($customers->validarCorreo()) {
                        $customers->set_codigo($code);
                        // Ejecutamos funcion para obtener el usuario del correo ingresado\
                        $customers->obtenerUsuario($_SESSION['correo']);

                        try {


                            $body = $mailFormat->printMailFormatCode('passwordCode', $code, $_SESSION['nombres'], 'cliente');

                            //Ajustes del servidor
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'asistenciacreditoads@gmail.com';
                            $mail->Password   = 'lraikofhngsxoyaf';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port       = 587;
                            $mail->CharSet = 'UTF-8';


                            //Receptores
                            $mail->setFrom('asistenciacreditoads@gmail.com', 'Servicios al Cliente CreditoADS');
                            $mail->addAddress($_SESSION['correo']);

                            //Contenido
                            $mail->isHTML(true);
                            $mail->Subject = 'Recuperación de contraseña | CreditoADS';
                            $mail->Body    = $body;

                            if ($mail->send()) {
                                $result['status'] = 1;
                                $result['message'] = 'Código enviado correctamente,';
                                $customers->actualizarCodigo();
                            }
                        } catch (Exception $e) {
                            $result['exception'] = $mail->ErrorInfo;
                        }
                    } else {

                        $result['exception'] = 'El correo ingresado no está registrado';
                    }
                } else {

                    $result['exception'] = 'Correo incorrecto';
                }

                break;

            case 'sendBlockMail':
                // Generamos el codigo de seguridad 
                $code = rand(999999, 111111);
                if ($customers->set_correo_electronico($_SESSION['correo'])) {
                    if ($customers->validarCorreo()) {
                        $customers->set_codigo($code);
                        // Ejecutamos funcion para obtener el usuario del correo ingresado\
                        $customers->obtenerUsuario($_SESSION['correo']);
                        try {

                            $body = $mailFormat->printMailFormatCode('blockAccount', $code, $_SESSION['nombres'], 'cliente');

                            //Ajustes del servidor
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'asistenciacreditoads@gmail.com';
                            $mail->Password   = 'lraikofhngsxoyaf';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port       = 587;
                            $mail->CharSet = 'UTF-8';


                            //Receptores
                            $mail->setFrom('asistenciacreditoads@gmail.com', 'Servicios al Cliente CreditoADS');
                            $mail->addAddress($_SESSION['correo']);

                            //Contenido
                            $mail->isHTML(true);
                            $mail->Subject = 'Bloqueo de usuario | CreditoADS';
                            $mail->Body    = $body;

                            if ($mail->send()) {
                                $result['status'] = 1;
                                $result['message'] = 'Código enviado correctamente,';
                                $customers->actualizarCodigo();
                            }
                        } catch (Exception $e) {
                            $result['exception'] = $mail->ErrorInfo;
                        }
                    } else {

                        $result['exception'] = 'El correo ingresado no está registrado';
                    }
                } else {

                    $result['exception'] = 'Correo incorrecto';
                }

                break;
        }
    } else {
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
                            $result['message'] = 'Acceso concedido, bienvenido ' . $customers->get_username();
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

            case 'sendMail':
                $_POST = $customers->validateForm($_POST);
                // Generamos el codigo de seguridad 
                $code = rand(999999, 111111);
                if ($customers->set_correo_electronico($_POST['txtCorreoRecu'])) {
                    if ($customers->validarCorreo()) {
                        $customers->set_codigo($code);
                        // Ejecutamos funcion para obtener el usuario del correo ingresado\
                        $_SESSION['mail'] = $customers->get_correo_electronico();

                        $customers->obtenerUsuario($_SESSION['mail']);

                        try {

                            $body = $mailFormat->printMailFormatCode('passwordCode', $code, $_SESSION['nombres_temp'], 'cliente');


                            //Ajustes del servidor
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'asistenciacreditoads@gmail.com';
                            $mail->Password   = 'lraikofhngsxoyaf';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port       = 587;
                            $mail->CharSet = 'UTF-8';


                            //Receptores
                            $mail->setFrom('asistenciacreditoads@gmail.com', 'Servicios al Cliente CreditoADS');
                            $mail->addAddress($customers->get_correo_electronico());

                            //Contenido
                            $mail->isHTML(true);
                            $mail->Subject = 'Recuperación de contraseña | CreditoADS';
                            $mail->Body    = $body;

                            if ($mail->send()) {
                                $result['status'] = 1;
                                $result['message'] = 'Código enviado correctamente,';
                                $customers->actualizarCodigo();
                            }
                        } catch (Exception $e) {
                            $result['exception'] = $mail->ErrorInfo;
                        }
                    } else {

                        $result['exception'] = 'El correo ingresado no está registrado';
                    }
                } else {

                    $result['exception'] = 'Correo incorrecto';
                }

                break;

            case 'verifyCode':
                $_POST = $customers->validateForm($_POST);
                // Validmos el formato del mensaje que se enviara en el correo
                if ($customers->set_codigo($_POST['codigo'])) {
                    // Ejecutamos la funcion para validar el codigo de seguridad
                    if ($customers->validarCodigo($_POST['codigo'], $_SESSION['id_cliente_temp'])) {
                        $result['status'] = 1;
                        // Colocamos el mensaje de exito 
                        $result['message'] = 'El código ingresado es correcto';
                    } else {
                        // En caso que el correo no se envie mostramos el error
                        $result['exception'] = 'El código ingresado no es correcto';
                    }
                } else {
                    $result['exception'] = 'Mensaje incorrecto';
                }
                break;
                //Caso para cambiar la contraseña
            case 'changePass':
                // Obtenemos el form con los inputs para obtener los datos
                $_POST = $customers->validateForm($_POST);
                if ($customers->set_id_cliente($_SESSION['id_cliente_temp'])) {
                    if ($customers->set_pass($_POST['txtNewPass'])) {
                        // Ejecutamos la funcion para actualizar al usuario
                        if ($customers->changePassword()) {

                            try {

                                $body = $mailFormat->printMailFormatNotification('notificationPasswordChange', $_SESSION['nombres_temp'], 'cliente');

                                //Ajustes del servidor
                                $mail->SMTPDebug = 0;
                                $mail->isSMTP();
                                $mail->Host       = 'smtp.gmail.com';
                                $mail->SMTPAuth   = true;
                                $mail->Username   = 'asistenciacreditoads@gmail.com';
                                $mail->Password   = 'lraikofhngsxoyaf';
                                $mail->SMTPSecure = 'tls';
                                $mail->Port       = 587;
                                $mail->CharSet = 'UTF-8';


                                //Receptores
                                $mail->setFrom('asistenciacreditoads@gmail.com', 'Servicios al Cliente CreditoADS');
                                $mail->addAddress($_SESSION['mail']);

                                //Contenido
                                $mail->isHTML(true);
                                $mail->Subject = 'Alerta de seguridad | CreditoADS';
                                $mail->Body    = $body;

                                $mail->send();
                            } catch (Exception $e) {
                                $result['exception'] = $mail->ErrorInfo;
                            }
                            $result['status'] = 1;
                            $result['message'] = 'Clave actualizada correctamente';

                            $customers->cleanCode($_SESSION['id_cliente_temp']);
                            unset($_SESSION['id_cliente_temp']);
                            unset($_SESSION['mail']);
                            unset($_SESSION['nombres_temp']);
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = $usuarios->getPasswordError();
                    }
                } else {
                    $result['exception'] = 'Correo incorrecto';
                }
                break;

            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';

                break;
        }
    }
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result, JSON_PRETTY_PRINT));
} else {

    print(json_encode('Recurso no disponible'));
}
