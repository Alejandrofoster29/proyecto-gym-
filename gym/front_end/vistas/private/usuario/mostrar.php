<?php
include('../../../../back_end/modelos/usuarios.php');
include('../../../../back_end/modelos/config.php');

$conexion = new Conexion();
$con = $conexion->getConection();
$usuario = new Usuarios($con);
$usuario->id = $_GET['id'];

$usuarios = $usuario->leer_uno_id();
$usuario = $usuarios[0];
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include_once('../plantilla/head.php');
    ?>
</head>

<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("Bienvenido ".$_SESSION['nombre']);

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<body>

    <nav class="site-header sticky-top py-1">
        <?php
        include_once('../plantilla/navbar.php');
        ?>
    </nav>

    <main class="container">
        <div>
            <form action="../../../../back_end/controladores/usuario_control.php" method="POST" class="needs-validation">
                <input type="hidden" name="opcion" value="3">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="usuario">Codigo</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $usuario->id ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="usuario">Nombre</label>
                        <input type="text" class="form-control" id="usuario" name="nombre" value="<?php echo $usuario->nombre ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $usuario->contrasena ?>" readonly>
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
                            <option value="Activo" <?php echo ($usuario->estatus == "Activo" ? 'selected' : '') ?>>Activo</option>
                            <option value="Inactivo" <?php echo ($usuario->estatus == "Inactivo" ? 'selected' : '') ?>>Inactivo</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom05">Fotografía</label>
                        <img src="../imagenes/usuarios/<?php echo $usuario->foto ?>" width="100px" alt="">
                        <div class="custom-file">
                            <input type="file" accept="image/jpeg, image/png" class="custom-file-input" id="customFileLang" lang="es" name="foto" >
                            <!-- <input type="hidden" name="actual" value="<?php echo $usuario->foto ?>"> -->
                            <!-- <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label> -->
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" onclick="return ConfirmDelete()">Borrar</button>
            </form>
        </div>
    </main>

    <footer class="container py-5">
        <?php
        include_once('../plantilla/footer.php');
        ?>
    </footer>


    <?php
    include_once('../plantilla/script.php');
    ?>


</body>

</html>