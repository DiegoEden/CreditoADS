<?php

class SystemUsers extends Validator
{

    private $id_usuario = null;
    private $nombres = null;
    private $apellidos = null;
    private $usuario = null;
    private $pass = null;
    private $dui = null;
    private $direccion = null;
    private $id_tipo_usuario = null;
    private $id_estado_usuario = null;
    private $codigo = null;
    private $correo_electronico = null;
    private $fecha_nacimiento = null;


    public function set_id_usuario($value)
    {

        if ($this->validateNaturalNumber($value)) {
            $this->id_usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_nombres($value)
    {

        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {

            return false;
        }
    }

    public function set_apellidos($value)
    {

        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {

            return false;
        }
    }

    public function set_username($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }


    public function set_pass($value)
    {
        if ($this->validatePassword($value)) {
            $this->pass = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_dui($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_direccion($value)
    {
        if ($this->validateText($value)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }


    public function set_id_tipo_usuario($value)
    {

        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_usuario = $value;
            return true;
        } else {
            return false;
        }
    }


    public function set_id_estado_usuario($value)
    {

        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_codigo($value)
    {
        if ($this->validateText($value)) {
            $this->codigo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_correo_electronico($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo_electronico = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_fecha_nacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_nacimiento = $value;
            return true;
        } else {
            return false;
        }
    }


    public function get_id_usuario()
    {
        return $this->id_usuario;
    }

    public function get_nombres()
    {
        return $this->nombres;
    }

    public function get_apellidos()
    {
        return $this->apellidos;
    }

    public function get_usuario()
    {
        return $this->usuario;
    }

    public function get_pass()
    {
        return $this->pass;
    }

    public function get_dui()
    {
        return $this->dui;
    }

    public function get_direccion()
    {
        return $this->direccion;
    }

    public function get_id_tipo_usuario()
    {
        return $this->id_tipo_usuario;
    }

    public function get_id_estado_usuario()
    {
        return $this->id_estado_usuario;
    }

    public function get_codigo()
    {
        return $this->codigo;
    }

    public function checkUsers()
    {
        $sql = 'SELECT * FROM Usuarios';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function get_correo_electronico()
    {
        return $this->correo_electronico;
    }

    public function get_fecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }


    public function adminRegister()
    {
        $hash = password_hash($this->pass, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO Usuarios (usuario,nombres,apellidos,pass,dui,direccion,id_tipo_usuario,id_estado_usuario,codigo,correo_electronico, fecha_nacimiento ) VALUES
        (?,?,?,?,?,?,2,1,NULL,?,?)';

        $params = array(
            $this->usuario, $this->nombres, $this->apellidos, $hash,  $this->dui, $this->direccion,
             $this->correo_electronico, $this->fecha_nacimiento
        );

        return Database::executeRow($sql, $params);
    }



    public function checkUser($user)
    {

        $sql = 'SELECT id_usuario, direccion, nombres, apellidos, correo_electronico, fecha_nacimiento, usuario, pass, dui, id_estado_usuario, id_tipo_usuario
        FROM Usuarios where usuario = ?';
        $params = array($user);
        if ($data = Database::getRow($sql, $params)) {

            $this->id_usuario = $data['id_usuario'];
            $this->nombres = $data['nombres'];
            $this->apellidos = $data['apellidos'];
            $this->direccion = $data['direccion'];
            $this->correo_electronico = $data['correo_electronico'];
            $this->fecha_nacimiento = $data['fecha_nacimiento'];
            $this->usuario = $data['usuario'];
            $this->dui = $data['dui'];
            $this->id_estado_usuario = $data['id_estado_usuario'];
            $this->id_tipo_usuario = $data['id_tipo_usuario'];

            return true;
        } else {

            return false;
        }
    }

    public function checkEstado()
    {
        if ($this->id_estado_usuario == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT pass from Usuarios where id_usuario = ?';
        $params = array($this->id_usuario);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['pass'])) {
            return true;
        } else {
            return false;
        }
    }


    public function checkBlockedUsers()
    {
        $sql = "SELECT * from Usuarios where id_usuario = ? AND id_estado_usuario=3";
        // Enviamos los parametros
        $params = array($this->id_usuario);
        return Database::getRow($sql, $params);
    }
}
