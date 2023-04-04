<?php

class Customers extends Validator
{

    private $id_cliente = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo_electronico = null;
    private $direccion = null;
    private $telefono = null;
    private $numero_cuenta = null;
    private $username = null;
    private $pass = null;
    private $ocupacion = null;
    private $genero = null;
    private $estado_civil = null;
    private $dui = null;
    private $fecha_nacimiento = null;


    public function set_id_cliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public  function set_nombres($value)
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

    public function set_correo_electronico($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo_electronico = $value;
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

    public function set_telefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_numero_cuenta($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->numero_cuenta = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_username($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->username = $value;
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

    public function set_ocupacion($value)
    {
        if ($this->validateAlphanumeric($value, 1, 100)) {
            $this->ocupacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_genero($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->genero = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_estado_civil($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->estado_civil = $value;
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

    public function set_fecha_nacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_nacimiento = $value;
            return true;
        } else {
            return false;
        }
    }


    public function get_id_cliente()
    {
        return $this->id_cliente;
    }

    public function get_nombres()
    {
        return $this->nombres;
    }

    public function get_apellidos()
    {
        return $this->apellidos;
    }

    public function get_correo_electronico()
    {
        return $this->correo_electronico;
    }

    public function get_direccion()
    {
        return $this->direccion;
    }

    public function get_telefono()
    {
        return $this->telefono;
    }

    public function get_numero_cuenta()
    {
        return $this->numero_cuenta;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function get_pass()
    {
        return $this->pass;
    }

    public function get_ocupacion()
    {
        return $this->ocupacion;
    }

    public function get_genero()
    {
        return $this->genero;
    }

    public function get_estado_civil()
    {
        return $this->estado_civil;
    }

    public function get_dui()
    {
        return $this->dui;
    }

    public function get_fecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }


    public function cuentaExistente()
    {

        $sql = 'Select * from Cuentas where numero_cuenta = ?';
        $params = array($this->numero_cuenta);
        return Database::getRow($sql, $params);
    }


    public function cuentaCliente()
    {

        $sql = 'Select * from Cuentas where numero_cuenta = ? and id_cliente is null ';
        $params = array($this->numero_cuenta);
        return Database::getRow($sql, $params);
    }

    public function getLastId_cliente()
    {
        $sql = 'SELECT max(id_cliente) as id_cliente from Clientes';
        $params = null;
        return Database::getRow($sql, $params);
    }


    public function crearCliente()
    {

        $hash = password_hash($this->pass, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO clientes(
            id_cliente, nombres, apellidos, direccion, num_telefono, correo_electronico, fecha_nacimiento, estado_civil, ocupacion, username, pass, dui, genero, fecha_creacion, id_estado_cliente)
            VALUES (default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, default, 1);';

        $params = array(
            $this->nombres, $this->apellidos, $this->direccion, $this->telefono, $this->correo_electronico,
            $this->fecha_nacimiento, $this->estado_civil, $this->ocupacion, $this->username, $hash, $this->dui, $this->genero
        );
        return Database::executeRow($sql, $params);
    }

    public function checkUsuarioCliente()
    {

        $sql = 'SELECT * FROM clientes where username=?';
        $params = array($this->username);
        return Database::getRows($sql, $params);
    }


    public function crearCliente_cuenta()
    {

        $sql = 'update Cuentas set id_cliente = ? where numero_cuenta =?';
        $params = array($this->id_cliente, $this->numero_cuenta);
        return Database::executeRow($sql, $params);
    }
}
