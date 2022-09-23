<form action="../../Controlador/controladorProducto.php" method="post" enctype="multipart/form-data" onsubmit="validarEliminar(event, this)" style="text-align: center;">    
    <input type="hidden" id="opcion" name="opcion" value="3" readonly/><br>
    <fieldset>
        <legend>Informacion del Producto</legend>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label>REFERENCIA</label>
                <div class="input-group">
                    <input type="number" name="Referencia" value="{referencia}" class="form-control" readonly/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label>NOMBRE PRODUCTO</label>
                <div class="input-group">
                    <input type="text" name="nombreProducto" value="{nombreProducto}" class="form-control" readonly/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-list"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label>OBSERVACION</label>
                <div class="input-group">
                    <textarea name="observacion" class="form-control" readonly>{observacion}</textarea>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-list"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label>PRECIO</label>
                <div class="input-group">
                    <input type="number" name="precio" value="{precio}" class="form-control" readonly/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-sort-numeric-up"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label>IMPUESTO</label>
                <div class="input-group">
                    <input type="number" name="impuesto" value="{impuesto}" class="form-control" readonly/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-sort-numeric-up"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label>CANTIDAD</label>
                <div class="input-group">
                    <input type="number" name="cantidad" value="{cantidad}" class="form-control" readonly/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-sort-numeric-up"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label>ESTADO</label>
                <div class="input-group">
                    <select name="estado" class="form-control" readonly>
                        <option value="">seleccione...</option>
                        {estado}
                    </select>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-list"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label>IMAGEN</label>
                <div class="input-group">
                    <img src="../../sistema/img/{imagen}" style="width:100px;height:100px;" class="form-control" readonly/>                    
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-file"></i>
                        </span>
                    </div>
                </div>
            </div>
            <input type="hidden" name="imagen" value="{imagen}" readonly/>
        </div>
    </fieldset>
    <div class="modal-footer" style="padding: 20px">
        <button type="submit" class="btn btn-warning" title="ELIMINAR PRODUCTO"><i class="fas fa-trash"></i> Eliminar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cerrarModal()"><i class="fas fa-times"></i> Cerrar</button>
    </div>
</form>
