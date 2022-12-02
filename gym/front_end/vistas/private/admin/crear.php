<form action="../../../../back_end/controladores/admin_control.php" method="POST" 
enctype="multipart/form-data" class="needs-validation" >
    <input type="hidden" name="opcion" value="1">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
            <div class="invalid-feedback">
                Por favor ingrese todos los campos.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
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
            <label for="validationCustom05">Fotografía</label>
            <div class="custom-file">
                <input type="file" accept="image/jpeg, image/png" class="custom-file-input" id="customFileLang" lang="es" name="foto" required>
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
            <div class="invalid-feedback">
            Por favor ingrese todos los campos.
            </div>
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div> -->
    <button class="btn btn-primary" type="submit">Enviar</button>
</form>

<!-- <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script> -->