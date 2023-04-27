<?php
require_once('../helpers/connection.php');
require_once('../helpers/validator.php');
require_once('../models/system_users.php');
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
    $mailFormat = new Mailformat();
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_usuario'])) {
        switch ($_GET['action']) {
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
        }
    }

    header('content-type: application/json; charset=utf-8');
    print(json_encode($result, JSON_PRETTY_PRINT));
} else {
    print(json_encode('Recurso no disponible'));
}
