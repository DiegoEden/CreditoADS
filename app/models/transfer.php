<?php

class Transfer extends Validator
{

    private $id_transaccion = null;
    private $id_cuenta = null;
    private $cantidad_dinero = null;
    private $descripcion = null;
    private $id_cliente = null;
    private $id_tipo_transaccion = null;

    public function set_id_transaccion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_transaccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_id_tipo_transaccion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_transaccion = $value;
            return true;
        } else {
            return false;
        }
    }

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

    public function set_cantidad_dinero($value)
    {
        if ($this->validateMoney($value)) {
            $this->cantidad_dinero = $value;
            return true;
        } else {
            return false;
        }
    }

    public function set_descripcion($value)
    {
        if ($this->validateAlphabetic($value, 1, 255)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function get_id_transaccion()
    {
        return $this->id_transaccion;
    }

    public function get_id_cuenta()
    {
        return $this->id_cuenta;
    }

    public function get_cantidad_dinero()
    {
        return $this->cantidad_dinero;
    }

    public function get_descripcion()
    {
        return $this->descripcion;
    }

    public function get_id_cliente()
    {
        return $this->id_cliente;
    }

    public function get_id_tipo_transaccion()
    {
        return $this->id_tipo_transaccion;
    }

    public function getTrans()
    {

        $sql = 'SELECT t.id_transaccion, t.id_cuenta, t.cantidad_dinero, CONVERT(DATE, T.fecha_hora_transac) AS fecha_transac,tt.tipo_transaccion,  t.descripcion, c.id_cliente, c.nombres, c.apellidos
        FROM Transaccion t
        INNER JOIN cuentas cta ON t.id_cuenta = cta.id_cuenta
        INNER JOIN clientes c ON cta.id_cliente = c.id_cliente
        inner join Tipo_transaccion tt on tt.id_tipo_transaccion = t.id_tipo_transaccion
        WHERE c.id_cliente = ?
        ORDER BY t.id_transaccion DESC';
        $params = array($this->id_cliente);
        return Database::getRows($sql, $params);
    }


    public function getCustomerAccounts()
    {

        $customer =  $_SESSION['id_cliente'];

        $sql = 'SELECT id_cuenta, numero_cuenta From Cuentas
    WHERE id_cliente = ?
    ';
        $params = array($customer);
        return Database::getRows($sql, $params);
    }


    public function getTransacType()
    {

        $sql = 'SELECT id_tipo_transaccion, tipo_transaccion From Tipo_transaccion
    ';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function addTransfer()
    {

        $sql = 'INSERT INTO Transaccion (id_cuenta, cantidad_dinero, descripcion, id_tipo_transaccion)
        VALUES (?, ?, ?, ?)';

        $params = array(
            $this->id_cuenta, $this->cantidad_dinero, $this->descripcion, $this->id_tipo_transaccion
        );
        return Database::executeRow($sql, $params);
    }
}
