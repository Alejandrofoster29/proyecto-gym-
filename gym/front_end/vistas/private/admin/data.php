<?php
include('../../../../back_end/modelos/admins.php');
include('../../../../back_end/modelos/config.php');
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
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
        $adm = new Admins($con);
        $admins = $adm->leer_todos();
        //print_r($admins);
        foreach ($admins as $admin) {
        ?>

            <tr>
                <th scope="row"><?php echo $admin->id ?></th>
                <td><?php echo $admin->usuario ?></td>
                <td><img src="../imagenes/admins/<?php echo $admin->foto ?>" with="50px" height="50px" alt=""></td>
                <td><?php echo $admin->estatus ?></td>
                <td><a href="editar.php?id=<?php echo $admin->id ?>">Editar</a></td>
                <td><a href="mostrar.php?id=<?php echo $admin->id ?>">Borrar</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>