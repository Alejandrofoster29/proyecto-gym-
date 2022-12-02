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

<body>

    <nav class="site-header sticky-top py-1">
        <?php
        include_once('../plantilla/navbar.php');
        ?>
    </nav>

    <main class="container">
        <div>
            <form action="../../../../back_end/controladores/usuario_control.php" method="POST" enctype="multipart/form-data" class="needs-validation">
                <input type="hidden" name="opcion" value="2">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="usuario">Codigo</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $usuario->id ?>" readonly>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario->nombre ?>" >
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario->apellidos ?>" >
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="edad">Edad</label>
                        <input type="tel" class="form-control" id="edad" name="edad" value="<?php echo $usuario->edad ?>"  >
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="estatura">Estatura</label>
                        <input type="tel" class="form-control" id="estatura" name="estatura" value="<?php echo $usuario->estatura ?>"  >
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="peso">Peso</label>
                        <input type="tel" class="form-control" id="peso" name="peso" value="<?php echo $usuario->peso ?>"  >
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Estatus</label>
                        <select class="custom-select" id="validationCustom04" name="estatus">
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
                            <input type="file" accept="image/jpeg, image/png" class="custom-file-input" id="customFileLang" lang="es" name="foto">
                            <input type="hidden" name="actual" value="<?php echo $usuario->foto ?>">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese todos los campos.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Actualizar</button>
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