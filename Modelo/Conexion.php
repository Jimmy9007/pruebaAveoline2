<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ConexionMysql
 *
 * @author CRISTIAN JESUS
 */
class Conexion {

    public $con = null;
    private $localhost = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $bd = "inventario";

    public function __construct() {
        $this->con = new mysqli($this->localhost, $this->usuario, $this->contrasena, $this->bd);
        if ($this->con->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->con->connect_errno . ") " . $this->con->connect_error;
        }
        //echo $this->con->host_info . "\n";

        $this->con = new mysqli("127.0.0.1", "root", "", "inventario", 3306);
        if ($this->con->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->con->connect_errno . ") " . $this->con->connect_error;
        }
        //echo $this->con->host_info . "\n";
    }

}
