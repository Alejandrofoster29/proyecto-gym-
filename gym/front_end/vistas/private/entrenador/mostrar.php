<?php
include('../../../../back_end/modelos/entrenadores.php');
include('../../../../back_end/modelos/config.php');

$conexion = new Conexion();
$con = $conexion->getConection();
$entrenador = new Entrenadores($con);
$entrenador->id = $_GET['id'];

$entrenadores = $entrenador->leer_uno_id();
$entrenador = $entrenadores[0];
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include_once('../plantilla/head.php');
    ?>
</head>

<body>

    <nav class="site-header sticky-top py-1">
        <?php
        include_once('../plantilla/navbar.php');
        ?>
    </nav>

    <main class="container">
        <div>
            <form action="../../../../back_end/controladores/entrenador_control.php" method="POST" enctype="multipart/form-data" class="needs-validation">
                <input type="hidden" name="opcion" value="3">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="nombre">Codigo</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $entrenador->id ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $entrenador->nombre ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $entrenador->apellidos ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="edad">Edad</label>
                        <input type="tel" class="form-control" id="edad" name="edad" value="<?php echo $entrenador->edad ?>" readonly>
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
                            <option value="Activo" <?php echo ($entrenador->estatus == "Activo" ? 'selected' : '') ?>>Activo</option>
                            <option value="Inactivo" <?php echo ($entrenador->estatus == "Inactivo" ? 'selected' : '') ?>>Inactivo</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom05">Fotografía</label>
                        <img src="../imagenes/entrenadores/<?php echo $entrenador->foto ?>" width="100px" alt="">
                        <div class="custom-file">
                            <input type="file" accept="image/jpeg, image/png" class="custom-file-input" id="customFileLang" lang="es" name="foto">
                            <!-- <input type="hidden" name="actual" value="<?php echo $entrenador->foto ?>">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label> -->
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Borrar</button>
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