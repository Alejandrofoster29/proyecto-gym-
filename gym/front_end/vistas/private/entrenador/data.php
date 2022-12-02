<?php
include('../../../../back_end/modelos/entrenadores.php');
include('../../../../back_end/modelos/config.php');
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Edad</th>
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
        $ent = new Entrenadores($con);
        $entrenadores = $ent->leer_todos();
        //print_r($entrenadores);
        foreach ($entrenadores as $entrenador) {
        ?>

            <tr>
                <th scope="row"><?php echo $entrenador->id ?></th>
                <td><?php echo $entrenador->nombre ?></td>
                <td><?php echo $entrenador->apellidos ?></td>
                <td><?php echo $entrenador->edad?></td>
                <td><img src="../imagenes/entrenadores/<?php echo $entrenador->foto ?>" with="50px" height="50px" alt=""></td>
                <td><?php echo $entrenador->estatus ?></td>
                <td><a href="editar.php?id=<?php echo $entrenador->id ?>">Editar</a></td>
                <td><a href="mostrar.php?id=<?php echo $entrenador->id ?>">Borrar</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>