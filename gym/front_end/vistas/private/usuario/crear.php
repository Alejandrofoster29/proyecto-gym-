<form action="../../../../back_end/controladores/usuario_control.php" method="POST" enctype="multipart/form-data" class="needs-validation">
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
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="edad">Edad</label>
            <input type="tel" class="form-control" id="edad" name="edad" required>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="estatura">Estatura</label>
            <input type="tel" class="form-control" id="estatura" name="estatura" required>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="peso">Peso</label>
            <input type="tel" class="form-control" id="peso" name="peso" required>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
    </div>
    <div class="form-row">
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
        <div class="col-md-4 mb-3">
            <label for="validationCustom05">Fotograf??a</label>
            <div class="custom-file">
                <input type="file" accept="image/jpeg, image/png" class="custom-file-input" id="customFileLang" lang="es" name="foto" required>
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
    </div>
    <a href="../../../../back_end/controladores/alertaModal.php"><button class="btn btn-primary" type="submit">Enviar</button></a>
</form>
