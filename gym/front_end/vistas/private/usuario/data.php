<?php
include('../../../../back_end/modelos/usuarios.php');
include('../../../../back_end/modelos/config.php');
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Edad</th>
            <th scope="col">Estatura</th>
            <th scope="col">Peso</th>
            <th scope="col">Foto</th>
            <th scope="col">Estatus</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conexion = new Conexion();
        $con = $conexion->getConection();
        $usu = new Usuarios($con);
        $usuarios = $usu->leer_todos();
        //print_r($usuarios);
        foreach ($usuarios as $usuario) {
        ?>

            <tr>
                <th scope="row"><?php echo $usuario->id ?></th>
                <td><?php echo $usuario->nombre ?></td>
                <td><?php echo $usuario->apellidos ?></td>
                <td><?php echo $usuario->edad ?></td>
                <td><?php echo $usuario->estatura ?></td>
                <td><?php echo $usuario->peso ?></td>
                <td><img src="../imagenes/usuarios/<?php echo $usuario->foto ?>" with="50px" height="50px" alt=""></td>
                <td><?php echo $usuario->estatus ?></td>
                <td><a href="editar.php?id=<?php echo $usuario->id ?>">Editar</a></td>
                <td><a href="mostrar.php?id=<?php echo $usuario->id ?>">Borrar</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>