<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Producto
 *
 * @author CRISTIAN JESUS
 */
class Producto {
    private $Referencia;
    private $nombreProducto;
    private $observacion;
    private $precio;
    private $impuesto;
    private $cantidad;
    private $estado;
    private $imagen;
    
    public function __construct($Referencia, $nombreProducto, $observacion, $precio, $impuesto, $cantidad, $estado, $imagen) {
        $this->Referencia = $Referencia;
        $this->nombreProducto = $nombreProducto;
        $this->observacion = $observacion;
        $this->precio = $precio;
        $this->impuesto = $impuesto;
        $this->cantidad = $cantidad;
        $this->estado = $estado;
        $this->imagen = $imagen;
    }        
    
    public function getReferencia() {
        return $this->Referencia;
    }

    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getImpuesto() {
        return $this->impuesto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setReferencia($Referencia): void {
        $this->Referencia = $Referencia;
    }

    public function setNombreProducto($nombreProducto): void {
        $this->nombreProducto = $nombreProducto;
    }

    public function setObservacion($observacion): void {
        $this->observacion = $observacion;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function setImpuesto($impuesto): void {
        $this->impuesto = $impuesto;
    }

    public function setCantidad($cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

}
