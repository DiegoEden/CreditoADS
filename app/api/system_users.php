<?php
require_once('../helpers/connection.php');
require_once('../helpers/validator.php');
require_once('../models/system_users.php');
require_once('../models/newusers.php');
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
    $users = new SystemUsers();
    $NewUsers=new NewUsers();
    $mailFormat = new Mailformat();
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_usuario'])) {
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $NewUsers->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen usuarios registrados.';
                    }
                }
                break;
                case 'create':
                    $_POST = $NewUsers->validateForm($_POST);
                    if ($NewUsers->setusuarios($_POST['Usuario'])) {
                        if ($NewUsers->setnombre($_POST['Nombre'])) {
                            if ($NewUsers->setapellidos($_POST['Apellido'])) {
                                if ($NewUsers->setdui($_POST['txtDui'])) {
                                    if ($NewUsers->setdireccion($_POST['direccion'])) {
                                        if ($NewUsers->setCorreo($_POST['txtCorreo'])) {
                                            if ($NewUsers->createRow()) {
                                                $result['status'] = 1;
                                               $result['message'] = 'Usuario Guardado Correctamente'; 
                                           } else {
                                               $result['exception'] = Database::getException();;
                                           }
                        
                                        } else {
                                                $result['exception'] = 'correo incorrecto';
                                            } 
                        
                                    } else {
                                            $result['exception'] = 'direccion incorrecto';
                                        } 
                        
                                } else {
                                        $result['exception'] = 'dui incorrecto';
                                    } 
                        
                            } else {
                                    $result['exception'] = 'apellido incorrecto';
                                } 
                            
                        } else {
                                $result['exception'] = 'nombre incorrecto';
                            } 

                    } else {
                            $result['exception'] = 'usuario incorrecto';
                        } 

                    break;
            case 'logOut':
                unset($_SESSION['id_usuario']);
                $result['status'] = 1;
                // Mostramos mensaje de confirmacion
                $result['message'] = 'Sesión eliminada correctamente';
                break;

            case 'checkSession':
                $result['status'] = 1;
                $result['message'] = 'Posee una sesión activa.';
                break;


            case 'checkBlockedUsers':

                if ($users->set_id_usuario($_SESSION['id_usuario'])) {
                    if ($users->checkBlockedUsers()) {
                        $result['status'] = 1;
                        $result['message'] = 'El usuario se encuentra bloqueado.';

                        unset($_SESSION['id_usuario']);
                    }
                }

                break;
               

        }
    } else {

        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $users->checkUsers()) {
                    $result['status'] = 1;
                    $result['message'] = 'Se ha encontrado al menos un usuario.';
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen usuarios registrados. Ingrese el primer usuario.';
                    }
                }
                break;
              
            case 'adminRegister':
                $_POST = $users->validateForm($_POST);
                if ($users->set_nombres($_POST['txtNombre'])) {
                    if ($users->set_apellidos($_POST['txtApellido'])) {
                        if ($users->set_fecha_nacimiento($_POST['txtNacimiento'])) {
                            if ($users->set_dui($_POST['txtDui'])) {
                                if ($users->set_correo_electronico($_POST['txtEmail'])) {
                                    if ($users->set_direccion($_POST['txtDireccion'])) {
                                        if ($users->set_username($_POST['username'])) {
                                            if ($_POST['password'] == $_POST['passwordVerify']) {
                                                if ($users->set_pass($_POST['passwordVerify'])) {
                                                    if (!$users->checkUsers()) {
                                                        if ($users->adminRegister()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Usuario registrado correctamente.';
                                                        } else {
                                                            $result['exception'] = 'Usuario no registrado';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Ya existe un usuario en el sistema';
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

                                $result['exception'] = 'DUI incorrecto';
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
                $_POST = $users->validateForm($_POST);
                if ($users->checkUser($_POST['txtCorreo'])) {
                    if ($users->checkEstado()) {
                        if ($users->checkPassword($_POST['txtPassword'])) {
                            $_SESSION['id_usuario'] = $users->get_id_usuario();
                            $_SESSION['tipo_usuario'] = $users->get_id_tipo_usuario();
                            $_SESSION['nombres'] = $users->get_nombres();
                            $_SESSION['apellidos'] = $users->get_apellidos();
                            $_SESSION['username'] =  $users->get_usuario();
                            $_SESSION['correo'] = $users->get_correo_electronico();
                            $result['status'] = 1;
                            $result['message'] = 'Acceso concedido, bienvenido ' . $users->get_usuario();
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
        }
    }

    header('content-type: application/json; charset=utf-8');
    print(json_encode($result, JSON_PRETTY_PRINT));
} else {
    print(json_encode('Recurso no disponible'));
}
