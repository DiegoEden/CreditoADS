<?php

class NewUsers extends Validator
{

    private $id_usuario = null;
    private $usuario = null;
    private $nombres = null;
    private $apellidos = null;
    private $dui = null;
    private $direccion = null;
    private $tipo_usuario = null;
    private $estadio_usuario = null;
    private $correo = null;



    public function setid_cuenta($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cuenta = $value;
            return true;
        } else {
            return false;
        }
    }


    public  function setusuarios($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->usuarios = $value;
            return true;
        } else {
            return false;
        }
    }

    public  function setnombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }
    public  function setapellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }
    public  function setdui($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }
    public  function setdireccion($value)
    {
        if ($this->validateText($value)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }
    public  function settipo_usuario($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->tipo_usuario = $value;
            return true;
        } else {
            return false;
        }
    }
    public  function setestadio_usuario($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estadio_usuario = $value;
            return true;
        } else {
            return false;
        }
    }
    public  function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }
    public function getid_cuenta()
    {
        return $this->id_cuenta;
    }
    public function getusuarios()
    {
        return $this->usuarios;
    }
    public function getnombre()
    {
        return $this->nombre;
    }
    public function getapellidos()
    {
        return $this->apellidos;
    }
    public function getdireccion()
    {
        return $this->direccion;
    }
    public function getdui()
    {
        return $this->dui;
    }
    public function gettipo_usuario()
    {
        return $this->tipo_usuario;
    }
    public function getestadio_usuario()
    {
        return $this->estadio_usuario;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function readAll(){
        $sql='SELECT a.id_usuario, a.usuario,a.nombres,a.apellidos,a.dui,a.direccion, b.tipo_usuario,c.estado_usuario, a.correo_electronico  FROM Usuarios a, Tipo_usuario b, Estado_usuario c WHERE a.id_tipo_usuario=b.id_tipo_usuario and a.id_estado_usuario=c.id_estado_usuario; ';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function createRow()
    {
        $uno= 1;
     $hash = password_hash("123456789", PASSWORD_DEFAULT);
        $sql = 'INSERT INTO Usuarios (usuario, nombres, apellidos, dui, direccion,id_tipo_usuario,pass,id_estado_usuario,correo_electronico)
        VALUES (?,?,?,?,?,?,?,?,?)';
        $params = array($this->usuarios,$this->nombre,$this->apellidos,$this->dui,$this->direccion,$uno,$hash,$uno,$this->correo);
        return Database::executeRow($sql, $params);
    }
}
