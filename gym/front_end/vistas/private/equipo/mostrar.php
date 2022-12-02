<?php
include('../../../../back_end/modelos/equipo.php');
include('../../../../back_end/modelos/config.php');

$conexion = new Conexion();
$con = $conexion->getConection();
$equipo = new Equipo($con);
$equipo->id = $_GET['id'];

$equipos = $equipo->leer_uno_id();
$equipo = $equipos[0];
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
            <form action="../../../../back_end/controladores/equipo_control.php" method="POST" class="needs-validation">
                <input type="hidden" name="opcion" value="3">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Codigo</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $equipo->id ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $equipo->nombre ?>" readonly>
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
                            <option value="Activo" <?php echo ($equipo->estatus == "Activo" ? 'selected' : '') ?>>Activo</option>
                            <option value="Inactivo" <?php echo ($equipo->estatus == "Inactivo" ? 'selected' : '') ?>>Inactivo</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom05">Fotografía</label>
                        <img src="../imagenes/equipo/<?php echo $equipo->foto ?>" width="100px" alt="">
                        <div class="custom-file">
                            <input type="file" accept="image/jpeg, image/png" class="custom-file-input" id="customFileLang" lang="es" name="foto" >
                            <!-- <input type="hidden" name="actual" value="<?php echo $equipo->foto ?>"> -->
                            <!-- <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label> -->
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