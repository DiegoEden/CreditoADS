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

    public function adminRegister()
    {
        $hash = password_hash($this->pass, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO Usuarios (usuario,nombres,apellidos,pass,dui,direccion,id_tipo_usuario,id_estado_usuario,codigo) VALUES
        (?,?,?,?,?,?,2,1,NULL)';

        $params = array(
            $this->usuario, $this->nombres, $this->apellidos, $hash,  $this->dui, $this->direccion, $this->id_tipo_usuario,
            $this->id_estado_usuario
        );

        return Database::executeRow($sql, $params);
    }
}
