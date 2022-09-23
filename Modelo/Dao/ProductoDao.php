<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ProductoDao
 *
 * @author CRISTIAN JESUS
 */
//include_once '../../Modelo/ConexionMysql.php';
include 'Conexion.php';

class ProductoDao {

    public $cc = null;

    public function __construct() {
        $con = new Conexion();
        //parent::__construct();
        //$this->cc = $this->con;
        $this->cc = $con->con;
    }

    public function listarProductos() {
        $resultado = $this->cc->query("SELECT Referencia, nombreProducto, observacion, precio, impuesto, cantidad, estado, imagen FROM producto");
        $productos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $productos;
    }

    public function registrarProducto(Producto $producto) {
        if ($producto->getEstado() != '') {
            $sentencia = $this->cc->prepare("INSERT INTO producto (Referencia, nombreProducto, observacion, precio, impuesto, cantidad, estado, imagen) VALUES (?,?,?,?,?,?,?,?)");
            $sentencia->bind_param("issddiss", $producto->getReferencia(), $producto->getNombreProducto(), $producto->getObservacion(), $producto->getPrecio(), $producto->getImpuesto(), $producto->getCantidad(), $producto->getEstado(), $producto->getImagen());
            if ($sentencia->execute()) {
                return true;
            }
            return false;
        } else {
            $sentencia = $this->cc->prepare("INSERT INTO producto (Referencia, nombreProducto, observacion, precio, impuesto, cantidad, imagen) VALUES (?,?,?,?,?,?,?)");
            $sentencia->bind_param("issddis", $producto->getReferencia(), $producto->getNombreProducto(), $producto->getObservacion(), $producto->getPrecio(), $producto->getImpuesto(), $producto->getCantidad(), $producto->getImagen());
            if ($sentencia->execute()) {
                return true;
            }
            return false;
        }
    }

    public function modificarProducto(Producto $producto) {
        $sentencia = $this->cc->prepare("UPDATE producto SET nombreProducto=?, observacion=?, precio=?, impuesto=?, cantidad=?, estado=?, imagen=? WHERE ?");
        $sentencia->bind_param("ssddissi", $producto->getNombreProducto(), $producto->getObservacion(), $producto->getPrecio(), $producto->getImpuesto(), $producto->getCantidad(), $producto->getEstado(), $producto->getImagen(), $producto->getReferencia());
        if ($sentencia->execute()) {
            return true;
        }
        return false;
    }

    public function eliminarProducto($referencia = 0) {
        $sentencia = $this->cc->prepare("DELETE FROM producto WHERE producto.Referencia = ?");
        $sentencia->bind_param("i", $referencia);
        if ($sentencia->execute()) {
            return true;
        }
        return false;
    }

    public function detalleProducto($referencia = 0) {
        $sentencia = $this->cc->prepare("SELECT * FROM producto WHERE producto.Referencia = ?");
        $sentencia->bind_param("i", $referencia);
        if ($sentencia->execute()) {
            $resultado = $sentencia->get_result();
            if ($resultado->num_rows > 0) {
                $producto = $resultado->fetch_assoc();
                return $producto;
            } else {
                return null;
            }
        }
    }

    public function existeReferencia($referencia = 0) {
        $sentencia = $this->cc->prepare("SELECT * FROM producto WHERE producto.Referencia = ? ");
        $sentencia->bind_param("i", $referencia);
        if ($sentencia->execute()) {
            $resultado = $sentencia->get_result();
            if ($resultado->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

}
