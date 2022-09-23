<form action="../../Controlador/controladorProducto.php" method="post" enctype="multipart/form-data" onsubmit="validarRegistrar(event, this)" style="text-align: center;">
    <input type="hidden" id="opcion" name="opcion" value="1" readonly/><br>
    <fieldset>
        <legend>Informacion del Producto</legend>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label>REFERENCIA</label>
                <div class="input-group">
                    <input type="number" id="Referencia" name="Referencia" class="form-control" onchange="existeReferencia(this.value)" required/>
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
                    <input type="text" name="nombreProducto" class="form-control" required/>
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
                    <textarea name="observacion" class="form-control" required></textarea>
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
                    <input type="number" name="precio" class="form-control" required/>
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
                    <input type="number" name="impuesto" class="form-control" required/>
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
                    <input type="number" name="cantidad" class="form-control" required/>
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
                    <select name="estado" class="form-control">
                        <option value="">seleccione...</option>
                        <option value="activo">activo</option>
                        <option value="inactivo">inactivo</option>
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
                    <input type="file" name="imagen" class="form-control" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-file"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="modal-footer" style="padding: 20px">
        <button type="submit" class="btn btn-success" title="REGISTRAR PRODUCTO"><i class="fas fa-save"></i> Registrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cerrarModal()"><i class="fas fa-times"></i> Cerrar</button>
    </div>
</form>
