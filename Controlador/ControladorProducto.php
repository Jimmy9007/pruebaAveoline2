<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ControladorProducto
 *
 * @author CRISTIAN JESUS
 */
include '../Modelo/Dao/ProductoDao.php';
$pdao = new ProductoDao();
if (!$_POST) {//formularios            
    if (isset($_GET['idFormulario'])) {
        switch ($_GET['idFormulario']) {
            case 1:
                $html = file_get_contents('../vista/producto/agregar.php');
                echo $html;
                break;
            case 2:
                if ($_GET['referencia']) {
                    $html = file_get_contents('../vista/producto/editar.php');
                    $p = $pdao->detalleProducto($_GET['referencia']);
                    $html = str_replace('{referencia}', $p['Referencia'], $html);
                    $html = str_replace('{nombreProducto}', $p['nombreProducto'], $html);
                    $html = str_replace('{observacion}', $p['observacion'], $html);
                    $html = str_replace('{precio}', $p['precio'], $html);
                    $html = str_replace('{impuesto}', $p['impuesto'], $html);
                    $html = str_replace('{cantidad}', $p['cantidad'], $html);
                    if ($p['estado'] == 'activo') {
                        $html = str_replace('{estado}', '<option value="activo" selected>activo</option>
                        <option value="inactivo">inactivo</option>', $html);
                    } else {
                        $html = str_replace('{estado}', '<option value="activo">activo</option>
                        <option value="inactivo" selected>inactivo</option>', $html);
                    }
                    $html = str_replace('{imagen}', $p['imagen'], $html);
                    echo $html;
                }
                break;
            case 3:
                if ($_GET['referencia']) {
                    $html = file_get_contents('../vista/producto/eliminar.php');
                    $p = $pdao->detalleProducto($_GET['referencia']);
                    $html = str_replace('{referencia}', $p['Referencia'], $html);
                    $html = str_replace('{nombreProducto}', $p['nombreProducto'], $html);
                    $html = str_replace('{observacion}', $p['observacion'], $html);
                    $html = str_replace('{precio}', $p['precio'], $html);
                    $html = str_replace('{impuesto}', $p['impuesto'], $html);
                    $html = str_replace('{cantidad}', $p['cantidad'], $html);
                    if ($p['estado'] == 'activo') {
                        $html = str_replace('{estado}', '<option value="activo" selected>activo</option>
                        <option value="inactivo">inactivo</option>', $html);
                    } else {
                        $html = str_replace('{estado}', '<option value="activo">activo</option>
                        <option value="inactivo" selected>inactivo</option>', $html);
                    }
                    $html = str_replace('{imagen}', $p['imagen'], $html);
                    echo $html;
                }
                break;
            case 4:
                if ($_GET['referencia']) {
                    $html = file_get_contents('../vista/producto/detalle.php');
                    $p = $pdao->detalleProducto($_GET['referencia']);
                    $html = str_replace('{referencia}', $p['Referencia'], $html);
                    $html = str_replace('{nombreProducto}', $p['nombreProducto'], $html);
                    $html = str_replace('{observacion}', $p['observacion'], $html);
                    $html = str_replace('{precio}', $p['precio'], $html);
                    $html = str_replace('{impuesto}', $p['impuesto'], $html);
                    $html = str_replace('{cantidad}', $p['cantidad'], $html);
                    if ($p['estado'] == 'activo') {
                        $html = str_replace('{estado}', '<option value="activo" selected>activo</option>
                        <option value="inactivo">inactivo</option>', $html);
                    } else {
                        $html = str_replace('{estado}', '<option value="activo">activo</option>
                        <option value="inactivo" selected>inactivo</option>', $html);
                    }
                    $html = str_replace('{imagen}', $p['imagen'], $html);
                    echo $html;
                }
                break;
            default :
                break;
        }
    }
} else {//crud
    require_once '../Modelo/Entidad/Producto.php';
    $pdao = new ProductoDao();
    $directorio = "../sistema/img/";
    if (isset($_POST['opcion'])) {
        switch ($_POST['opcion']) {
            case 1:
                if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg") {
                    if ($_FILES['imagen']['size'] <= 200) {//200kb
                        $producto = new Producto($_POST['Referencia'], $_POST['nombreProducto'], $_POST['observacion'], $_POST['precio'], $_POST['impuesto'], $_POST['cantidad'], $_POST['estado'], $_FILES['imagen']['name']);
                        if ($pdao->registrarProducto($producto)) {
                            if (file_exists($directorio)) {
                                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_FILES['imagen']['name'])) {
                                    header("location:../vista/producto/indexproductos.php?img=0");
                                } else {
                                    header("location:../vista/producto/indexproductos.php?img=4"); //no se pudo guardar la imagen
                                }
                            } else {
                                header("location:../vista/producto/indexproductos.php?img=3"); //no existe directorio
                            }
                        } else {
                            header("location:../vista/producto/indexproductos.php?msg=0");
                        }
                    } else {
                        header("location:../vista/producto/indexproductos.php?img=2"); //pesa mas de 200kb
                    }
                } else {
                    header("location:../vista/producto/indexproductos.php?img=1"); //tipo archivo
                }
                break;
            case 2:
                if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg") {
                    $producto = new Producto($_POST['Referencia'], $_POST['nombreProducto'], $_POST['observacion'], $_POST['precio'], $_POST['impuesto'], $_POST['cantidad'], $_POST['estado'], $_FILES['imagen']['name']);
                    if ($pdao->modificarProducto($producto)) {
                        header("location:../vista/producto/indexproductos.php?msg=2");
                    } else {
                        header("location:../vista/producto/indexproductos.php?msg=0");
                    }
                } else {
                    header("location:../vista/producto/indexproductos.php?img=0");
                }
                break;
            case 3:
                $producto = new Producto($_POST['Referencia'], $_POST['nombreProducto'], $_POST['observacion'], $_POST['precio'], $_POST['impuesto'], $_POST['cantidad'], $_POST['estado'], $_POST['imagen']);
                if ($pdao->eliminarProducto($_POST['Referencia'])) {
                    if (unlink($directorio . $_POST['imagen'])) {
                        header("location:../vista/producto/indexproductos.php?msg=3");
                    } else {
                        header("location:../vista/producto/indexproductos.php?imgunlink=1");
                    }
                } else {
                    header("location:../vista/producto/indexproductos.php?msg=0");
                }
                break;
            default :
                header("location:../vista/producto/indexproductos.php");
                break;
        }
    }
}

//existe Referencia
if (isset($_POST['referencia'])) {
    $bool = false;
    $resultado = $pdao->existeReferencia((int) $_POST['referencia']);
    if ($resultado) {
        $bool = true;
        echo json_encode(array('existe' => $bool));
    } else {
        echo json_encode(array('existe' => $bool));
    }
}

