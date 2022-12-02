<form action="../../../../back_end/controladores/equipo_control.php" method="POST" enctype="multipart/form-data" class="needs-validation">
    <input type="hidden" name="opcion" value="1">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom05">Fotografía</label>
            <div class="custom-file">
                <input type="file" accept="image/jpeg, image/png" class="custom-file-input" id="customFileLang" lang="es" name="foto" required>
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustom04">Estatus</label>
            <select class="custom-select" id="validationCustom04" name="estatus" disabled>
                <option value="">Estatus...</option>
                <option selected value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Enviar</button>
</form>