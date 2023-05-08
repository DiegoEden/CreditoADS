<?php

class Account extends Validator
{

    private $id_cliente = null;
    private $id_usuario = null;
    private $numero_cuenta = null;
    private $saldo = null;
    private $id_cuenta = null;

    public function set_id_cliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_id_cuenta($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cuenta = $value;
            return true;
        } else {
            return false;
        }
    }


    public function get_id_cuenta()
    {
        return $this->id_cuenta;
    }

    public function get_id_cliente()
    {
        return $this->id_cliente;
    }

    public function set_id_usuario($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function get_id_usuario()
    {
        return $this->id_usuario;
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

    public function get_numero_cuenta()
    {
        return $this->numero_cuenta;
    }

    public function set_saldo($value)
    {
        if ($this->validateMoney($value)) {
            $this->saldo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function get_saldo()
    {
        return $this->saldo;
    }

    public function getAccounts()
    {

        $sql = 'SELECT id_cuenta, numero_cuenta,  CONVERT(DATE, fecha_apertura) AS fecha, saldo_actual, Tipo_cuentas.tipo_cuenta as tipo_cuenta from Cuentas
        inner join Tipo_cuentas on Tipo_cuentas.id_tipo_cuenta = Cuentas.id_tipo_cuenta where id_cliente=?';
        $params = array($this->id_cliente);
        return Database::getRows($sql, $params);
    }


    public function getAccTrans($param)
    {
        $sql = 'SELECT CONVERT(DATE, t.fecha_hora_transac) AS fecha_transac, t.cantidad_dinero, t.descripcion, tt.tipo_transaccion from Transaccion t
        inner join Tipo_transaccion tt on tt.id_tipo_transaccion = t.id_tipo_transaccion where id_cuenta=?';
        $params = array($param);
        return Database::getRows($sql, $params);
    }
}
