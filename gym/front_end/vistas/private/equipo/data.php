<?php
include('../../../../back_end/modelos/equipo.php');
include('../../../../back_end/modelos/config.php');
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
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
        $equ = new Equipo($con);
        $equipos = $equ->leer_todos();
        //print_r($equipos);
        foreach ($equipos as $equipo) {
        ?>

            <tr>
                <th scope="row"><?php echo $equipo->id ?></th>
                <td><?php echo $equipo->nombre ?></td>
                <td><img src="../imagenes/equipo/<?php echo $equipo->foto ?>" with="50px" height="50px" alt=""></td>
                <td><?php echo $equipo->estatus ?></td>
                <td><a href="editar.php?id=<?php echo $equipo->id ?>">Editar</a></td>
                <td><a href="mostrar.php?id=<?php echo $equipo->id ?>">Borrar</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>