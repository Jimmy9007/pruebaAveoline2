<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">        
        <title>PRODUCTO</title>
        <link href="../../sistema/css/all_fontawesome.min.css" rel="stylesheet">        
        <link href="../../sistema/css/bootstrap.min.css" rel="stylesheet">        
        <link href="../../sistema/css/producto.css" rel="stylesheet">        
        <link href="../../sistema/css/sweetalert2-bootstrap-4.min.css" rel="stylesheet">        
        <link href="../../sistema/css/sweetalert2.min.css" rel="stylesheet">        
        <link href="../../sistema/css/toastr.min.css" rel="stylesheet">        
        <script src="../../sistema/js/jquery-3.6.0.min.js"></script>
        <script src="../../sistema/js/producto.js"></script>
        <script src="../../sistema/js/sweetalert2.min.js"></script>
        <script src="../../sistema/js/toastr.min.js"></script>
    </head>
    <body>
        <?php
        include '../../Modelo/Dao/ProductoDao.php';
        $productoDao = new ProductoDao();
        $listaProcutos = $productoDao->listarProductos();
        ?>
        <h1 style="text-align: center">PRODUCTOS</h1>
        <br>
        <button type="button" style="position: relative; left: 700px" onclick="verRegistrar()" class="btn btn-success" title="REGISTRAR UN NUEVO PRODUCTO"><i class="fas fa-plus-circle"></i> Registrar</button>
        <br><br>
        <table class="table table-striped table-bordered " style="position: relative; left: 350px; border: 1px solid #000; width: 50%">
            <thead style="border: 1px solid #000">
            <th>REFERENCIA</th>
            <th>OPCIONES</th>
            <th>NOMBRE PRODUCTO</th>
            <th>OBSERVACION</th>
            <th>PRECIO</th>
            <th>IMPUESTO</th>
            <th>CANTIDAD</th>
            <th>ESTADO</th>
            <th>IMAGEN</th>
        </thead>       
        <tbody>
            <?php
            foreach ($listaProcutos as $procuto) {
                echo '<tr>';
                echo '<td>' . $procuto['Referencia'] . '</td>';
                echo '<td>';
                echo '<a href="javascript:verDetalle(' . $procuto['Referencia'] . ')" title="VER DETALLE DE ESTE PRODUCTO"><i class="fas fa-eye"></i></a>';
                echo '&nbsp;&nbsp;';
                echo '<a href="javascript:verEditar(' . $procuto['Referencia'] . ')" title="INICIAR ACTUALIZACION DE ESTE PRODUCTO"><i class="fa fa-edit"></i></a>';
                echo '&nbsp;&nbsp;';
                echo '<a href="#" onclick="verEliminar(' . $procuto['Referencia'] . '); return false;" title="Ver Eliminar de esta Accion"><i class="fa fa-trash"></i></a>';
                echo '</td>';
                echo '<td>' . $procuto['nombreProducto'] . '</td>';
                echo '<td>' . $procuto['observacion'] . '</td>';
                echo '<td>' . $procuto['precio'] . '</td>';
                echo '<td>' . $procuto['impuesto'] . '</td>';
                echo '<td>' . $procuto['cantidad'] . '</td>';
                echo '<td>' . $procuto['estado'] . '</td>';
                echo '<td><img src="../../sistema/img/' . $procuto['imagen'] . '" style="width:50px; height:50px;"></td>';
                echo '</tr>';
            }
            ?>            
        </tbody>
        <tfoot></tfoot>
    </table>

    <div class="modal " id="modalFormulario" data-backdrop="static" tabindex="-1" aria-labelledby="lbModalFormulario" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); verflow-y: scroll">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lbModalFormulario">Formulario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="divContenido"></div>
            </div>
        </div>
    </div>
    <?php    
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 1) {
            toastrs('success', 'EXITOSO', 'REGISTRO');
        } else if ($_GET['msg'] == 2) {
            toastrs('success', 'EXITOSO', 'EDICION');
        } else if ($_GET['msg'] == 3) {
            toastrs('success', 'EXITOSO', 'ELIMINACION');
        }
        if ($_GET['msg'] == 0) {
            toastrs('error', 'ERROR', 'ERROR');
        }
    }

    if (isset($_GET['img'])) {
        if ($_GET['img'] == 1) {
            toastrs('error', 'EL TIPO ARCHIVO NO ES NI JPEG, JPG', 'ERROR AL CARGAR EL ARCHIVO');
        } else if ($_GET['img'] == 2) {
            toastrs('error', 'PESA MAS DE 200KB', 'EL PESO DEL ARCHIVO ESTA EXCEDIDO');
        } else if ($_GET['img'] == 3) {
            toastrs('error', 'NO EXISTE DIRECTORIO', 'DIRECTORIO');
        } else if ($_GET['img'] == 4) {
            toastrs('error', 'NO SE PUDO SUBIRLO', 'ERROR AL SUBIR LA IMAGEN A LA CARPETA');
        }
    }

    if (isset($_GET['imgunlink'])) {
        if ($_GET['imgunlink'] == 1) {
            toastrs('error', 'NO SE PUDO ELIMINAR', 'DIRECTORIO EN FALLA');
        }
    }

    function toastrs($tipo = "", $mensaje = "", $titulo = "") {
        echo "<script>toastr.$tipo('$mensaje', '$titulo',"
        . "{
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                positionClass: 'toast-top-right',
                preventDuplicates: false,
                onclick: null,
                showDuration: '300',
                hideDuration: '1000',
                timeOut: '8000',
                extendedTimeOut: '1000',
                showEasing: 'swing',
                hideEasing: 'linear',
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut'
            });</script>";
    }
    ?>        
</body>
</html>
